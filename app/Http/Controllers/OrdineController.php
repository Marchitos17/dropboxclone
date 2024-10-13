<?php

namespace App\Http\Controllers;

use App\Models\Ordine;
use Illuminate\Http\Request;

class OrdineController extends Controller
{
    public function insert(Request $request){
        $data = New Ordine();
        $data->numero_ordine = $request->ordine;
        if($request->foto1){
            $imageName = $request->file('foto1')->getClientOriginalName();
            $request->foto1->storeAs('immagini', $imageName);
            $data->foto1 = $imageName;
        }
        if($request->foto2){
        $imageName2 = $request->file('foto2')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName2);
        $data->foto2 = $imageName2;
        }
        if($request->foto3){
        $imageName3 = $request->file('foto3')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName3);
        $data->foto3 = $imageName3;
        }
        if($request->foto4){
        $imageName4 = $request->file('foto4')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName4);
        $data->foto4 = $imageName4;
        }
        if($request->foto5){
        $imageName5 = $request->file('foto5')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName5);
        $data->foto5 = $imageName5;
        }
        if($request->foto6){
        $imageName6 = $request->file('foto6')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName6);
        $data->foto6 = $imageName6;
        }
        if($request->foto7){
        $imageName7 = $request->file('foto7')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName7);
        $data->foto7 = $imageName7;
        }
        if($request->foto8){
        $imageName8 = $request->file('foto8')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName8);
        $data->foto8 = $imageName8;
        }
        if($request->foto9){
        $imageName9 = $request->file('foto9')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName9);
        $data->foto9 = $imageName9;
        }
        if($request->foto10){
        $imageName10 = $request->file('foto10')->getClientOriginalName();
        $request->foto2->storeAs('immagini', $imageName10);
        $data->foto10 = $imageName10;
        }   
        /*$foto = $request->foto1;
        if($foto){
            $imagename=time().'.'.$foto->getClientOriginalExtension();
            $request->foto1->move('immagini',$imagename);
            $data->foto1=$imagename;
        }
        $foto2 = $request->foto2;
        if($foto2){
            $imagename=time().'.'.$foto2->getClientOriginalExtension();
            $request->foto2->move('immagini',$imagename);
            $data->foto2=$imagename;
        }
        $foto3 = $request->foto3;
        if($foto3){
            $imagename=time().'.'.$foto3->getClientOriginalExtension();
            $request->foto3->move('immagini',$imagename);
            $data->foto3=$imagename;
        }
        $foto4 = $request->foto4;
        if($foto4){
            $imagename=time().'.'.$foto4->getClientOriginalExtension();
            $request->foto4->move('immagini',$imagename);
            $data->foto4=$imagename;
        }
        $foto5 = $request->foto5;
        if($foto5){
            $imagename=time().'.'.$foto5->getClientOriginalExtension();
            $request->foto5->move('immagini',$imagename);
            $data->foto5=$imagename;
        }*/
        $data->save();
    
        return redirect()->back();
    }
    public function mostra_cartella($id){
        $data= Ordine::find($id);
        return view('home.mostra_cartella',compact('data'));
    }
    public function svuota_cartella($id){
        $data= Ordine::find($id);
        $data->delete(); 
        return redirect()->back();
    }
}