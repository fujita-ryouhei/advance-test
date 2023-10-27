<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        

        return [
            'family_name' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement(['male', 'female']), // 例: ランダムに性別を選択
            'email' => $this->faker->safeEmail,
            'postal' => substr_replace($this->faker->postcode,'-',3, 0),
            'address' => $this->faker->streetAddress,
            'opinion' => $this->faker->text(120),
        ];
    }
}
