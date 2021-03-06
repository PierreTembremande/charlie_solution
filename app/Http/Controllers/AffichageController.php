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

        $datas = Donnee::affichage();
        return view('data', compact('datas'));
    }

    public function ajout()
    {

        return view('ajout');
    }

    public function ajoutUtilisateur()
    {

        if (isset($_POST['sexe']) && isset($_POST['titre']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['uuid']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['naissance']) && isset($_POST['age']) && isset($_POST['fixe']) && isset($_POST['portable']) && isset($_POST['ville']) && isset($_POST['code']) && isset($_POST['etat']) && isset($_POST['large']) && isset($_POST['moyen']) && isset($_POST['thumbnail']) && isset($_POST['nation'])) {

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

            echo '<script>alert("Votre donn??e est bien enregistr??e")</script>';;

            echo '<script>window.location="/affichage"</script>';
        }
    }

    public function modification($id)
    {
        return view('modifier', compact('id'));
    }

    public function recupModification()
    {

        if (isset($_POST['sexe']) && isset($_POST['titre']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['uuid']) && isset($_POST['email']) && isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['naissance']) && isset($_POST['age']) && isset($_POST['fixe']) && isset($_POST['portable']) && isset($_POST['ville']) && isset($_POST['code']) && isset($_POST['etat']) && isset($_POST['large']) && isset($_POST['moyen']) && isset($_POST['thumbnail']) && isset($_POST['nation'])) {

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
            $ville = $_POST['ville'];
            $codePostal = $_POST['code'];
            $etat = $_POST['etat'];
            $imageLarge = $_POST['large'];
            $imageMedium = $_POST['moyen'];
            $imageThumbnail = $_POST['thumbnail'];
            $nationalite = $_POST['nation'];

            $inscription = date("Y-m-d");

            $recupDiversId=Donnee::recupId($uuid);

            $image = Image::updatetImage($imageLarge, $imageMedium, $imageThumbnail, $recupDiversId->{'images_id'});
            $ville = Ville::updateVille($ville, $codePostal, $recupDiversId->{'villes_id'});
            $etat = Etat::updateEtat($etat, $recupDiversId->{'etats_id'});

            $donnee = Donnee::modifier($uuid, $genre, $titre, $nom, $prenom, $dateNaissance, $age, $nationalite, $telephoneFixe, $telephonePortable, $email, $pseudo, $mdp, $inscription);

            echo '<script>alert("Votre donn??e est bien modifier")</script>';

            echo '<script>window.location="/affichage"</script>';
        }
    }

    public function suppression($id)
    {

        $donnee = Donnee::supprimer($id);

        echo '<script>alert("Votre donn??e est bien supprim??")</script>';

        echo '<script>window.location="/affichage"</script>';
    }
}
