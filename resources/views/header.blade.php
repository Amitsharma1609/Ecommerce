<?php
use App\Http\Controllers\ProductController;
use App\Models\Product;
$product = Product::all();
// dd($product);
$total = 0;
if (auth()->user()) {
    $total = ProductController::cartitem();
}

?>
<nav class="navbar navbar-expand-sm bg-info navbar-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">My website</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">

            <ul class="navbar-nav">
                @cannot('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="/myorder">my order</a>
                    </li>
                @endcannot
                @can('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="/add">add-item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage-item">manage-item</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/mange">Orders</a>
                    </li>
                @endcan
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <form action="/cat" method="POST">
                            @csrf
                            <li><input name="category" type="submit" value="mobile" style="width: 100%"></li>
                            <li><input name="category" type="submit" value="Table" style="width: 100%"></li>
                            <li><input name="category" type="submit" value="Led Tv" style="width: 100%"></li>
                            <li><input name="category" type="submit" value="Washing Machine" style="width: 100%"></li>
                        </form>
                        </ul>
                </li>

                <form class="d-flex" action="/search" method="POST">
                    @csrf
                    <input class="form-control me-2 search" name="query" type="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </ul>
        </div>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @cannot('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="/cart-list">cart({{ $total }})</a>
                    </li>
                @endcannot
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>
    </div>
</nav>
