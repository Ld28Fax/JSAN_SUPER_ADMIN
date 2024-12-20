<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceuil</title>
    <link rel="stylesheet" href="extern/dist/css/welcome.css">
    <link rel="stylesheet" href="extern/dist/css/adminlte.min.css">
</head>
<body>
    
<div class="font">
    <div class="ombre">
     <div class="menu">
         <span class="craft">
            <img src="Justice_logo.png" alt=" Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width:10% ">
            MINISTERE DE LA JUSTICE</span>
         <ul style="margin-left: -15%">
             <li>
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="white">Accueil</a></li>
                @else
                    <span>Acceuil</span>
                    @endauth
                @endif
             <li><a href="#" class="white">Contact</a></li>
         </ul>
         <div class="search">
            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline-light">Accueil</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Connexion</a>
        
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-light">Inscription</a>
                    @endif
                @endauth
            </div>
        @endif
         </div>
     </div>
     <div class="icone">
         <h2>COLLECTE D'INFORMATIONS<br>JUGEMENT SUPPLETIF <br>D'ACTE DE NAISSANCE</h2><br>
     </div>
    </div>
 </div>
   </div>
</body>
</html>