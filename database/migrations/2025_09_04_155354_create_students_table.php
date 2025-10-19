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

            $table->string("document")->unique()->nullable();
            $table->string("document_type")->nullable();

            $table->string("grade")->nullable(); // NUMEROS ENTEROS
            $table->string("journey")->nullable();
            $table->time("birthday")->nullable();

            $table->string("name")->nullable(); // TEXTO
            $table->string("last_name")->nullable();
            $table->string("rh")->nullable();

            $table->string("locality")->nullable();
            $table->string("phone")->nullable();

            // DATOS LOGIN
            $table->string('email');
            $table->string("password");
            $table->string("fingerprint")->nullable();
            $table->uuid(); // Indentificadores universales

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
