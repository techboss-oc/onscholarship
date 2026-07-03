<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->text('cover_letter')->nullable()->after('status');
            $table->text('admin_notes')->nullable()->after('cover_letter');
            $table->decimal('application_fee_amount', 10, 2)->default(0)->after('intake_semester');
            $table->string('application_fee_currency', 10)->default('USD')->after('application_fee_amount');
            $table->string('application_fee_status', 20)->default('unpaid')->after('application_fee_currency');
            $table->timestamp('application_fee_paid_at')->nullable()->after('application_fee_status');
            $table->string('application_fee_reference')->nullable()->after('application_fee_paid_at');
            $table->string('application_fee_method')->nullable()->after('application_fee_reference');
            $table->text('application_fee_notes')->nullable()->after('application_fee_method');

            $table->index('application_fee_status');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropIndex(['application_fee_status']);
            $table->dropColumn([
                'cover_letter',
                'admin_notes',
                'application_fee_amount',
                'application_fee_currency',
                'application_fee_status',
                'application_fee_paid_at',
                'application_fee_reference',
                'application_fee_method',
                'application_fee_notes',
            ]);
        });
    }
};
