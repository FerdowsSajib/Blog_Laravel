@extends('admin.master')

@section('admin-title')
    Manage Comments | Admin-Blog
@endsection

@section('admin-body')
    <div class="col-sm-12 m-auto">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('home') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Comments</li>
        </ol>
    </div>

    <div class="col-sm-11 m-auto">
        <h2 class="text-primary text-center">MANAGE COMMENTS INFO</h2>
        <hr/>
        <br/>

        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr class="text-center">
                <th>SL No</th>
                <th>Visitor</th>
                <th>Blog Title</th>
                <th>Comment</th>
                <th>Publication Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @php($i = 0)
            @foreach($comments as $comment)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $comment->visitor_name }}</td>
                    <td>{{ $comment->blog_title }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                    <td>
                        @if($comment->publication_status == 1)
                            <a href="{{ route('unpublished-comment',['id' =>$comment->id ]) }}">Unpublished</a>
                        @else
                            <a href="{{ route('published-comment',['id' =>$comment->id ]) }}">Published</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection