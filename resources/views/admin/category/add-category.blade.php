@extends('admin.master')

@section('admin-title')
    Add Category | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-12 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>
    </div>

    <div class="col-sm-9 m-auto">
        <h2 class="text-primary text-center">ADD CATEGORY INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>

        <form action="{{ route('add-new-category') }}" method="POST">
            @csrf
            <div class="form-group row">
                <label for="categoryName" class="col-sm-3 col-form-label">Category Name</label>
                <div class="col-sm-9">
                    <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Category Title">
                    <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="categoryDescription" class="col-sm-3 col-form-label">Category Description</label>
                <div class="col-sm-9">
                    <textarea name="category_description" class="form-control"></textarea>
                    <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-form-label col-sm-3">Publication Status</label>
                <div class="col-sm-9">
                    <div class="form-check">
                        <label><input type="radio" name="publication_status" class="form-check-input" value="1"> Published</label>
                        <label><input type="radio" name="publication_status" value="0"> Unpublished</label>
                        <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : '' }}</span>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <input type="submit" name="btn" class="btn btn-block btn-danger" value="Add Category Info">
                </div>
            </div>
        </form>
    </div>
@endsection