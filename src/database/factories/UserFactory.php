<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-3 years', '-1 years');
        return [
            'user_email' => $this->faker->unique()->email()
            , 'email_verified_at' => $date
            , 'user_password' => $this->faker->password()
            , 'user_name' => $this->faker->name()
            , 'user_gender' => $this->faker->boolean()
            , 'user_birthdate' => $this->faker->date()
            , 'user_nickname' => $this->faker->firstName()
            , 'user_zipcode' => $this->faker->postcode()
            , 'user_address' => $this->faker->address()
            , 'user_marketing_agreement' => $this->faker->boolean()
            , 'user_email_agreement' => $this->faker->boolean()
            ,'created_at' => $date
            ,'updated_at' => $date
        ];
    }
}
