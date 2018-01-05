<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoryController extends Controller
{
    public function createCategory(){

    	return view('admin.category.createCategory');

        }

    public function storeCategory(Request $request){

        /* $category = new Category();
         $category->name = $request->categoryName;
         $category->categoryDescription = $request->categoryDescription;
         $category->publicationStatus = $request->publicationStatus;
         $category->save();

          return 'Category info save succesfully';*/

         /* Category::create($request->all());
          return 'Category info save successfully';*/


          DB::table('categories')->insert([
            'name'=>$request->categoryName,
            'categoryDescription'=>$request->categoryDescription,
            'publicationStatus'=>$request->publicationStatus,           
          ]);
         // return redirect()->back();
          return redirect('/category/add')->with('message','Category info Save Succeessfully');

    }    

    public function manageCategory(){

    	$categories = Category::all();

    	return view('admin.category.manageCategory',['categories'=>$categories]);
    }

    public function editCategory($id){

      $id=$id;  

      $categories =DB::table('categories')->where('id','=',$id)->get();
      return view('admin.category.editCategory',['categories'=>$categories]);
    }

      public function updateCategory(Request $request){
      
      DB::table('categories')->where('id',$request->id)->update([
            'name'=>$request->categoryName,
            'categoryDescription'=>$request->categoryDescription,
            'publicationStatus'=>$request->publicationStatus
      ]);

     return redirect('/category/manage')->with('message','Category info Update Succeessfully');
    
    }


      public function deleteCategory($id){
      
      DB::table('categories')->where('id','=',$id)->delete();

     return redirect('/category/manage')->with('message','Category info Deleted Succeessfully');
    
    }


  }
