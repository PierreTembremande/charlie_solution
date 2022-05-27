<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ville extends Model
{
    use HasFactory;


    public static function insertVille($ville, $codePostal)
    {
        $sql = DB::table('villes')->insertGetId([
            'nom' => $ville,
            'code_postal' => $codePostal
        ]);
    }

    public static function recentVille()
    {
        $sql = DB::select('SELECT MAX(id) FROM villes;');
        return end($sql);
    }

    public static function updateVille($ville, $codePostal, $id){
        $sql = DB::table('villes')->where('id', $id)->update([
            'nom' => $ville,
            'code_postal' => $codePostal
        ]);
    }
}
