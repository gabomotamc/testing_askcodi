<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'countries';

    protected $fillable = [
        'status',
        'name',
        'iso_2',
        'iso_3',
        'phone_prefix',
        'currency_name',
        'currency_alpha3',
        'latitude',
        'longitude',
        'capital',
        'region',
        'subregion',
        'relevancy',
        'usage_count',
    ];
}