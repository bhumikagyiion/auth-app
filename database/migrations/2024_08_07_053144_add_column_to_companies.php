<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('company_email');
            $table->json('business_type')->nullable()->after('file_path');
            $table->softDeletes(); // This adds a nullable 'deleted_at' TIMESTAMP column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->dropColumn(['status','business_type']);
            $table->dropSoftDeletes(); // This removes the 'deleted_at' column
            
        });
    }
};
