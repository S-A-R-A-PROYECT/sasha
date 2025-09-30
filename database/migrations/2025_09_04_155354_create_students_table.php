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
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string("name"); // TEXTO
            $table->string("last_name");
            $table->string('email')->unique();
            $table->string("password");
            $table->integer("grade"); // NUMEROS ENTEROS
            $table->string("fingerprint");
            $table->uuid(); // Indentificadores universales
            $table->integer("document")->unique()->nullable();
            $table->string("document_type")->nullable();

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
        Schema::dropIfExists('students');
    }
};
