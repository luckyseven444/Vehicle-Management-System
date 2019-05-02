<?php

namespace App\Http\Controllers;

use App\Http\Requests\DriverRequest;
use Illuminate\Http\Request;

use App\Driver;
use DB;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    public function index()
    {
        $data['drivers'] = Driver::paginate();
        return view('pages.manage_driver', $data);
    }

    public function add_driver()
    {
        $data['driver'] = null;
        //$data['departments'] = DB::table('department')->pluck('department_name', 'id');
        return view('pages.add_driver', $data);
    }

    public function driverStore(DriverRequest $driverRequest)
    {

        $id = $driverRequest->id ? $driverRequest->id : '';
        $driver = Driver::firstOrNew(array('id' => $id));
        $driver->id = $driverRequest->id;
        $driver->name = $driverRequest->name;
        $driver->code = $driverRequest->code;

        $driver->join_date = $driverRequest->join_date;
        $driver->address = $driverRequest->address;
        $driver->manager = $driverRequest->manager;

        if ($driverRequest->hasFile('image')) {
            $filenameWithExt = $driverRequest->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $driverRequest->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $driverRequest->file('image')->storeAs('public', $fileNameToStore);
            $driver->driver_image = $fileNameToStore;
        }

        $driver->save();
        Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('driver');
    }

    public function driverRestore(DriverRequest $driverRequest)
    {
        $id = $driverRequest->id ? $driverRequest->id : '';
        $driver = Driver::updateOrCreate(array('id' => $id));
        $driver->id = $driverRequest->id;
        $driver->name = $driverRequest->name;
        $driver->code = $driverRequest->code;

        $driver->join_date = $driverRequest->join_date;
        $driver->address = $driverRequest->address;
        $driver->manager = $driverRequest->manager;

        if ($driverRequest->hasFile('image')) {
            $filenameWithExt = $driverRequest->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $driverRequest->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $driverRequest->file('image')->storeAs('public', $fileNameToStore);
            $driver->driver_image = $fileNameToStore;
        }

        $driver->save();
        Session::flash('alert-success', 'Data Stored Successfully');
        return redirect('driver');
    }

    public function updateDriver(Request $request)
    {
        //$data['departments'] = DB::table('department')->pluck('department_name', 'id');
        $data['driver'] = Driver::find($request->driver_id);
        return view('pages.add_driver', $data);
    }

    public function deleteDriver(Request $request)
    {
        try {
            $driver = Driver::find($request->driver_id);
            $driver->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('driver');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DrDF:101');
            return redirect('driver');

        }
    }
}
