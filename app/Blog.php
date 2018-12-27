<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'category_id','blog_title','blog_short_description','blog_long_description','blog_image','publication_status'
    ];

    private static function uploadImage($blogImage)
    {
        $imageName = $blogImage->getClientOriginalName();
        $imageDir = './blog-image/';
        $blogImage->move($imageDir, $imageName);
        return $imageDir.$imageName;
    }

    public static function addNewBlogInfo($request)
    {
        $blogImage = $request->file('blog_image');

        $blog = new Blog();
        $blog->category_id              = $request->category_id;
        $blog->blog_title               = $request->blog_title;
        $blog->blog_short_description   = $request->blog_short_description;
        $blog->blog_long_description    = $request->blog_long_description;
        $blog->blog_image               = self::uploadImage($blogImage);
        $blog->publication_status       = $request->publication_status;
        $blog->save();
    }

    public static function updateBlogInfo($request)
    {
        $blog = self::find($request->id);
        $blogImage = $request->file('blog_image');
        if ($blogImage){
            unlink($blog->blog_image);
            $imageUrl = self::uploadImage($blogImage);
        }
        $blog->category_id              = $request->category_id;
        $blog->blog_title               = $request->blog_title;
        $blog->blog_short_description   = $request->blog_short_description;
        $blog->blog_long_description    = $request->blog_long_description;
        if (isset($imageUrl)) {
            $blog->blog_image = $imageUrl;
        }
        $blog->publication_status       = $request->publication_status;
        $blog->save();
    }
}
