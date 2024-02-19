<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Event::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name"=> "required|string|max:255",
            'description' => 'nullable|string',
            // we can specify the format of the data as a condition as following |date_format:Y-m-d H:i:s|
            'start_time'=>"required|date",
            'end_time'=>'required|date|after:start_time'
        ]);
        // this changes must be done after learning about authentication but since we have already users so lets continue.

        $event = Event::create([
            ...$request->validate // the ... means the spread operator to copy all request elements in the the outer array cause we need in that moment to add the user id seperatlly 
                ([
                    "name"=> "required|string|max:255",
                    'description' => 'nullable|string',
                    // we can specify the format of the data as a condition as following |date_format:Y-m-d H:i:s|
                    'start_time'=>"required|date",
                    'end_time'=>'required|date|after:start_time'
                ]),
                'user_id'=>1
        ]);
        // $event = Event::create($request->all());
        return $event;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return $event;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $event->update([
            ...$request->validate 
            ([
                "name"=> "sometimes|string|max:255",
                'description' => 'nullable|string',
                
                'start_time'=>"sometimes|date",
                'end_time'=>'sometimes|date|after:start_time'
            ])
            ]);
        return $event;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json(['message'=>'Event deleted successfully']);
        // Or just  do this if you don't need to send a message back
        // return response(status:204);
        // Or
        // return response('',204);
        // return redirect()->route('events.index');
    }
}
