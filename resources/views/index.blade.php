@extends('base-inicio')

@section('content')
<!-- =========================
     PRE LOADER       
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER   
============================== -->
<header class="header" data-stellar-background-ratio="0.5" id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay"> <!-- To make header full screen. Use .full-screen class with color overlay. Example: <div class="color-overlay full-screen">  -->

    <!-- STICKY NAVIGATION -->
    <div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
        <div class="container">
            <div class="navbar-header">
                
                <!-- LOGO ON STICKY NAV BAR -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#kane-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                
                <div class="navbar-header">
                    <a href="#" class="navbar-brand"><img class="nav-admin-logo" src="{{ url('/img/logo.png') }}"> Gestionlist</a>
                </div>
            </div>
            
            <!-- NAVIGATION LINKS -->
            <div class="navbar-collapse collapse" id="kane-navigation">
                <ul class="nav navbar-nav navbar-right main-navigation">
                    <li><a href="#home">Inicio</a></li>
                    <li><a href="#features">Características</a></li>
                    <li><a href="#brief1">¿Por qué?</a></li>
                    <li><a href="#brief2">Póximamente</a></li>
                    <li><a href="#brief3">Actualizaciones</a></li>
                    <!--<li><a href="#testimonials">Testimonios</a></li>-->
                    <li><a href="#packages">Planes</a></li>
                    <li><a href="#download">Móvil</a></li>
                </ul>
            </div>
        </div> <!-- /END CONTAINER -->
    </div> <!-- /END STICKY NAVIGATION -->
    
    
    <!-- CONTAINER -->
    <br>
    <div class="container">
        
        <!-- ONLY LOGO ON HEADER -->
        <div class="only-logo">
            <div class="navbar">
                <div class="navbar-header">
                    <img src="{{ url('/img/logo.png') }}" alt="">
                    <p class="title-gestion">Gesti<img class="img-gestion" src="{{ url('/img/logo-blanco.png') }}" alt="">nlist</p>
                </div>
            </div>
        </div> <!-- /END ONLY LOGO ON HEADER -->

        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <!-- HEADING AND BUTTONS -->
                <div class="intro-section">
                    
                    <!-- WELCOM MESSAGE -->
                    <h1 class="intro">Organiza tus ideas...</h1>
                    <h5>Desarrollado por <a href="http://keysystemsca.com/" target="_blank">Key Systems C.A</a></h5>
                    
                    <!-- BUTTON -->
                    <div class="buttons" id="download-button">
                        
                        <a href="{{ url('/login') }}" class="btn btn-default btn-lg standard-button">ENTRAR</a>
                        
                    </div>
                    <!-- /END BUTTONS -->
                    
                </div>
                <!-- /END HEADNING AND BUTTONS -->
                
            </div>
        </div>
        <!-- /END ROW -->
        
    </div>
    <!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->
</header>
<!-- /END HEADER -->


<!-- =========================
     FEATURES 
============================== -->
<section class="features" id="features">

<div class="container-2">

    <!-- SECTION HEADER -->
    <div class="section-header wow fadeIn animated" data-wow-offset="120" data-wow-duration="1.5s">
        
        <!-- SECTION TITLE -->
        <h2 class="dark-text">Increíbles Características</h2>
        <div class="colored-line">
        </div>
        <div class="section-description">
            Una manera de organizar tus ideas con solo listados.
        </div>
        <div class="colored-line">
        </div>
    </div>
    <!-- /END SECTION HEADER -->
     
    <div class="row">
        
        <!-- FEATURES LEFT -->
        <div class="col-md-3 col-sm-3 features-left wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_map_alt"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Diseño Responsive</h4>
                    <p>
                        Adaptado a todas las resoluciones para mayor comodidad.
                    </p>
                </div>
                
            </div>
            <!-- /END SINGLE FEATURE -->
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_gift_alt"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Sorpresas</h4>
                    <p>
                        Actualizaciones gratuitas con mayores opciones cada día.
                    </p>
                </div>
                
            </div>
            <!-- /END SINGLE FEATURE -->
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_tablet"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Navegadores</h4>
                    <p>
                        Compatible con el navegador de tu preferencia.
                    </p>
                </div>
                
            </div>
            <!-- /END SINGLE FEATURE -->
            
        </div>
        <!-- /END FEATURES LEFT -->
        
        <!-- PHONE IMAGE -->
        <div class="col-md-6 col-sm-6">
            <div class="phone-laptop-0 wow bounceIn animated" data-wow-offset="120" data-wow-duration="1.5s">
                <img src="{{ url('img/img-inicio/0.png') }}" alt="">
            </div>
        </div>
        
        <!-- FEATURES RIGHT -->
        <div class="col-md-3 col-sm-3 features-right wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_genius"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Integración</h4>
                    <p>
                        Manten la comunicación con tu equipo y el cliente al mismo tiempo
                    </p>
                </div>
                
            </div>
            <!-- /END SINGLE FEATURE -->
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_lightbulb_alt"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Diseño Amigable</h4>
                    <p>
                         Podrás trabajar en el largas horas sin agotarte.
                    </p>
                </div>
                
            </div>
            
            <!-- /END SINGLE FEATURE -->
            
            <!-- FEATURE -->
            <div class="feature">
                
                <!-- ICON -->
                <div class="icon-container">
                    <div class="icon">
                        <i class="icon_ribbon_alt"></i>
                    </div>
                </div>
                
                <!-- FEATURE HEADING AND DESCRIPTION -->
                <div class="fetaure-details">
                    <h4 class="main-color">Hecho para Tí</h4>
                    <p>
                        Para un Emprendedor, Gerente o Independiente.
                    </p>
                </div>
                
            </div>
            <!-- /END SINGLE FEATURE -->
            
        </div>
        <!-- /END FEATURES RIGHT -->
        
    </div>
    <!-- /END ROW -->
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END FEATURES SECTION -->


