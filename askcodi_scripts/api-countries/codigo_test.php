<?php 

/*
To create unit tests for the code provided, you will need to consider the following:

    Test the model's connection to the database. Ensure that you can perform CRUD operations (create, read, update, delete) on the "countries" table.

    Test the SoftDeletes trait to ensure that deleted records are marked as "deleted_at" instead of being permanently deleted.

    Test the $fillable array to ensure that only allowed column names can be mass assigned.

    Test model validation by creating both positive and negative test cases for each field in the $fillable array. This ensures that the model only accepts valid data.

    Test the model's relationships to other models. In this case, the model does not specify any relationships, but if it did, you would want to test those as well.

Here's an example of a unit test for the Country model:*/

    use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Country;

class CountryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_country()
    {
        $data = [
            'status' => 'active',
            'name' => 'United States',
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'phone_prefix' => '+1',
            'currency_name' => 'US Dollar',
            'currency_alpha3' => 'USD',
            'latitude' => 37.0902,
            'longitude' => -95.7129,
            'capital' => 'Washington, D.C.',
            'region' => 'Americas',
            'subregion' => 'Northern America',
            'relevancy' => 0,
            'usage_count' => 1000,
        ];

        $country = Country::create($data);

        $this->assertDatabaseHas('countries', $data);
    }

    /** @test */
    public function it_can_soft_delete_a_country()
    {
        $country = Country::factory()->create();

        $country->delete();

        $this->assertSoftDeleted($country);
    }

    /** @test */
    public function it_does_not_allow_mass_assignment_of_unallowed_columns()
    {
        $data = [
            'status' => 'active',
            'name' => 'United States',
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'phone_prefix' => '+1',
            'currency_name' => 'US Dollar',
            'currency_alpha3' => 'USD',
            'latitude' => 37.0902,
            'longitude' => -95.7129,
            'capital' => 'Washington, D.C.',
            'region' => 'Americas',
            'subregion' => 'Northern America',
            'relevancy' => 0,
            'usage_count' => 1000,
            'fake_column' => 'hacker'
        ];

        $this->expectException(\Illuminate\Database\Eloquent\MassAssignmentException::class);

        $country = Country::create($data);
    }

    /** @test */
    public function it_validates_required_fields()
    {
        $data = [
            'status' => 'active',
            'name' => '',
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'phone_prefix' => '',
            'currency_name' => 'US Dollar',
            'currency_alpha3' => 'USD',
            'latitude' => 37.0902,
            'longitude' => -95.7129,
            'capital' => 'Washington, D.C.',
            'region' => '',
            'subregion' => '',
            'relevancy' => 0,
            'usage_count' => 1000,
        ];

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $country = Country::create($data);
    }

    /** @test */
    public function it_validates_integer_fields()
    {
        $data = [
            'status' => 'active',
            'name' => 'United States',
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'phone_prefix' => '+1',
            'currency_name' => 'US Dollar',
            'currency_alpha3' => 'USD',
            'latitude' => 37.0902,
            'longitude' => -95.7129,
            'capital' => 'Washington, D.C.',
            'region' => 'Americas',
            'subregion' => 'Northern America',
            'relevancy' => 'not a number',
            'usage_count' => 'not a number',
        ];

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $country = Country::create($data);
    }

    /** @test */
    public function it_validates_numeric_fields()
    {
        $data = [
            'status' => 'active',
            'name' => 'United States',
            'iso_2' => 'US',
            'iso_3' => 'USA',
            'phone_prefix' => '+1',
            'currency_name' => 'US Dollar',
            'currency_alpha3' => 'USD',
            'latitude' => 'not a number',
            'longitude' => 'not a number',
            'capital' => 'Washington, D.C.',
            'region' => 'Americas',
            'subregion' => 'Northern America',
            'relevancy' => 0,
            'usage_count' => 1000,
        ];

        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $country = Country::create($data);
    }

    // Additional tests for other fields in the fillable array and any relationships would go here
}


/*
This test file covers the "Country" model's basic functionality. Further testing can be done, but this is a good starting point to ensure that the model works as intended, and is secure and efficient. The unit tests provided cover the basic functionality of the Country model. However, it is important to note that more tests may need to be added depending on the implementation of the application. Here are a few additional tests that could be added:

    Test default values: In the Country model, the fields "relevancy" and "usage_count" have default values. Tests can be created to ensure that these fields are defaulted if no value is provided.

    Test edge cases: In the test case for validation of integer fields, the "relevancy" field is set to a string "not a number". A more thorough test would be to test edge cases such as setting the value to the maximum or minimum integer allowed for that field.

    Test relationships: In the Country model, there are no relationships defined. However, if relationships existed, tests would need to be added to ensure that they are working as expected.

    Test timestamps: Laravel automatically adds timestamps to the "created_at" and "updated_at" fields of each model. Tests can be created to ensure that these fields are set correctly.

    Test searching: If the application allows searching for countries by name or other fields, tests must be added to ensure that the search functionality is working as expected.

Overall, the provided tests are a good starting point, but it is important to add additional tests based on the specific implementation of the application.
*/