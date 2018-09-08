<?php

namespace image\colordetect\Controller;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Response;

class ColorController extends Controller
{
    public function getImageMainColor(Request $request_body)
    {
        try {
            if ($request_body->hasFile('file')) {
                $file = Input::file('file');

                $size = getimagesize($file);
                if (!$size) {
                    return FALSE;
                }
                switch ($size['mime']) {
                    case 'image/jpeg':
                        $img = imagecreatefromjpeg($file);
                        break;
                    case 'image/png':
                        $img = imagecreatefrompng($file);
                        break;
                    case 'image/gif':
                        $img = imagecreatefromgif($file);
                        break;
                    case 'image/webp':
                        $img = imagecreatefromwebp($file);
                        break;
                    default:
                        return FALSE;
                }

                if ($img) {
                    /*http://php.net/manual/en/function.imagecolorat.php*/
                    $rgb = imagecolorat($img, 10, 15);
                    if (!(!$rgb)) {
                        $r = ($rgb >> 16) & 0xFF;
                        $g = ($rgb >> 8) & 0xFF;
                        $b = $rgb & 0xFF;
                        $result = "rgb($r,$g,$b)";
                    } else {
                        $result = "rgb(33,53,61)";
                    }

//            return json_decode($r,$g,$b);

                    $response = Response::json(array('code' => 200, 'message' => 'Image color detected successfully.', 'cause' => '', 'data' => ['Result' => $result]));
                } else {
                    $response = Response::json(array('code' => 201, 'message' => 'Image color not detected.', 'cause' => '', 'data' => json_decode('{}')));
                }
            } else {
                $response = Response::json(array('code' => 201, 'message' => 'Required field file is missing or empty.', 'cause' => '', 'data' => json_decode('{}')));
            }
        } catch
        (Exception $e) {
            $response = Response::json(array('code' => 201, 'message' => 'Color detect is unable for detect color.', 'cause' => $e->getMessage(), 'data' => json_decode("{}")));
        }
        return $response;
    }
}
