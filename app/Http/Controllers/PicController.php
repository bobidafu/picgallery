<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PicController extends Controller
{
    private $table = 'pics';

    public function index(){
        return('index');
    }

    // Show Create Form
    public function create($gallery_id){
        //Check if logged in
        if(!Auth::check()){
             return \Redirect::route('gallery.index');
        }

        // Render View
        return view('pic/create', compact('gallery_id'));
    }

    // Store Pic
    public function store(Request $request){
        // Get Request Input
        $gallery_id = $request->input('gallery_id');
        $title = $request->input('title');
        $description = $request->input('description');
        $location = $request->input('location');
        $image = $request->file('image');
        $owner_id = 1; //For now

        //Check Image Upload
        if($image){
            $image_filename = $image->getClientOriginalName();

            //Move to img folder
            $image->move(public_path('images'), $image_filename);
        }else{
            $image_filename = 'noimage.jpg';
        }

        //Insert Pic to DB
        DB::table($this->table)->insert(
            [
                'gallery_id' => $gallery_id,
                'title' => $title,
                'description' => $description,
                'location' => $location,
                'image' => $image_filename,
                'owner_id' => $owner_id
            ]
        );

        // Set Message
        \Session::flash('message', 'Pic Added');

        // Redirect
        return \Redirect::route('gallery.show', array('gallery' => $gallery_id));
        //return \Redirect::route('gallery.index');
    }

    // Show Pic Details
    public function details($id){
        //Get Pic

        $pic = DB::table($this->table)->where('id', $id)->first();

        //Render Template
        return view('pic/details', compact('pic'));
    }
}
