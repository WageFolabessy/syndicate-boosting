<?php

namespace Tests\Feature;

use App\Models\CustomOrderDetail;
use App\Models\GameRankCategory;
use App\Models\GameRankTier;
use App\Models\GameRankTierDetail;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class CustomOrderControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Suppress log output during tests
        Log::shouldReceive('info')->andReturn(null);
        Log::shouldReceive('error')->andReturn(null);
    }

    protected function tearDown(): void
    {
        \Mockery::close();
        parent::tearDown();
    }

    private function createGameRankData()
    {
        // Create game first
        $game = \App\Models\Game::create([
            'name' => 'Mobile Legends',
            'genre' => 'MOBA',
            'developer' => 'Moonton',
            'description' => 'Test game',
            'image' => 'test-image.jpg',
        ]);

        // Create category
        $category = GameRankCategory::create([
            'game_id' => $game->id,
            'name' => 'Ranked',
            'system_type' => 'star',
            'display_order' => 1,
        ]);

        // Create tiers
        $bronzeTier = GameRankTier::create([
            'game_rank_category_id' => $category->id,
            'tier' => 'Bronze',
            'progress_target' => 100,
            'display_order' => 1,
        ]);

        $silverTier = GameRankTier::create([
            'game_rank_category_id' => $category->id,
            'tier' => 'Silver',
            'progress_target' => 100,
            'display_order' => 2,
        ]);

        // Create tier details
        $bronzeDetail = GameRankTierDetail::create([
            'game_rank_tier_id' => $bronzeTier->id,
            'star_number' => 1,
            'price' => 10000,
            'display_order' => 1,
        ]);

        $silverDetail = GameRankTierDetail::create([
            'game_rank_tier_id' => $silverTier->id,
            'star_number' => 1,
            'price' => 20000,
            'display_order' => 1,
        ]);

        return [
            'game' => $game,
            'category' => $category,
            'bronze_tier' => $bronzeTier,
            'silver_tier' => $silverTier,
            'bronze_detail' => $bronzeDetail,
            'silver_detail' => $silverDetail,
        ];
    }

    #[Test]
    public function it_can_process_payment_successfully()
    {
        $data = $this->createGameRankData();

        // Mock Midtrans Snap
        $mockSnapToken = 'mock-snap-token-123';
        $snapMock = \Mockery::mock('alias:Midtrans\Snap');
        $snapMock->shouldReceive('getSnapToken')
            ->once()
            ->andReturn($mockSnapToken);

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'server' => 'Asia',
            'login' => 'email',
            'note' => 'Please boost fast',
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'snap_token',
                'transaction_number',
            ])
            ->assertJson([
                'snap_token' => $mockSnapToken,
            ]);

        // Assert database
        $this->assertDatabaseHas('transactions', [
            'status' => 'pending',
            'transactionable_type' => CustomOrderDetail::class,
        ]);

        $transaction = Transaction::first();
        $this->assertStringStartsWith('CustomBoost-', $transaction->transaction_number);

        $this->assertDatabaseHas('custom_order_details', [
            'transaction_id' => $transaction->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'price' => 10000, // 20000 - 10000
        ]);
    }

    #[Test]
    public function it_fails_when_current_tier_detail_is_invalid()
    {
        $data = $this->createGameRankData();

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => 99999, // Invalid ID
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['current_game_rank_tier_detail_id']);
    }

    #[Test]
    public function it_fails_when_desired_tier_detail_is_invalid()
    {
        $data = $this->createGameRankData();

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => 99999, // Invalid ID
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['desired_game_rank_tier_detail_id']);
    }

    #[Test]
    public function it_fails_when_tier_details_not_found_in_database()
    {
        $data = $this->createGameRankData();

        // Delete the tier detail to simulate not found scenario
        $data['silver_detail']->delete();

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['desired_game_rank_tier_detail_id']);
    }

    #[Test]
    public function it_fails_when_data_is_inconsistent()
    {
        $data = $this->createGameRankData();

        // Create another category for inconsistency test
        $anotherCategory = GameRankCategory::create([
            'game_id' => $data['game']->id,
            'name' => 'Unranked',
            'system_type' => 'point',
            'display_order' => 2,
        ]);

        $requestData = [
            'current_game_rank_category_id' => $anotherCategory->id, // Different category
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJson([
                'error' => 'Data kategori atau tier tidak konsisten dengan detail tier yang dipilih.',
            ]);
    }

    #[Test]
    public function it_fails_when_current_rank_is_same_as_desired_rank()
    {
        $data = $this->createGameRankData();

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['bronze_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['bronze_detail']->id, // Same as current
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJson([
                'error' => 'Rank tujuan harus lebih tinggi dari rank saat ini.',
            ]);
    }

    #[Test]
    public function it_fails_when_desired_rank_is_lower_than_current_rank()
    {
        $data = $this->createGameRankData();

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['silver_tier']->id,
            'current_game_rank_tier_detail_id' => $data['silver_detail']->id, // Higher rank
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['bronze_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['bronze_detail']->id, // Lower rank
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(422)
            ->assertJson([
                'error' => 'Rank tujuan harus lebih tinggi dari rank saat ini.',
            ]);
    }

    #[Test]
    public function it_handles_midtrans_error_gracefully()
    {
        $data = $this->createGameRankData();

        // Mock Midtrans Snap to throw exception
        $snapMock = \Mockery::mock('alias:Midtrans\Snap');
        $snapMock->shouldReceive('getSnapToken')
            ->once()
            ->andThrow(new \Exception('Midtrans service unavailable'));

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(500)
            ->assertJson([
                'error' => 'Midtrans Error: Midtrans service unavailable',
            ]);

        // Transaction should still be created
        $this->assertDatabaseHas('transactions', [
            'status' => 'pending',
        ]);
    }

    #[Test]
    public function it_handles_midtrans_notification_exception()
    {
        // Mock Notification to throw exception
        $mockNotification = \Mockery::mock('overload:Midtrans\Notification');
        $mockNotification->shouldReceive('__construct')
            ->andThrow(new \Exception('Invalid signature'));

        $notificationData = [
            'order_id' => 'CustomBoost-TEST606',
            'transaction_id' => 'midtrans-txn-606',
            'transaction_status' => 'settlement',
        ];

        $response = $this->postJson('/midtrans/notification/custom-order', $notificationData);

        $response->assertStatus(500)
            ->assertJson([
                'message' => 'Error processing notification',
            ]);
    }

    #[Test]
    public function it_validates_required_fields_in_process_payment()
    {
        $response = $this->postJson('/custom-order/process', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'current_game_rank_category_id',
                'current_game_rank_tier_id',
                'current_game_rank_tier_detail_id',
                'desired_game_rank_category_id',
                'desired_game_rank_tier_id',
                'desired_game_rank_tier_detail_id',
                'customer_name',
                'customer_contact',
                'username',
                'password',
            ]);
    }

    #[Test]
    public function it_allows_optional_fields_to_be_null()
    {
        $data = $this->createGameRankData();

        $snapMock = \Mockery::mock('alias:Midtrans\Snap');
        $snapMock->shouldReceive('getSnapToken')
            ->once()
            ->andReturn('mock-snap-token');

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
            // server, login, note are optional
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('custom_order_details', [
            'customer_name' => 'John Doe',
            'server' => null,
            'login' => null,
            'note' => null,
        ]);
    }

    #[Test]
    public function it_calculates_price_correctly()
    {
        $data = $this->createGameRankData();

        $snapMock = \Mockery::mock('alias:Midtrans\Snap');
        $snapMock->shouldReceive('getSnapToken')
            ->once()
            ->andReturn('mock-snap-token');

        $requestData = [
            'current_game_rank_category_id' => $data['category']->id,
            'current_game_rank_tier_id' => $data['bronze_tier']->id,
            'current_game_rank_tier_detail_id' => $data['bronze_detail']->id,
            'desired_game_rank_category_id' => $data['category']->id,
            'desired_game_rank_tier_id' => $data['silver_tier']->id,
            'desired_game_rank_tier_detail_id' => $data['silver_detail']->id,
            'customer_name' => 'John Doe',
            'customer_contact' => '081234567890',
            'username' => 'johndoe123',
            'password' => 'secret123',
        ];

        $response = $this->postJson('/custom-order/process', $requestData);

        $response->assertStatus(200);

        $expectedPrice = $data['silver_detail']->price - $data['bronze_detail']->price;

        $this->assertDatabaseHas('custom_order_details', [
            'price' => $expectedPrice,
        ]);
    }
}
