@extends('front.master')

@section('front-title')
    Home | Blog
@endsection

@section('front-body')


    <!-- Page Content -->
    <div class="container">
        <!-- Portfolio Section -->
        <h2>Popular Blog</h2>

        <div class="row">
            <div class="col-md-12 my-4">
                <div class="card-columns">
                    @foreach($popularBlogs as $popularBlog)
                        <div class="card h-100">
                            <img src="{{ asset($popularBlog->blog_image) }}" height="220" class="card-img-top" alt="{{ $popularBlog->blog_title }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $popularBlog->blog_title }}</h4>
                                <p class="card-text">{{ $popularBlog->blog_short_description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('blog-details',['id' => $popularBlog->id]) }}" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.row -->

        <h1 class="my-4 text-center text-info">Welcome to our blog homepage</h1>
        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-md-12 my-4">
                <div class="card-columns">
                    @foreach($blogs as $blog)
                    <div class="card h-100">
                        <img src="{{ asset($blog->blog_image) }}" height="220" class="card-img-top" alt="{{ $blog->blog_title }}">
                        <div class="card-body">
                            <h4 class="card-title">{{ $blog->blog_title }}</h4>
                            <p class="card-text">{{ $blog->blog_short_description }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('blog-details',['id' => $blog->id]) }}" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
@endsection

