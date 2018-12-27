@extends('front.master')

@section('front-title')
    Visitor-Login | Blog
@endsection

@section('front-body')
    <div class="container">

        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <h2 class="my-3 text-center text-info">Login</h2>
                <hr/>
                <h4 class="text-danger text-center">{{ Session::get('message') }}</h4>
                <form action="{{ route('visitor-login-check') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Email</label>
                        <div class="col-md-10">
                            <input type="email" name="visitor_email" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Password</label>
                        <div class="col-md-10">
                            <input type="password" name="visitor_password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <input type="submit" name="btn" class="btn btn-block btn-success" value="Sign Up">
                        </div>
                    </div>
                </form>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4 mt-4">

                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">Web Design</a>
                                    </li>
                                    <li>
                                        <a href="#">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#">Freebies</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#">Tutorials</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection