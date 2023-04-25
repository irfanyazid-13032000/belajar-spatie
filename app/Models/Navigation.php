<?php

namespace App\Models;

use App\Models\Navigation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Navigation extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function sub_menus()
    {
        // satu menu punya banyak sub menu
        // main_menu merupakan field yg join dengan id menu yang berada di tabel yang sama yaitu navigations
        return $this->hasMany(Navigation::class,'main_menu');
    }
}
