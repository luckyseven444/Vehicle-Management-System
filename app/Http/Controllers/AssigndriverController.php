<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddassigndriverRequest;
use App\Http\Requests\DriverRequest;
use Illuminate\Http\Request;
use App\Assigndriver;
use App\AddVehicle;
use App\Driver;
use DB;
use Illuminate\Support\Facades\Session;

class AssigndriverController extends Controller
{
    public function index()
    {
       $data['assigndrivers'] = Assigndriver::with('drivers', 'vehicles')->paginate();
        
        return view('pages.manage_assign_driver', $data);
    }

    public function add_assign_driver()
    {
        $data['assigndriver'] = null;
        $data['drivers'] = DB::table('driver')->pluck('name', 'id');
        $data['vehicles'] = DB::table('add_vehicles')->pluck('registration_no', 'id');
        return view('pages.add_assign_driver', $data);
    }

    public function assigndriverStore(AddassigndriverRequest $addassigndriverRequest)
    {
        $id = $addassigndriverRequest->id ? $addassigndriverRequest->id : '';
        $assigndriver = Assigndriver::firstOrNew(array('id' => $id));
        $assigndriver->id = $addassigndriverRequest->id;
        $assigndriver->driver_id = $addassigndriverRequest->driver_id;
        $assigndriver->vehicle_id = $addassigndriverRequest->vehicle_id;

        //$data = DB::select('select * from assign_driver where driver_id = ? and vehicle_id = ?', ['$addassigndriverRequest->driver_id', '$addassigndriverRequest->vehicle_id']);
//        $data = DB::table('assign_driver')
//            ->where('driver_id', '=', $addassigndriverRequest->driver_id)
//            ->where('vehicle_id', '=', $addassigndriverRequest->vehicle_id)
//            ->count();
//return $data;
       $drivers = DB::table('assign_driver')
            ->select('driver_id')
            ->groupBy('driver_id')
            ->get();
        $driver_list = [];
        foreach ($drivers as $driver) {
           $driver_list[] = $driver->driver_id;
        }

       $vehicle_ids = DB::table('assign_driver')
            ->select('vehicle_id')
            ->groupBy('vehicle_id')
           ->get();
        $vehicle_list = [];
        foreach ($vehicle_ids as $vehicle_id) {
            $vehicle_list[] = $vehicle_id->vehicle_id;
       }

        if (!in_array($addassigndriverRequest->driver_id, $driver_list) && !in_array($addassigndriverRequest->vehicle_id, $vehicle_list)) {
            $assigndriver->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('assign_driver');
        } else {
            Session::flash('alert-danger', 'This driver or vehicle is already assigned');
            return redirect('assign_driver');
        }
//        if ($data===0 && !$data===1) {
//           $assigndriver->save();
//           Session::flash('alert-success', 'Data Stored Successfully');
//           return redirect('assign_driver');
//        } else {
//           Session::flash('alert-danger', 'This driver or vehicle is already assigned');
//           return redirect('assign_driver');
//        }

    }

    public function updateAssign_driver(Request $request)
    {
        $data['assigndriver'] = Assigndriver::find($request->assigndriver_id);
        $data['drivers'] = DB::table('driver')->pluck('name', 'id');
        $data['vehicles'] = DB::table('add_vehicles')->pluck('registration_no', 'id');
        return view('pages.add_assign_driver', $data);
    }

    public function assindriverRestore(AddassigndriverRequest $addassigndriverRequest)
    {
        $id = $addassigndriverRequest->id ? $addassigndriverRequest->id : '';
        $assigndriver = Assigndriver::updateOrCreate(array('id' => $id));
        $assigndriver->id = $addassigndriverRequest->id;
        $assigndriver->driver_id = $addassigndriverRequest->driver_id;
        $assigndriver->vehicle_id = $addassigndriverRequest->vehicle_id;

        $drivers = DB::table('assign_driver')
            ->select('driver_id')
            ->groupBy('driver_id')
            ->get();
        $driver_list = [];
        foreach ($drivers as $driver) {
            $driver_list[] = $driver->driver_id;
        }

        $vehicle_ids = DB::table('assign_driver')
            ->select('vehicle_id')
            ->groupBy('vehicle_id')
            ->get();
        $vehicle_list = [];
        foreach ($vehicle_ids as $vehicle_id) {
            $vehicle_list[] = $vehicle_id->vehicle_id;
        }

        if (!in_array($addassigndriverRequest->driver_id, $driver_list) && !in_array($addassigndriverRequest->vehicle_id, $vehicle_list)) {
            $assigndriver->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('assign_driver');
        } else {
            Session::flash('alert-danger', 'This driver or vehicle is already assigned');
            return redirect('assign_driver');
        }
    }

    public function deleteAssigndriver(Request $request)
    {
        try {
            $assigndriver = Assigndriver::find($request->assigndriver_id);
            $assigndriver->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('assign_driver');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('assign_driver');

        }
    }
}
