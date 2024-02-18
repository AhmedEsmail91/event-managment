<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        $table->foreignIdFor(User::class);
        $table->string('name');
        $table->text('description')->nullable();
        
        $table->dateTime('start_time');
        $table->dateTime('end_time');
        */

        return [
            'name'=>fake()->unique()->sentence(3),
            'description'=>$this->faker->paragraph(3),

            'start_time'=>fake()->dateTimeBetween(now(),now()->addMonth()),
            'end_time'=>fake()->dateTimeBetween(now()->addMonth(),now()->addMonths(2)),
            
            // 'created_at'=>$this->faker->dateTimeBetween(now()->subMonths(6),''),
            // 'updated_at'=>$this->faker->dateTimeBetween(now()->subMonths(6),''),
        ];
    }
}
