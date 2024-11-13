<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Car selling Agency</title>

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <link rel="stylesheet" href="{{asset('custom.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>  
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.4.1.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    
    

  </head>
    
    <body style='background-color:#e9e9e9'>
    
    <!-- ***** Preloader Start ***** -->
    <!--<div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>-->
    
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">Car Selling<em> Serbia</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="/" class="active">Home</a></li>
                            <!--<li><a href="cars.html">Cars</a></li>-->
                            @auth
                            <li><a href="/cars/create">Create an offer</a></li>
                            <li><a href="cars.html">Welcome {{auth()->user()->username}}</a></li>
                            <li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id='dropdownMenuButton' role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item text-black" href="/users/showUserInfo/{{auth()->user()->user_id??false}}">Chech your profile</a>
                                  <!--<a class="dropdown-item text-black" href="/users/">Your offers</a>-->
                                  <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">
                                      <i class="fa-solid fa-door-closed"></i> Logout
                                    </button>
                                  </form>
                              </div>
                            </li>
                            
                            @else
                            <li><a href="/register">Register</a></li>
                            <li><a href="/login">Login</a></li>
                            <li><a href="/showAllOffers">Show offers</a></li>
                            @endauth
                            
                            <!--<li class="dropdown">
                              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id='dropdownMenuButton' role="button" aria-haspopup="true" aria-expanded="false">User</a>
                            
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item text-black" href="/users/showUserInfo/{{auth()->user()->user_id??false}}">Chech your profile</a>
                                  <a class="dropdown-item text-black" href="blog.html">Your offers</a>
                                  <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit">
                                      <i class="fa-solid fa-door-closed"></i> Logout
                                    </button>
                                  </form>
                              </div>
                            </li>-->
                            <!--<li><a href="contact.html">Contact</a></li> -->
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
      
      <div class>
        {{$slot}}
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    
    <footer>

    <!-- Bootstrap -->
    
    

    <!-- Plugins -->
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/imgfix.min.js')}}"></script> 
    <script src="{{asset('assets/js/mixitup.js')}}"></script> 
    <script src="{{asset('assets/js/accordions.js')}}"></script>
    
    <!-- Global Init -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

        <!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
        <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
        <script src="{{ asset('main.js') }}"></script>
    </footer>
</body>

</html>
