<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Ordine;
use Illuminate\Http\Request;

class OrdineController extends Controller
{    public function mostra_cartella($numero_ordine){
        $data= Image::find($numero_ordine);
        return view('home.mostra_cartella',compact('data'));
    }
    public function svuota_cartella($id){
        $data= Ordine::find($id);
        $data->delete(); 
        return redirect()->back();
    }
    public function cancella_img($id){
        $data= Ordine::find($id);

    }
    
}