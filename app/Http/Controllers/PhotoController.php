<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Ablum;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $ablum_id ='';
     return view('photo.create')->with('ablum_id', $ablum_id);   
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
            'title' => 'required',
            'photo' => 'image|max:1999'
        ]);
        //GET FILENAME WITH EXTENSTION
        $filenameWithExt = $request->file('photo')->getClientOriginalName();
        //get just the filename 
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //get extension 
        $extension = $request->file('photo')->getClientOriginalExtension();
        //return $extension;
        //create new filename
        $filenameToStore = $filename. '_'.time().'.'.$extension;
        //return $filenameToStore;
        //upload image
        $path = $request->file('photo')->storeAs('public/photo/'.$request->input('ablum_id'), $filenameToStore);
        //return $path;
        //create Upload Photo
        $photo = new Photo;
        $photo->ablum_id = $request->input('ablum_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->size = $request->file('photo')->getClientSize();
        $photo->photo = $filenameToStore;
        $photo->save();
        //return redirect(route('albums/'.$request->input('ablum_id')))->with('success', 'Photo Uploaded');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        //
    }
}
