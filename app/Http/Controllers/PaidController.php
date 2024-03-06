<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Morocco;
use App\Models\India;


class PaidController extends Controller
{
    //
    public function viewindex()
    {
        $morocco =Morocco::all();
        return view('menu.index',compact('morocco'));
        // viewpage morocco
    }
    public function viewwelcome()
    {
        $India =India::all();
        return view('welcome',compact('India'));
        // viewpage morocco
    }
    public function add(Request $request)
    {
        // Validate the incoming request data
    
        // Create a new instance of your model and fill it with validated data
        $morocco = new Morocco();
        $morocco->provider = $request->input('provider');
        $morocco->number_servers = $request->input('number_servers');
        $morocco->VDS_VPS = $request->input('VDS_VPS');
        $morocco->price = $request->input('price');
        $morocco->date_payment = $request->input('date_payment') ? $request->input('date_payment') : now()->format('Y-m-d'); // Use input if provided, otherwise use current date
        $morocco->paid_by = $request->input('paid_by');
        $morocco->remarks = $request->input('remarks'); // Remarks is optional, so set it to null if not provided
    
        // Save the model instance to the database
      //  $morocco->save();

        $reslt= $morocco->save();
        if($reslt){
            return redirect()->back()->with('success', 'Record added successfully.');
        }
        return redirect()->back()->with('error', 'Record added failed.');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Retrieve all records if the query is empty
        if (empty($query)) {
            $morocco = Morocco::all();
        } else {
            // Perform the search using a single where clause
            $morocco = Morocco::where(function ($q) use ($query) {
                $q->where('provider', 'LIKE', '%' . $query . '%')
                    ->orWhere('price', 'LIKE', '%' . $query . '%')
                    ->orWhere('VDS_VPS', 'LIKE', '%' . $query . '%')
                    ->orWhere('date_payment', 'LIKE', '%' . $query . '%')
                    ->orWhere('paid_by', 'LIKE', '%' . $query . '%')
                    ->orWhere('remarks', 'LIKE', '%' . $query . '%');
            })->get();
        }
    
        // Return the view with search results and the query
        return view('menu.index', ['morocco' => $morocco, 'query' => $query]);
    }
    public function destroy($id)
    {
        $morocco = Morocco::find($id);
        
        if (!$morocco) {
            return redirect()->back()->with('error', 'Record not found.');
        }
        
        $morocco->delete();
        
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function update(Request $request, $id)
    {
       

        
        $morocco = Morocco::find($id);
      
        $morocco->provider = $request->input('provider');
        $morocco->number_servers = $request->input('number_servers');
        $morocco->VDS_VPS = $request->input('VDS_VPS');
        $morocco->price = $request->input('price');
        $morocco->date_payment = $request->input('date_payment');
        $morocco->paid_by = $request->input('paid_by');
        $morocco->remarks = $request->input('remarks');
		   
 
        $res= $morocco->update();
         if($res){
             return redirect()->back()->with('success', 'Record updated successfully.');
         }
         return redirect()->back()->with('error', 'Failed to update the record.');
        
    }
///////////////////////---------------india-------------------
    public function addind(Request $request)
    {
         // Validate the incoming request data
         $india = new India();
         $india->provider = $request->input('provider');
         $india->number_servers = $request->input('number_servers');
         $india->VDS_VPS = $request->input('VDS_VPS');
         $india->price = $request->input('price');
         $india->date_payment = $request->input('date_payment') ? $request->input('date_payment') : now()->format('Y-m-d'); // Use input if provided, otherwise use current date
         $india->paid_by = $request->input('paid_by');
         $india->remarks = $request->input('remarks'); // Remarks is optional, so set it to null if not provided
     
         // Save the model instance to the database
       //  $india->save();
 
         $reslt= $india->save();
         if($reslt){
             return redirect()->back()->with('success', 'Record added successfully.');
         }
         return redirect()->back()->with('error', 'Record added failed.');
    
    }
    public function searchind(Request $request)
    {
        $query = $request->input('query');

        // Retrieve all records if the query is empty
        if (empty($query)) {
            $india = India::all();
        } else {
            // Perform the search using a single where clause
            $india = India::where(function ($q) use ($query) {
                $q->where('provider', 'LIKE', '%' . $query . '%')
                    ->orWhere('price', 'LIKE', '%' . $query . '%')
                    ->orWhere('VDS_VPS', 'LIKE', '%' . $query . '%')
                    ->orWhere('date_payment', 'LIKE', '%' . $query . '%')
                    ->orWhere('paid_by', 'LIKE', '%' . $query . '%')
                    ->orWhere('remarks', 'LIKE', '%' . $query . '%');
            })->get();
        }
    
        // Return the view with search results and the query
        return view('menu.index', ['india' => $india, 'query' => $query]);
    }
    public function destroyind($id)
    {
        $india = India::find($id);
        
        if (!$india) {
            return redirect()->back()->with('error', 'Record not found.');
        }
        
        $india->delete();
        
        return redirect()->back()->with('success', 'Record deleted successfully.');
    }
    public function updateind(Request $request, $id)
    {
       

        $india = India::find($id);
      
        $india->provider = $request->input('provider');
        $india->number_servers = $request->input('number_servers');
        $india->VDS_VPS = $request->input('VDS_VPS');
        $india->price = $request->input('price');
        $india->date_payment = $request->input('date_payment');
        $india->paid_by = $request->input('paid_by');
        $india->remarks = $request->input('remarks');
		   
 
        $res= $india->update();
         if($res){
             return redirect()->back()->with('success', 'Record updated successfully.');
         }
         return redirect()->back()->with('error', 'Failed to update the record.');
        
        
    }



}
