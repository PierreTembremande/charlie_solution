<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donnee;
use Symfony\Component\VarDumper\VarDumper;

class AffichageController extends Controller
{

    public function toutesLesDonnees(){

        $recup = file_get_contents('https://randomuser.me/api/?results=100');
        $exploit=json_decode($recup, true);

        for($result=0;$result<100;$result++){

             $genre=$exploit['results'][$result]["gender"];
             $titre= $exploit['results'][$result]["name"]["title"];
             $nom= $exploit['results'][$result]["name"]["last"];
             $prenom= $exploit['results'][$result]['name']['first'];
             $uuid = $exploit['results'][$result]["login"]["uuid"];
             $email= $exploit['results'][$result]["email"];
             $pseudo = $exploit['results'][$result]["login"]["username"];
             $mdp = $exploit['results'][$result]["login"]["sha256"];
             $dateNaissance= $exploit['results'][$result]["dob"]["date"];
             $age= $exploit['results'][$result]["dob"]["age"];
             $inscription= $exploit['results'][$result]["registered"]["date"];
             $telephoneFixe= $exploit['results'][$result]["phone"];
             $telephonePortable= $exploit['results'][$result]["cell"];
             $adresse= $exploit['results'][$result]["location"]["street"];
             $ville = $exploit['results'][$result]["location"]["city"];
             $codePostal = $exploit['results'][$result]["location"]["postcode"];
             $etat = $exploit['results'][$result]["location"]["state"];
             $imageLarge= $exploit['results'][$result]["picture"]["large"];
             $imageMedium= $exploit['results'][$result]["picture"]["medium"];
             $imageThumbnail= $exploit['results'][$result]["picture"]["thumbnail"];
             $nationalite= $exploit['results'][$result]["nat"];
            
            $donnee= Donnee::insertDonnee($uuid,$genre,$titre,$nom,$prenom,$dateNaissance,$age,$nationalite,$telephoneFixe,$telephonePortable,$email,$pseudo,$mdp,$inscription);
            $image= Donnee::insertImage($imageLarge,$imageMedium,$imageThumbnail);
            $ville= Donnee::insertVille($ville,$codePostal);
            $etat= Donnee::insertEtat($etat);
        }

        $datas= Donnee::get();
        return view('data', compact('datas'));
    }

    public function ajout(){

        return view('ajout');
    }
}
