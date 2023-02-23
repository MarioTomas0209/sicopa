<nav class="fixed-top navbar navbar-expand-lg navbar-light bg-light">

    <div class="container-fluid">

        <a class="logo navbar-brand" href="main">SICOPA</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="sesion">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Servicios
                        </a>

                        <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">

                        <?php
                            $services = ControllerServices::getServices();
                        
                            foreach ($services as $key => $value) {
                                echo '<li><a class="dropdown-item text-uppercase" href="#">' . $value['ds_servicio'] . '</a></li>';
                                
                            }
                        ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contáctanos</a>
                    </li>

                </ul>

                <!-- <a class="nav-link" href="usuarios">Iniciar sesión</a> -->
                <div class="dropdown">
                    <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Inciar sesion
                    </a>
                    <ul class="dropdown-menu espacio" aria-labelledby="navbarScrollingDropdown">
                        <li><a class="dropdown-item" href="login">Paciente</a></li>
                        <li><a class="dropdown-item" href="loginDoctor">Doctor</a></li>
                    </ul>
                </div>
            </div>

        </div>

    </div>

</nav>

<header class="header_site">
    <div class="header_contenido">

        <a name="" id="" class="btn btn-outline-light fw-bold" href="#" role="button">Agendar una cita</a>

    </div>
</header>

<section class="container">
    <h2>Servicios para toda la familia</h2>

    <div class="row align-items-md-stretch mt-5">
        <div class="col-md-6">
            <div class="h-100 p-5 text-black bg-light border rounded-3">
                <P>EL ARTE DE CREAR SONRISAS</P>
                <h2>Estética Dental</h2>
                <p>Por medio de fotografías y un diseño de sonrisa virtual, logramos crear sonrisas hermosas. Trabajamos con materiales libres de metal para devolver la estética y función a la dentadura.
                </p>

                <img src="views/img/sonrisa.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-primary mt-3" type="button">Agendar una cita</button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 text-light p-5 bg-primary border rounded-3">
                <P>DIENTES NUEVOS</P>
                <h2>Implantes</h2>
                <p>Reemplazo de dientes ausentes o perdidos por medio de una raíz artificial (tornillo especial), el cual se asegura al hueso del paciente para después colocarle una corona.
                </p>
                <img src="views/img/implantes.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-light mt-3" type="button">Agendar una cita</button>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="h-100 text-light p-5 bg-primary border rounded-3">
                <P>CORRECCIÓN DE DENTADURA</P>
                <h2>Ortodoncia</h2>
                <p>La especialidad para alinear y perfeccionar la posición de los dientes por medio de aparatos fijos o removibles, para una estética y masticación adecuada.
                </p>
                <img src="views/img/ortodoncia.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-light mt-3" type="button">Agendar una cita</button>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="h-100 p-5 text-black bg-light border rounded-3">
                <P>REJUVENECIENDO TU SONRISA</P>
                <h2>Blanqueamiento</h2>
                <p>Tratamiento profesional seguro y eficaz , aprobado por la FDA, para aclarar el color de los dientes. Los dientes cambian de color por consumo de café, vino, la edad y otros productos con colorantes.
                </p>
                <img src="views/img/blanco.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-primary mt-3" type="button">Agendar una cita</button>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="h-100 p-5 text-black bg-light border rounded-3">
                <P>ODONTOLOGÍA EN NIÑOS</P>
                <h2>Odontopediatría</h2>
                <p>Una experiencia única para el pequeño, enfocándonos principalmente en la prevención, para disminuir los tratamientos de emergencia que luego llevan al dolor y temor.
                </p>
                <img src="views/img/odontopediatra.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-primary mt-3" type="button">Agendar una cita</button>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="h-100 text-light p-5 bg-primary border rounded-3">
                <P>TRATAMIENTO DE CANALES</P>
                <h2>Endodoncia</h2>
                <p>Cada diente tiene un nervio que se puede dañar por caries o fracturas y esto ocasiona mucho dolor. Para que el diente siga funcionando, este nervio se elimina y sustituye por un material especial.
                </p>
                <img src="views/img/endodoncia.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-light mt-3" type="button">Agendar una cita</button>
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <div class="h-100 p-5 text-black bg-light border rounded-3">
                <P>EXTRACCIÓN DE DIENTES</P>
                <h2>Cirugía Oral</h2>
                <p>Procedimiento para retirar piezas dentales como extracciones de cordales o reconstruir tejidos como hueso y encía.
                </p>
                <img src="views/img/cirujia.jpg" class="img-fluid rounded-top" alt="sonrisa">

                <button class="btn btn-outline-primary mt-3" type="button">Agendar una cita</button>
            </div>
        </div>
    </div>
</section>