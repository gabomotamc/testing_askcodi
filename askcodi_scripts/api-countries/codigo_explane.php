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

/*
This is a PHP code for a Laravel model class Country that extends the Model class provided by Laravel's Eloquent ORM. Models are used in Laravel to interact with database tables. In this case, this model is associated with a database table named countries.

The use statement is used to import two traits, HasFactory and SoftDeletes, that provide useful functionalities to the model class. The HasFactory trait adds the factory() method to create model's fake data for testing purposes easily. The SoftDeletes adds soft deletion feature to the model, i.e. records are not actually deleted from the database but a deleted_at column is set which can be used to retrieve only the active/non-deleted records.

$table property specifies the table name associated with this model. $fillable property is an array that lists the fields that are allowed to be mass-assigned by the create() and fill() methods. In this case, these fields are status, name, iso_2, iso_3, phone_prefix, currency_name, currency_alpha3, latitude, longitude, capital, region, subregion, relevancy, and usage_count.

Overall, this code defines a Laravel model class that can be used to interact with the countries table in the database and provides convenient features that help to work with the model easily.
*/
