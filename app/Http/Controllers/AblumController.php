<?php

namespace App\Http\Controllers;

use App\Ablum;
use App\Photo;
use Illuminate\Http\Request;

class AblumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Ablum::with('photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'cover_image' => 'image|max:1999'
        ]);
        //GET FILENAME WITH EXTENSTION
        $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
        //get just the filename 
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extension 
        $extension = $request->file('cover_image')->getClientOriginalExtension();
        //return $extension;
        //create new filename
        $filenameToStore = $filename. '_'.time().'.'.$extension;
        //return $filenameToStore;
        //upload image
        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);
        //return $path;
        //create album
        $album = new Ablum;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();
        return redirect(route('albums.index'));

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Ablum  $ablum
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Ablum::with('photos')->find($id);
        return view('albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ablum  $ablum
     * @return \Illuminate\Http\Response
     */
    public function edit(Ablum $ablum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ablum  $ablum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ablum $ablum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ablum  $ablum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ablum $ablum)
    {
        //
    }
}
