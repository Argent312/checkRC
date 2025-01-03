<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\check;
use Laravel\Pail\ValueObjects\Origin\Console;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        //return ($list);
        
        return view('home');
        

    }
    public function list(){
        $list= check::where('state', '>', 0)->get();
        return response()->json($list);
    }   

    public function update($id){
        $work = check::findOrFail($id);
        $work->state = 0;
        $work->update();
        $list= check::where('state', '>', 0)->get();
        return response()->json($list);
    }

    public function reset(){
        $work = check::all();
        $reset = '1';
        check::where('state','0')->update(['state'=>'1',]);

        $list= check::where('state', '>', 0)->get();
        return response()->json($list);
    }   
}
