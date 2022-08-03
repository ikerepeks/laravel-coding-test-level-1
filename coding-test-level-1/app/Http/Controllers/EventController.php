<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('Event.index', compact('events'));
    }

    public function show($id){
        $event = Event::find($id);
        return view('Event.show_event', compact('event'));
    }

    public function edit($id){
        $event = Event::find($id);
        return view('Event.edit_event', compact('event'));
    }

    public function create(Request $request){
        Event::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    public function update($id,Request $request){

        $checker = Event::whereId($id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        if ($checker == 0) return redirect()->back()->withErrors('Data Update Unsuccessfull');
        else return redirect()->back()->with('success', 'Data Update Succesful');
    }
}
