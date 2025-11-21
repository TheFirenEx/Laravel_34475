<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $fillable = [
        'Imie',
        'Nazwisko',
        'Nazwa_Firmy',
        'PESEL_NIP',
        'Adres_Ulica',
        'Adres_Nr_Domu',
        'Adres_Nr_Lokalu',
        'Adres_Miejscowosc',
        'Adres_Kod_Pocztowy',
        'Nr_Telefonu',
        'Email_Adres',
        'Zdolnosc_Kredytowa',
        'Uwagi',
    ];
}
