<?php

namespace App\Http\Controllers\ModelControllers;

use App\Models\Other\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('profile_pic')){
          // filename with .ext
          $filenameExt = $request->file('profile_pic')->getClientOriginalName();
          // filename without .ext
          $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
          // get .ext
          $extension = $request->file('profile_pic')->getClientOriginalExtension();
          // stored path
          $newfilename = $filename.'_'.time().'.'.$extension;
          // upload image
          $path = $request->file('profile_pic')->storeAs('public/images', $newfilename);
          //final pathname
          $finalpathname = 'storage/images/'.$newfilename;
        }
        else{
          $finalpathname = '';
        }

        return Image::create([
          'uri' => $finalpathname,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
