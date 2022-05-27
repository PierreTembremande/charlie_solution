<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class donnee extends Model
{
    use HasFactory;

    public static function insertDonnee($uuid, $genre, $titre, $nom, $prenom, $dateNaissance, $age, $nationalite, $telephoneFixe, $telephonePortable, $email, $pseudo, $mdp, $inscription, $dernierImage, $dernierVille, $dernierEtat)
    {
        DB::table('donnees')->insert([
            'id' => $uuid,
            'sexe' => $genre,
            'titre' => $titre,
            'nom' => $nom,
            'prenom' => $prenom,
            'date_de_naissance' => $dateNaissance,
            'age' => $age,
            'nationalite' => $nationalite,
            'telephone_fixe' => $telephoneFixe,
            'telephone_portable' => $telephonePortable,
            'email' => $email,
            'pseudo' => $pseudo,
            'mdp' => $mdp,
            'date_enregistrement' => $inscription,
            'images_id' => $dernierImage,
            'villes_id' => $dernierVille,
            'etats_id' => $dernierEtat
        ]);
    }

    public static function affichage(){
         $sql = DB::select('SELECT id,
                                nom,
                                prenom,
                                titre,
                                sexe,
                                date_de_naissance,
                                age,
                                nationalite,
                                email 
                            FROM donnees;');
        return $sql;
    }

    public static function supprimer($id)
    {
        DB::table('donnees')->where('id', '=', $id)->delete();
    }
}
