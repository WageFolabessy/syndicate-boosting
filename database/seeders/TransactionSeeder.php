<?php

namespace Database\Seeders;

use App\Models\AccountOrderDetail;
use App\Models\BoostingService;
use App\Models\CustomOrderDetail;
use App\Models\GameAccount;
use App\Models\GameRankCategory;
use App\Models\GameRankTier;
use App\Models\GameRankTierDetail;
use App\Models\PackageOrderDetail;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Date range for transactions
     */
    private Carbon $startDate;

    private Carbon $endDate;

    /**
     * Sample customer data for realistic seeding
     */
    private array $customerNames = [
        'Budi Santoso', 'Andi Wijaya', 'Siti Rahma', 'Ahmad Hidayat', 'Dewi Lestari',
        'Rizki Pratama', 'Putri Ayu', 'Fajar Nugroho', 'Maya Sari', 'Dimas Arya',
        'Nadia Putri', 'Reza Firmansyah', 'Anisa Rahmawati', 'Yoga Permana', 'Indah Permatasari',
        'Bayu Setiawan', 'Citra Dewi', 'Eko Prasetyo', 'Fitri Handayani', 'Gilang Ramadhan',
    ];

    private array $reviewComments = [
        'Pelayanan sangat memuaskan, proses cepat dan aman!',
        'Recommended! Booster profesional dan ramah.',
        'Mantap, rank naik sesuai target. Terima kasih!',
        'Proses boosting cepat, komunikasi baik.',
        'Sangat puas dengan hasilnya, akan order lagi.',
        'Trusted seller, pengerjaan sesuai estimasi.',
        'Good service, booster skill tinggi.',
        'Aman dan terpercaya, tidak ada masalah.',
        'Harga worth it dengan kualitas pelayanan.',
        'Pengerjaan rapi, akun aman. Recommended!',
        'Fast response, hasil memuaskan.',
        'Booster handal, rank naik tanpa kendala.',
        'Pelayanan ramah dan profesional.',
        'Sangat membantu, proses transparan.',
        'Top service! Pasti order lagi.',
    ];

    private array $servers = ['Asia', 'Europe', 'America', 'SEA'];

    private array $logins = ['Email', 'Facebook', 'Google', 'Apple ID', 'Moonton'];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Set date range: April 7, 2026 to July 1, 2026
        $this->startDate = Carbon::create(2026, 4, 7);
        $this->endDate = Carbon::create(2026, 7, 1);

        // Get existing data for relations
        $gameAccounts = GameAccount::pluck('id')->toArray();
        $boostingServices = BoostingService::pluck('id')->toArray();
        $rankCategories = GameRankCategory::pluck('id')->toArray();
        $rankTiers = GameRankTier::pluck('id')->toArray();
        $rankTierDetails = GameRankTierDetail::pluck('id')->toArray();

        // Generate transaction dates (minimum 10 per week)
        $transactionDates = $this->generateTransactionDates();
        $totalTransactions = count($transactionDates);

        // Calculate success/failed ratio (approximately 83% success, 17% failed)
        $successCount = (int) round($totalTransactions * 0.83);
        $failedCount = $totalTransactions - $successCount;

        // Shuffle dates for random distribution
        shuffle($transactionDates);

        // Create successful transactions
        $successDates = array_slice($transactionDates, 0, $successCount);
        sort($successDates); // Sort chronologically
        $this->createTransactions($successDates, 'success', $gameAccounts, $boostingServices, $rankCategories, $rankTiers, $rankTierDetails);

        // Create failed transactions
        $failedDates = array_slice($transactionDates, $successCount);
        sort($failedDates); // Sort chronologically
        $this->createTransactions($failedDates, 'failed', $gameAccounts, $boostingServices, $rankCategories, $rankTiers, $rankTierDetails);

        $this->command->info("TransactionSeeder: Created {$successCount} successful and {$failedCount} failed transactions.");
        $this->command->info("Date range: {$this->startDate->format('Y-m-d')} to {$this->endDate->format('Y-m-d')}");
    }

    /**
     * Generate transaction dates with minimum 10 per week
     */
    private function generateTransactionDates(): array
    {
        $dates = [];
        $currentWeekStart = $this->startDate->copy()->startOfWeek();
        $endWeekStart = $this->endDate->copy()->startOfWeek();

        while ($currentWeekStart <= $endWeekStart) {
            // Get week boundaries within our date range
            $weekStart = $currentWeekStart->copy();
            $weekEnd = $currentWeekStart->copy()->endOfWeek();

            // Adjust boundaries to fit within date range
            if ($weekStart < $this->startDate) {
                $weekStart = $this->startDate->copy();
            }
            if ($weekEnd > $this->endDate) {
                $weekEnd = $this->endDate->copy();
            }

            // Generate 10-15 random transactions per week
            $transactionsThisWeek = rand(10, 15);
            $daysInWeek = $weekStart->diffInDays($weekEnd) + 1;

            for ($i = 0; $i < $transactionsThisWeek; $i++) {
                // Random day within the week
                $randomDay = rand(0, $daysInWeek - 1);
                $transactionDate = $weekStart->copy()->addDays($randomDay);

                // Random time during business hours (8:00 - 23:00)
                $hour = rand(8, 23);
                $minute = rand(0, 59);
                $second = rand(0, 59);

                $transactionDate->setTime($hour, $minute, $second);
                $dates[] = $transactionDate;
            }

            $currentWeekStart->addWeek();
        }

        return $dates;
    }

    /**
     * Calculate realistic updated_at based on status and created_at
     *
     * Success: updated 1-3 days after created (processing time)
     * Failed: updated within hours after created (quick failure)
     */
    private function calculateUpdatedAt(Carbon $createdAt, string $status): Carbon
    {
        if ($status === 'success') {
            // Success transactions take 1-3 days to complete
            $hoursToAdd = rand(24, 72); // 1-3 days
        } else {
            // Failed transactions fail within minutes to hours
            $hoursToAdd = rand(0, 6); // 0-6 hours
        }

        $minutesToAdd = rand(0, 59);

        return $createdAt->copy()->addHours($hoursToAdd)->addMinutes($minutesToAdd);
    }

    /**
     * Create transactions with specified status and dates
     */
    private function createTransactions(
        array $dates,
        string $status,
        array $gameAccounts,
        array $boostingServices,
        array $rankCategories,
        array $rankTiers,
        array $rankTierDetails
    ): void {
        foreach ($dates as $transactionDate) {
            // Randomly select transaction type (1: Account, 2: Custom, 3: Package)
            $type = rand(1, 3);

            // Generate customer data
            $customerName = $this->customerNames[array_rand($this->customerNames)];
            $customerEmail = strtolower(str_replace(' ', '.', $customerName)).rand(1, 999).'@gmail.com';
            $customerContact = '08'.rand(1000000000, 9999999999);

            // Determine order detail class
            $orderDetailClass = match ($type) {
                1 => AccountOrderDetail::class,
                2 => CustomOrderDetail::class,
                3 => PackageOrderDetail::class,
            };

            // Calculate realistic updated_at
            $updatedAt = $this->calculateUpdatedAt($transactionDate, $status);

            // Create transaction using DB insert to avoid auto timestamps
            $transactionId = DB::table('transactions')->insertGetId([
                'transaction_number' => $this->generateTransactionNumber($transactionDate),
                'transactionable_id' => 0, // Temporary, will update
                'transactionable_type' => $orderDetailClass,
                'status' => $status,
                'created_at' => $transactionDate,
                'updated_at' => $updatedAt,
            ]);

            // Create order detail with transaction_id
            $orderDetail = match ($type) {
                1 => $this->createAccountOrderDetail($transactionId, $gameAccounts, $customerName, $customerEmail, $customerContact, $transactionDate, $updatedAt),
                2 => $this->createCustomOrderDetail($transactionId, $rankCategories, $rankTiers, $rankTierDetails, $customerName, $customerEmail, $customerContact, $status, $transactionDate, $updatedAt),
                3 => $this->createPackageOrderDetail($transactionId, $boostingServices, $customerName, $customerEmail, $customerContact, $status, $transactionDate, $updatedAt),
            };

            // Update transaction with correct transactionable_id (using DB to preserve updated_at)
            DB::table('transactions')
                ->where('id', $transactionId)
                ->update(['transactionable_id' => $orderDetail->id]);

            // Get transaction model for relationships
            $transaction = Transaction::find($transactionId);

            // Create payment for every transaction
            $this->createPayment($transaction, $status, $orderDetail->price, $transactionDate, $updatedAt);

            // Create review for ~60% of successful transactions (1-3 days after transaction completed)
            if ($status === 'success' && rand(1, 100) <= 60) {
                $reviewDate = $updatedAt->copy()->addDays(rand(1, 3))->addHours(rand(0, 12));
                $this->createReview($transaction, $reviewDate);
            }
        }
    }

    /**
     * Create AccountOrderDetail
     */
    private function createAccountOrderDetail(
        int $transactionId,
        array $gameAccounts,
        string $customerName,
        string $customerEmail,
        string $customerContact,
        Carbon $createdAt,
        Carbon $updatedAt
    ): AccountOrderDetail {
        $id = DB::table('account_order_details')->insertGetId([
            'transaction_id' => $transactionId,
            'game_account_id' => ! empty($gameAccounts) ? $gameAccounts[array_rand($gameAccounts)] : null,
            'customer_name' => $customerName,
            'customer_contact' => $customerContact,
            'customer_email' => $customerEmail,
            'price' => rand(5, 50) * 10000, // Rp 50,000 - Rp 500,000
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        return AccountOrderDetail::find($id);
    }

    /**
     * Create CustomOrderDetail
     */
    private function createCustomOrderDetail(
        int $transactionId,
        array $rankCategories,
        array $rankTiers,
        array $rankTierDetails,
        string $customerName,
        string $customerEmail,
        string $customerContact,
        string $transactionStatus,
        Carbon $createdAt,
        Carbon $updatedAt
    ): CustomOrderDetail {
        $id = DB::table('custom_order_details')->insertGetId([
            'transaction_id' => $transactionId,
            'current_game_rank_category_id' => ! empty($rankCategories) ? $rankCategories[array_rand($rankCategories)] : null,
            'current_game_rank_tier_id' => ! empty($rankTiers) ? $rankTiers[array_rand($rankTiers)] : null,
            'current_game_rank_tier_detail_id' => ! empty($rankTierDetails) ? $rankTierDetails[array_rand($rankTierDetails)] : null,
            'desired_game_rank_category_id' => ! empty($rankCategories) ? $rankCategories[array_rand($rankCategories)] : null,
            'desired_game_rank_tier_id' => ! empty($rankTiers) ? $rankTiers[array_rand($rankTiers)] : null,
            'desired_game_rank_tier_detail_id' => ! empty($rankTierDetails) ? $rankTierDetails[array_rand($rankTierDetails)] : null,
            'server' => $this->servers[array_rand($this->servers)],
            'login' => $this->logins[array_rand($this->logins)],
            'note' => rand(0, 1) ? 'Tolong jaga win rate di atas 60%' : null,
            'customer_name' => $customerName,
            'customer_contact' => $customerContact,
            'customer_email' => $customerEmail,
            'username' => strtolower(str_replace(' ', '', $customerName)).rand(100, 999),
            'password' => 'password'.rand(100, 999),
            'price' => rand(10, 100) * 10000, // Rp 100,000 - Rp 1,000,000
            'status' => $transactionStatus === 'success' ? 'success' : 'failed',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        return CustomOrderDetail::find($id);
    }

    /**
     * Create PackageOrderDetail
     */
    private function createPackageOrderDetail(
        int $transactionId,
        array $boostingServices,
        string $customerName,
        string $customerEmail,
        string $customerContact,
        string $transactionStatus,
        Carbon $createdAt,
        Carbon $updatedAt
    ): PackageOrderDetail {
        $id = DB::table('package_order_details')->insertGetId([
            'transaction_id' => $transactionId,
            'boosting_service_id' => ! empty($boostingServices) ? $boostingServices[array_rand($boostingServices)] : null,
            'server' => $this->servers[array_rand($this->servers)],
            'login' => $this->logins[array_rand($this->logins)],
            'note' => rand(0, 1) ? 'Request hero tertentu untuk main' : null,
            'customer_name' => $customerName,
            'customer_contact' => $customerContact,
            'customer_email' => $customerEmail,
            'username' => strtolower(str_replace(' ', '', $customerName)).rand(100, 999),
            'password' => 'password'.rand(100, 999),
            'price' => rand(5, 30) * 10000, // Rp 50,000 - Rp 300,000
            'status' => $transactionStatus === 'success' ? 'success' : 'failed',
            'created_at' => $createdAt,
            'updated_at' => $updatedAt,
        ]);

        return PackageOrderDetail::find($id);
    }

    /**
     * Generate unique transaction number based on transaction date
     */
    private function generateTransactionNumber(Carbon $date): string
    {
        return 'TRX-'.$date->format('YmdHis').'-'.strtoupper(substr(uniqid(), -6));
    }

    /**
     * Create Payment record
     *
     * Payment updated_at logic:
     * - Success: payment settled around same time as transaction completed
     * - Failed: payment failed/expired shortly after transaction created
     */
    private function createPayment(Transaction $transaction, string $status, int $price, Carbon $createdAt, Carbon $transactionUpdatedAt): void
    {
        $paymentMethods = ['bank_transfer', 'gopay', 'ovo', 'dana', 'shopeepay', 'qris'];
        $paymentMethod = $paymentMethods[array_rand($paymentMethods)];

        $midtransStatus = match ($status) {
            'success' => 'settlement',
            'failed' => rand(0, 1) ? 'deny' : 'expire',
            default => 'pending',
        };

        // Payment created slightly after transaction (seconds to minutes)
        $paymentCreatedAt = $createdAt->copy()->addMinutes(rand(1, 30));

        // Payment updated when status changed
        if ($status === 'success') {
            // For success, payment settled before or around transaction completion
            $paymentUpdatedAt = $transactionUpdatedAt->copy()->subHours(rand(0, 2));
            if ($paymentUpdatedAt < $paymentCreatedAt) {
                $paymentUpdatedAt = $paymentCreatedAt->copy()->addHours(rand(1, 4));
            }
        } else {
            // For failed, payment failed within hours of creation
            $paymentUpdatedAt = $paymentCreatedAt->copy()->addHours(rand(1, 6));
        }

        DB::table('payments')->insert([
            'transaction_id' => $transaction->id,
            'midtrans_transaction_id' => 'MT-'.strtoupper(uniqid()).'-'.rand(1000, 9999),
            'midtrans_status' => $midtransStatus,
            'payload' => json_encode([
                'order_id' => $transaction->transaction_number,
                'gross_amount' => $price,
                'payment_type' => $paymentMethod,
                'transaction_time' => $paymentCreatedAt->toDateTimeString(),
                'transaction_status' => $midtransStatus,
            ]),
            'created_at' => $paymentCreatedAt,
            'updated_at' => $paymentUpdatedAt,
        ]);
    }

    /**
     * Create Review record
     * Review created_at and updated_at are same (no edits)
     */
    private function createReview(Transaction $transaction, Carbon $reviewDate): void
    {
        DB::table('reviews')->insert([
            'transaction_id' => $transaction->id,
            'rating' => rand(3, 5), // Rating 3-5 for successful transactions
            'comment' => $this->reviewComments[array_rand($this->reviewComments)],
            'created_at' => $reviewDate,
            'updated_at' => $reviewDate, // Same as created (no edits)
        ]);
    }
}
