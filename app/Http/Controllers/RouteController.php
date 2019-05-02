<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Location;
use App\Route;
use App\Stoppage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class RouteController extends Controller
{

    public function index()
    {
        $data['routes'] = Route::with('startLocation', 'endLocation')->paginate(10);

        return view('pages.manage_route', $data);

    }

    public function addRouteFrom()
    {
        $data['locations'] = Location::pluck('location', 'id');
        $data['route'] = null;
        return view('pages.add_route', $data);

    }

    public function routeStore(Request $request)
    {
        try {
            $id = $request->id ? $request->id : '';
            $route = Route::findOrNew($id);
            $route->route_name = $request->route_name;
            $route->start_location = $request->start_location;
            $route->end_location = $request->end_location;
            $route->save();
            //this data will be save stoppage table
            $data = $request->stoppage;
            foreach ($data as $value) {
                $stoppages = new Stoppage();
                $stoppages->route_id = $route->id;
                $stoppages->location_id = $value;
                $stoppages->save();
            }
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('route');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('route');

        }

    }

//stoppage table save data view from button show korar jonno
    public function getStoppageData(Request $request)
    {
        $data = DB::select(DB::raw("SELECT stoppages.*,locations.location FROM stoppages left join locations on locations.id = stoppages.location_id 
         where stoppages.route_id = $request->route_id"));

        $html = '';

        $html .= '<table class="table table-bordered table-striped">';
        foreach ($data as $value) {
            $html .= '<tr>
                        <td>Stoppage : </td>
                        <td>' . $value->location . '</td>
                      </tr>';
        }
        $html .= '</table>';
        echo $html;
        exit;
    }

    public function editRoute(Request $request)
    {

        $data['stoppages'] = Stoppage::where([
            'route_id' => $request->route_id
        ])->get();

        $data['location'] = Location::pluck('location', 'id');
        $data['route'] = Route::find($request->route_id);
        return view('pages.edit_route', $data);

    }

    public function deleteRoute(Request $request)
    {
        try {
            $route = Route::find($request->route_id);
            $route->delete();
            //stoppage delete
            Stoppage::where('route_id', $request->route_id)->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('route');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('route');

        }
    }

}
