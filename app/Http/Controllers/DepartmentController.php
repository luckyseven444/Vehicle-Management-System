<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Request;
use App\Department;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index()
    {

        $data['departments'] = Department::paginate();
        return view('pages.manage_department', $data);
    }


    public function add_department()
    {
        $data['department'] = null;
        return view('pages.add_department', $data);
    }

    public function departmentStore(DepartmentRequest $departmentRequest)
    {
        try {


            $department_name = $departmentRequest->department_name ? $departmentRequest->department_name : '';
            $department = Department::firstOrNew(array('department_name'=>$department_name));
            $department->department_name = $departmentRequest->department_name;
            $department->save();

            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('department');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: RAF:101');
            return redirect('department');
        }
    }

    public function updateDepartment(Request $request)
    {
        $data['department'] = Department::find($request->department_id);
        return view('pages.add_department', $data);
    }

    public function deleteDepartment(Request $request)
    {
        try {
            $department = Department::find($request->department_id);
            $department->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('department');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('department');

        }
    }
}
