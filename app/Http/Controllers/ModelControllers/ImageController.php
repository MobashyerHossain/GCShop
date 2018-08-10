<?php

namespace App\Http\Controllers\ModelControllers;

use App\Models\Other\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\MultiAuth\Consumer;

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
          $path = $request->file('profile_pic')->storeAs('public/images/Others/', $newfilename);
          //final pathname
          $finalpathname = 'storage/images/Others/'.$newfilename;

          return Image::create([
            'uri' => $finalpathname,
          ]);
        }
        else{
          return Image::find((new Image)->getDefaultProfilePic());
        }
    }

    public function storeOnlyImage(Request $request, $name)
    {
        if($request->hasFile($name)){
          // filename with .ext
          $filenameExt = $request->file($name)->getClientOriginalName();
          // filename without .ext
          $filename = pathinfo($filenameExt, PATHINFO_FILENAME);
          // get .ext
          $extension = $request->file($name)->getClientOriginalExtension();
          // stored path
          $newfilename = $filename.'_'.time().'.'.$extension;
          // upload image
          $path = $request->file($name)->storeAs('public/images/Others/', $newfilename);
          //final pathname
          $finalpathname = 'storage/images/Others/'.$newfilename;

          return Image::create([
            'uri' => $finalpathname,
          ]);
        }
        else{
          return Image::find((new Image)->getDefaultProfilePic());
        }
    }

    public function storeProfilePicture(Request $request)
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
          $path = $request->file('profile_pic')->storeAs('public/images/Profile Pic/', $newfilename);
          //final pathname
          $finalpathname = 'storage/images/Profile Pic/'.$newfilename;

          $image = Image::create([
            'uri' => $finalpathname,
            'image_type' => 'profile_picture',
          ]);

          $consumer = Consumer::find(Auth::id());
          $consumer->profile_pic = $image->id;
          $consumer->save();

          return redirect()->back();
        }
        else{
            return redirect()->back();
        }
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
