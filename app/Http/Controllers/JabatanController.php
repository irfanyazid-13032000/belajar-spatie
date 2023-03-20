<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
   public function index()
   {
        $jabatans =  Jabatan::where('parent_id',0)
                ->with(str_repeat('children.',99))->get(); 


        return view('jabatan.index',['data'=>$jabatans]);
        // return $jabatans;
   }
}


