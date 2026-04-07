<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('package_order_details', function (Blueprint $table) {
            $table->string('customer_email')->nullable()->after('customer_contact');
        });

        Schema::table('custom_order_details', function (Blueprint $table) {
            $table->string('customer_email')->nullable()->after('customer_contact');
        });

        Schema::table('account_order_details', function (Blueprint $table) {
            $table->string('customer_email')->nullable()->after('customer_contact');
        });
    }

    public function down(): void
    {
        Schema::table('package_order_details', function (Blueprint $table) {
            $table->dropColumn('customer_email');
        });

        Schema::table('custom_order_details', function (Blueprint $table) {
            $table->dropColumn('customer_email');
        });

        Schema::table('account_order_details', function (Blueprint $table) {
            $table->dropColumn('customer_email');
        });
    }
};
