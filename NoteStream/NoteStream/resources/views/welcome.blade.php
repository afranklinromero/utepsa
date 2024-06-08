<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NoteStream</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <button id="backToTopBtn" onclick="scrollToTop()">^</button>
    <div class="main-page"> <!-- Contenedor principal para el contenido de la pagina -->
      <div class="div">
        <div class="overlap-3">
          <div id="services" class="information-section">
            <div class="information">
              <div class="images-container"> <!-- Contenedor para  los imagenes de la seccion de servicios-->
                <img class="location" src="{{ asset('images/location 1.png') }}" /> <!-- Icono de Location -->
                <img class="search" src="{{ asset('images/search 1.png') }}" /> <!-- Icono de Busqueda -->
                <img class="pin" src="{{ asset('images/pin 1.png') }}" /> <!-- Icono de Pin -->
              </div>
              <div class="text-wrapper-5">Trabaja donde sea</div> <!-- Text debajo de los iconos -->
              <div class="text-wrapper-6">Encontra rapido</div>
              <div class="text-wrapper-7">Empieza ahora</div>
              <p class="p">
                Mantén información importante al instante - tus apuntes sincronizan a todos tus dispositivos.
              </p>
              <p class="text-wrapper-8">Encuéntra tus apuntes rapido y olvídate de perderlos.</p>
              <p class="text-wrapper-9">Sin costo y sin anuncios. Empieza a escribir de inmediato!</p>
            </div>
            <div class="start-now-button"><div class="text-wrapper-10">Servicios</div></div> <!-- Titulo de seccion de Servicios -->
            </div>
          </div>
        </div>
        <div class="menu-pop-up">
          <div class="overlap-4">
            <img class="background-image" src="{{ asset('images/background-image.png') }}" alt="Background Image"/> <!-- Imagen de fondo para el titulo principal de la pagina -->
          </div>
          <div class="nav-bar">
            <a href="{{ asset('welcome.blade.php') }}"><div class="title">
              <div class="text-wrapper-11">NoteStream</div> <!-- Titulo del Sitio Web -->
              <img class="title-icon" src="{{ asset('images/title-icon.png') }}" alt="Title Icon"/> <!-- Logo de la pagina -->
            </div></a>
            <button class="menu-button">
                <div class="overlap-group-2">
                    <img class="MB-icon" src="{{ asset('images/MB-icon.png') }}"/> <!-- Boton de menu -->
                    <div class="text-wrapper-12">Menu</div> <!-- Texto del boton de menu -->
                </div>
            </button>
            <div class="dropdown-menu">
              <ul>
                <li><a href="{{ route('login') }}">Login</a></li> <!-- Link para login -->
                <li><a href="{{ route('register') }}">Registrar</a></li>
                <li><a href="#services" class="scrollLink">Servicios</a></li> <!-- Link para los servicios -->
                <li><a href="#contact" class="scrollLink">Contacto</a></li> <!-- Link para el footer -->
              </ul>
            </div>

                
            <div class="text-wrapper-13">Organizá tu Vida</div> <!-- Texto del Titulo -->
            <p class="text-wrapper-14">Todos tus apuntes en un solo lugar, gratis, y accesibles hasta sin conexión al internet.</p> <!-- Texto del Subtitulo -->
          </div>
        </div>
        <footer id="contact" class="footer">
          <a href="https://github.com/CmdrCloud" target="_blank"><img class="footer-icon" src="{{ asset('images/github.png') }}"></a> <!-- Icono de Github con un vinculo a mi github para que abra en una nueva tab con target="_blank" -->
          <p class="footer-text">Github</p>
        </footer>
      </div>
    </div>

    <script src="{{ asset('js/main.js') }}"></script> <!-- Link al archivo JS principal -->
</body>
</html>