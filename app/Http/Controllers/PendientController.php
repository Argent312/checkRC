<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendient;
use Illuminate\Support\Facades\Auth;

class PendientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pendient');
    }

    public function list(){
        $list= Pendient::where('state', '>', 0)->where('owner', '=', Auth::user()->name)->orderBy('urgencia', 'ASC')->get();
        return response()->json($list);
    } 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user()->name;
        $actividad = new Pendient;
        $actividad->urgencia = $request->urgencia;
        $actividad->name = $request->name;
        $actividad->owner = $usuario;
        $actividad->state = "1";
        $actividad->save();
        
        $list= Pendient::where('state', '>', 0)->where('owner', '=', Auth::user()->name)->orderBy('urgencia', 'ASC')->get();
        return response()->json($list);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $work = Pendient::findOrFail($id);
        $work->state = 0;
        $work->update();
        $list= Pendient::where('state', '>', 0)->where('owner', '=', Auth::user()->name)->orderBy('urgencia', 'ASC')->get();
        return response()->json($list);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
