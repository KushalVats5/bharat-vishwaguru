<?php
namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use File;
use FFMpeg;
use FFMpeg\FFProbe;
use Illuminate\Support\Facades\Log;
use App\Helpers\Normalize;
use App\Helpers\FFMPEG_helpers;
use App\Clip;
use App\Video;

trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */
    public function saveFiles(Request $request)
    {

        if (! file_exists(public_path().'/uploads')) { File::makeDirectory(public_path().'/uploads',0777, true);}

        $uploadPath = env('UPLOAD_PATH', 'uploads');

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {
            if ($request->hasFile($key)) {

                    $filename = $request->file($key)->getClientOriginalName();
                    $extension = $request->file($key)->getClientOriginalExtension();
                    if(preg_match('/^.*\.(mp4|mov|mpg|mpeg|wmv|mkv)$/i', $filename)){
                        //Log::info('passed valication: '.$filename);
                        $filename = $request->file($key)->getClientOriginalName();
                        $basename = substr($filename, 0, strrpos($filename, "."));
                        $basename = Normalize::titleCase($basename);
                        $ad_duration = FFMPEG_helpers::getDuration($request->file($key));

                        $filename = str_slug($basename) . '.' . $extension;
                        $request->file($key)->move($clipPath, $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename, 'video' => $request->video, 'extention' => $extension, 'name'=> $basename, 'ad_duration'=>$ad_duration]));

                        $file_w_path = $clipPath . "/" . $filename;
                    }
                }
            }
        }

        return $finalRequest;
    }
}