@extends('admin.master')

@section('admin-title')
    Edit Category | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-11 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('manage-category') }}">Manage Category</a>
            </li>
            <li class="breadcrumb-item active">Edit Category</li>
        </ol>
    </div>

    <div class="col-sm-9 m-auto">
        <h2 class="text-primary text-center">EDIT CATEGORY INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>

        <form action="{{ route('update-category') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="categoryName" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control" id="categoryName" placeholder="Category Title">
                    <input type="hidden" value="{{ $category->id }}" name="id" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <label for="categoryDescription" class="col-sm-3 col-form-label">Category Description</label>
                <div class="col-sm-9">
                    <textarea name="category_description" class="form-control">
                        {{ $category->category_description }}
                    </textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Publication Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <label><input type="radio" {{ $category->publication_status == 1 ? 'checked' : '' }} name="publication_status" class="form-check-input" value="1"> Published</label>
                        <label><input type="radio" {{ $category->publication_status == 0 ? 'checked' : '' }} name="publication_status" value="0"> Unpublished</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="btn" class="btn btn-block btn-danger" value="Update Category Info">
                </div>
            </div>
        </form>
    </div>
@endsection