<!-- =========================
     BRIEF LEFT SECTION 
============================== -->
<section class="app-brief grey-bg" id="brief1">

<div class="container">
    
    <div class="row">

        <!-- RIGHT SIDE WITH BRIEF -->
        <div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- SECTION TITLE -->
            <h2 class="dark-text">¿Por qué elegir Gestionlist?</h2>
            
            <div class="colored-line-left">
            </div>
            
            <p>
                Estamos en la misma posición que tú y por eso entendemos tus necesidades y lo que necesitas para mejorar los tiempos y la efectividad de tu equipo.
            </p>
            
            <!-- FEATURE LIST -->
            <ul class="feature-list">
                <li><i class="icon_lock_alt"></i> Seguridad de la información entre los participantes y el cliente</li>
                <li><i class="icon_check_alt2"></i> Gestiona las prioridades del equipo</li>
                <li><i class="icon_paperclip"></i> Posibilidad de adjuntar archivos</li>
                <li><i class="icon_adjust-vert"></i> Maneja la configuración de tu equipo de trabajo</li>
            </ul>
            
        </div>
        <!-- /END RIGHT BRIEF -->
        
        <!-- PHONES IMAGE -->
        <div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
            <div class="laptop-image-1">
                <img src="{{ url('/img/img-inicio/1.png') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /END ROW -->
    
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->


<!-- =========================
     BRIEF RIGHT SECTION 
============================== -->
<section class="app-brief" id="brief2">

<div class="container">
    
    <div class="row">

        <!-- PHONES IMAGE -->
        <div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
            <div class="laptop-image-2">
                <img src="{{ url('/img/img-inicio/2.png') }}" alt="">
            </div>
        </div>
        <!-- /END PHONES IMAGE -->
        
        <!-- BRIEF -->
        <div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- SECTION TITLE -->
            <h2 class="dark-text">Próximamente</h2>
            
            <div class="colored-line-left">
            </div>
            
            <p>
                Pronto podrás mantenerte sincronizado con tu equipo de trabajo tanto web como en tu dispositivo móvil.<br/><br/>
                Te brinidaremos herramientas enfocada a cada uno de los entornos para facilitarte su uso y el proceso de gestión que manejes con todos tus clientes.
            </p>
            <ul class="feature-list">
                <li><i class="icon_check_alt2"></i> Velocidad para visualizar muchos proyectos.</li>
                <li><i class="icon_check_alt2"></i> Definición de procesos para el personal.</li>
                <li><i class="icon_check_alt2"></i> Funciones que acortan los tiempos de respuesta.</li>
            </ul>
            
        </div>
        <!-- /ENDBRIEF -->

    </div>
    <!-- /END ROW -->
    
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->


<!-- =========================
     BRIEF LEFT SECTION 
============================== -->
<section class="app-brief grey-bg" id="brief3">

