<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->nullable()->constrained()->onDelete("set null");
            $table->string("name", 255)->unique();
            $table->text("description");
            $table->string("city", 100);
            $table->string("street", 255)->nullable();
            $table->string("zip_code", 100)->nullable();
            $table->string("country", 100)->nullable();
            $table->string("email", 255)->unique();
            $table->string("phone", 100)->nullable()->unique();
            $table->string("website", 255)->nullable()->unique();
            $table->enum("employee_size", ["<10", "10-50", ">50", "50-100", ">100", ">500"])->nullable(); // needs casting
            $table->timestamps(); //created_at + updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};

