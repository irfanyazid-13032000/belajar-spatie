<?php 

use App\Models\Navigation;

if (!function_exists('getMenus')) {
  function getMenus()
  {
    return Navigation::with('sub_menus')->whereNull('main_menu')->get();
  }
}









?>