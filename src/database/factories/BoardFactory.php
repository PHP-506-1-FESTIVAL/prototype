<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years');
        return [
            'user_id' => $this->faker->randomNumber(4)
            ,'board_title' => $this->faker->realText(20)
            ,'board_content' => $this->faker->paragraph(500)
            ,'created_at' => $date
            ,'updated_at' => $date
            ,'deleted_at' => $this->faker->randomNumber(1) <= 5 ? $date : null
            ,'board_hit' => $this->faker->randomNumber(3)
        ];
    }
}
