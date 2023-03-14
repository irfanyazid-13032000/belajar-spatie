<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::beginTransaction();
        try {
            $staff = User::create([
                'email' => 'yudi@gmail.com',
                'name' => 'yudikabalmay',
                'email_verified_at' => now(),
                'password' => bcrypt('yudipedebanget'),
                'remember_token' => Str::random(10),
            ]);
            $spv = User::create([
                'email' => 'rudi@gmail.com',
                'name' => 'rudiasik',
                'email_verified_at' => now(),
                'password' => bcrypt('rudinih'),
                'remember_token' => Str::random(10),
            ]);
            $manager = User::create([
                'email' => 'tono@gmail.com',
                'name' => 'tonomaknyus',
                'email_verified_at' => now(),
                'password' => bcrypt('tonolagi'),
                'remember_token' => Str::random(10),
            ]);
            $it = User::create([
                'email' => 'yono@gmail.com',
                'name' => 'yonoasli',
                'email_verified_at' => now(),
                'password' => bcrypt('yonoselalu'),
                'remember_token' => Str::random(10),
            ]);
    
    
            $role_staff     = Role::create(['name'=>'staff']);
            $role_spv       = Role::create(['name'=>'spv']);
            $role_manager   = Role::create(['name'=>'manager']);
            $role_it        = Role::create(['name'=>'it']);
    
            Permission::create(['name'=>'read role']);
            Permission::create(['name'=>'create role']);
            Permission::create(['name'=>'update role']);
            Permission::create(['name'=>'delete role']);
            Permission::create(['name'=>'read konfigurasi']);

            $role_it->givePermissionTo('read role');
            $role_it->givePermissionTo('create role');
            $role_it->givePermissionTo('update role');
            $role_it->givePermissionTo('delete role');
            $role_it->givePermissionTo('read konfigurasi');
    
            $staff->assignRole('staff');
            $spv->assignRole('spv');
            $manager->assignRole('manager');
            $it->assignRole('it');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
        }
        
       
    }
}
