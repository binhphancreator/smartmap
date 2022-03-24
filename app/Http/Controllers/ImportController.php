<?php

namespace App\Http\Controllers;

use App\Imports\GroupImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importGroupIndex()
    {
        return view('page.group.import');
    }
    public function importPointIndex()
    {
        return view('page.point.import');
    }
    public function importWayIndex()
    {
        return view('page.way.import');
    }

    public function importGroup(Request $request){
      if($request->file('file') === null) return "ddd";
      Excel::import(new GroupImport, $request->file('file')->store('temp'));
      return back();
    }
   
}
