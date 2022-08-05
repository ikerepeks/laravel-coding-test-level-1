<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Yajra\DataTables\DataTables;

class EventAPIController extends Controller
{
    public function index(){
        $event = Event::all();
        return DataTables::of($event)->make(true);
    }

    public function show($id){
        $cachedEvent = Redis::get('event_'.$id);

        if (isset($cachedBlog)){
            $event = json_decode($cachedEvent, FALSE);
            return response()->json($event, 200);
        } else {
            $event = Event::whereId($id)->toJson();
            return response()->json($event, 200);
        }
    }

    public function update($id, Request $request){
        $update = Event::findOrFail($id)->update([ 'name' => $request->name ]);

        if ($update){
            Redis::del('event_'. $id);

            $event = Event::find($id);
            Redis::set('event_'. $id, $event);

            return response()->json($event, 200);
        }
    }

    public function delete($id){
        Event::findOrFail($id)->delete();
        Redis::del('event_'. $id);

        return response()->json(['status' => 200]);
    }
}