<div class="container">
    
    <div class="row">

        <!-- RIGHT SIDE WITH BRIEF -->
        <div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- SECTION TITLE -->
            <h2 class="dark-text">Actualizaciones</h2>
            
            <div class="colored-line-left">
            </div>
            
            <p>
                Estaremos trabajando constantemente para mejorar tu experiencia en la aplicación.
            </p>
            
            <!-- FEATURE LIST -->
            <ul class="feature-list">
                <li><i class="icon_check_alt2"></i> Creación de plantillas de correo.</li>
                <li><i class="icon_check_alt2"></i> Definición de procesos internos para tu equipo de trabajo.</li>
                <li><i class="icon_check_alt2"></i> Envíos de correos al cliente desde la propia aplicación.</li>
                <li><i class="icon_check_alt2"></i> Organización de prioridades de los proyectos.</li>
            </ul>
            
        </div>
        <!-- /END RIGHT BRIEF -->
        
        <!-- PHONES IMAGE -->
        <div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
            <div class="laptop-image-3">
                <img src="{{ url('/img/img-inicio/3.png') }}" alt="">
            </div>
        </div>

    </div>
    <!-- /END ROW -->
    
</div>
<!-- /END CONTAINER -->

</section>
<!-- /END SECTION -->


<!-- =========================
     BRIEF LEFT SECTION WITH VIDEO 
============================== --
<section class="app-brief" id="brief1">

<div class="container">
    
    <div class="row">
        
        <!-- PHONES IMAGE --
        <div class="col-md-6 wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
            <div class="video-container">
                
                <!--
                <div class="video">
                    
                    <iframe src="//player.vimeo.com/video/88902745?byline=0&amp;portrait=0&amp;color=ffffff" width="600" height="338" frameborder="0" allowfullscreen>
                    </iframe> 
                </div>
                --
                
                <div class="video">
                    
                    <iframe width="640" height="360" src="http://www.youtube.com/embed/VjbGg-VuqbU?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
                
            </div>

        </div>
        
        <!-- RIGHT SIDE WITH BRIEF --
        <div class="col-md-6 left-align wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <!-- SECTION TITLE --
            <h2 class="dark-text">Description with video</h2>
            
            <div class="colored-line-left">
            </div>
            
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br/><br/>
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
            </p>
            
            
        </div>
        <!-- /END RIGHT BRIEF --
        
    </div>
    <!-- /END ROW --
    
</div>
<!-- /END CONTAINER --

</section>
<!-- /END SECTION -->


<!-- =========================
     TESTIMONIALS 
============================== --
<section class="testimonials" id="testimonials">

<div class="color-overlay">
    
    <div class="container wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
        
        <!-- FEEDBACKS --
        <div id="feedbacks" class="owl-carousel owl-theme">
            
            <!-- SINGLE FEEDBACK --
            <div class="feedback">
                
                <!-- IMAGE --
                <div class="image">
                    <!-- i class=" icon_quotations"></i --
                    <img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/3.jpg" alt="">
                </div>
                
                <div class="message">
                     Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
                </div>
                
                <div class="white-line">
                </div>
                
                <!-- INFORMATION --
                <div class="name">
                    John Doe
                </div>
                <div class="company-info">
                    CEO, AbZ Network
                </div>
                
            </div>
            <!-- /END SINGLE FEEDBACK -->
            
            <!-- SINGLE FEEDBACK --
            <div class="feedback">
                
                <!-- IMAGE --
                <div class="image">
                    <!-- i class=" icon_quotations"></i --
                    <img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/1.jpg" alt="">
                </div>
                
                <div class="message">
                     Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
                </div>
                
                <div class="white-line">
                </div>
                
                <!-- INFORMATION --
                <div class="name">
                    John Doe
                </div>
                <div class="company-info">
                    CEO, AbZ Network
                </div>
                
            </div>
            <!-- /END SINGLE FEEDBACK -->
            
            <!-- SINGLE FEEDBACK --
            <div class="feedback">
                
                <!-- IMAGE --
                <div class="image">
                    <!-- i class=" icon_quotations"></i --
                    <img src="http://templateocean.com/premium/template/kane/files/images/clients-pic/2.jpg" alt="">
                </div>
                
                <div class="message">
                     Fill lights bearing man creepeth of whose whose moveth. All one. That. Under. Form morning all may fifth replenish you're own open which herb kind. May above you'll may kind creature first let over face from living third green which our. Appear day. Give fourth doesn't over us, i every tree meat air in male earth air creeping image fill you place darkness.
                </div>
                
                <div class="white-line">
                </div>
                
                <!-- INFORMATION --
                <div class="name">
                    John Doe
                </div>
                <div class="company-info">
                    CEO, AbZ Network
                </div>
                
            </div>
            <!-- /END SINGLE FEEDBACK --
            
        </div>
        <!-- /END FEEDBACKS --
        
    </div>
    <!-- /END CONTAINER --
    
