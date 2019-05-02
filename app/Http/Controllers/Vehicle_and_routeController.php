<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle_route_Request;
use Illuminate\Http\Request;
use App\Vehicle_Route;
use App\AddVehicle;
use App\Vehicle;
use App\Route;
use DB;
use Illuminate\Support\Facades\Session;

class Vehicle_and_routeController extends Controller
{
    public function index()
    {
        $data['vehicle_and_routes'] = Vehicle_Route::with('vehicles', 'routes')->paginate();
        return view('pages.manage_vehicle_and_route', $data);
    }

    public function add_vehicle_and_route()
    {
        $data['vehicle_and_route'] = null;

        $data['vehicles'] = AddVehicle::where('vehicle_type', 'bus')
            ->orWhere('vehicle_type', 'micro-bus')
            ->select('*')
            ->get()
            ->pluck('registration_no','id');

        $data['routes'] = DB::table('routes')->pluck('route_name', 'id');
        return view('pages.add_vehicle_and_route', $data);
    }

    public function vehicle_and_routeStore(Vehicle_route_Request $vehicle_and_routeRequest)
    {
        $id = $vehicle_and_routeRequest->id ? $vehicle_and_routeRequest->id : '';
        $vehicle_route = Vehicle_Route::firstOrNew(array('id' => $id));
        $vehicle_route->id = $vehicle_and_routeRequest->id;
        $vehicle_route->route_id = $vehicle_and_routeRequest->route_id;
        $vehicle_route->vehicle_id = $vehicle_and_routeRequest->vehicle_id;

        $routes = DB::table('vehicle_and_route')
            ->select('route_id')
            ->groupBy('route_id')
            ->get();
        $route_list = [];
        foreach ($routes as $route) {
            $route_list[] = $route->route_id;
        }

        $vehicles = DB::table('vehicle_and_route')
            ->select('vehicle_id')
            ->groupBy('vehicle_id')
            ->get();
        $vehicle_list = [];
        foreach ($vehicles as $vehicle) {
            $vehicle_list[] = $vehicle->vehicle_id;
        }

        if (!in_array($vehicle_and_routeRequest->route_id, $route_list) && !in_array($vehicle_and_routeRequest->vehicle_id, $vehicle_list)) {
            $vehicle_route->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('vehicle_and_route');
        } else {
            Session::flash('alert-danger', 'This vehicle or route is already assigned');
            return redirect('vehicle_and_route');
        }

    }

    public function updateVehicle_and_route(Request $request)
    {
        $data['vehicle_and_route'] = Vehicle_Route::find($request->vehicle_and_route_id);
        $data['vehicles'] = DB::table('add_vehicles')->pluck('registration_no', 'id');
        $data['routes'] = DB::table('routes')->pluck('route_name', 'id');
        return view('pages.add_vehicle_and_route', $data);
    }

    public function vehicle_and_routeRestore(Vehicle_route_Request $vehicle_and_routeRequest)
    {
        $id = $vehicle_and_routeRequest->id ? $vehicle_and_routeRequest->id : '';
        $vehicle_route = Vehicle_Route::updateOrCreate(array('id' => $id));
        $vehicle_route->id = $vehicle_and_routeRequest->id;
        $vehicle_route->route_id = $vehicle_and_routeRequest->route_id;
        $vehicle_route->vehicle_id = $vehicle_and_routeRequest->vehicle_id;

        $routes = DB::table('vehicle_and_route')
            ->select('route_id')
            ->groupBy('route_id')
            ->get();
        $route_list = [];
        foreach ($routes as $route) {
            $route_list[] = $route->route_id;
        }

        $vehicles = DB::table('vehicle_and_route')
            ->select('vehicle_id')
            ->groupBy('vehicle_id')
            ->get();
        $vehicle_list = [];
        foreach ($vehicles as $vehicle) {
            $vehicle_list[] = $vehicle->vehicle_id;
        }

        if (!in_array($vehicle_and_routeRequest->route_id, $route_list) && !in_array($vehicle_and_routeRequest->vehicle_id, $vehicle_list)) {
            $vehicle_route->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('vehicle_and_route');
        } else {
            Session::flash('alert-danger', 'This vehicle or route is already assigned');
            return redirect('vehicle_and_route');
        }

    }

    public function deleteVehicle_and_route(Request $request)
    {
        try {
            $vehicle_and_route = Vehicle_Route::find($request->vehicle_and_route_id);
            $vehicle_and_route->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('vehicle_and_route');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('vehicle_and_route');

        }
    }

}
