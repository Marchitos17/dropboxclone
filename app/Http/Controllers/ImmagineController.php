<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Ordine;

class ImmagineController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'images.*'=>'required|image|mimes:png,jpg,jpeg,webp'
        ]);
        $numero = [];
        $imageData = [];
        if($files = $request->file('images')){
            foreach($files as $key=> $file){
                $extension = $file->getClientOriginalExtension();
                $filename = $key.'-'.time().'.'.$extension;

                $path = "immagini/";

                $file->move($path, $filename);
                $imageData[] = [
                    'numero_ordine' => $request->numero_ordine,
                    'image' => $path.$filename,
                ];
            }
            $numero[]=[
                'numero_ordine' =>$request->numero_ordine,
            ];
        }
        Image::insert($imageData);
        Ordine::insert($numero);
        return redirect()->back();
    }
}
