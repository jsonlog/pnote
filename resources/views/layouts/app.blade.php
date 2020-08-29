<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script src="/https/cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->


                    <!-- <a class="navbar-brand" href="http://ibrem.com.br/" target="_blank" title="Acessar o site oficial">
                           <img src={{ asset('img/logo.jpg') }} alt="Acessar Home-Page" height="35" width="50"/>
                    </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                   
                   @auth
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    <li><a href="{{action('HomeController@index')}}" >Home </a>                                              
                        
                        </li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
                         >register <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('register-form').submit();">
                                            Tipos de Permissões
                                        </a>                 

                                        <li><a href="{{ route('register') }}">Registrar Usuário</a></li>     
                                                                     
                                    </li>
                            </ul>                                            
                        </li>                       

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
                         >post<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('posthome') }}" >
                                            posthome
                                        </a>     
                                        <a href="/posts">posts</a>                                         
                                    </li>
                            </ul>                    
                        
                        </li>

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                         RDBA <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="/users">users</a>
                                        <a href="/users">roles</a>  
                                        <a href="/users">premissions</a>                 
                                    </li>
                            </ul>                    
                        
                        </li>
                        <li><a href="/thing/what" >what </a>  
                        <li><a href="/thing/upload" >upload </a>     

                    </ul>

                    
                    @endauth


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                           <!-- <li><a href="{{ route('register') }}">Register</a></li>!-->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} - {{ Auth::user()->email }}  <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
