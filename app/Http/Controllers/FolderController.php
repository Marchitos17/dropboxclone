<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FolderController extends Controller
{
    // Visualizza il modulo per creare una nuova cartella e caricare file
    public function showCreateFolderForm()
    {
        return view('index');
   }

    // Crea la cartella e carica i file
    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'files.*' => 'required|file|max:2048',
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

        return redirect()->route('view.folders')->with('success', 'Cartella e file creati con successo');
    }

    // Visualizza le cartelle e i file contenuti
    public function viewFolders()
    {
        $folders = Folder::with('files')->get();
        return view('home.lista_ordini', compact('folders'));
    }
}
