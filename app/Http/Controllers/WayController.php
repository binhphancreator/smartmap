<?php

namespace App\Http\Controllers;

use App\Http\Requests\WayStoreRequest;
use App\Models\Point;
use App\Models\Way;
use Illuminate\Support\Facades\Storage;

class WayController extends Controller
{

    private $way;
    public function __construct(Way $way)
    {
        $this->way = $way;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ways = Way::all();
        return view('page.way.index', ['ways' => $ways]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $points = Point::all();
        return view('page.way.create', compact('points'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WayStoreRequest $request)
    {
        $this->way->create([
            'introduction' => $request->introduction,
            'start_point_id' => $request->start_point_id,
            'end_point_id' => $request->end_point_id,
        ]);

        return redirect()->route('ways.create')->with('success', 'Thêm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $points = Point::all();
        $way = $this->way->find($id);
        return view('page.way.edit', compact('way', 'points'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WayStoreRequest $request, $id)
    {

        $this->way->find($id)->update([
            'introduction' => $request->introduction,
            'start_point_id' => $request->start_point_id,
            'end_point_id' => $request->end_point_id,
        ]);
        return redirect()->route('ways.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $way = $this->way->find($id);
        $way->delete();
        return redirect()->route('ways.index')->with('success', "Xoá thành công");
    }
}
