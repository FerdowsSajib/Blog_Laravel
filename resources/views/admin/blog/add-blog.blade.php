@extends('admin.master')

@section('admin-title')
    Add Blog | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-11 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Blog</li>
        </ol>
    </div>

    <div class="col-sm-9 m-auto">
        <h2 class="text-primary text-center">ADD BLOG INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>
        <form action="{{ route('add-new-blog') }}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" name="blog_title" class="form-control" id="blogName">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Blog Short Description</label>
                <div class="col-sm-9">
                    <textarea name="blog_short_description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Blog Long Description</label>
                <div class="col-sm-9">
                    <textarea id="editor" name="blog_long_description" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="blogImage" class="col-sm-3 col-form-label">Blog Image</label>
                <div class="col-sm-9">
                    <input type="file" name="blog_image" id="blogImage" accept="image/*">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Publication Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <label><input type="radio" name="publication_status" class="form-check-input" value="1"> Published</label>
                        <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="btn" class="btn btn-block btn-danger" value="Add Blog Info">
                </div>
            </div>
        </form>
    </div>
@endsection