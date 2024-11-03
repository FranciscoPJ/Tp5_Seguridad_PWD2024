<?php
include_once "Estructura/Header.php";
?>

    <div class="container d-flex justify-content-center align-items-center" id="container" style="height: 88vh;">        

        <form action="Action/actionRegistrar.php" method="POST" class="bg-white p-4 rounded shadow" style="width: 100%; max-width: 400px;">
            
            <h2 class="text-center mb-2">Registrarse</h2>
            
            <div class="mb-3">                 

                <!-- nombre -->
                <label for="nombre" class="form-label my-1">Nombre de Usuario:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese un Nombre de Usuario..." required>

                <!-- mail -->
                <label for="mail" class="form-label my-1">Mail:</label>
                <input type="email" id="mail" name="mail" class="form-control" placeholder="Ingrese un Mail: Mail@a.com..." required>

                <!-- descripcion -->
                <label for="descripcion" class="form-label my-1">Rol:</label>
                <select type="text" id="descripcion" name="descripcion" class="form-select" require>
                    <option value="">Seleccione un Rol...</option>
                    <option value="cliente">Cliente</option>
                    <option value="vendedor">Vendedor</option>
                </select>

                <!-- password -->
                <label for="password" class="form-label my-1">Password:</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingrese un Password..." required>                               
                
                <!-- hidden -->
                <input type="hidden" id="deshabilitado" name="deshabilitado" class="form-control" value="<?php echo '0000-00-00 00:00:00'; ?>">
                <!-- date('Y-m-d H:i:s') -->
            </div>

            <button type="submit" class="btn btn-success w-100">Enviar</button>
            <div class="my-1"><a class="btn btn-primary w-100" role="button" href="login.php">Volver</a></div>
            

        </form>

    </div>    


    <!-- js validacion formulario -->
    <!-- <script src="Asets/md5.js"></script> -->
    <?php
    include_once "Estructura/Footer.php";
    ?>