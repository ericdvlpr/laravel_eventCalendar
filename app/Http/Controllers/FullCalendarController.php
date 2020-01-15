<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Redirect,Response;

class FullCalendarController extends Controller
{

    public function index()
    {
        $events = Event::all();
        return view('welcome',compact('events'));
    }


    public function create(Request $request)
    {
        $daysofweek=json_encode($request->dayofweek);
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                           'dayofweek'=>$daysofweek
                    ];
        $event = Event::insert($insertArr);
        // // return Response::json($event);
        return redirect('/',compact('events'));
    }


    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);

        return Response::json($event);
    }


    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();

        return Response::json($event);
    }
}
