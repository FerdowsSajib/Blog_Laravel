@extends('admin.master')

@section('admin-title')
    Manage Category | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-12 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Category</li>
        </ol>
    </div>

    <div class="col-sm-11 m-auto">
        <h2 class="text-primary text-center">MANAGE CATEGORY INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>SL No</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @php($i = 0)
                @foreach($categories as $category)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $category->category_name }}</td>
                    <td>{{ $category->category_description }}</td>
                    <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        <a href="{{ route('edit-category',['id' => $category->id]) }}" class="text-success mr-2" title="Edit"><i class="fas fa-user-edit"></i></a>
                        <a href="" class="text-danger" title="Delete" onclick="
                            event.preventDefault();
                            var check = confirm('Are you sure to delete?');
                            if (check) {
                                document.getElementById('deleteCategoryForm'+'{{ $category->id }}').submit();
                            }
                        "><i class="fas fa-trash"></i></a>

                        <form id="deleteCategoryForm{{ $category->id }}" action="{{ route('delete-category') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $category->id }}" name="id">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection