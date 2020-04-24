<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Caption;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $images = Image::paginate(10);
        // if (isset($request['page'])){
        //     return view('images.index', ['images' => $images, 'page' => $request['page']]);
        // }
        // else {
        return view('images.index', ['images' => $images]);
        // }
    }

    public function summary()
    {
        $caption_count = Caption::count();
        $labeled_count = Caption::where('edited', true)->count();
        $first_not_labled = Caption::where('edited', false)->min('id');
        $last_labeled = Caption::where('edited', true)->max('id');
        $not_edited_images = Caption::where('id', '<', 900)->where('edited', false)->groupBy('image_id')->pluck('image_id', 'image_id');

        return view('images.summary', ['caption_count' => $caption_count, 'labeled_count' => $labeled_count, 'first_not_labled' => $first_not_labled, 'last_labeled' => $last_labeled, 'not_edited_images' => $not_edited_images]);
    }

    public function download()
    {
        $output_json = [];
        $images = Image::all();
        foreach ($images as $key => $image) {
            $image_json['id'] = $image->user_id;
            $image_json['file_path'] = $image->file_path;
            $image_json['split'] = $image->split;
            $caption_json = [];
            $token_json = [];
            foreach ($image->captions as $key1 => $caption) {
                array_push($caption_json, $caption->caption);
                array_push($token_json, '');
            }
            $image_json['captions'] = $caption_json;
            $image_json['processed_tokens'] = $token_json;
            array_push($output_json, $image_json);
        }
        
        $current = Carbon::now()->format('YmdHs');
        $filename = "new_mica_vn_".$current.".json";
        file_put_contents($filename, json_encode($output_json));

        // fputs($handle, $output_data);
        // fclose($handle);
        $headers = array('Content-type'=> 'application/json');
        return response()->download($filename,$filename,$headers);
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
        //
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
