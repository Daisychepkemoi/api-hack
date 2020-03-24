<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Validator;


class OrderController extends Controller
{
       public function index()
    {
        // $user = auth()->user();

        $Order = Order::get();

        return response()->json(['message' => 'Order retrievd successfully','data' => $Order],200);
        // return $this->sendResponse($Order->toArray(), 'Order retrieved successfully.');
    }
    public function create(Request $request){
    // $user = auth()->user();
     $input = $request->all();
        $validator = Validator::make($input, [
            // 'name' => 'required',
            // 'description' => 'required',
            'order_number' => 'required',
            // 'users_id' => 'required'
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
        $Order = new Order;
        $Order->order_number = $request->order_number;
        $Order->save();

        return response()->json(["message" => "Order record created successfully"], 200);
    }
   
   public function edit(Request $request,$id) {
           

       $input = $request->all();
        $validator = Validator::make($input, [
            // 'name' => 'required',
            // 'description' => 'required',
            'order_number' => 'required',
            // 'users_id' => 'required'
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
         // if(auth()->user())
         
            // {
               if (Order::where('id', $id)->exists())
                {
                $Order = Order::where('id', $id)->find($id);
                $Order->order_number = $input['order_number'];
                $Order->save();
                return response()->json([ "message" => "Order updated successfully", 'date'=>$Order], 200); 
                 }
        
            else{
                 return response()->json(["message" => "Order not found"], 404);
                }
        // }
        //   else{
            
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
        $Order = Order::find($id);


        if (is_null($Order)) {
            return response()->json(["message" => "Order not found"], 404);
        }
         $One_Order = Order::where('id',$id)->get();

       return response()->json(["message" => "Order retrievd successfully", 'data' => $One_Order, ], 200); 
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
        $Order = Order::find($id);

        if (is_null($Order)) {
            return response()->json(['Message' => 'Order not found.'],404);
        }
        else{

             // if(auth()->user())
                // {
                    $Order = Order::where('id', $id)->delete();
                    return response()->json(['Message' => 'Orders deleted successfully.'],200);

     
            //     // }
            // else
            // {
            //     return response()->json(["message" => "Unauthorized"], 401);

            // }
        }
       
        //*check on it later*

    }
}
