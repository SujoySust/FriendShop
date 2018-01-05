<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\manufacturer;
use App\products;
use DB;

class productController extends Controller
{
    public function createProduct()
    {
    	$categories =Category::where('publicationStatus',1)->get(); 
    	$manufacturer =manufacturer::where('publicationStatus',1)->get();
    	return view('admin.product.createProduct',['categories'=>$categories,'manufacturer'=>$manufacturer]);
    }

    public function storeProduct(Request $request)
    {
    	$this->validate($request,[
              
           'productName'=>'required',
           'productPrice'=>'required',
           'productImage'=>'required',

    	]);

    	$productImage=$request->file('productImage');
    	$imageName = $productImage->getClientOriginalName(); 
    	$uploadPath ='public/productImage/';
    	$productImage->move($uploadPath,$imageName);
    	$imageUrl =$uploadPath.$imageName;
    	DB::table('products')->insert([

        'productName'=>$request->productName,
        'categoryId'=>$request->categoryId,
        'manufactureId'=>$request->manufactureId,
        'productPrice'=>$request->productPrice,
        'productQuantity'=>$request->productQuantity,
        'productShortDescription'=>$request->productShortDescription,
        'productLongDescription'=>$request->productLongDescription,
        'productImage'=>$imageUrl,
        'publicationStatus'=>$request->publicationStatus,
    	]);

    	return redirect('/product/add')->with('message','Product Save Succeessfully');
    }

    public function manageProduct()
    {
        $products=DB::table('products')
               ->join('categories','products.categoryId','=','categories.id') 
               ->join('manufacturers','products.manufactureId','=','manufacturers.id')
               ->select('products.*','categories.name','manufacturers.manufacturerName')
               ->get();

    	return view('admin.product.manageProduct',['products'=>$products]);
    }

    public function viewProduct($id)
    {
    	 $product=DB::table('products')
               ->join('categories','products.categoryId','=','categories.id') 
               ->join('manufacturers','products.manufactureId','=','manufacturers.id')
               ->select('products.*','categories.name','manufacturers.manufacturerName')
               ->where('products.id',$id)
               ->first();

    	return view('admin.product.viewProduct',['product'=>$product]);
    }

    public function editProduct($id)
    {
      $products=DB::table('products')
               ->join('categories','products.categoryId','=','categories.id') 
               ->join('manufacturers','products.manufactureId','=','manufacturers.id')
               ->select('products.*','categories.name','manufacturers.manufacturerName')
               ->where('products.id',$id)
               ->first();
      $categories =Category::where('publicationStatus',1)->get(); 
      $manufacturer =manufacturer::where('publicationStatus',1)->get();         
      return view('admin.product.editProduct',['products'=>$products,'categories'=>$categories,'manufacturer'=>$manufacturer]);
    }

    public function updateProduct(Request $request)
    {
      
        $imageUrl = $this->imageExistsStutus($request);

        DB::table('products')->where('id',$request->id)->update([
            'productName'=>$request->productName,
            'categoryId'=>$request->categoryId,
            'manufactureId'=>$request->manufactureId,
            'productPrice'=>$request->productPrice,
            'productQuantity'=>$request->productQuantity,
            'productShortDescription'=>$request->productShortDescription,
            'productLongDescription'=>$request->productLongDescription,
            'productImage'=>$imageUrl,
            'publicationStatus'=>$request->publicationStatus
      ]);

     return redirect('/product/manage')->with('message','Product info Update Succeessfully');
    }

    private function imageExistsStutus($request){
      $productById=products::where('id',$request->id)->first();
      $productImage=$request->file('productImage');
      if($productImage){
      $oldImageUrl = $productById->productImage;
      unlink($oldImageUrl);
      $imageName = $productImage->getClientOriginalName(); 
      $uploadPath ='public/productImage/';
      $productImage->move($uploadPath,$imageName);
      $imageUrl =$uploadPath.$imageName;
      
    }
    else{
          
          $imageUrl=$productById->productImage;
    }

    return $imageUrl;

    }
}