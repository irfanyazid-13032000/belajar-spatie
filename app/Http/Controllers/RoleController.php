<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {

        return $dataTable->render('konfigurasi.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'create role';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        
        return view('konfigurasi.role-action',['role'=>$role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $role = Role::find($id);
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();

    }
}
