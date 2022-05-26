<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donnee;
use App\Models\Image;
use App\Models\Ville;
use App\Models\Etat;

class AffichageController extends Controller
{

    public function toutesLesDonnees()
    {

        $recup = file_get_contents('https://randomuser.me/api/?results=100');
        $exploit = json_decode($recup, true);

        for ($result = 0; $result < 100; $result++) {

            $genre = $exploit['results'][$result]["gender"];
            $titre = $exploit['results'][$result]["name"]["title"];
            $nom = $exploit['results'][$result]["name"]["last"];
            $prenom = $exploit['results'][$result]['name']['first'];
            $uuid = $exploit['results'][$result]["login"]["uuid"];
            $email = $exploit['results'][$result]["email"];
            $pseudo = $exploit['results'][$result]["login"]["username"];
            $mdp = $exploit['results'][$result]["login"]["sha256"];
            $dateNaissance = $exploit['results'][$result]["dob"]["date"];
            $dateNaissance = substr($dateNaissance, 0, 10);
            $age = $exploit['results'][$result]["dob"]["age"];
            $inscription = $exploit['results'][$result]["registered"]["date"];
            $inscription = substr($inscription, 0, 10);
            $telephoneFixe = $exploit['results'][$result]["phone"];
            $telephonePortable = $exploit['results'][$result]["cell"];
            $adresse = $exploit['results'][$result]["location"]["street"];
            $ville = $exploit['results'][$result]["location"]["city"];
            $codePostal = $exploit['results'][$result]["location"]["postcode"];
            $etat = $exploit['results'][$result]["location"]["state"];
            $imageLarge = $exploit['results'][$result]["picture"]["large"];
            $imageMedium = $exploit['results'][$result]["picture"]["medium"];
            $imageThumbnail = $exploit['results'][$result]["picture"]["thumbnail"];
            $nationalite = $exploit['results'][$result]["nat"];

            $image = Image::insertImage($imageLarge, $imageMedium, $imageThumbnail);
            $ville = Ville::insertVille($ville, $codePostal);
            $etat = Etat::insertEtat($etat);

            $dernierImage = Image::recentImage();
            $dernierVille = Ville::recentVille();
            $dernierEtat = Etat::recentEtat();

            $donnee = Donnee::insertDonnee($uuid, $genre, $titre, $nom, $prenom, $dateNaissance, $age, $nationalite, $telephoneFixe, $telephonePortable, $email, $pseudo, $mdp, $inscription, $dernierImage->{'MAX(id)'}, $dernierVille->{'MAX(id)'}, $dernierEtat->{'MAX(id)'});
        }

        $datas = Donnee::get();
        return view('data', compact('datas'));
    }

    public function ajout()
    {

        return view('ajout');
    }

    public function ajoutUtilisateur()
    {

        if (isset($_POST['sexe']) && isset($_POST['titre']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['uuid']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['naissance']) && isset($_POST['age']) && isset($_POST['fixe']) && isset($_POST['portable']) && isset($_POST['adresse']) && isset($_POST['ville']) && isset($_POST['code']) && isset($_POST['etat']) && isset($_POST['large']) && isset($_POST['moyen']) && isset($_POST['thumbnail']) && isset($_POST['nation'])) {

            $genre = $_POST['sexe'];
            $titre = $_POST['titre'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $uuid = $_POST['uuid'];
            $email = $_POST['email'];
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            $mdp = hash("sha256", $mdp);
            $dateNaissance = $_POST['naissance'];
            $age = $_POST['age'];
            $telephoneFixe = $_POST['fixe'];
            $telephonePortable = $_POST['portable'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $codePostal = $_POST['code'];
            $etat = $_POST['etat'];
            $imageLarge = $_POST['large'];
            $imageMedium = $_POST['moyen'];
            $imageThumbnail = $_POST['thumbnail'];
            $nationalite = $_POST['nation'];

            $inscription = date("Y-m-d");

            $image = Image::insertImage($imageLarge, $imageMedium, $imageThumbnail);
            $ville = Ville::insertVille($ville, $codePostal);
            $etat = Etat::insertEtat($etat);

            $dernierImage = Image::recentImage();
            $dernierVille = Ville::recentVille();
            $dernierEtat = Etat::recentEtat();

            $donnee = Donnee::insertDonnee($uuid, $genre, $titre, $nom, $prenom, $dateNaissance, $age, $nationalite, $telephoneFixe, $telephonePortable, $email, $pseudo, $mdp, $inscription, $dernierImage->{'MAX(id)'}, $dernierVille->{'MAX(id)'}, $dernierEtat->{'MAX(id)'});

            echo '<script>alert("Votre donnée est bien enregistrée")</script>';;

            $datas = Donnee::get();
            return view('data', compact('datas'));
        }
    }
}
