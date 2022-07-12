<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleCloudVision\GoogleCloudVision;
use GoogleCloudVision\Request\AnnotateImageRequest;

use Image;
//use Intervention\Image\ImageManagerStatic as Image;

class AnnotationController extends Controller
{
    //show the upload form
    public function displayForm()
    {
        return view('annotate');
    }

    public function annotateImage(Request $request)
    {
        if($request->file('image')){

            //  resize image with Intervention/Image
            $image = Image::make($request->file('image'))->resize(300,300)->encode('jpg', 75);
            //return $image->response();

            // $image = Image::make($request->file('image'))->encode('jpg', 10)->resize(200,200);
            // return $image->response();  //  ok
            // return $request->file('image');   //  ok
            // $image->resize(320,320);

            // convert image to base64
            $image = base64_encode(file_get_contents(/* $request->file('image') */$request->file('image')));
            // $image = base64_encode(file_get_contents($image));

            //prepare request
            $request = new AnnotateImageRequest();
            $request->setImage($image);
            $request->setFeature("TEXT_DETECTION");
            $gcvRequest = new GoogleCloudVision([$request],  env('GOOGLE_CLOUD_KEY'));

            //send annotation request
            $response = $gcvRequest->annotate();
            // return json_encode(["description" => $response->responses[0]->textAnnotations[0]->description]);
            $array = (array) $response->responses[0]->textAnnotations[0]->description;
            foreach ($array as $key => $value) {
                $words = explode("\n", $value);
                // dd($words); //  array
                $jogo = $words[0];
                $entrada = (integer) $words[17];
                $saida = (integer) $words[20];
                echo "Jogo: " . $jogo . "<br>";
                echo "Entrada: " . $entrada . "<br>";
                echo "Saida: " . $saida . "<br>";
            }
        }
    }
}