<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manufacturer;

use DB;

class ManufactureController extends Controller
{
    public function createManufacture()
    {
    	return view('admin.manufacture.createManufacture');
    }

    public function storeManufacture(Request $request){

           DB::table('manufacturers')->insert([
            'manufacturerName'=>$request->manufacturerName,
            'manufacturerDescription'=>$request->manufacturerDescription,
            'publicationStatus'=>$request->publicationStatus,           
          ]);
         // return redirect()->back();
          return redirect('/manufacture/add')->with('message','Category info Save Succeessfully');
    }

    public function manageManufacture()
    {
    	$manufacture = manufacturer::all();
    	return view('admin.manufacture.manageManufacture',['manufacture'=>$manufacture]);
    }

     public function editManufacture($id){

      $id=$id;  

      $manufacture =DB::table('manufacturers')->where('id','=',$id)->get();
      return view('admin.manufacture.editManufacture',['manufacture'=>$manufacture]);
    }

      public function updateManufacture(Request $request){
      
      DB::table('manufacturers')->where('id',$request->id)->update([
            'manufacturerName'=>$request->manufacturerName,
            'manufacturerDescription'=>$request->manufacturerDescription,
            'publicationStatus'=>$request->publicationStatus
      ]);

     return redirect('/manufacture/manage')->with('message','Manufacture info Updated Succeessfully');
    
    }


      public function deleteManufacture($id){
      
      DB::table('manufacturers')->where('id','=',$id)->delete();

     return redirect('/manufacture/manage')->with('message','Manufacture info Deleted Succeessfully');
    
    }
}