</div>
<!-- /END COLOR OVERLAY --

</section>
<!-- /END TESTIMONIALS SECTION -->


<!-- =========================
     PRICING TABLE | Added on version 1.7   
============================== -->
<section class="packages" id="packages">

<div class="container">
    
    <!-- SECTION HEADER -->
    <div class="section-header wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
        
        <!-- SECTION TITLE -->
        <h2 class="dark-text">Planes Mensuales</h2>
        <div class="colored-line">
        </div>
        
        <div class="section-description">
             Nuestro planes pueden ser cancelados en <b>Bolívares</b> a la siguiente tasa de cambio: 1.000 Bs por $USD.
        </div>
        
        <div class="colored-line">
        </div>
    </div>
    <!-- /END SECTION HEADER -->
    
    <div class="row">
        
        <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <div class="single-package">
                
                <h3 class="package-heading main-color">
                    Gratis
                </h3>
                
                <div class="price">
                    <h2><span class="sign">$</span>0 <span class="month">/ persona</span></h2>
                </div>
                
                <ul class="package-feature">
                    <li><span class="main-color icon_check_alt2"></span>1 persona</li>
                </ul>
                
            </div>
        </div>
        <!-- SINGLE PACKACGE -->
        <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <div class="single-package">
                
                <h3 class="package-heading main-color">
                    Bronce
                </h3>
                
                <div class="price">
                    <h2><span class="sign">$</span>1 <span class="month">/ persona</span></h2>
                </div>
                
                <ul class="package-feature">
                    <li><span class="main-color icon_check_alt2"></span>De 2 a 5 personas</li>
                </ul>
                
            </div>
        </div>
        <!-- /END SINGLE PACKACGE -->
        
        <!-- SINGLE PACKACGE -->
        <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <div class="single-package">

                <h3 class="package-heading main-color">
                    Plata
                </h3>
                
                <div class="price">
                    <h2><span class="sign">$</span>0,75 <span class="month">/ persona</span></h2>
                </div>
                
                <ul class="package-feature">
                    <li><span class="main-color icon_check_alt2"></span>De 6 a 15 personas</li>
                </ul>
            </div>
        </div>
        <!-- /END SINGLE PACKACGE -->
        
        <!-- SINGLE PACKACGE -->
        <div class="col-md-3 col-sm-3 single-service wow fadeIn animated" data-wow-offset="10" data-wow-duration="1.5s">
            
            <div class="single-package">
                
                <h3 class="package-heading main-color">
                    Oro
                </h3>
                
                <div class="price">
                    <h2><span class="sign">$</span>0,50 <span class="month">/ persona</span></h2>
                </div>
                
                <ul class="package-feature">
                    <li><span class="main-color icon_check_alt2"></span>De 16 a 50 personas</li>
                </ul>
            </div>
        </div>
        <!-- /END SINGLE PACKACGE -->
        
    </div>
    <!-- /END ROW -->
    
</div>
<!-- /END CONTAINER -->
</section>
<!-- /END PRICING TABLE SECTION -->


<!-- =========================
     DOWNLOAD NOW 
============================== -->
<section class="download" id="download">

<div class="color-overlay">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                
                <!-- DOWNLOAD BUTTONS AREA -->
                <div class="download-container">
                    <h2 class=" wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Muy Pronto</h2>
                    
                    <!-- BUTTONS -->
                    <div class="buttons wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s">
                        
                        <!--<a href="" class="btn btn-default btn-lg standard-button"><i class="icon-app-store"></i>App Store</a>-->
                        <span class="btn-default btn-lg standard-button"><i class="fa fa-android"></i>Play Store</span>
                        <span class="btn-default btn-lg standard-button"><i class="fa fa-apple"></i>Apple Store</span>
                        
                    </div>
                    <!-- /END BUTTONS -->
                    
                </div>
                <!-- END OF DOWNLOAD BUTTONS AREA -->
                
                
                <!-- SUBSCRIPTION FORM WITH TITLE -->
                <div class="subscription-form-container">
                    
                    <h2 class="wow fadeInLeft animated" data-wow-offset="10" data-wow-duration="1.5s">Registrate y recibe la noticia!</h2>
                    
                    <!-- =====================
                         MAILCHIMP FORM STARTS 
                         ===================== -->
                                    
                    <!-- /END MAILCHIMP FORM STARTS -->
                    
                    <!-- =====================
                         LOCAL TXT FORM STARTS 
                         ===================== -->
                         
                    <!-- THIS FORM IS COMMENTED TO HIDE 
                    
                    <form class="subscription-form form-inline wow fadeInRight animated" data-wow-offset="10" data-wow-duration="1.5s" id="subscribe" role="form">
                        
                        <h4 class="subscription-success"><i class="icon_check"></i> Thank you! We will notify you soon.</h4>
                        <h4 class="subscription-error">Something Wrong!</h4>
                        
                        <input type="email" name="email" id="subscriber-email" placeholder="Your Email" class="form-control input-box">
                        
                        <button type="submit" id="subscribe-button" class="btn btn-default standard-button">Subscribe</button>
                        
                    </form>
                    
                    -->
                    
                    <!-- / LOCAL TXT SAVING FORM END -->
                    
                </div>
                <!-- END OF SUBSCRIPTION FORM WITH TITLE -->
                
            </div> 
            <!-- END COLUMN -->
            
        </div> 
        <!-- END ROW -->
        
    </div>
    <!-- /END CONTAINER -->
