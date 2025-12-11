<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null"); // Job doesnt get deleted if user is deleted.
            $table->foreignId("company_id")->constrained()->cascadeOnDelete();
            $table->String("title", 255);
            $table->text("description");
            $table->string("min_salary", 100)->nullable();
            $table->string("max_salary", 100)->nullable();
            $table->string("location", 100)->nullable();
            $table->String("contact_phone", 100)->nullable();
            $table->String("contact_email", 255);
            $table->String("contact_name", 100)->nullable();
            $table->String("website", 255)->nullable();
            $table->text("tags")->nullable(); // needs casting
            $table->boolean("is_active")->default(false);
            $table->date("expires_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
