<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Morocco;

class PaidController extends Controller
{
    //
    public function viewindex()
    {
        $morocco =Morocco::all();
        return view('menu.index',compact('morocco'));
        // viewpage morocco
    }
    public function add(Request $request)
    {
         // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            
        ]);

        // Create a new instance of your model and fill it with validated data
        $morocco = new Morocco(); // Replace morocco with the name of your model
        $morocco->name = $validatedData['name'];
        $morocco->location = $validatedData['location'];
        $morocco->dvs_vps = $request->input('DVS_VPS');
        $morocco->added_ips = $request->input('Added_ips');
        $morocco->price = $request->input('price');
        $morocco->status = $request->input('status');
        $morocco->due_date = $request->input('Due_Date');
        $morocco->remarks = $request->input('remarks'); // Remarks is optional, so set it to null if not provided

        // Save the model instance to the database
        $morocco->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Record added successfully.');
    
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
                $q->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhere('location', 'LIKE', '%' . $query . '%')
                    ->orWhere('DVS_VPS', 'LIKE', '%' . $query . '%')
                    ->orWhere('Added_ips', 'LIKE', '%' . $query . '%')
                    ->orWhere('price', 'LIKE', '%' . $query . '%')
                    ->orWhere('status', 'LIKE', '%' . $query . '%')
                    ->orWhere('Due_Date', 'LIKE', '%' . $query . '%')
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
       

        $validatedData = $request->validate([
            'name' => 'required|string',
            'location' => 'required|string',
            
        ]);
        $morocco = Morocco::find($id);
      

         $morocco->name = $validatedData['name'];
		$morocco->location = $validatedData['location'];
		$morocco->dvs_vps = $request->input('DVS_VPS');
		$morocco->added_ips = $request->input('Added_ips');
		$morocco->price = $request->input('price');
		$morocco->status = $request->input('status');
		$morocco->due_date = $request->input('Due_Date');
		$morocco->remarks = $request->input('remarks');
		   
 
        $res= $morocco->update();
         if($res){
             return redirect()->back()->with('success', 'Record updated successfully.');
         }
         return redirect()->back()->with('error', 'Failed to update the record.');
        
    }



}
