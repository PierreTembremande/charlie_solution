<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donnee extends Model
{
    use HasFactory;

    public static function insertDonnee($uuid, $genre, $titre, $nom, $prenom, $dateNaissance, $age, $nationalite, $telephoneFixe, $telephonePortable, $email, $pseudo, $mdp, $inscription){

    }

    public static function insertImage($imageLarge, $imageMedium, $imageThumbnail){

        $sql= 'INSERT INTO images (id, format_large, format_moyen, format_thumbnail) VALUES ('.$imageLarge.','.$imageMedium.','.$imageThumbnail.');';
        Donnee::insert($sql);
    }

    public static function insertVille($ville, $codePostal){

        $sql= 'INSERT INTO villes (id, nom, code_postal) VALUES ('.$ville.','.$codePostal.');';
        Donnee::insert($sql);
    }

    public static function insertEtat($etat){

        $sql='INSERT INTO etats (id, nom) VALUES ('.$etat.');';
        Donnee::insert($sql);
    }
}
