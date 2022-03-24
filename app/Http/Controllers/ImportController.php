<?php

namespace App\Http\Controllers;

use App\Imports\GroupImport;
use App\Imports\PointImport;
use App\Imports\WayImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    // public function importGroupIndex()
    // {
    //     return view('page.group.import');
    // }
    // public function importPointIndex()
    // {
    //     return view('page.point.import');
    // }
    public function importWayIndex()
    {
        return view('page.way.import');
    }

    public function importGroup(Request $request)
    {
        if ($request->file('file') === null) return back();
        Excel::import(new GroupImport, $request->file('file')->store('temp'));
        return back();
    }

    public function importPoint(Request $request)
    {
        if ($request->file('file') === null) return back();
        Excel::import(new PointImport, $request->file('file')->store('temp'));
        return back();
    }

    public function importWay(Request $request)
    {
        if ($request->file('file') === null) return back();
        Excel::import(new WayImport, $request->file('file')->store('temp'));
        return back();
    }
}
