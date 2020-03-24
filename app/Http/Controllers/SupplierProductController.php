<?php

namespace App\Http\Controllers;

use App\Supplier_Product_Product;
use Illuminate\Http\Request;
use App\Supplier_Product;
use App\Supplier;
use Validator;
use DB;

class SupplierProductController extends Controller
{
     public function getAll()
    {
        // $user = auth()->user();

        // $Supplier_Product = Supplier_Product;
        $Supplier_Product = DB::table('supplier__products')->join('products','products.id','=', 'supplier__products.products_id')->select('products.*','supplier__products.suppliers_id')->where('supplier__products.products_id','products.id')->orderBy('updated_at','desc');
        // dd($farmerver);

        return response()->json(['message' => 'Supplier_Product retrieveed successfully','data' => $Supplier_Product],200);
        // return $this->sendResponse($Supplier_Product->toArray(), 'Supplier_Product retrieved successfully.');
    }
    public function index($suppliers_id)
    {
        // $user = auth()->user();

        $supplier = Supplier::where('id',$suppliers_id)->first();
         $Supplier_Product = DB::table('supplier__products')
                         ->join('suppliers','suppliers.id','=', 'supplier__products.suppliers_id')
                         ->join('products','supplier__products.products_id','=','products.id')
                         ->where('supplier__products.suppliers_id', $suppliers_id)
                         // ->where('supplier__products.id',2)
                         ->select('products.name as product','products.description','products.quantity','suppliers.name as supplier','supplier__products.suppliers_id')
                         // ->select('supplier__products.*','products.*')
                         ->orderBy('products.created_at','desc')
                         ->get();

            // dd($Supplier_Product);

    //      $records = DB::table('report_list')
    //                 ->join('users', 'report_list.user_id', '=', 'users.id')
    //                 ->where('report_list.site_name', '=', $site_name);
    //                 ->select('users.*', 'report_list.email_date','report_list.url','report_list.recipient')
    //                 ->get();
    // return view('monthlyReport')
    //        ->with(['records' => $records , 'site_name' => $site_name ]);

        return response()->json(['message' => 'Supplier_Product retrieveedd successfully','data' => $Supplier_Product,'supplier' => $supplier ],200);
        // return $this->sendResponse($Supplier_Product->toArray(), 'Supplier_Product retrieved successfully.');
    }
    public function show($suppliers_id,$id)
    {
        // $user = auth()->user();

        $Supplier_Product = Supplier_Product::where('suppliers_id',$suppliers_id)->where('products_id',$id)->get();
        // dd($Supplier_Product);

        return response()->json(['message' => 'Supplier_Product retrievd successfully','data' => $Supplier_Product],200);
        // return $this->sendResponse($Supplier_Product->toArray(), 'Supplier_Product retrieved successfully.');
    }
    public function create(Request $request,$suppliers_id){
        // $user = auth()->user();
        $input = $request->all();
        $validator = Validator::make($input, [
            // 'suppliers_id' => 'required',
            'products_id' => 'required',

        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
        if (count(Supplier_Product::where('suppliers_id',$suppliers_id)->where('products_id',$request->products_id)->get()) != null) {
            return response()->json(["message" => "Supplier_Product already existing."], 403);
        }

        $Supplier_Product = new Supplier_Product;
        $Supplier_Product->suppliers_id = $suppliers_id;
        $Supplier_Product->products_id = $request->products_id;
        $Supplier_Product->save();

        return response()->json(["message" => "Supplier_Product record created successfully"], 200);
    }
   
   public function edit(Request $request,$suppliers_id,$id) {
           

       $input = $request->all();
        $validator = Validator::make($input, [
            // 'name' => 'required',
            // 'suppliers_id' => 'required',
            'products_id' => 'required',    
           ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
         // if(auth()->user())
         
            // {
               if (Supplier_Product::where('id', $request->products_id)->exists())
                {
                $Supplier_Product = Supplier_Product::where('id', $id)->find($id);
                // $Supplier_Product->suppliers_id = $input['suppliers_id'];
                $Supplier_Product->products_id = $input['products_id'];
                $Supplier_Product->save();
                return response()->json([ "message" => "Supplier_Product updated successfully", 'data'=>$Supplier_Product], 200); 
                 }
        
            else{
                 return response()->json(["message" => "Supplier_Product not found"], 404);
                }
        // }
          // else{
            
            // return response()->json(["message" => " Unauthorized "], 401);
        // }
    }



    public function destroy($suppliers_id,$id)
    {
        // $user=auth()->user();
        $Supplier_Product = Supplier_Product::where('suppliers_id',$suppliers_id)->where('products_id',$id)->get();
        // dd($Supplier_Product);
        if (count($Supplier_Product) ==null) {
            return response()->json(['Message' => 'Supplier_Product not found.'],404);
        }
        else{

             // if(auth()->user())
                // {
                    $Supplier_Product = Supplier_Product::where('suppliers_id',$suppliers_id)->where('products_id',$id)->delete();
                    return response()->json(['Message' => 'Supplier_Products deleted successfully.'],200);

     
                }
            // else
            // {
                // return response()->json(["message" => "Unauthorized"], 401);

            // }
        // }
    }
       
}
