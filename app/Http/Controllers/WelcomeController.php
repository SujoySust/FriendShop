<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class WelcomeController extends Controller
{
    public function index(){
        $publishedProducts=products::where('publicationStatus',1)->get();
        return view('fontEnd.home.homeContent',['publishedProducts'=>$publishedProducts]);
    }
    public function category($id){

        $publishedCategoryproduct=products::where('categoryId',$id)
                                ->where('publicationStatus',1)
                                ->get();

    	return view('fontEnd.category.categoryContent',['publishedCategoryproduct'=>$publishedCategoryproduct]);
    }

    public function contract()
    {
    	return view('fontEnd.contract.contractContent');
    }
    public function productdetails($id)
    {
        $productById=products::where('id',$id)->first();

    	return view('fontEnd.productdetails.productDetails',['productById'=>$productById]);
    }
}
