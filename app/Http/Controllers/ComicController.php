<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return view('comics.index',compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $formData = $request->all();

        $request -> validate ([
            'title' => 'required|max:70',
            'description' => 'required',
            'thumb' => 'nullable|max:2048',
            'price' => 'required|max:70',
            'series' => 'nullabale|max:64',
            'sale_date' => 'nullabale|date',
        ],[
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di 70 caratteri'
        ]);

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
        $comic = Comic::find($id);

        return view('comics.show',compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comic = Comic::find($id);

        return view('comics.edit',compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate ([
            'title' => 'required|max:70',
            'description' => 'required',
            'thumb' => 'nullable|max:2048',
            'price' => 'required|max:70',
            'series' => 'nullabale|max:64',
            'sale_date' => 'nullabale|date',
        ],[
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può essere più lungo di 70 caratteri'
        ]);


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
        
        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comic = Comic::findOrFail($id);
        
        $comic->delete();

        return redirect()->route('comics.index');
    }
}