<?php

namespace App\Http\Helpers;

use App\User;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
// import the storage facade
use Illuminate\Support\Facades\Storage;
use File;

class Helper
{
    public static function getUserValue($user_id, $column = "name")
    {
        $user = User::select($column)->where('id', $user_id)->first();
        return $user->$column;
    }

    public static function upload_image($request = null, $image_name = 'null', $disk = "public")
    {
        $images = [];

        if ($request == 'page') {
            $image = 'default.png';
            $file = 'default.png';
        } else {
        }

        $image = $request->$image_name;
        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $image_resize = Image::make($image->getRealPath());
        $filename = rand() . $filename;

        $fname = $filename . '-1920x700.' . $extension;
        $image_resize->resize(1920, 700, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_resize->save(storage_path('app/public/uploads/banner/' . $fname));
        $images['banner'] = url('storage/uploads/banner/' . $fname);

        $fname = $filename . '-500x500.' . $extension;
        //$image_resize->resize(500, 500);
        $image_resize->resize(500, 500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_resize->save(storage_path('app/public/uploads/featured/' . $fname));
        $images['featured'] = url('storage/uploads/featured/' . $fname);

        $fname = $filename . '-300x300.' . $extension;
        //$image_resize->resize(300, 300);
        $image_resize->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $image_resize->save(storage_path('app/public/uploads/thumbnails/' . $fname));
        $images['thumbnail'] = url('storage/uploads/thumbnails/' . $fname);
        return $images;
    }

    public static function uploadImage($request, $image_name, $sizes = [])
    {

        /* $this->validate($request, [
        'file' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]); */

        /*
        - Uploads
        -- Images
        --- Thubmnails : 150x150
        --- Medium : 300x300
        --- Large : 1024x1024
        --- Custom : WxH
         */

        $thumbnails_size = [300, 300];
        $medium_size = [500, 500];
        $large_size = [1920, 700];
        $image_sizes = [];
        $random_string = time() . '-' . rand(9, 9999) . '-';

        $image = $request->file($image_name);
        $file = $image->getClientOriginalName();
        $input['name'] = pathinfo($file, PATHINFO_FILENAME);

        $input['ext'] = $image->getClientOriginalExtension();

        $input['file'] = $input['name'] . $random_string . 'full.' . $input['ext'];

        $destinationPath = public_path('/uploads/images/');
        $imgFile = Image::make($image->getRealPath());

        // save large size
        $imgFile->resize($large_size[0], $large_size[1], function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . 'large/' . $input['name'] . $random_string . $large_size[0] . 'x' . $large_size[1] . '.' . $input['ext']);
        $image_sizes['large'] = $input['name'] . $random_string . $large_size[0] . 'x' . $large_size[1] . '.' . $input['ext'];

        // save medium size
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($medium_size[0], $medium_size[1], function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . 'medium/' . $input['name'] . $random_string . $medium_size[0] . 'x' . $medium_size[1] . '.' . $input['ext']);
        $image_sizes['medium'] = $input['name'] . $random_string . $medium_size[0] . 'x' . $medium_size[1] . '.' . $input['ext'];

        // save thumbnail size
        $imgFile = Image::make($image->getRealPath());
        $imgFile->resize($thumbnails_size[0], $thumbnails_size[1], function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($destinationPath . 'thumbnails/' . $input['name'] . $random_string . $thumbnails_size[0] . 'x' . $thumbnails_size[1] . '.' . $input['ext']);
        $image_sizes['thumbnails'] = $input['name'] . $random_string . $thumbnails_size[0] . 'x' . $thumbnails_size[1] . '.' . $input['ext'];

        // save custom size
        if (count($sizes) > 0) {
            foreach ($sizes as $size) {
                if (count($size) == 2) {
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize($size[0], $size[1], function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->save($destinationPath . 'custom/' . $input['name'] . $random_string . $size[0] . 'x' . $size[1] . '.' . $input['ext']);
                    $image_sizes[$size[0] . 'x' . $size[1]] = $input['name'] . $random_string . $size[0] . 'x' . $size[1] . '.' . $input['ext'];
                }
            }
        }

        /* $imgFile->resize(150, 150, function ($constraint) {
        $constraint->aspectRatio();
        })->save($destinationPath . '/' . $input['file']); */

        $destinationPath = public_path('/uploads/images/');
        $image->move($destinationPath, $input['file']);
        $image_sizes['original'] = $input['file'];
        return $image_sizes;
    }

    /* @param1 : Plain String
     * @param2 : Working key provided by CCAvenue
     * @return : encrypt String
     */
    public static function encrypt($plainText, $key)
    {
        // //dd($key, $plainText);
        // $key = self::hextobin(md5($key));
        // $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        // $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        // //dd($openMode);
        // $encryptedText = bin2hex($openMode);
        // //dd($encryptedText);
        // return $encryptedText;
        $key = self::hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }

    /* @param1 : Plain String
     * @param2 : Working key provided by CCAvenue
     * @return : Decrypted String
     */
    public static function decrypt($encryptedText, $key)
    {
        $key = self::hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = self::hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
    }

    public static function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }

            $count += 2;
        }
        return $binString;
    }
    public static function financialYear($month = null)
    {
        $fy = [];
        // $current_date_time = Carbon::now()->toDateTimeString(); // Produces something like "2019-03-11 12:25:00"
        $current_date_time = Carbon::now()->toDateString(); // Produces something like "2019-03-11 12:25:00"
        $month = date('m');

        if ($month > 4) {
            $y = date('Y');
            $pt = date('Y', strtotime('+1 year'));
            $fy['financial_year'] = $y . "-04-01" . "/" . $pt . "-03-31";
            $fy['subscription_start'] = $current_date_time;
            $fy['subscription_end'] = $pt . "-03-31";
            $fy['is_expired'] = false;
        } else {
            $y = date('Y', strtotime('-1 year'));
            $pt = date('Y');
            $fy['financial_year'] = $y . "-04-01" . "/" . $pt . "-03-31";
            $fy['subscription_start'] = $current_date_time;
            $fy['subscription_end'] = $pt . "-03-31";
            $fy['is_expired'] = true;
        }
        return $fy;
    }
    public static function get_bank_details($ifsc = null, $is_freelancer_reg = true)
    {
        // $ifsc = 'INDB0001064';
        $json = @file_get_contents(
            "https://ifsc.razorpay.com/" . $ifsc
        );
        $arr = json_decode($json);
        $output = '';

        if (isset($arr->BRANCH)) {
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="BANK" name="bank[name]" value="' . $arr->BANK . '" required />
                            </div>
                        </div>';
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="BRANCH" value="' . $arr->BRANCH . '" name="bank[branch]" required />
                            </div>
                        </div>';
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="CENTRE" value="' . $arr->CENTRE . '" name="bank[centre]" required />
                            </div>
                        </div>';
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="DISTRICT" value="' . $arr->DISTRICT . '" name="bank[district]" required />
                            </div>
                        </div>';
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="STATE" value="' . $arr->STATE . '" name="bank[state]" required />
                            </div>
                        </div>';
            $output .= '<div class="form-group col-md-12 float-left">
                            <div class="">
                                <input class="form-control" placeholder="ADDRESS" value="' . $arr->ADDRESS . '" name="bank[adddress]" required />
                            </div>
                        </div>';
            /* echo '<pre>';
            echo "<b>Bank:-</b>".$arr->BANK;
            echo "<br/>";
            echo "<b>Branch:-</b>".$arr->BRANCH;
            echo "<br/>";
            echo "<b>Centre:-</b>".$arr->CENTRE;
            echo "<br/>";
            echo "<b>District:-</b>".$arr->DISTRICT;
            echo "<br/>";
            echo "<b>State:-</b>".$arr->STATE;
            echo "<br/>";
            echo "<b/>Address:-</b>".$arr->ADDRESS;
            echo "<br/>"; */
            echo $output;
        } else {
            echo "Invalid IFSC Code";
        }
    }

    // PHP code to find the number of days
    // between two given dates

    // Function to find the difference
    // between two dates.
    public static function dateDiffInDays($date1, $date2)
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);
        $dateDiff = abs(round($diff / 86400));
        // printf("Difference between two dates: ". $dateDiff . " Days ");
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return (int) $dateDiff;
    }

    public static function generate_assesment_years($last_from)
    {
        $start_year = date("Y", strtotime("-$last_from year"));
        $assesment_years = [];
        for ($i = $start_year; $i <= ($start_year + $last_from + 1); $i++) {
            $assesment_years[] = ['year' => $i, 'label' => ($i - 1) . '-' . $i];
        }
        return $assesment_years;
    }

    public static function financial_years_generator($last_from)
    {
        $start_year = date("Y", strtotime("-$last_from year"));
        $assesment_years = [];
        for ($i = $start_year; $i <= ($start_year + $last_from + 1); $i++) {
            $assesment_years[] = (($i - 1) . '-' . substr($i, 2));
        }
        return $assesment_years;
    }

    public static function download_file($path = 'app/documents/', $filename)
    {
        $file_path = public_path($path) . $filename;
        // Check if file exists in app/uploads/file folder
        if (file_exists($file_path)) {
            // Send Download
            //echo 'file exists';
            return \Response::download($file_path, $filename, [
                'Content-Length: ' . filesize($file_path),
            ]);
        } else {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
    public static function formatSizeUnits($bytes, $round = 2)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, $round) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, $round) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, $round) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }
}
