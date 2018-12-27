<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function addBlog()
    {
        $categories = Category::where('publication_status', 1)->get();
        return view('admin.blog.add-blog', [
            'categories'    =>  $categories
        ]);
    }

    public function addNewBlog(Request $request)
    {
        Blog::addNewBlogInfo($request);
        return redirect('/blog/add-blog')->with('message', 'Blog info add successfully');
    }

    public function manageBlog()
    {
        $blogs = DB::table('blogs')
            ->join('categories', 'blogs.category_id', '=' , 'categories.id')
            ->select('blogs.*', 'categories.category_name')
            ->orderBy('blogs.id', 'desc')
            ->get();
        return view('admin.blog.manage-blog',[
            'blogs'    =>  $blogs
        ]);
    }

    public function editBlog($id)
    {
        return view('admin.blog.edit-blog',[
            'categories'    =>  Category::where('publication_status', 1)->get(),
            'blog'          =>    Blog::find($id)
        ]);
    }

    public function updateBlog(Request $request)
    {
        Blog::updateBlogInfo($request);
        return redirect('/blog/manage-blog')->with('message', 'Blog info update successfully');
    }

    public function deleteBlog(Request $request)
    {
        $blog = Blog::find($request->id);

        if (file_exists($blog->blog_image)) {
            unlink($blog->blog_image);
        }

        $blog->delete();
        return redirect('/blog/manage-blog')->with('message', 'Blog info delete successfully');
    }
}
