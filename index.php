<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Generador de Firmas Altex</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Generador</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling 
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div> -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Generador de Firmas Altex</h1>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-sm-3 col-sm-offset-4">
                <form id="firmaFormulario">
                    <fieldset class="form-group">
                        <label for="nombre1">*1er Nombre</label>
                        <input type="text" class="form-control" id="nombre1" required minlength="3" placeholder="Ingrese su primer nombre">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="nombre2">2do Nombre</label>
                        <input type="text" class="form-control" id="nombre2" minlength="3" placeholder="Ingrese su segundo nombre">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="apellidoP">*Apellido Paterno</label>
                        <input type="text" class="form-control" id="apellidoP" minlength="3" required placeholder="Ingrese su apellido paterno">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="apellidoM">Apellido Materno</label>
                        <input type="text" class="form-control" id="apellidoM" minlength="3" placeholder="Ingrese su apellido materno">
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="area">*Área</label>
                        <select class="form-control" id="area" required>
                            <option>-- Escoja el área ó departamento --</option>
                            <option value="Administración">Administración</option>
                            <option value="Agricultura">Agricultura</option>
                            <option value="Almacenes">Almacenes</option>                            
                            <option value="Auditoría">Auditoría</option>                            
                            <option value="Bases y Mermeladas">Bases y Mermeladas</option>
                            <option value="Calidad">Calidad</option>
                            <option value="Champiñón">Champiñón</option>
                            <option value="Chile">Chile</option>
                            <option value="CIID">CIID</option>
                            <option value="Composta">Composta</option>
                            <option value="Compras">Compras</option>
                            <option value="Contabilidad">Contabilidad</option>
                            <option value="Despacho">Despacho</option>
                            <option value="Dirección">Dirección</option>
                            <option value="Distribución">Distribución</option>
                            <option value="Finanzas">Finanzas</option>
                            <option value="Flota">Flota</option>
                            <option value="Frutas y Vegetales">Frutas y Vegetales</option>
                            <option value="Gerencia">Gerencia</option>
                            <option value="Invernaderos">Invernaderos</option>
                            <option value="Investigación y Desarrollo">Investigación y Desarrollo</option>
                            <option value="Logística">Logística</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Mayonesa">Mayonesa</option>
                            <option value="Microbiología">Microbiología</option>
                            <option value="Operaciones">Operaciones</option>
                            <option value="Personal">Personal</option>
                            <option value="Planeación">Planeación</option>
                            <option value="Producción">Producción</option>
                            <option value="Sanidad y Servicios">Sanidad y Servicios</option>
                            <option value="Servicio a Clientes">Servicio a Clientes</option>
                            <option value="Servicio técnico">Servicio técnico</option>
                            <option value="Servicios compartidos">Servicios compartidos</option>
                            <option value="Sistemas">Sistemas</option>
                            <option value="Tráfico">Tráfico</option>
                            <option value="Ventas">Ventas</option>
                            <option value="otro">Otro</option> 
                        </select>
                        <div id="otroInput" style="display: none;">
                            <label for="areaOtro">Especifique</label>
                            <input type="text" class="form-control" id="areaOtro" minlength="3" maxlength="25" placeholder="Especifique el área laboral o puesto">
                        </div>                        
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="correo">*Email</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="correo" minlength="2" required>
                            <span class="input-group-addon">@grupoaltex.com</span>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="extension">Número de Extensión</label>
                        <div class="input-group">
                            <span class="input-group-addon">ext.</span>
                            <input type="number" class="form-control" id="extension" minlength="2">

                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Agregar número" id="agregarNumero">
                          <span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Teléfono
                        </button>
                    </fieldset>
                    <fieldset class="form-group" id="otroTelefono" style="display: none;">
                        <input type="number" class="form-control" id="otroTelefono" minlength="3" placeholder="Ingrese número">                        
                    </fieldset>
                    <fieldset class="form-group">
                        <label for="lugar">*Lugar</label>
                        <select class="form-control" id="lugar">
                            <option>-- Escoja el lugar --</option>
                            <option value="1">Planta</option>
                            <option value="2">Corporativo</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group" id="planta">
                        <label for="planta">Planta</label>
                        <select class="form-control" id="planta">                            
                            <option>-- Escoja la Planta --</option>
                            <option value="1">Altex Citrex</option>
                            <option value="2">Altex Frexport Huimanguillo</option>
                            <option value="3">Altex Frexport Nayarit</option>
                            <option value="4">Altex Frexport Zamora</option>
                            <option value="5">Altex Next</option>
                            <option value="6">Altex Rioxal</option>                            
                            <option value="7">Altex Servax Bleu</option>
                            <option value="8">Altex Xtra Celaya</option>
                            <option value="9">Altex Xtra León</option>
                        </select>
                    </fieldset>
                    <fieldset class="form-group" id="corporativo">
                        <label for="corporativo">Corporativo</label>
                        <select class="form-control" id="corporativo">
                            <option>-- Escoja el Corporativo --</option>
                            <option value="10">Altex México</option>
                            <option value="11">Altex "El Molino" y CIID</option>
                            <option value="12">Altex USA</option>
                            <option value="13">Altex Europa</option>
                            <option value="14">Altex Asia</option>
                            <option value="15">Permafrost</option>
                        </select>
                    </fieldset>
                    <button class="btn btn-primary btn-lg" id="crearFirma"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Crear firma</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container -->


    <!-- Modal Firma Altex -->
    <div class="modal fade" id="modalFirmaAltex" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Click en la imagen para descargar.</h4>
          </div>
          <div class="modal-body" id="imagenFirma">                   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <!-- <button type="button" class="btn btn-primary">Descargar</button> -->
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom functions -->
    <script src="js/custom.js"></script>

    <!-- Crea firma Altex -->
    <script src="js/crearFirma.js"></script>

    <!-- Muestra u oculta selects de Planta y Corporativo -->
    <script src="js/selectFabricas.js"></script>

</body>

</html>
