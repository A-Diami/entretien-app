<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Entretien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class EntretienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $domaines = Domaine::all();
        return view('entretien.create', compact('domaines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entretiens = new Entretien();
        
        $entretiens->participants = $request->participants;
        $entretiens->mail = $request->mail;
        $entretiens->number = $request->number;
        $entretiens->presentation = $request->presentation;
        $entretiens->pourquoi_defarsci = $request->pourquoi_defarsci;
        $entretiens->connaissance_defarsci = $request->connaissance_defarsci;
        $entretiens->part = $request->part;
        $entretiens->objectifs = $request->objectifs;
        $entretiens->manques = $request->manques;
        $entretiens->atouts = $request->atouts;
        $entretiens->dureeFormation = $request->dureeFormation;
        $entretiens->dateDebut = $request->dateDebut;
        $entretiens->horaire_travail = $request->horaire_travail;
        $entretiens->modalite_paiement = $request->modalite_paiement;
        $entretiens->mensualite = $request->mensualite;
        $entretiens->demande = $request->demande;
        $entretiens->maladie = $request->maladie ? true : false;
        $entretiens->number_urgence = $request->number_urgence;
        $entretiens->domaine_id = $request->domaine_id;

        $imageName = null;
        
        if (request()->hasFile('image')){
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('/photo');
            $uploadedImage->move($destinationPath, $imageName);
            $uploadedImage->imagePath = $destinationPath . $imageName;

        }
        $entretiens->image = $imageName;

        $entretiens->save();

            notify()->success("Les données viennent d'etre <span class='badge badge-dark'>crée<span>");
        return back();
    }
    
    public function voirStagiaire()
    {
        $entretiens = Entretien::all();
        $domaines = Domaine::all();
        return view('entretien.stagiaire', compact('entretiens','domaines'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function show(Entretien $entretien)
    {
        return view('entretien.stagiaire', compact('entretien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entretiens = Entretien::find($id);
        $domaines = Domaine::all();
        return view('entretien.edit', compact('entretiens','domaines'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $entretiens = Entretien::find($request->id);
        $entretiens->participants = $request->participants;
        $entretiens->mail = $request->mail;
        $entretiens->number = $request->number;
        $entretiens->presentation = $request->presentation;
        $entretiens->pourquoi_defarsci = $request->pourquoi_defarsci;
        $entretiens->connaissance_defarsci = $request->connaissance_defarsci;
        $entretiens->part = $request->part;
        $entretiens->objectifs = $request->objectifs;
        $entretiens->manques = $request->manques;
        $entretiens->atouts = $request->atouts;
        $entretiens->dureeFormation = $request->dureeFormation;
        $entretiens->dateDebut = $request->dateDebut;
        $entretiens->horaire_travail = $request->horaire_travail;
        $entretiens->modalite_paiement = $request->modalite_paiement;
        $entretiens->mensualite = $request->mensualite;
        $entretiens->demande = $request->demande;
        $entretiens->maladie = $request->demande ? true : false;
        $entretiens->number_urgence = $request->number_urgence;
        $entretiens->domaine_id = $request->domaine_id;

        if ($request->hasFile('image')){
            $image_path = public_path("/photo".$entretiens->image);
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            

            $bannerImage = $request->file('image');
            $imgName = $bannerImage->getClientOriginalName();
            $destinationPath = public_path('/photo');
            $bannerImage->move($destinationPath, $imgName);
          } else {
            $imgName = $entretiens->image;
          }
        
          
          $entretiens->image= $imgName;
         
        // $imageName = null;
        
        // if (request()->hasFile('image')){
        //     $uploadedImage = $request->file('image');
        //     $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        //     $destinationPath = public_path('/images');
        //     $uploadedImage->move($destinationPath, $imageName);
        //     $uploadedImage->imagePath = $destinationPath . $imageName;

        // }
        // $entretiens->image = $imageName;
        

         $entretiens->save();
         notify()->success("Les données viennent d'etre <span class='badge badge-dark'>modifiée<span>");

         return $this->voirStagiaire();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entretien  $entretien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entretien $entretien)
    {
        //
    }
}
