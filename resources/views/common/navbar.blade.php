<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="/">Ecommerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/home">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    @php
                        $cats = \App\Models\Category::orderBy('created_at', 'ASC')->take(10)->get();
                    @endphp
                    @foreach($cats as $cat)
                    <a class="dropdown-item" href="/categories/{{$cat->id}}">{{$cat->name}}</a>
                    @endforeach
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/categories">See More</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/recommendations">Recommendations</a>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <form action="/search" method="post">
                @csrf
                <li class="form-inline">
                    <input type="text" class="form-control" name="search">
                    <button class="btn btn-success  ml-2">
                        <li class="fa fa-search"></li>
                        Search
                    </button>
                </li>
            </form>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                @if(\Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{\Auth::user()->firstname}}
                        {{\Auth::user()->lastname}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="/profile">Profile</a>
                        <a class="dropdown-item" href="/shopping-cart">My Cart</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Logout</a>
                    </div>
                </li>
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                @endif
                    </li>
        </ul>
    </div>
</nav>
