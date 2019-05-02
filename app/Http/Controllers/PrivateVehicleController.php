<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrivateVehicleRequest;
use Illuminate\Http\Request;
use App\PrivateVehicle;
use App\Employee;
use App\AddVehicle;
use App\Assigndriver;
use DB;
use Illuminate\Support\Facades\Session;


class PrivateVehicleController extends Controller
{

    public function index()
    {
        $data['private_vehicles'] = PrivateVehicle::with('employees', 'vehicles')->paginate();

        return view('pages.manage_private-vehicle', $data);
    }

    public function add_private_vehicle()
    {
        $data['private_vehicle'] = null;
        $data['employee'] = Employee::all()->pluck('name','id');
        $data['vehicle']= AddVehicle::where('vehicle_type', 'private')->get()->pluck('registration_no','id');
        
        return view('pages.add_private-vehicle', $data);
    }

    public function car_vehicle_store(PrivateVehicleRequest $PrivateVehicleRequest)
    {

        $id = $PrivateVehicleRequest->id ? $PrivateVehicleRequest->id : '';
        $private_vehicle = PrivateVehicle::firstOrNew(array('id' => $id));
        $private_vehicle->id = $PrivateVehicleRequest->id;
        $private_vehicle->employee_id = $PrivateVehicleRequest->employee_id;
        $private_vehicle->vehicle_id = $PrivateVehicleRequest->vehicle_id;

            $private_vehicle->save();
            
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('private_vehicle');
        
    }

    public function updatePrivateVehicle(Request $request)
    {
    $data['private_vehicle'] = PrivateVehicle::find($request->private_vehicle_id);
    $data['employee'] = Employee::all()->pluck('name','id');
    $data['vehicle']= AddVehicle::where('vehicle_type', 'sedan')->select('add_vehicles.*')->get()->pluck('registration_no','id');
        return view('pages.add_private-vehicle', $data);    
    }

    public function car_vehicle_restore(PrivateVehicleRequest $PrivateVehicleRequest)
    {
        $id = $PrivateVehicleRequest->id ? $PrivateVehicleRequest->id : '';
        $private_vehicle = PrivateVehicle::updateOrCreate(array('id' => $id));
        $private_vehicle->id = $PrivateVehicleRequest->id;
        $private_vehicle->employee_id = $PrivateVehicleRequest->employee_id;
        $private_vehicle->vehicle_id = $PrivateVehicleRequest->vehicle_id;

        $private_vehicle->save();

        Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('private_vehicle');
    }

    public function deletePrivateVehicle(Request $request)
    {
        try {
            $private_vehicle = PrivateVehicle::find($request->private_vehicle_id);
            $private_vehicle->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('private_vehicle');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('private_vehicle');

        }
    }
}
