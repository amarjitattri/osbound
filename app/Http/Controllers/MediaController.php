<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Job;
use Illuminate\Http\Request;

class MediaController extends Controller
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
        $folder = '';
        
        if($request['media_from'] == 'jobs'){
            $folder = \Config::get('constants.options.JOB_MEDIA_DIRECTORY');
        }

        if ($request->allFiles()) {
            $medias = [];
            if (!empty($request->image_files)) {
                if (is_array($request->image_files)) {
                    foreach ($request->image_files as $file) {
                        $medias[] = ['type' => 'image', 'path' => 'storage/'. $file->store($folder . 'images', 'public')];
                    }
                }
            }
            if (!empty($request->audio_files)) {
                if (is_array($request->audio_files)) {
                    foreach ($request->audio_files as $file) {
                        $medias[] = ['type' => 'audio', 'path' => 'storage/'. $file->store($folder . 'audios', 'public')];
                    }
                }
            }
            
            if($request['media_from'] == 'jobs'){
                $job = Job::where('id', $request['job_id'])->first();
                $job->medias()->createMany($medias);

                if($request->image_files)
                    return response(view('backend.shared.imageViewer', ['job_data' => $job]));
                elseif($request->audio_files)
                    return response(view('backend.shared.audioPlayer', ['job_data' => $job]));
            }

            return response()->json(['msg' => 'Successfully uplaoded' , 'medias' => $medias]);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $media)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */

    public function destroy(Media $media)
    {
        //
    }

    public function destroyMultiple(Request $request)
    {
        if($request->media_ids)
        {
            $medias = Media::whereIn('id', explode(',', $request->media_ids));
    
            if($request['media_from'] == 'jobs'){
                foreach($medias->get() as $media){
                    if(\File::exists(public_path($media->path))){
                        \File::delete(public_path($media->path));
                    }
                }
            } 

            $medias->delete();
    
            if ($request->ajax()) {
                return response()->json(['msg' => 'success', 'error' => false]);
            }
        }
        else{
            return response()->json(['msg' => 'Failure. Please select some media' , 'error' => true]);
        }
    }
}
