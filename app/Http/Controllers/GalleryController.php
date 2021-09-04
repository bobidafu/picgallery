<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class GalleryController extends Controller
{
    //Set Tablename
    //Everything that suppose to have 'galleries', will be replaced with $this->table
    private $table = 'galleries'; 

    // List Galleries
    public function index(){
        //die('GALLERY/INDEX');

        //$test = 'TESTING';

        //Render View
        //return view('gallery/index', compact('test'));

        //Get All Galleries
        $galleries = DB::table($this->table)->get();

        return view('gallery/index', compact('galleries'));
    }

    // Show Create Form
    public function create(){
        //die('GALLERY/CREATE');

        //Check if logged in
        if(!Auth::check()){
             return \Redirect::route('gallery.index');
        }

        return view('gallery/create');
    }

    // Store Gallery
    public function store(Request $request){
        // Get Request Input
        $name = $request->input('name');
        $description = $request->input('description');
        $cover_image = $request->file('cover_image');
        $owner_id = 1; //For now

        //Check Image Upload
        if($cover_image){
            $cover_image_filename = $cover_image->getClientOriginalName();

            //Move to img folder
            $cover_image->move(public_path('images'), $cover_image_filename);
        }else{
            $cover_image_filename = 'noimage.jpg';
        }

        //Insert Gallery to DB
        DB::table($this->table)->insert(
            [
                'name' => $name,
                'description' => $description,
                'cover_image' => $cover_image_filename,
                'owner_id' => $owner_id
            ]
        );

        // Set Message
        \Session::flash('message', 'Gallery Added');

        // Redirect
        return \Redirect::route('gallery.index');
    }

    // Show Gallery Pics
    public function show($id){
        // Get Gallery
        $gallery = DB::table($this->table)->where('id', $id)->first();

        // Get Pics
        $pics = DB::table('pics')->where('gallery_id', $id)->get();

        return view('gallery/show', compact('gallery', 'pics'));
    }
}
