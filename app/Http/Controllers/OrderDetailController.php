<?php

namespace App\Http\Controllers;

use App\Order_Detail;
use Illuminate\Http\Request;
use Validator;
use App\Order;
use DB;
class OrderDetailController extends Controller
{
    public function getAll()
    {
        // $user = auth()->user();

        $Order_Detail = Order_Detail::get();

        return response()->json(['message' => 'Order_Detail retrievd successfully','data' => $Order_Detail],200);
        // return $this->sendResponse($Order_Detail->toArray(), 'Order_Detail retrieved successfully.');
    }
    public function index($order_id)
    {
        // $user = auth()->user();

        $orderName = Order::where('id',$order_id)->first();
         // $supplier = Supplier::where('id',$suppliers_id)->first();
         $Order_Details = DB::table('order__details')
                         ->join('orders','orders.id','=', 'order__details.orders_id')
                         ->join('products','order__details.products_id','=','products.id')
                         ->where('order__details.orders_id', $order_id)
                         // ->where('supplier__products.id',2)
                         ->select('products.name as product','products.description','products.quantity','orders.order_number','orders.created_at')
                         // ->select('supplier__products.*','products.*')
                         ->orderBy('orders.created_at','desc')
                         ->get();


        return response()->json(['message' => 'Order_Detail retrievd successfully','data' => $Order_Details, 'orderName'=> $orderName],200);
        // return $this->sendResponse($Order_Detail->toArray(), 'Order_Detail retrieved successfully.');
    }
    public function show($order_id,$id)
    {
        // $user = auth()->user();

        $Order_Detail = Order_Detail::where('orders_id',$order_id)->where('products_id',$id)->get();
        // dd($Order_Detail);

        return response()->json(['message' => 'Order_Detail retrievd successfully','data' => $Order_Detail],200);
        // return $this->sendResponse($Order_Detail->toArray(), 'Order_Detail retrieved successfully.');
    }
    public function create(Request $request,$order_id){
        // $user = auth()->user();
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'order_id' => 'required',
            'products_id' => 'required',

        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
        if (count(Order_Detail::where('orders_id',$order_id)->where('products_id',$request->products_id)->get()) != null) {
            return response()->json(["message" => "Order_Detail already existing."], 403);
        }

        $Order_Detail = new Order_Detail;
        $Order_Detail->orders_id = $order_id;
        $Order_Detail->products_id = $request->products_id;
        $Order_Detail->save();

        return response()->json(["message" => "Order_Detail record created successfully"], 200);
    }
   
   public function edit(Request $request,$order_id,$id) {
           

       $input = $request->all();
        $validator = Validator::make($input, [
            // 'name' => 'required',
            // 'order_id' => 'required',
            'products_id' => 'required',    
           ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
         // if(auth()->user())
         
            // {
               // if (Order_Detail::where('id', $request->products_id)->exists())
               //  {
                $Order_Detail = Order_Detail::where('id', $id)->find($id);
                $Order_Detail->orders_id = $order_id;
                $Order_Detail->products_id = $input['products_id'];
                $Order_Detail->save();
                return response()->json([ "message" => "Order_Detail updated successfully", 'data'=>$Order_Detail], 200); 
                 // }
        
            // else{
            //      return response()->json(["message" => "Order_Detail not found"], 404);
        //     //     }
        // }
        //   else{
            
        //     // return response()->json(["message" => " Unauthorized "], 401);
        // }
    }



    public function destroy($order_id,$id)
    {
        // $user=auth()->user();
        $Order_Detail = Order_Detail::where('orders_id',$order_id)->where('products_id',$id)->get();
        // dd($Order_Detail);
        if (count($Order_Detail) == null) {
            return response()->json(['Message' => 'Order_Detail not found.'],404);
        }
        else{

             // if(auth()->user())
                // {
                    $Order_Detail = Order_Detail::where('orders_id',$order_id)->where('products_id',$id)->delete();
                    return response()->json(['Message' => 'Order_Details deleted successfully.'],200);

     
            //     }
            // else
            // {
                // return response()->json(["message" => "Unauthorized"], 401);

            // }
        }
    }
       
}
