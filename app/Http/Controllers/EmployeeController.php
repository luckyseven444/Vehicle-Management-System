<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\Department;
use DB;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index()
    {
        $data['employees'] = Employee::with('departments')->paginate(10);

        return view('pages.manage_employee', $data);
    }

    public function add_employee()
    {
        $departments = DB::table('department')->pluck('department_name', 'id');
        $data['employee'] = null;
        $data['departments'] = $departments;
        return view('pages.add_employee', $data);
    }

    public function employeeStore(EmployeeRequest $employeeRequest)
    {
        $id = $employeeRequest->id ? $employeeRequest->id : '';
        $employee = Employee::firstOrNew(array('id' => $id));
        $employee->id = $employeeRequest->id;
        $employee->name = $employeeRequest->name;
        $employee->code = $employeeRequest->code;
        $employee->department = $employeeRequest->department;
        $employee->join_date = $employeeRequest->join_date;
        $employee->address = $employeeRequest->address;
        $employee->manager = $employeeRequest->manager;

        if ($employeeRequest->hasFile('image')) {
            $filenameWithExt = $employeeRequest->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $employeeRequest->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $employeeRequest->file('image')->storeAs('public', $fileNameToStore);
            $employee->emp_image = $fileNameToStore;
        }

        $employee->save();
        Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('employee');
    }

    public function employeeRestore(EmployeeRequest $employeeRequest)
    {
        $id = $employeeRequest->id ? $employeeRequest->id : '';
        $employee = Employee::updateOrCreate(array('id' => $id));
        $employee->name = $employeeRequest->name;
        $employee->code = $employeeRequest->code;
        $employee->department = $employeeRequest->department;
        $employee->join_date = $employeeRequest->join_date;
        $employee->address = $employeeRequest->address;
        $employee->manager = $employeeRequest->manager;

        if ($employeeRequest->hasFile('image')) {
            $filenameWithExt = $employeeRequest->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $employeeRequest->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $employeeRequest->file('image')->storeAs('public', $fileNameToStore);
            $employee->emp_image = $fileNameToStore;
        }

        $employee->save();
        Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('employee');
    }

    public function updateEmployee(Request $request)
    {
        $data['departments'] = DB::table('department')->pluck('department_name', 'id');
        $data['employee'] = Employee::find($request->employee_id);
        return view('pages.add_employee', $data);
    }

    public function deleteEmployee(Request $request)
    {
        try {
            $employee = Employee::find($request->employee_id);
            $employee->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('employee');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('employee');

        }
    }
}
