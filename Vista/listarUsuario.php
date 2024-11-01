<?php
include_once("../configuracion.php");
include_once "Estructura/HeaderSeguro.php";
$datos = data_submitted();
//verEstructura($datos);
$objAbmUsuarioRol = new AbmUsuarioRol();

$colObjAbmUsuarioRol = $objAbmUsuarioRol->darArrayCompleto(null);
//verEstructura($colObjAbmUsuarioRol);
?>

<div>
    <h1>Lista de Usarios</h1>

    <table class="table table-bordered table-striped table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th> Id Usuario </th>
                <th> Nombre  </th>
                <!-- <th> Password </th> -->
                <th> Mail </th>
                <th> Deshabilitado </th>
                <!-- <th> Id Rol </th> -->
                <!-- <th> Descripcion </th> -->
                <th> Acciones </th>
                <!-- <th> Editar </th> -->
                <!-- <th> Eliminar </th> -->
            </tr>

        </thead>
        <tbody>
            <?php
            if (count($colObjAbmUsuarioRol) > 0) {
                $i = 0;
                $encontrado = false;
                while($i < count($colObjAbmUsuarioRol) && !$encontrado){
                    if($colObjAbmUsuarioRol[$i]['deshabilitado'] == '0000-00-00 00:00:00'){
                        $encontrado = true;
                    }
                    $i++;
                }

                if($encontrado){

                    foreach ($colObjAbmUsuarioRol as $usuarioArray) {
                        if($usuarioArray['deshabilitado'] == '0000-00-00 00:00:00'){
                            echo '<tr><td>' . $usuarioArray['idusuario'] . '</td>';
                            echo '<td>' . $usuarioArray['nombre'] . '</td>';
                            //echo '<td style="width:100px;">' . $usuarioArray['password'] . '</td>';
                            echo '<td>' . $usuarioArray['mail'] . '</td>';
                            echo '<td>' . $usuarioArray['deshabilitado'] . '</td>';
                            //echo '<td style="width:100px;">' . $usuarioArray['idrol'] . '</td>';
                            //echo '<td style="width:100px;">' . $usuarioArray['descripcion'] . '</td>';
                            echo '<td><a class="btn btn-info" role="button" href="editarUsuario.php?accion=editar&id=' . $usuarioArray['idusuario'] . '">Editar</a>';
                            echo '<a class="btn btn-danger my-1 mx-1" role="button" href="Action/actionEliminarLogin.php?accion=eliminar&id=' . $usuarioArray['idusuario'] . '">Eliminar</a>';
                            echo '</td>';                    
                            echo '</tr>';
                        } // fin if                                     
                    } // fin foreach

                } else { /*fin if ($encontrado)*/
                    echo '<tr><td colspan="8">No Hay Usuarios Habilitados En El Sistema.</td></tr>';                
                } /*else*/
                
            } else { /*fin if (count($colObjAbmUsuarioRol) > 0)*/
                echo '<tr><td colspan="8">No Hay Usuarios Cargados En El Sistema.</td></tr>';
            } // fin else
            ?>
        </tbody>
    </table>

    <div class="my-1"><a class="btn btn-secondary w-100" role="button" href="paginaSegura.php?">Volver</a></div>
        
</div>


<?php
    include_once "Estructura/Footer.php";
?>