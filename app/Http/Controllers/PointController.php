<?php

namespace App\Http\Controllers;

use App\Http\Requests\PointStoreRequest;
use App\Models\Group;
use App\Models\Point;
use Illuminate\Support\Facades\Storage;

class PointController extends Controller
{

    private $point;
    public function __construct(Point $point)
    {
        $this->point = $point;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $points = Point::all();
        return view('page.point.index', ['points' => $points]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::all();
        return view('page.point.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointStoreRequest $request)
    {
        $this->point->create([
            'point_id' => $request->point_id,
            'name' => $request->name,
            'block' => $request->block,
            'floor' => $request->floor,
            'room' => $request->room,
            'group_id' => $request->group_id,
            'picture' => $request->file('picture') !== null ? Storage::url($request->file('picture')->store('public/img')) : '',
        ]);

        return redirect()->route('points.create')->with('success', 'Thêm thành công!');
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
        $groups = Group::all();
        $point = $this->point->find($id);
        return view('page.point.edit', compact('point', 'groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PointStoreRequest $request, $id)
    {
        $point_new = [
            'point_id' => $request->point_id,
            'name' => $request->name,
            'block' => $request->block,
            'floor' => $request->floor,
            'room' => $request->room,
            'group_id' => $request->group_id,
        ];
        if($request->file('picture') !== null) $point_new['picture'] = Storage::url($request->file('picture')->store('public/img'));
        
        $this->point->find($id)->update($point_new);
        return redirect()->route('points.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $point = $this->point->find($id);
        $point->delete();
        return redirect()->route('points.index')->with('success', "Xoá thành công");
    }
}
