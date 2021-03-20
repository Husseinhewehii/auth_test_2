<?php
    use App\Constants\UserTypes;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="#">Admin</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Language
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </ul>
                </li>        
                   
                
                @guest
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="{{route('admin.login')}}">Login</a></li>
                    </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Normal
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
                            <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                        </ul>
                     </li>
                @else
                    @if(auth()->user()->type == UserTypes::ADMIN)
                        <li class="nav-item"><a class="nav-link" href="{{\LaravelLocalization::localizeURL(route('admin.home.index'))}}">Dashboard</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="#">@greet({{strtok(auth()->user()->name, " ")}})</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{\LaravelLocalization::localizeURL(route('greet', ['user'=> auth()->user()]))}}">Greetings</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('logout')}}">Logout</a></li>
                    @endif
                @endguest
                
            </ul>
            </div>
        </div>
    </nav>