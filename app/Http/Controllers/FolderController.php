<?php

namespace App\Http\Controllers;

use Log;
use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    public function home(){
        return view('home.main');
    }


    // Crea la cartella e carica i file
    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'string|max:255',
            'files.*' => 'file|max:2048',
        ]);

        // Creare la cartella nel database
        $folder = Folder::create(['name' => $request->folder_name]);

        // Percorso della cartella all'interno di public
        $folderPath = public_path('immagini/' . $folder->name);
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Salva ogni file nella cartella pubblica e nel database
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($folderPath, $fileName);

            // Salva il percorso relativo al file nel database
            File::create([
                'name' => $file->getClientOriginalName(),
                'path' => 'immagini/' . $folder->name . '/' . $fileName,
                'folder_id' => $folder->id,
            ]);
        }

        return redirect()->back();
    }

    // Visualizza le cartelle e i file contenuti
    public function viewFolders()
    {
        $folders = Folder::with('files')->get();
        return view('home.lista_ordini', compact('folders'));
    }
    public function mostra_cartella($id){
        $folder = Folder::with('files')->findOrFail($id);
        return view('home.mostra_cartella',compact('folder'));
    }
    public function cancella_cartella($id){
        $folder = Folder::with('files')->findOrFail($id);
        $folder->delete();
        return redirect()->back();
    }
    public function elimina_immagine($id){
        $file = File::findOrFail($id);
        $file->delete();
        return redirect()->back();
    }
    public function inserisci_file(Request $request)
    {
    $request->validate([
        'files.*' => 'file|max:2048',
        'folder_id' => 'exists:folders,id',
    ]);

    $folder = Folder::findOrFail($request->folder_id);
    $folderPath = public_path('immagini/' . $folder->name);

    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0755, true);
    }

    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($folderPath, $fileName);

            // Salva il percorso relativo al file nel database
            File::create([
                'name' => $file->getClientOriginalName(),
                'path' => 'immagini/' . $folder->name . '/' . $fileName,
                'folder_id' => $folder->id,
            ]);
        }
    } 
    return redirect()->back();
}

}
