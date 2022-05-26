<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Etat extends Model
{
    use HasFactory;

    public static function insertEtat($etat)
    {
        $sql = DB::table('etats')->insertGetId([
            'nom' => $etat
        ]);
    }

    public static function recentEtat(){

        $sql = DB::select('SELECT MAX(id) FROM etats;');
        return end($sql);
        
    }
}
