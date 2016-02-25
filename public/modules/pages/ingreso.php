<?php
include ('header.php');
echo '
<body>

    <div id="wrapper">
';
include ('nav.php');

echo'
<article>
	<section>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Movimiento
                           de Documentos
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-book fa-fw"></i>  Movimiento de Documentos
                            </li>
                            <li class="active">
                                <i class="fa fa-archive fa-fw"></i> Ingreso de Documentos
                            </li>
                        </ol>
                    </div>
                </div>
                                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-6">

                        <form class="form-horizontal">

                            <div class="form-group">
                                <label>Registro</label><input  type="number" class="form-control" placeholder="(Sólo números)">
                                <label>Año</label>
                                <input class="form-control" placeholder="Ingrese el año">
                                <label>Página</label>
                                <input class="form-control" placeholder="Ingrese página">
                            </div>
                            <div class="form-group"></div>

                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <button type="reset" class="btn btn-warning">Limpiar</button>

                        </form>

                    </div>
                    <div class="col-lg-6">
                        <h1>&nbsp;</h1>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    </section>
</article>';
include ('footer.php');


echo '</body>

</html>
';
?>