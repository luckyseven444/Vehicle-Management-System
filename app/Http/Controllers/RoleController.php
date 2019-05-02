<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;
use App\Roll;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    public function index()
    {

        $data['roles'] = Roll::paginate();
        return view('pages.manage_role', $data);
    }


    public function add_role()
    {
        $data['role'] = null;
        return view('pages.add_role', $data);
    }

    public function roleStore(RoleRequest $roleRequest)
    {
        try {
            $id = $roleRequest->id ? $roleRequest->id : '';        
            $roll = Roll::findOrNew($id);
            $roll->role_name = $roleRequest->role_name;
            $roll->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('role');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: RAF:101');
            return redirect('role');
        }
    }

    public function updateRole(Request $request)
    {
        $data['role'] = Roll::find($request->role_id);
        return view('pages.add_role', $data);
    }

    public function deleteRole(Request $request)
    {
        try {
            $role = Roll::find($request->role_id);
            $role->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('role');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: RDF:101');
            return redirect('role/manage');

        }
        
    }







}
