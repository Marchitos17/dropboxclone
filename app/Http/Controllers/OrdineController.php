<?php

namespace App\Http\Controllers;

use App\Models\Ordine;
use Illuminate\Http\Request;

class OrdineController extends Controller
{
    public function insert(Request $request){
        $imageName = $request->file('foto1')->getClientOriginalName();
        $request->file('foto1')->storeAs('public/immagini', $imageName);

        $imageName2 = $request->file('foto2')->getClientOriginalName();
        $request->file('foto2')->storeAs('public/immagini', $imageName2);
        
        

        $data = New Ordine();
        $data->numero_ordine = $request->ordine;
        $data->foto1 = $imageName;
        $data->foto2 = $imageName2;
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
}