<?php
    use App\Constants\UserTypes;
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SeoEra</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
<body bg-color="blue">        
         
    <div class="sidebar-container">
    <div class="sidebar-logo">
        Project Name
    </div>
            
    <ul class="sidebar-navigation"> 
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{\LaravelLocalization::localizeURL(route('admin.users.index'))}}" style="color:black" rel="alternate" >
                Admins
            </a>
            <a class="dropdown-item" href="{{\LaravelLocalization::localizeURL(route('admin.normals.index'))}}" style="color:black" rel="alternate" >
                Normals
            </a>     
        </ul>
    </li>
    <li>
      <a href="#">
         Products
      </a>
    </li>

    <li>
      <a href="#">
         Languages
      </a>
    </li>

    <li>
      <a href="{{\LaravelLocalization::localizeURL(route('admin.logout'))}}">
         Logout
      </a>
    </li>

    </ul>
    </div>

    <div class="content-container">
        <main class="py-4">
            @yield('content')
        </main>   
    </div>
       
        
    <script>
        


    </script>
    @yield('scripts')

</body>
</html>
