<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->decimal('service_charge_usd', 10, 2)->default(0)->after('tuition_fee_cny');
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->decimal('service_charge_amount', 10, 2)->default(0)->after('application_fee_notes');
            $table->string('service_charge_currency', 10)->default('USD')->after('service_charge_amount');
            $table->string('service_charge_status', 20)->default('unpaid')->after('service_charge_currency');
            $table->timestamp('service_charge_paid_at')->nullable()->after('service_charge_status');
            $table->string('service_charge_reference')->nullable()->after('service_charge_paid_at');
            $table->string('service_charge_method')->nullable()->after('service_charge_reference');
            $table->text('service_charge_notes')->nullable()->after('service_charge_method');

            $table->index('service_charge_status');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropIndex(['service_charge_status']);
            $table->dropColumn([
                'service_charge_amount',
                'service_charge_currency',
                'service_charge_status',
                'service_charge_paid_at',
                'service_charge_reference',
                'service_charge_method',
                'service_charge_notes',
            ]);
        });

        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('service_charge_usd');
        });
    }
};
