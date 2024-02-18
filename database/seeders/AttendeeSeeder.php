<?php

namespace Database\Seeders;

use App\Models\Attendee;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // after creating the events and users not lets make some users attend the events 
        $users=User::all();
        $events=Event::all();
        // in the following we gonna make some magic in our case we must initialize or created the users and the events data which is must be generated.
        // so for each user in the table users make him attends about 3 events randomly.so simply in that case we gonna make 2 nested loop the first one carries each users individualy and the nested one carries the events which must be attended by him
        
        foreach ($users as $user) {
            $eventsToAttend=$events->random(rand(1,3));
            foreach ($eventsToAttend as $event) {
                // make a 
                Attendee::create([
                    "user_id"=> $user->id,
                    "event_id" =>$event->id
                ]);
            }
        }
        
        // or simply use the easiest way that provided by laravel (like df['job'] = df.apply(lambda row: 'IT' if row['name'] == 'ahmed' else row['job'], axis=1)):
        
        // $users->each(function ($user) use($events){
        //     $eventToAttend=$events->random(rand(1,3));
        //     $user->events()->attach($eventToAttend->pluck('id'));
        // });
    }
}
