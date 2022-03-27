<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Point;
use App\Models\Way;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{
    public function index()
    {
        return view('page.index');
    }

    public function point(Request $request){
        $point_id = $request->input('point');
        if($point_id === null) return redirect()->route('index');
        $start_point = Point::where(['point_id' => $point_id])->first();
        if($start_point === null) return redirect()->route('index');
        $groups = Group::all();
        $points = Point::all();
        return view('page.point', compact("start_point", "groups", "points"));
    }

    public function getWay($start_point_id, $end_point_id){
        $way = Way::where(['start_point_id' => $start_point_id, "end_point_id" => $end_point_id])->first();
        return Response::json($way);
    }
}
