<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IBREM</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
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


                    <a class="navbar-brand" href="http://ibrem.com.br/" target="_blank" title="Acessar o site oficial">
                           <img src={{ asset('img/logo.jpg') }} alt="Acessar Home-Page" height="35" width="50"/>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                   
                   @auth
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    <li><a href="{{action('HomeController@index')}}" >Home </a>                                              
                        
                        </li>
                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
                         >Administrativo <span class="caret"></span></a>
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
                         >Avisos /Mensagens <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Oração do Dia
                                        </a>     
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Avisos Importantes
                                        </a>                                         
                                    </li>
                            </ul>                    
                        
                        </li>

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                         Cadastro <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Área
                                        </a>     
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Setor
                                        </a>  
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Célula
                                        </a>                                         
                                    </li>
                            </ul>                    
                        
                        </li>

                        <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true"
                         >Informações <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Onde Estamos
                                        </a>     
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Ministérios
                                        </a> 
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Células
                                        </a>                                          
                                        
                                        <a href="{{ route('register') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Membros / Células
                                        </a>                                          
                                    </li>
                            </ul>                    
                        
                        </li>

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
                                            Sair
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

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>