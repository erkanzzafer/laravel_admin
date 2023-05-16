<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
       $keyword=$request->get('search');
        $perPage= 5;

        if (!empty($keyword)){
            $categories=Category::where('name','LIKE',"%$keyword%")
                    ->latest()->paginate($perPage);
        }else{
            $categories=Category::latest()->paginate($perPage);
        }
        return view('category.index',['categories'=>$categories])->with('i',(request()->input('page',1)-1)*5);
        //return 'category';
    }


    public function create()
    {
       return view('category.create');
    }

    public function store(Request $request){
        $request->validate(
            [
                'name' => 'required'
            ]);

            $category              =  new Category();
            $category->name        =  $request->name;

            $category->save();
            return redirect()->route('category.index')->with('success','Category Added Successfully');
    }



    public function edit ($id){
        $category=Category::findOrFail($id);
        return view('category.edit',['category'=>$category]);

    }

    public function update (Request $request, Category $category){

        $request->validate(
            [
                'name' => 'required'
            ]);

            $category =Category::find($request->hidden_id);
            $category->name        =  $request->name;

            $category->save();
            return redirect()->route('category.index')->with('success','Category has been updated Successfully');
    }

}
