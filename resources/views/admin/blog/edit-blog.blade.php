@extends('admin.master')

@section('admin-title')
    Edit Blog | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-11 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('manage-blog') }}">Manage Blog</a>
            </li>
            <li class="breadcrumb-item active">Edit Blog</li>
        </ol>
    </div>

    <div class="col-sm-9 m-auto">
        <h2 class="text-primary text-center">EDIT BLOG INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
        <form action="{{ route('update-blog') }}" method="POST" enctype="multipart/form-data" name="categoryBlogForm">
            @csrf
            <div class="form-group row">
                <label for="categoryName" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="blogName" class="col-sm-3 col-form-label">Blog Title</label>
                <div class="col-sm-9">
                    <input type="text" name="blog_title" value="{{ $blog->blog_title }}" class="form-control" id="blogName">
                    <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Blog Short Description</label>
                <div class="col-sm-9">
                    <textarea name="blog_short_description" class="form-control">
                        {{ $blog->blog_short_description }}
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Blog Long Description</label>
                <div class="col-sm-9">
                    <textarea id="editor" name="blog_long_description" class="form-control">
                        {{ $blog->blog_long_description }}
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="blogImage" class="col-sm-3 col-form-label">Blog Image</label>
                <div class="col-sm-9">
                    <input type="file" name="blog_image" id="blogImage" accept="image/*">
                    <br/>
                    <img src="{{ asset($blog->blog_image) }}" height="100" width="120" class="mt-2">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Publication Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <label><input type="radio" {{ $blog->publication_status == 1 ? 'checked' : ''}} name="publication_status" class="form-check-input" value="1"> Published</label>
                        <label><input type="radio" {{ $blog->publication_status == 0 ? 'checked' : ''}} name="publication_status" value="0"> Unpublished</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="btn" class="btn btn-block btn-danger" value="Update Blog Info">
                </div>
            </div>
        </form>
    </div>
    <script>
        document.forms['categoryBlogForm'].elements['category_id'].value = '{{ $blog->category_id }}';
    </script>
@endsection