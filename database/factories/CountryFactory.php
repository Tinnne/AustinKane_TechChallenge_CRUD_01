<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $continent = [
            "Asia","Afrika","Amerika Utara","Amerika Selatan","Antartika","Eropa","Australia","",
        ];
        $country = fake()->country();
        $slug = Str::slug($country);
        return [
            "country"=> $country,
            "slug"=> $slug,
            "continent"=>fake()->randomElement($continent),
            "capital"=> fake()->city(),
            "population"=> fake()->randomDigit(),
        ];
    }
}
