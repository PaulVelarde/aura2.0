<footer id="footer" class="footer light-background">

    <div class="footer-top py-5 bg-dark text-white">
        <div class="container">
            <div class="row gy-4">
                <!-- Sección "Acerca de" -->
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center mb-3">
                        <span class="sitename text-light fs-2">Aura</span>
                    </a>
                    <p> Dedicados a ofrecer información precisa, imparcial y relevante de todo el mundo, actualizada en
                        tiempo real.
                        Siempre con el objetivo de mantenerte informado, conectado y preparado para tomar decisiones en
                        un mundo que no deja de moverse. Con el poder de la tecnología, cada noticia se presenta de
                        manera accesible y visualmente atractiva. </p>

                    <div class="social-links d-flex mt-4">
                        <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
                        <a href="https://www.aura-bolivia.com/" class="social-icon"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Sección de Enlaces -->
                <div class="col-lg-2 col-4 footer-links">
                    <h4 class="text-light">Enlaces</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light">Pagina Principal</a></li>
                        <li><a href="#" class="text-light">Noticias</a></li>
                        <li><a href="#" class="text-light">Team</a></li>
                        <li><a href="#" class="text-light">Ingresar Noticias</a></li>
                        <li><a href="#" class="text-light">Iniciar Noticias</a></li>
                    </ul>
                </div>

                <!-- Sección de Contacto -->
                <div class="col-lg-5 col-md-12 footer-contact text-center text-md-start">
                    <h4 class="text-light">Contáctanos</h4>
                    <p>Avenida Carlos Zenteno, Tarija, Bolivia</p>
                    <p class="mt-3"><strong>Teléfono:</strong> <span>+591 67672526</span></p>
                    <p><strong>Email:</strong> <span>aurabolivia0@gmail.com</span></p>
                </div>

            </div>
        </div>
    </div>

    <!-- Agregamos algunos estilos para mejorar el aspecto -->
    <style>
        .footer-top {
            background-color: #222;
            color: #000000;
        }

        .footer-about .social-links a {
            margin-right: 10px;
            font-size: 24px;
            color: #040505;
            transition: all 0.3s ease;
        }

        .footer-about .social-links a:hover {
            color: #0d1e38;
        }

        .footer-links a {
            color: #41505f;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #121e30;
        }

        .footer-contact p {
            margin: 5px 0;
        }

        .footer-contact h4 {
            margin-bottom: 20px;
        }

        .footer-about p {
            font-size: 1rem;
            line-height: 1.6;
        }

        .footer-top .container {
            max-width: 1200px;
        }

        .footer-top .social-links a {
            font-size: 1.5rem;
        }
    </style>


    <div class="container copyright text-center">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Aura</strong> <span>Derechos reservados </span></p>

    </div>
    </div>

</footer>

<!-- Scroll Top -->
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Preloader -->
<div id="preloader"></div>
