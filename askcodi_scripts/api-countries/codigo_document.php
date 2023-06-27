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

    /** The Country Model represents the database table countries and its columns **/

    /*The model uses the HasFactory and SoftDeletes traits for factory pattern and soft deletes functionality.
    @package App\Models\namespace App\Models*/ ;

    use Illuminate\Database\Eloquent\Factories\HasFactory; use Illuminate\Database\Eloquent\Model; use Illuminate\Database\Eloquent\SoftDeletes;

    class Country extends Model { /** * The name of the database table being used by the model. * * @var string */ protected $table = 'countries';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
    
    }/* This is a PHP code snippet for the Country model in a Laravel application. This model extends the Model class provided by Laravel's Eloquent ORM.
    
    It also uses two traits:
    
        HasFactory: This trait provides a factory pattern implementation for the model, which simplifies testing and database seeding.
        SoftDeletes: This trait enables soft deletes functionality, by adding a deleted_at column to the table. Soft deletes allow data to be marked as deleted without actually removing it from the database, which can be useful for auditing and data recovery purposes.
    
    The Country model has several properties:
    
        $table: specifies the database table that the model represents (countries in this case).
        $fillable: specifies the list of model attributes that are mass assignable (i.e., can be set using the create and update methods without explicitly whitelisting them).
    
    The model has one attribute for each column in the countries table:
    
        status
        name
        iso_2
        iso_3
        phone_prefix
        currency_name
        currency_alpha3
        latitude
        longitude
        capital
        region
        subregion
        relevancy
        usage_count 
        
        This model can be used to interact with the countries table in the database, for example to retrieve all countries or to create a new country.
    
    For example, to retrieve all countries with a certain status:*/
    
    $countries = Country::where('status', 'active')->get();
    
    And to create a new country record:
    
    $country = Country::create([
        'status' => 'active',
        'name' => 'United States',
        'iso_2' => 'US',
        'iso_3' => 'USA',
        // other attributes
    ]);