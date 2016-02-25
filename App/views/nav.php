<body>

    <div id="wrapper">
  <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                  <a class="navbar-brand" href="index.html"><img src="http://localhost/archivo/app/views/assets/img/logo.jpg" alt="Archivo Nacional" longdesc="Archivo Nacional" class="img-responsive visible-sm visible-md visible-lg"/><br>&nbsp;&nbsp;&nbsp;Archivo Nacional</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION["nombre_apellido"]; ?><!-- <i class="fa fa-caret-down"></i>-->
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>Configuraciones</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="home/logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        
                        <li>
                            <a href="index"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Movimiento de Documentos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="ingreso"><i class="fa fa-archive fa-fw"></i> Ingreso de Documentos</a>
                                </li>
                                <li>
                                    <a href="salida"><i class="fa fa-arrow-circle-left fa-fw"></i> Salida de Documentos</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="informeconsultas"><i class="fa fa-table fa-fw"></i> Informes</a>
                            
                        </li>
                       <li>
                       		<a href="logout"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                       </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
