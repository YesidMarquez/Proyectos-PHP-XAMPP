

<?php
date('m');
    if (date('m')==01) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==2) {
        $dato=Date('m-28');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('28 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==3) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==4) {
        $dato=Date('m-30');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('29 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==5) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==6) {
        $dato=Date('m-30');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        $fecha = date_create('2018-06-01');
        date_add($fecha, date_interval_create_from_date_string('29 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==7) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==8) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==9) {
        $dato=Date('m-30');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('29 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==10) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==11) {
        $dato=Date('m-30');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('29 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }elseif (date('m')==12) {
        $dato=Date('m-31');
        $fecha1= "2018-".$dato;
        $fecha = date_create('2018-'.$dato);
        date_add($fecha, date_interval_create_from_date_string('30 days'));
        $fecha3= date_format($fecha, 'Y-m-d');
    }
// conexión con la base de datos
require("../mod_config/conexion.php");
//Iniciar Sesión
session_start();
   
//Validar si se está ingresando con sesión correctamente
if (!$_SESSION){
    echo '<script language = javascript>
    alert("usuario no autenticado")
    self.location = "../../index.html"
    </script>';
    }    

if ( $_SESSION['id_cargo']==2 ) {
    $idAgente = $_GET['cedula_usuario'];
       
    }else { $idAgente = $_SESSION['cedula'];
}


$id=$_SESSION['cedula'];
$nivel=$_SESSION['id_cargo']; 
$cargo=$_SESSION['cargo'];
$nombre = $_SESSION['nombre'];
$apellido=$_SESSION['apellido'];

//id_registro,cedula_cliente,usuario_cedula,campaña
$sql = "SELECT *  FROM movil c, usuarios u WHERE c.usuario_cedula = $idAgente and u.cedula_usuario= $idAgente";
$resultado = $mysqli->query($sql);

$sql1 = "SELECT *  FROM usuarios WHERE cedula_usuario= $idAgente";
$resultado1 = $mysqli->query($sql1);
$row1 = $resultado1->fetch_array(MYSQLI_ASSOC);


date_default_timezone_set('America/Bogota');
$fecha_ini=date('Y-m-d 00:00:00');
$fecha_fin=date('Y-m-d 23:59:59');
$fecha_mes_inc=date('Y-m-01 00:00:00');


$sql2 = "SELECT  count(*) as conteo, id_registro FROM `movil` where registro BETWEEN '$fecha_ini' AND '$fecha_fin' and  usuario_cedula=$idAgente";
$resultado2 = $mysqli->query($sql2);
$row2 = $resultado2->fetch_array(MYSQLI_ASSOC);

$sql3 = "SELECT  count(*) as conteo FROM `movil` where registro BETWEEN '$fecha_mes_inc' AND '$fecha1' and  usuario_cedula=$idAgente";
$resultado3 = $mysqli->query($sql3);
$row3 = $resultado3->fetch_array(MYSQLI_ASSOC);

$sql4 = "SELECT  count(*) as conteo FROM `movil`where usuario_cedula=$idAgente";
$resultado4 = $mysqli->query($sql4);
$row4 = $resultado4->fetch_array(MYSQLI_ASSOC);   
?>

<htm lang="es">
    <head>
        <title>Ventas Agentes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/v4-shims.css">
        <link rel="stylesheet" type="text/css" href="../../css/style.css">
        <link rel="icon" type="image/x-icon" href="../../imagenes/logos/favicon.ico" />
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-info navbar-info fixed-top">
            <!-- Brand/logo -->
            <a class="nav-link" href="#"><marquee scrollamount="3"><img  class="" src="../../imagenes/logos/logo2.png" title="Personal" width="65" height="35"></img><img  class="" src="../../imagenes/logos/tigoune.png" title="Personal" width="65" height="40"></img></marquee></a>
            <!-- Links -->
            <ul class="navbar-nav">
                <?php if ($nivel==2) {?>
                <li class="nav-item">
                    <a class="nav-link" href="menu.php">
                        <img  class="menu" src="../../imagenes/iconos/agentes.png"  title="Listado Agentes" width="70" height="70"></img>
                </li>
                  
                <?php } ?>
                <?php if ($nivel<>2) {?>
                <li class="nav-item">
                    <a class="nav-link" href="../mod_insert/ventas.php">
                        <img  class="menu" src="../../imagenes/iconos/venta.png" title="Nueva Venta" width="70" height="70">
                        </img>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../imagenes/manuales/Manual Usuario Agente.pdf">
                        <img  class="menu" src="../../imagenes/iconos/ayuda.png" title="Manual Agente">
                        </img>
                    </a>
                </li>
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="../mod_config/desconectar.php">
                        <img  class="menu" src="../../imagenes/iconos/cerrar.png"  title="Cerrar sesion" width="70" height="70"></img>
                    </a>
                </li>
            </ul>
                
            <div class="container fuente"> 
                <div class="col-sm-8 titulo" >
                    <CENTER> 
                    <font color="white"><blink><h3>RECOMENDADOR</h3></blink>                        
                    VENTAS POR AGENTE </font></CENTER>
                </div>
                <div class="titulo">
                    <ul class="list-group">
                        <li class="border badge badge-primary badge-pill">
                            <span class="border badge badge-dark badge-pill"><?php echo $nombre." ".$apellido; ?></span><br>  
                            <span class="border badge badge-dark badge-pill"><?php echo $cargo; ?></span>
                        </li>
                    </ul>
                </div> 
            </div>
        </nav><br><br><br><br><br><br>              
        
<!--****************************************************** header
    
 *************************************************************************-->
        <div class="container">
            
            <div class="row">
                <div class="col-sm-2 ">
                    <ul class="list-group">
                        <li class="border badge badge-success badge-pill">
                            VENTAS DIARIAS
                            <span class="border badge badge-dark badge-pill">
                            <?php echo $row2['conteo']; ?>
                            </span>
                        </li>
                        <li class="border badge badge-primary badge-pill">
                            VENTAS <?php if (date('m')==1) {?>
                            ENERO<?php }?>
                            <?php if (date('m')==2) {?>
                            FEBRERO<?php }?>
                            <?php if (date('m')==3) {?>
                            MARZO<?php }?>
                            <?php if (date('m')==4) {?>
                            ABRIL<?php }?>
                            <?php if (date('m')==5) {?>
                            MAYO<?php }?>   
                            <?php if (date('m')==6) {?>
                            JUNIO<?php }?>
                            <?php if (date('m')==7) {?>
                            JULIO<?php }?>
                            <?php if (date('m')==8) {?>
                            AGOSTO <?php }?>
                            <?php if (date('m')==9) {?>
                            SEPTIEMBRE<?php }?>
                            <?php if (date('m')==10) {?>
                            OCTUBRE<?php }?>
                            <?php if (date('m')==11) {?>
                            NOVIEMBRE<?php }?>
                            <?php if (date('m')==12) {?>
                            DICIEMBRE<?php }?>
                            <span class="border badge badge-dark badge-pill">
                            <?php echo $row3['conteo']; ?></span>
                        </li>
                        <li class="border badge badge-danger badge-pill">
                            HISTORICO DE VENTAS
                            <span class="border badge badge-dark badge-pill"><?php echo $row4['conteo']; ?>
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-9">
                    <h2 style="text-align:center">

                        VENTAS AGENTE 
                        <span class="border border badge badge-dark badge-pill"><marquee><?php if ( $_SESSION['cargo']<>2 ) {echo $row1['nombres']." ".$row1['apellidos'];
                            } else { echo $row1['nombres'];} ?>
                        </marquee></span>
                    </h2>
                </div>
            </div>
            </div>
            
        </div>

<!--****************************************************** Tabla de batos *****************************************************************-->
        <div class="container-fluid">
            <div class="row">
                <div class="col ">
                    <div class="table-responsive shadow-lg p-3 mb-5 bg-white rounded">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-sm-8 ">
                                
                                </div>
                                <div class="col-sm-2 ">
                                    
                                </div>
                                <div class="col-sm-2 ">
                                 <input class="form-control justify-content-end" id="myInput" type="text" placeholder="Filtrar.." align="left">   
                                </div>
                            </div>
                        </div>
                        
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th><center>ID LLAMADA</th>
                                    <th><center>CLIENTE</th>
                                    <th><center>AGENTE</th>
                                    <th><center>CAMPAÑA</th>
                                    <th><center>TOKEN</th>
                                    <th><center>FECHA VENTA</th>
                                    <th><center>VER</th>    
                                </tr>
                            </thead>
                            <!--cuerpo de la tabla-->
                            <tbody id="myTable">
                                <?php while($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                                    <tr>
                                        <td><?php echo $row['id_llamada']; ?></td>
                                        <td><?php echo $row['cedula_cliente']; ?></td>
                                        <td><?php echo $row['usuario_cedula']; ?></td>
                                        <td><?php echo $row['campana']; ?>
                                        <td><?php echo $row['token_movil']; ?>
                                        <td><?php echo $row['registro']; ?>
                                        <td><center><a href="detalle.php?token=<?php echo $row['token_movil']; ?>"><i class="fas fa-eye"></i></a></td></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
            </div>
                </div>
            </div>
        </div>
<!--****************************************************** foother ************************************************************************-->
 
         <div class="container">    
            <div class="row">
                <div class="col">
                     <div class="row justify-content-md-center">
                        <div class="footer-copyright  py-3" style="font-family: 'IM Fell English SC', serif;">© 2018 Copyright:<a style="font-family: 'IM Fell English SC', serif;">Be Call <img src="../../imagenes/logos/logo.png" width="50" height="30"></a>
                            <center><p>Tecnologia Pereira</p></center>
                        </div>
                              
                    </div>
                </div>
                
            </div>
        </div>
<!--******************************************************************************************************************************-->
            <!-- Optional JavaScript -->
            <script>
            $(document).ready(function(){
              $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });
            });
            </script>
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function(){
                $('[data-toggle="popover"]').popover();
                });
            </script>
    </body>
</html>