<?php

namespace App\Http\Controllers;

use App\SeatAssign;
use App\Route;
use App\Vehicle;
use App\Employee;
use App\Vehicle_Route;
use App\AddVehicle;
use App\Seat;
use Illuminate\Http\Request;
use App\Http\Requests\Seat_assignRequest;
use DB;
use App\Http\Controllers\redirect;
use Session;


class Seat_assignController extends Controller
{
    public function index()
    {
        $data['seat_assigns'] = SeatAssign::with('routes', 'vehicles', 'seats', 'employees')->paginate(100);
        return view('pages.manage_assign_seat', $data);
    }

    public function addSeatAssign()
    {
        $data['seat_assign'] = null;
        $data['vehicle_and_route'] = DB::table('vehicle_and_route')
            ->join('routes', 'vehicle_and_route.route_id', '=', 'routes.id')
            ->pluck('route_name', 'routes.id');
        $data['employees'] = DB::table('employee')->pluck('name', 'id');

        return view('pages.add_seat_assign', $data);
    }

    public function getVehicleByRoute(Request $request)
    {
        $route_id = $request->route;
        $vehicle = Vehicle_Route::leftJoin('add_vehicles', 'add_vehicles.id', '=', 'vehicle_and_route.vehicle_id')
            ->where('route_id', $route_id)
            ->select('vehicle_and_route.*', 'add_vehicles.registration_no', 'add_vehicles.id as vehicle_id')
            ->get();
        $htm = '<option value="' . 'Select vehicle' . '">' . 'Select vehicle' . '</option>';
        foreach ($vehicle as $name) {

            $htm .= '<option value="' . $name->vehicle_id . '">' . $name->registration_no . '</option>';
        }
        echo $htm;
        exit;
    }


    public function getSeatByVehicle(Request $request)
    {
        $vehicle_id = $request->vehicle;
        $seat = Seat::where('vehicle_id', $vehicle_id)->select('seats.*')->get();
        $htm = '<option value="' . 'Select seat' . '">' . 'Select seat' . '</option>';
        foreach ($seat as $name) {
            $htm .= '<option value="' . $name->id . '">' . $name->seat_number . '</option>';
        }
        echo $htm;
        exit;
    }

    public function seatAssignStore(Seat_assignRequest $seat_assignRequest)
    {
        $id = $seat_assignRequest->id ? $seat_assignRequest->id : '';
        $seat_assign = SeatAssign::firstOrNew(array('id' => $id));
        $seat_assign->route_id = $seat_assignRequest->route;
        $seat_assign->vehicle_id = $seat_assignRequest->vehicle;
        $seat_assign->seat_id = $seat_assignRequest->seat;
        $seat_assign->employee_id = $seat_assignRequest->employee;
        
        $query = SeatAssign::where(['route_id'=>$seat_assignRequest->route,'vehicle_id' => $seat_assignRequest->vehicle, 'seat_id'=>$seat_assignRequest->seat])->count();
        if ($query > 0) {
            Session::flash('alert-danger', 'Data Duplicate');
            return redirect('seat_assign');
        } else {
          $seat_assign->save();
          Session::flash('alert-success', 'Data Stored Successfully');
          return redirect('seat_assign');
        }
    }

    public function updateSeatAssign(Request $request)
    {
        $data['seat_assign'] = SeatAssign::find($request->seat_assign_id);
        $data['vehicle_and_route'] = DB::table('vehicle_and_route')
            ->join('routes', 'vehicle_and_route.route_id', '=', 'routes.id')
            ->pluck('route_name', 'routes.id');
        $data['employees'] = DB::table('employee')->pluck('name', 'name');

        return view('pages.add_seat_assign', $data);
    }

    public function seatAssignRestore(Seat_assignRequest $seat_assignRequest)
    {
        $id = $seat_assignRequest->id ? $seat_assignRequest->id : '';
        $seat_assign = SeatAssign::updateOrCreate(array('id' => $id));
        $seat_assign->route_id = $seat_assignRequest->route;
        $seat_assign->vehicle_id = $seat_assignRequest->vehicle;
        $seat_assign->seat_id = $seat_assignRequest->seat;
        $seat_assign->employee_name = $seat_assignRequest->employee;
        
        $query = SeatAssign::where(['route_id'=>$seat_assignRequest->route,'vehicle_id' => $seat_assignRequest->vehicle, 'seat_id'=>$seat_assignRequest->seat])->count();
        if ($query > 0) {
            Session::flash('alert-danger', 'Data Duplicate');
            return redirect('seat_assign');
        } else {
          $seat_assign->save();
          Session::flash('alert-success', 'Data Stored Successfully');
          return redirect('seat_assign');
        }
    }

    public function deleteSeatAssign(Request $request)
    {
        try {
            $seat_assign = SeatAssign::find($request->seat_assign_id);
            $seat_assign->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('seat_assign');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('seat_assign');
        }
    }
}