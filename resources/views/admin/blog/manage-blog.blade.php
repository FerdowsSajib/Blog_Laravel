@extends('admin.master')

@section('admin-title')
    Manage Blog | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-12 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Blog</li>
        </ol>
    </div>

    <div class="col-sm-11 m-auto">
        <h2 class="text-primary text-center">MANAGE BLOG INFO</h2>
        <hr/>
        <br/>
        <h4 class="text-center text-success">{{ Session::get('message') }}</h4>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>SL No</th>
                <th>Category Name</th>
                <th>Blog Title</th>
                <th>Blog Image</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 0)
            @foreach($blogs as $blog)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $blog->category_name }}</td>
                    <td>{{ $blog->blog_title }}</td>
                    <td><img src="{{ asset($blog->blog_image) }}" height="100" width="120"></td>
                    <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        <a href="{{ route('edit-blog', ['id' => $blog->id]) }}" class="text-success mr-2" title="Edit"><i class="fas fa-user-edit"></i></a>
                        <a href="" class="text-danger" title="Delete" onclick="
                                event.preventDefault();
                                var check = confirm('Are you sure to delete?');
                                if (check) {
                                document.getElementById('deleteBlogForm'+'{{ $blog->id }}').submit();
                                }
                                "><i class="fas fa-trash"></i></a>

                        <form id="deleteBlogForm{{ $blog->id }}" action="{{ route('delete-blog') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $blog->id }}" name="id">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection