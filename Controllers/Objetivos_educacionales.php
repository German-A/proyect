<?php

class objetivos_educacionales extends Controllers
{
    public function __construct()
    {
        session_start();
        //session_regenerate_id(true);
        parent::__construct();
        if (empty($_SESSION['login'])) {
            header('Location: ' . base_url() . '/login');
        }
        getPermisos(4);
    }

    #region objetivos_educacionales

    //vistaA
    public function objetivos_educacionales($id)
    {
        if (empty($_SESSION['permisosMod']['r'])) {
            header("Location:" . base_url() . '/dashboard');
        }
        $data['page_tag'] = "objetivos_educacionaless";
        $data['page_title'] = "objetivos_educacionaless <small></small>";
        $data['page_name'] = "objetivos_educacionaless";
        $data['page_functions_js'] = "functions_objetivos_educacionales.js";
        $data['id_empresa'] = $id;
        $this->views->getView($this, "objetivos_educacionales", $data);
    }

    //listado
    public function getAll($id)
    {

        if ($_SESSION['permisosMod']['r']) {
            $arrData = $this->model->get_all($id);

            for ($i = 0; $i < count($arrData); $i++) {

                $btnView = '';
                $btnEdit = '';
                $btnDelete = '';

                if ($arrData[$i]['status'] == 0) {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Eliminado</span>';
                }

                if ($arrData[$i]['status'] == 1) {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
                }

                if ($arrData[$i]['status'] == 2) {
                    $arrData[$i]['status'] = '<span class="badge badge-warning">Inactivo</span>';
                }


                if ($_SESSION['permisos'][4]['u']) {
                    $btnEdit = '<button class="btn btn-primary  btn-sm btnEditobjetivos_educacionales" onClick="fntEditobjetivos_educacionales(this,' . $arrData[$i]['idobjetivos_educacionales'] . ')" title="Editar objetivos_educacionales"><i class="fas fa-pencil-alt"></i></button>';
                } else {
                    $btnEdit = '<button class="btn btn-secondary btn-sm" disabled ><i class="fas fa-pencil-alt"></i></button>';
                }

                if ($_SESSION['permisos'][4]['d']) {
                    $btnDelete = '<button class="btn btn-danger btn-sm btnDelobjetivos_educacionaless" onClick="ftnDelobjetivos_educacionales(' . $arrData[$i]['idobjetivos_educacionales'] . ')" title="Eliminar objetivos_educacionales"><i class="far fa-trash-alt"></i></button>';
                } else {
                    $btnDelete = '<button class="btn btn-secondary btn-sm" disabled ><i class="far fa-trash-alt"></i></button>';
                }

                $arrData[$i]['options'] = '<div class="text-center"> ' . $btnView . ' ' . $btnEdit . ' ' . $btnDelete . '</div>';
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //insertar y actualizar
    /*registro de objetivos_educacionales se asiga por defecto al usuario admin*/
    public function set()
    {
        if ($_POST) {
            if (empty($_POST['txtdescripcionobjetivos_educacionales']) || empty($_POST['txtfechainiciopostulacion'])) {
                $arrResponse = array("status" => false, "msg" => 'Faltan Datos.');
            } else {


                $id_objetivos_educacionales = intval($_POST['id']);
                $descripcion = strClean($_POST['descripcion']);
                $status = strClean($_POST['status']);

                $insert = "";

                try {
                    if ($id_objetivos_educacionales == 0) {
                        $option = 1;

                        if ($_SESSION['permisosMod']['w']) {
                            $insert = $this->model->insert_objetivos_educacionales($descripcion, $status);
                        }
                    } else {
                        $option = 2;

                        if ($_SESSION['permisosMod']['u']) {
                            $insert = $this->model->update_objetivos_educacionales($id_objetivos_educacionales, $descripcion, $status);
                        }
                    }

                    if ($insert > 0) {
                        if ($option == 1) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                        }
                        if ($option == 2) {
                            $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                        }
                    } else {
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }


    //obtener un registro
    public function getobjetivos_educacionales()
    {
        if ($_SESSION['permisosMod']['r']) {

            $idobjetivos_educacionales = intval($_POST['id']);

            if ($idobjetivos_educacionales > 0) {
                $arrData = $this->model->select_objetivos_educacionales($idobjetivos_educacionales);
                if (empty($arrData)) {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                } else {
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    //borrar 
    public function delobjetivos_educacionales()
    {
        if ($_POST) {
            if ($_SESSION['permisosMod']['d']) {
                $idobjetivos_educacionales = intval($_POST['id']);
                $requestDelete = $this->model->delete_objetivos_educacionales($idobjetivos_educacionales);
                if ($requestDelete) {
                    $arrData = array('status' => true, 'msg' => 'Se ha eliminado el Banner');
                } else {
                    $arrData = array('status' => false, 'msg' => 'Error al eliminar el Bnner.');
                }
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }

    //BUSCAR EMPRESAS ASIGNADAS
    public function getSelectEmpresas()
    {
        $search = "";
        if (!isset($_POST['palabraClave'])) {
            $arrData = $this->model->select_emoresa($_SESSION['idUser']);
        } else {
            $search = $_POST['palabraClave'];

            $arrData = $this->model->select_emoresas($_SESSION['idUser'], $search);
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    #endregion objetivos_educacionales

    #region ASIGNAR_objetivos_educacionalesS

    //buscar uuarios para asignar objetivos_educacionales
    public function getUsuarios()
    {
        $search = "";
        if (!isset($_POST['palabraClave'])) {
            $arrData = $this->model->select_usuarios_asignar();
        } else {
            $search = $_POST['palabraClave'];

            $arrData = $this->model->select_usuarios_asignar_like($search);
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Asignar objetivos_educacionales a un usuario
    public function asignarPublicaciones()
    {
        $id_objetivos_educacionales = intval($_POST['id']);
        $id_persona = intval($_POST['txtUsuario']);
        $requestDelete = $this->model->asignar_publicaciones($id_objetivos_educacionales, $id_persona);
        if ($requestDelete) {
            $arrData = array('status' => true, 'msg' => 'Empresas sin Revisión');
        } else {
            $arrData = array('status' => false, 'msg' => 'Error en Empresas sin Revisión.');
        }
        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        die();
    }
    #endregion ASIGNAR_objetivos_educacionalesS

    #region CREAR X

    #endregion CREAR X
}
