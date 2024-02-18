<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Note: I didn't make a seeder for the User Class which it must be existed cause the other relations depeneds on it.
        // so calling first the users then make the events attached to the users which each event will be randomly owned by a user and there're  200 events will be.
        \App\Models\User::factory(1000)->create();
        // call the event seeder and the attendee seeder
        $this->call(EventSeeder::class);
        $this->call(AttendeeSeeder::class);
    }
}
