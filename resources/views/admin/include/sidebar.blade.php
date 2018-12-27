<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" data-toggle="dropdown">
            <i class="fas fa-list-alt"></i>
            <span>Category Info</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('add-category') }}"><i class="fas fa-plus"></i> Add Category</a>
            <a class="dropdown-item" href="{{ route('manage-category') }}"><i class="far fa-edit"></i> Manage Category</a>
        </div>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" data-toggle="dropdown">
            <i class="fab fa-blogger"></i>
            <span>Blog Info</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('add-blog') }}"><i class="fas fa-plus"></i> Add Blog</a>
            <a class="dropdown-item" href="{{ route('manage-blog') }}"><i class="far fa-edit"></i> Manage Blog</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('manage-comment') }}">
            <i class="far fa-comments"></i>
            <span>Manage Comments</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
</ul>