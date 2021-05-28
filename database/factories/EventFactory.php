<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->name(),
            'date' => $this->faker->dateTimeThisMonth('+1 month')->format('Y-m-d H:i:s'),
            'description' => $this->faker->text(),
            'spec_time' => $this->faker->time('h:i', 'now')
        ];
    }
}
