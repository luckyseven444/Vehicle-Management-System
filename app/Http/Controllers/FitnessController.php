<?php

namespace App\Http\Controllers;
use App\Fitness;
use App\Http\Requests\FitnessRequest;
use Illuminate\Http\Request;
use DB;
use App\AddVehicle;
use Illuminate\Support\Facades\Session;

class FitnessController extends Controller
{

    public  function  index()
    {
        $data['fitness'] = Fitness::with('vehicle')->paginate(10);
        return view('pages.manage_fitness',$data);
    }


    public  function addFitness()
    {
        $vehicles = DB::table('add_vehicles')->pluck('registration_no', 'id');
        $data['fitness'] = null ;
        $data['vehicle'] = $vehicles;
        return view('pages.add_fitness',$data);

    }


    public function storeFitness(FitnessRequest $rquest)
    {

            $id = $rquest->id ? $rquest->id : '';
            $fitness = Fitness::findOrNew($id);
            $fitness->vehicle_number = $rquest->vehicle_number;
            $fitness->last_fitness_check = $rquest->last_fitness_check;
            $fitness->next_fitness_check = $rquest->next_fitness_check;
            $fitness->fitness_description = $rquest->fitness_description;
            $fitness->status = $rquest->status;

            if ($rquest->hasFile('fitness_certificate')) {
                $filenameWithExt = $rquest->file('fitness_certificate')->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $rquest->file('fitness_certificate')->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extension;
                $rquest->file('fitness_certificate')->storeAs('public/upload', $fileNameToStore);
                $fitness->fitness_certificate = $fileNameToStore;
            }
            $fitness->save();
            Session::flash('alert-success', 'Data Stored Successfully');
            return redirect('fitness');


    }

    public  function inactiveFitness($id)
    {
        $fitness = Fitness::find($id);
        $fitness->status = 0;
        $fitness->save();
        return redirect('fitness');
    }

    public function activeFitness($id)
    {
        $fitness = Fitness::find($id);
        $fitness->status = 1;
        $fitness->save();
        return redirect('fitness');
    }

    public  function updateFitness(Request $request)
    {
        $data['vehicle'] = AddVehicle::pluck('registration_no', 'id');
        $data['fitness'] = Fitness::find($request->fitness_id);
        return view('pages.add_fitness',$data);

    }

    public function deleteFitness(Request $request)
    {
        try {
            $fitness = Fitness::find($request->fitness_id);
            $fitness->delete();
            Session::flash('alert-danger', 'Deleted Successfully');
            return redirect('fitness');
        } catch (\Exception $e) {
            Session::flash('alert-danger', 'Something Wrong Error: DDF:101');
            return redirect('fitness');

        }
    }




}