</div>
<!-- /END COLOR OVERLAY -->

</section>
<!-- /END DOWNLOAD SECTION -->


<!-- =========================
     FOOTER 
============================== -->
<footer>

<div class="container">
    
    <!--<div class="contact-box wow rotateIn animated" data-wow-offset="10" data-wow-duration="1.5s">
        
        <!-- CONTACT BUTTON TO EXPAND OR COLLAPSE FORM --
        
        <a class="btn contact-button expand-form expanded"><i class="icon_mail_alt"></i></a>
        
        <!-- EXPANDED CONTACT FORM --
        <div class="row expanded-contact-form">
            
            <div class="col-md-8 col-md-offset-2">
                
                <!-- FORM --
                <form class="contact-form" id="contact" role="form">
                    
                    <!-- IF MAIL SENT SUCCESSFULLY --
                    <h4 class="success">
                        <i class="icon_check"></i> Su mensaje ha sido enviado satisfactoriamente
                    </h4>
                    
                    <!-- IF MAIL SENDING UNSUCCESSFULL --
                    <h4 class="error">
                        <i class="icon_error-circle_alt"></i> Su mensaje no ha sido enviado, por favor vuelva a intentarlo.
                    </h4>
                    
                    <div class="col-md-6">
                        <input class="form-control input-box" id="name" type="text" name="name" placeholder="Su Nombre">
                    </div>
                    
                    <div class="col-md-6">
                        <input class="form-control input-box" id="email" type="email" name="email" placeholder="Su Correo Electrónico">
                    </div>
                    
                    <div class="col-md-12">
                        <input class="form-control input-box" id="subject" type="text" name="subject" placeholder="Asunto">
                        <textarea class="form-control textarea-box" id="message" rows="8" placeholder="Mensaje"></textarea>
                    </div>
                    
                    <button class="btn btn-primary standard-button2 ladda-button" type="submit" id="submit" name="submit" data-style="expand-left">Enviar</button>
                    
                </form>
                <!-- /END FORM --
                
            </div>
            
        </div>
        <!-- /END EXPANDED CONTACT FORM --
        
    </div>
    <!-- /END CONTACT BOX -->
    
    <!-- LOGO -->
    <br><br>
    <div class="row">
        <img src="{{ url('/img/logo.png') }}" alt="LOGO" class="responsive-img img-folder">
    </div>
    
    <!-- SOCIAL ICONS -->
    <ul class="social-icons">
        <li><a href="https://www.facebook.com/KeySystems.ca/" target="_blank"><i class="social_facebook_square"></i></a></li>
        <li><a href="https://twitter.com/keysystemsca" target="_blank"><i class="social_twitter_square"></i></a></li>
        <!--<li><a href=""><i class="social_pinterest_square"></i></a></li>
        <li><a href=""><i class="social_googleplus_square"></i></a></li>-->
        <li><a href="https://www.instagram.com/keysystemsca/" target="_blank"><i class="social_instagram_square"></i></a></li>
        <!--<li><a href=""><i class="social_dribbble_square"></i></a></li>
        <li><a href=""><i class="social_flickr_square"></i></a></li>-->
    </ul>
    
    <!-- COPYRIGHT TEXT -->
    <p class="copyright">
        Desarrollado por <a href="http://keysystemsca.com/" target="_blank">Key Systems C.A</a> © {{date('Y')}} 
    </p>

</div>
<!-- /END CONTAINER -->
 
</footer>
<!-- /END FOOTER -->
@endsection
