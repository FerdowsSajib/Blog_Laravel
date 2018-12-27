<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected function checkCategoryData($request)
    {
        $this->validate($request, [
            'category_name'         =>  'required | regex: /(^([a-zA-Z _-]+)(\d+)?$)/u | max:20 | min:3',
            'category_description'  =>  'required | min:10 | max:80',
            'publication_status'    =>  'required'
        ]);
    }

    public function addCategory()
    {
        return view('admin.category.add-category');
    }

    public function addNewCategory(Request $request)
    {
        $this->checkCategoryData($request);

        Category::addNewCategoryInfo($request);
        return redirect('/category/add-category')->with('message', 'Add new category info successfully');
    }

    public function manageCategory()
    {
        $categories = Category::all();
        return view('admin.category.manage-category', [
            'categories'    =>  $categories
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit-category', [
            'category' =>  $category
        ]);
    }

    public function updateCategory(Request $request)
    {
        Category::updateCategoryInfo($request);
        return redirect('/category/manage-category')->with('message', 'Category info update successfully');
    }

    public function deleteCategory(Request $request)
    {
        $blog = Blog::where('category_id', $request->id)->first();

        if ($blog) {
            return redirect('/category/manage-category')->with('message','Sorry! this category have some blogs');
        } else {
            $category = Category::find($request->id);
            $category->delete();
            return redirect('/category/manage-category')->with('message','Category info delete successfully');
        }

    }


}
