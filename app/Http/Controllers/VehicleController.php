<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Http\Requests\AddVehicleRequest;
use App\Seat;
use Illuminate\Http\Request;
use App\Vehicle;
use App\AddVehicle;
use DB;
use Illuminate\Support\Facades\Session;


class VehicleController extends Controller
{

    public function index()
    {
        $data['vehicles'] = Vehicle::paginate(10);
        return view('pages.manage_vehicle', $data);
    }

    public function vehicleInactine($id)
    {
        $vehicles = Vehicle::find($id);
        $vehicles->status = 0;
        $vehicles->save();
        return redirect('vehicle');
    }

    public function vehicleActine($id)
    {
        $vehicles = Vehicle::find($id);
        $vehicles->status = 1;
        $vehicles->save();
        return redirect('vehicle');
    }


    public function addVehicleType()
    {
        $data['vehicle'] = null;
        return view('pages.add_vehicle_type', $data);
    }

    public function vehicleStore(VehicleRequest $vehicleRequest)
    {
        try {
            $id = $vehicleRequest->id ? $vehicleRequest->id : '';
            $vehicle = Vehicle::findOrNew($id);
            $vehicle->vehicle_type = $vehicleRequest->vehicle_type;
            $vehicle->status = $vehicleRequest->status;
            $vehicle->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('vehicle');
        } catch (\Exception $e) {
            //dd($e->getMessage());
            Session::flash('alert-danger', 'Something Wrong Error: RAF:101');
            return redirect('vehicle');
        }

    }

    public function updateVehicle(Request $request)
    {
        $data['vehicle'] = Vehicle::find($request->vehicle_id);
        return view('pages.add_vehicle_type', $data);

    }


    public function deleteVehicle(Request $request)
    {
        try {
            $vehicle = Vehicle::find($request->vehicle_id);
            $vehicle->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('vehicle');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: RDF:101');
            return redirect('vehicle');

        }
    }

// Add-vehicle list query start here................................................

    public function addVehicleList()
    {
        $data['vehicles'] = AddVehicle::with('vehicle')->paginate(10);
//     return $data['vehicles'];

        return view('pages.manage_vehicle_list', $data);
    }

    public function registerVehicleList()
    {
        $data['vehicles'] = Vehicle::pluck('vehicle_type', 'vehicle_type');
        $data['vehicle'] = null;
        return view('pages.add_vehicle_list', $data);
    }

    public function vehicleLiStore(AddVehicleRequest $request)
    {

            $id = $request->id ? $request->id : '';
            $vehicle = AddVehicle::findOrNew($id);
            $vehicle->model_no = $request->model_no;
            $vehicle->registration_no = $request->registration_no;
            $vehicle->chassis_no = $request->chassis_no;
            $vehicle->engine_no = $request->engine_no;
            $vehicle->vehicle_type = $request->vehicle_type;
            $vehicle->number_of_seat = $request->number_of_seat;
            $vehicle->owner = $request->owner;
            $vehicle->save();
            //this data will be save Seat table
            $seatArray = [];
            for ($i = 1; $i <= $vehicle->number_of_seat; $i++) {
             $seatArray[$i]['vehicle_id'] = $vehicle->id;
             $seatArray[$i]['seat_number'] = $vehicle->id . '_' . $i;
            }
            Seat::insert($seatArray);
            
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('add-vehicle');

    }

    public function vehicleLiUpdate(Request $request)
    {
        $data['vehicles'] = Vehicle::pluck('vehicle_type', 'vehicle_type');
        $data['vehicle'] = AddVehicle::find($request->vehicle_id);
        return view('pages.add_vehicle_list', $data);

    }

    public function vehicleLiDelect(Request $request)
    {
        try {
            $vehicle = AddVehicle::find($request->vehicle_id);

            //Seat delete
            AddVehicle::where('id', $request->vehicle_id)->delete();

            $vehicle->delete();


            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('add-vehicle');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('add-vehicle');

        }


    }


}
