<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

// use Illuminate\Http\Request;
// use App\Products;
// use App\Comments;
use App\User;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $Product = Product::get();

        // return response()->json( $Product,200);
        return response()->json(["message" => "Product record created successfully",'data'=>$Product], 200);
    }
    public function create(Request $request){
    $user = auth()->user();
     $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->save();

        return response()->json(["message" => "Product record created successfully"], 200);
    }
   
   public function edit(Request $request,$id) {
           

       $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required',
        ]);
        if ($validator->fails())
          {
            return response()->json(['Validation Error.'=> $validator->errors()],400);
        }
         if(auth()->user())
         
            {
               if (Product::where('id', $id)->exists())
                {
                $Product = Product::where('id', $id)->find($id);
                $Product->name = $input['name'];
                $Product->description = $input['description'];
                $Product->quantity = $input['quantity'];
                $Product->save();
                return response()->json([ "message" => "Product updated successfully", 'date'=>$Product], 200); 
                 }
        
            else{
                 return response()->json(["message" => "Product not found"], 404);
                }
        }
          else{
            // 
            return response()->json(["message" => " Unauthorized "], 401);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $Product = Product::find($id);


        if (is_null($Product)) {
            return response()->json(["message" => "Product not found"], 404);
        }
         $One_Product = Product::where('id',$id)->get();

       return response()->json($One_Product, 200); 
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
        $user=auth()->user();
        $Product = Product::find($id);

        if (is_null($Product)) {
            return response()->json(['Message' => 'Product not found.'],404);
        }
        else{

             if(auth()->user())
                {
                    $Product = Product::where('id', $id)->delete();
                    return response()->json(['Message' => 'Products deleted successfully.'],200);

     
                }
            else
            {
                return response()->json(["message" => "Unauthorized"], 401);

            }
        }
       

    }
}
