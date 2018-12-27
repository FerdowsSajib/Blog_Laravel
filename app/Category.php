<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name', 'category_description', 'publication_status'
    ];

    public static function addNewCategoryInfo($request)
    {
        $category = new Category();
        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;
        $category->save();
    }

    public static function updateCategoryInfo($request)
    {
        $category = Category::find($request->id);

        $category->category_name        = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status   = $request->publication_status;

        if ($category->publication_status == '0') {
            $blogs = Blog::where('category_id', $request->id)
                            ->where('publication_status', 1)->get();
            foreach ($blogs as $blog) {
                $blog->publication_status = 2;
                $blog->save();
            }
        } elseif ($category->publication_status == '1') {
            $blogs = Blog::where('category_id', $request->id)
                ->where('publication_status', 2)->get();
            foreach ($blogs as $blog) {
                $blog->publication_status = 1;
                $blog->save();
            }

        }

        $category->save();
    }
}
