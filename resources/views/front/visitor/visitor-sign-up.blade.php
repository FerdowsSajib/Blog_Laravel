@extends('front.master')

@section('front-title')
    Visitor-Sign-Up | Blog
@endsection

@section('front-body')
    <div class="container">

        <div class="row">
            <!-- Post Content Column -->
            <div class="col-lg-8">
                <h2 class="my-3 text-center text-info">SIGN UP</h2>
                <hr/>

                <form action="{{ route('add-new-visitor') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Full Name</label>
                        <div class="col-md-10">
                            <input type="text" name="visitor_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Email</label>
                        <div class="col-md-10">
                            <input type="email" name="visitor_email" class="form-control" onblur="emailCheck(this.value);">
                            <span id="result" class="text-info"></span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Phone</label>
                        <div class="col-md-10">
                            <input type="text" name="visitor_phone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Password</label>
                        <div class="col-md-10">
                            <input type="password" name="visitor_password" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2">Address</label>
                        <div class="col-md-10">
                            <textarea name="visitor_address" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-form-label col-md-2"></label>
                        <div class="col-md-10">
                            <input type="submit" id="signUpBtn" name="btn" class="btn btn-block btn-success" value="Sign Up">
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
    <script>
        function emailCheck(email) {
            $.ajax({
                url : 'http://localhost:8383/blog/public/email-check/'+email,
                method : 'GET',
                data : {email:email},
                dataType : 'JSON',
                success : function (result) {
                    document.getElementById('result').innerHTML = result;
                    if (result == 'Opps!! email address is already exist') {
                        document.getElementById('signUpBtn').disabled = true;
                    } else {
                        document.getElementById('signUpBtn').disabled = false;
                    }
                }

            })

            /*
            var xmlHttp    = new XMLHttpRequest();
            var serverPage = 'http://localhost:8383/blog/public/email-check/'+email;
            xmlHttp.open('GET', serverPage);
            xmlHttp.onreadystatechange = function () {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('result').innerHTML = xmlHttp.responseText;
                    if (xmlHttp.responseText == 'Opps!! email address is already exist') {
                        document.getElementById('signUpBtn').disabled = true;
                    } else {
                        document.getElementById('signUpBtn').disabled = false;
                    }
                }
            }
            xmlHttp.send();
            */
        }
    </script>
@endsection