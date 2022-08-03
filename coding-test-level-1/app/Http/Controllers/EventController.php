<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create(){
        return view('Event.new_event');
    }

    public function edit($id){
        $event = Event::find($id);
        return view('Event.edit_event', compact('event'));
    }

    public function put(Request $request){
        Event::create([
            'name' => $request->name,
            'slug' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back()->with('success', 'Data Update Succesful');
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
