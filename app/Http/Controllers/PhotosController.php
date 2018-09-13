<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($album_id)
    {
        return view('photos.create')->with('album_id',$album_id);
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
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required | mimes:jpeg,jpg,png | max:1000'
        ]);

        //get file name avata.jpg
        $fileWidthExt = $request->file('photo')->getClientOriginalName();

        // get file name avata
        $fileName       =  pathinfo($fileWidthExt,PATHINFO_FILENAME);

        // get ext file name jpg
        $extension      = $request->file('photo')->getClientOriginalExtension();

        // create new file
        $fileNameToStore = $fileName."_".time().".".$extension;

        // get path

        $path       = $request->file('photo')->storeAs('public/uploads/photos/'.$request->input('album_id'),$fileNameToStore);
        
        // upoad photo
        $photo = new Photo;

        $photo->title = $request->input('title');
        // get form input hidden
        $photo->album_id = $request->input('album_id');
        $photo->description = $request->input('description');
        $photo->size        = $request->file('photo')->getClientSize();
        $photo->photo = $fileNameToStore;

        $photo->save();

        return redirect('/albums/'.$request->input('album_id'))->with('status','Photo Uploaded !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);
        return view('photos.show',['photo'=>$photo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $photo  = Photo::find($id);
        // return view('photos.edit',['photo'=>$photo]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return redirect()->back()->with('status', 'Photo has been deleted!!');
    }
}
