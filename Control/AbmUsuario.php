<?php
class AbmUsuario
{
    /**
     * Carga un objeto AbmUsuario con los parámetros provistos
     * @param array $param
     * @return Usuario
     */
    private function cargarObjeto($param)
    {
        $obj = null;
        if (array_key_exists('nombre', $param) && array_key_exists('password', $param) && array_key_exists('mail', $param) && array_key_exists('deshabilitado', $param)) {
            $obj = new Usuario();
            if(isset($param['id'])){
                // Si tiene un Id, que se lo ponga (modificar)
                $obj->setear($param['id'], $param['nombre'], $param['password'], $param['mail'], $param['deshabilitado']);
            } else {
                // Si no tiene ID no es necesario poner el param, ya que es autoincremental (insertar)
                $obj->setear(null, $param['nombre'], $param['password'], $param['mail'], $param['deshabilitado']);
            }            
        }
        return $obj;
    }

    /**
     * Carga un objeto AbmUsuario con la clave primaria
     * @param array $param
     * @return Usuario
     */
    private function cargarObjetoConClave($param)
    {
        $obj = null;
        if (isset($param['id'])) {
            $obj = new Usuario();
            $obj->setId($param['id']);
            $obj->cargar();  // Carga el resto de los datos desde la DB
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return BOOLEAN
     */
    private function seteadosCamposClaves($param)
    {   
        return isset($param['id']);
    }

    /**
     * Alta (A): Es el proceso de crear o agregar un nuevo objeto o registro a un sistema.
     * @param array $param
     */
    public function alta($param)
    { //agrega
        $resp = false;
        $param['id'] = null;
        $objAbmUsuario = $this->cargarObjeto($param);
        if ($objAbmUsuario != null && $objAbmUsuario->insertar()) {
            $resp = $objAbmUsuario;
        }
        return $resp;
    }

    /**
     * Baja (B): Se refiere a eliminar un objeto o registro existente.
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param)
    { //elimina
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objAbmUsuario = $this->cargarObjetoConClave($param);
            if ($objAbmUsuario != null && $objAbmUsuario->eliminar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * Modificación (M): Es la actualización de la información de un objeto o registro existente.
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param)
    {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $objAbmUsuario = $this->cargarObjeto($param);
            if ($objAbmUsuario != null && $objAbmUsuario->modificar()) {
                $resp = true;
            }
        }
        return $resp;
    }

    /**
     * permite buscar un objeto
     * @param array $param
     * @return ARRAY
     */
    public function buscar($param)
    {   
        $where = "true";
        if ($param <> NULL) {

            if (isset($param['id'])) {
                $where .= " and id = " . $param['id'] . "";
            }
            
            if (isset($param['nombre'])) {
                $where .= " and nombre = '" . $param['nombre'] . "'";
            }

            if (isset($param['password'])) {
                $where .= " and password = '" . $param['password'] . "'";
            }

            if (isset($param['mail'])) {
                $where .= " and mail = '" . $param['mail'] . "'";
            }

            if (isset($param['deshabilitado'])) {
                $where .= " and deshabilitado = '" . $param['deshabilitado'] . "'";
            }
        }
        $arreglo = Usuario::listar($where);
        return $arreglo;
    }

    /**
     * permite dar un array de los datos del objeto
     * @param array $param
     * @return ARRAY
     */
    public function darArray($param = "")
    {

        $arregloObjAbmUsuario = $this->buscar($param);
        $listadoArray = [];

        if (count($arregloObjAbmUsuario) > 0) {

            foreach ($arregloObjAbmUsuario as $objAbmUsuario) {
                $arrayAbmUsuario = [
                    'id' => $objAbmUsuario->getId(),
                    'nombre' => $objAbmUsuario->getNombre(),
                    'password' => $objAbmUsuario->getPassword(),
                    'mail' => $objAbmUsuario->getMail(),
                    'deshabilitado' => $objAbmUsuario->getDeshabilitado()
                ];

                array_push($listadoArray, $arrayAbmUsuario);
            }
        }
        return  $listadoArray;
    }

}
?>