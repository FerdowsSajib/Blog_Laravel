<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('/') }}">BLOG</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('category-blog',['id' => $category->id, 'name' => $category->category_name]) }}">{{ $category->category_name }}</a>
                </li>
                @endforeach

                @if(Session::get('visitorId'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" title="Logout" href="">
                            {{ Session::get('visitorName') }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="" onclick="
                                event.preventDefault();
                                document.getElementById('visitorLogoutForm').submit();
                            "><i class="fas fa-user-times"></i> Logout</a></li>
                        </ul>
                        <form id="visitorLogoutForm" action="{{ route('visitor-logout') }}" method="POST">
                            @csrf
                        </form>
                    </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('visitor-login') }}" title="Login"><i class="fas fa-user-lock"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('visitor-sign-up') }}" title="Sign Up"><i class="fas fa-user-plus"></i></a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>