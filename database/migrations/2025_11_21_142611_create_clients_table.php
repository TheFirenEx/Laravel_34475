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
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('Imie', 30);
        $table->string('Nazwisko', 40);
        $table->string('Nazwa_Firmy', 50)->nullable();
        $table->string('PESEL_NIP', 11)->unique();
        $table->string('Adres_Ulica', 30);
        $table->string('Adres_Nr_Domu', 10);
        $table->string('Adres_Nr_Lokalu', 10)->nullable();
        $table->string('Adres_Miejscowosc', 30);
        $table->char('Adres_Kod_Pocztowy', 6);
        $table->string('Nr_Telefonu', 20)->unique();
        $table->string('Email_Adres', 40)->unique();
        $table->string('Zdolnosc_Kredytowa', 20)->nullable();
        $table->text('Uwagi')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
