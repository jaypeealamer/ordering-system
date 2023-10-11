<?php
namespace App\Traits;


use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

trait MenuTraits
{
    public function checkIfhasMenuImage($fileName){
        $chk = true;
        if(Storage::exists('public/images/menu/'.$fileName)){
            $imagePath = 'images/menu/'.$fileName;
            $storagePath = 'public/' . $imagePath;
        
            if (Storage::exists($storagePath)) {
                $imagePath= Storage::url($storagePath);
            }
        }
        if($imagePath === "/storage/images/menu/"){
            $imagePath = 'assets/images/no-image.jpg';
            $chk = false;
        }
        return [$chk, $imagePath];
    }

}