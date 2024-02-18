<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users=User::all();
        // this means for each user chosen randomly make a an events owned by him/her
        // initially there're 200 events will be create in the same moment of creating the 
        for ($i=0; $i < 200; $i++) { 
            $user=$users->random();
            Event::factory()->create([
                'user_id'=> $user->id,
            ]);
        }
    }
}
