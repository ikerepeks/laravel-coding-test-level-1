<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index(){
        $events = Event::all();
        return view('Event.index', compact('events'));
    }

    public function show($id){
        $cachedEvent = Redis::get('event_'.$id);

        if (isset($cachedBlog)){
            $event = json_decode($cachedEvent, FALSE);
            dd($event);
            return view('Event.show_event', compact('event'));
        } else {
            $event = Event::find($id);
            return view('Event.show_event', compact('event'));
        }
    }

    public function create(){
        return view('Event.new_event');
    }

    public function edit($id){
        $event = Event::find($id);
        return view('Event.edit_event', compact('event'));
    }

    public function put(Request $request){
        $dummy = array();
        Event::create([
            'name' => $request->name,
            'slug' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        Mail::send(['text'=>'home'], $dummy, function($message) {
            $message->to('shakir_1998@yahoo.com.my', 'Tutorials Point')->subject
               ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
         });

        return redirect()->back()->with('success', 'Data Update Succesful');
    }

    public function update($id,Request $request){

        $checker = Event::whereId($id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);

        if ($checker){
            Redis::del('event_'. $id);
            $event = Event::find($id);
            Redis::set('event_'. $id, $event);
            return redirect()->back()->with('success', 'Data Update Succesful');
        } else return redirect()->back()->withErrors('Data Update Unsuccessfull');
    }

    public function delete(Request $request){
        $checker = Event::whereId($request->id)->delete();
        Redis::del('event_'.$request->id);
        return redirect()->back();
    }
}
