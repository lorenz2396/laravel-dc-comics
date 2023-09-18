<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Models

use App\Models\Comic;

class ComicController extends Controller
{

    public function home(){

        return view('home');

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $comics=Comic::all();

        return view('index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $formData = $request->all();

        $comic = new Comic();
        $comic->title = $formData['title'];
        $comic->description = $formData['description'];
        $comic->thumb = $formData['thumb'];
        $comic->price = $formData['price'];
        $comic->series = $formData['series'];
        $comic->sale_date =date('Y-m-d',strtotime($formData['sale_date']) );
        $comic->type = $formData['type'];
        $comic->artists = json_encode(explode(',', $formData['artists']));
        $comic->writers = json_encode(explode(',', $formData['writers']));
        $comic->save();
        return redirect()->route('home.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comic=Comic::find($id);

        return view('show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic=Comic::find($id);

        return view('edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comic = Comic::find($id);
        $formData = $request->all();

        $comic->title = $formData['title'];
        $comic->description = $formData['description'];
        $comic->thumb = $formData['thumb'];
        $comic->price = $formData['price'];
        $comic->series = $formData['series'];
        $comic->sale_date =date('Y-m-d',strtotime($formData['sale_date']) );
        $comic->type = $formData['type'];
        $comic->artists = json_encode(explode(',', $formData['artists']));
        $comic->writers = json_encode(explode(',', $formData['writers']));
        $comic->save();
        return redirect()->route('home.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        
        $comic->delete();

        return redirect()->route('home.index');
    }
}