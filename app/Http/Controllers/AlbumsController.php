<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $album  = Album::all();
        return view('albums.index',['albums'=>$album]);
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required | mimes:jpeg,jpg,png | max:1000'
        ]);

        //get file name avata.jpg
        $fileWidthExt = $request->file('cover_image')->getClientOriginalName();

        // get file name avata
        $fileName       = pathinfo($fileWidthExt,PATHINFO_FILENAME);

        // get ext file name jpg
        $extension      = $request->file('cover_image')->getClientOriginalExtension();

        // create new file
        $fileNameToStore = $fileName."_".time().".".$extension;

        // get path

        $path       = $request->file('cover_image')->storeAs('public/uploads/albums',$fileNameToStore);
        
        $album = new Album;
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('status','Album Created');


        //dd($path );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Album::with('photos')->find($id);
        //$album = Album::find($id);
        return view('albums.show')->with('album',$album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album  = Album::find($id);
        return view('albums.edit',['album'=>$album]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required | mimes:jpeg,jpg,png | max:1000'
        ]);

        //get file name avata.jpg
        $fileWidthExt = $request->file('cover_image')->getClientOriginalName();

        // get file name avata
        $fileName       = pathinfo($fileWidthExt,PATHINFO_FILENAME);

        // get ext file name jpg
        $extension      = $request->file('cover_image')->getClientOriginalExtension();

        // create new file
        $fileNameToStore = $fileName."_".time().".".$extension;

        // get path

        $path       = $request->file('cover_image')->storeAs('public/uploads/albums',$fileNameToStore);
        
        $album = Album::find($id);

        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;

        $album->save();

        return redirect('/albums')->with('status','Update Created');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect('/albums/'.$request->input('album_id'))->with('status','Photo Deleted !');
    }
}
