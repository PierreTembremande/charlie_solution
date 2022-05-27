<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Image extends Model
{
    use HasFactory;

    public static function insertImage($imageLarge, $imageMedium, $imageThumbnail)
    {
        $sql= DB::table('images')->insertGetId([
            'format_large'=> $imageLarge,
            'format_moyen'=> $imageMedium,
            'format_thumbnail'=> $imageThumbnail]);
    }

    public static function recentImage()
    {
        $sql = DB::select('SELECT MAX(id) FROM images;');
        return end($sql);
    }

    public static function updateImage($imageLarge, $imageMedium, $imageThumbnail, $id)
    {
        $sql = DB::table('images')->where('id', $id)->update([
            'format_large' => $imageLarge,
            'format_moyen' => $imageMedium,
            'format_thumbnail' => $imageThumbnail
        ]);
    }
}
