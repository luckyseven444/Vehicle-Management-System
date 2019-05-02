<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocationController extends Controller
{
   public  function  index()
   {
       $data['locations'] = Location::paginate();
       return view('pages.manage_location',$data);

   }

   public  function addLocationFrom()
   {
       $data['location'] = null;
       return view('pages.add_location', $data);
   }

   public  function locationStore(LocationRequest $request)
   {

       try {
           $id = $request->id ? $request->id : '';
           $location = Location::findOrNew($id);
           $location->location = $request->location;
           $location->save();
           Session::flash('alert-success', 'Data Stored Successfully');
           return redirect('location');
       } catch (\Exception $e) {
           Session::flash('alert-danger', 'Something Wrong Error: RAF:101');
           return redirect('location');
       }
   }


   public function locationEdit(Request $request)
   {
       $data['location'] = Location::find($request->location_id);
       return view('pages.add_location', $data);
   }

   public  function locationDelete(Request $request)
   {

       try {
           $location = Location::find($request->location_id);
           $location->delete();
           Session::flash('alert-danger', 'Deleted Successfully');
           return redirect('location');
       } catch (\Exception $e) {
           Session::flash('alert-danger', 'Something Wrong Error: RDF:101');
           return redirect('location');

       }
   }








}
