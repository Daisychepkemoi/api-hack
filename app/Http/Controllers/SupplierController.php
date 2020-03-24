<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Validator;
use App\User;


class SupplierController extends Controller
{
     public function index()
    {
        // $user = auth()->user();

        $Supplier = Supplier::get();

        return response()->json(['message' => 'Supplier retrievd successfully','data' => $Supplier],200);
        // return $this->sendResponse($Supplier->toArray(), 'Supplier retrieved successfully.');
    }
    public function create(Request $request){
        // $user = auth()->user();
     $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            // 'users_id' => 'required'
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
        $Supplier = new Supplier;
        $Supplier->name = $request->name;
        $Supplier->save();

        return response()->json(["message" => "Supplier record created successfully"], 200);
    }
   
   public function edit(Request $request,$id) {
           

       $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
         // if(auth()->user())
         
            // {
               if (Supplier::where('id', $id)->exists())
                {
                $Supplier = Supplier::where('id', $id)->find($id);
                $Supplier->name = $input['name'];
                $Supplier->save();
                return response()->json([ "message" => "Supplier updated successfully", 'date'=>$Supplier], 200); 
                 }
        
            else{
                 return response()->json(["message" => "Supplier not found"], 404);
                }
        // }
          // else{
            
            // return response()->json(["message" => " Unauthorized "], 401);
        // }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = auth()->user();
        $Supplier = Supplier::find($id);


        if (is_null($Supplier)) {
            return response()->json(["message" => "Supplier not found"], 404);
        }
         $One_Supplier = Supplier::where('id',$id)->get();

       return response()->json(["message" => "Supplier retrieved successfully", 'data' => $One_Supplier, ], 200); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $user=auth()->user();
        $Supplier = Supplier::find($id);

        if (is_null($Supplier)) {
            return response()->json(['Message' => 'Supplier not found.'],404);
        }
        else{

             // if(auth()->user())
                // {
                    $Supplier = Supplier::where('id', $id)->delete();
                    return response()->json(['Message' => 'Suppliers deleted successfully.'],200);

     
                // }
            // else
            // {
            //     // return response()->json(["message" => "Unauthorized"], 401);

            // }
        }
       
        //*check on it later*
}
}
