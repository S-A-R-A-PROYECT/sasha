<?php

use Faker\Guesser\Name;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Name as NodeName;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string("name");
            $table->string("last_name");
            $table->string("grade");
            $table->string("email")->unique();
            $table->string("password");
            $table->integer("document");
            $table->string("document_type");
            $table->enum("rol", ['teacher', 'coordinator'])->default('teacher');

            $table->string("last_login_ip")->nullable();
            $table->timestamp("last_login_at")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
