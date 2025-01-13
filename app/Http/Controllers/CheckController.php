<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class CheckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('event');
    }

    public function list(){
        $list= Event::where('state', '>', 0)->orderBy('evento', 'ASC')->get();
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
        $actividad = new Event;
        $actividad->evento = $request->evento;
        $actividad->name = $request->name;
        $actividad->owner = $request->owner;
        $actividad->state = "1";
        $actividad->save();
        
        $list= Event::where('state', '>', 0)->orderBy('evento', 'ASC')->get();
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
        $work = Event::findOrFail($id);
        $work->state = 0;
        $work->update();
        $list= Event::where('state', '>', 0)->orderBy('evento', 'ASC')->get();
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
