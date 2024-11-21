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
        return redirect()->route('condivisi');
    }


    // Crea la cartella e carica i file
    public function createFolder(Request $request)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
            'files.*' => 'file|max:2048',
        ]);

        // Creare la cartella nel database
        $folder = Folder::create(['name' => $request->folder_name]);

        // Percorso della cartella all'interno di public
        $folderPath = public_path('immagini/' . $folder->name);
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        // Verifica se ci sono file da caricare
        if ($request->hasFile('files')) {
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
        }
        return response()->json(['message' => 'Cartella creata e file caricati con successo!']);
    }

    // Visualizza le cartelle e i file contenuti
    public function viewFolders()
    {
        $folders = Folder::with('files')->get();
        $files = File::whereNull('folder_id')->get();
        return view('home.lista_ordini', compact('folders','files'));
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
        'files.*' => 'required|file|max:2048',
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

public function inserisci_singolo_file(Request $request)
{
    // Validazione del file caricato
    $request->validate([
        'files.*' => 'required|file|max:2048', // Aggiungi la validazione del file
    ]);

    // Percorso dove salvare i file
    $folderPath = public_path('immagini/');

    // Verifica se è stato caricato un file
    if ($request->hasFile('files')) {
        foreach ($request->file('files') as $file) {
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move($folderPath, $fileName);

            // Salva il percorso relativo al file nel database
            File::create([
                'name' => $file->getClientOriginalName(),
                'path' => 'immagini/' . $fileName,
                'folder_id' => null,
            ]);
        }
    } 

    // Se non c'è nessun file, ritorna con errore
    return redirect()->back();
    }

    public function updateFolderName(Request $request)
    {
        // Trova la cartella nel database
        $folder = Folder::find($request->folder_id);
        
        // Verifica che la cartella esista
        if ($folder) {
            // Aggiorna il nome della cartella
            $folder->name = $request->new_name;
            $folder->save();

            // Ritorna alla pagina precedente con un messaggio di successo
            return redirect()->back()->with('success', 'Nome della cartella aggiornato con successo!');
        }

        // Se la cartella non esiste, mostra un errore
        return redirect()->back()->with('error', 'Errore nell\'aggiornare il nome della cartella.');
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        
        // Filtrare i file o cartelle in base alla query di ricerca
        $files = File::where('name', 'like', '%' . $query . '%')->get();
        
        return view('home.main', compact('files', 'query'));
    }


}
