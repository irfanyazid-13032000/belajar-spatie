<?php

namespace Database\Seeders;

use App\Models\Navigation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $konfigurasi = Navigation::create([
            'name'=>'Konfigurasi',
            'url'=>'konfigurasi',
            'icon'=>'ti-settings',
            'main_menu'=>null,
        ]);
        // note : sub_menus() ada di model navigation
        $konfigurasi->sub_menus()->create([
            'name'=>'Roles',
            'url'=>'konfigurasi/roles',
            'icon'=>'',
        ]);
        $konfigurasi->sub_menus()->create([
            'name'=>'Permissions',
            'url'=>'konfigurasi/permission',
            'icon'=>'',
        ]);
        $transaksi = Navigation::create([
            'name'=>'Transaksi',
            'url'=>'transaksi',
            'icon'=>'ti-settings',
            'main_menu'=>null,
        ]);
        $transaksi->sub_menus()->create([
            'name'=>'Transaksi Haram',
            'url'=>'transaksi/haram',
            'icon'=>'ti-settings',
        ]);
        

    }
}
