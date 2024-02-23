<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Verificacion extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->isLoggedIn();
        $this->menuPermisos();
        $this->load->model('verificacion_model');
        $this->load->model('municipios_model');
        $this->load->model('equipos_model');
        $this->load->model('protocolos_model');
        $this->load->model('user_model');
        $this->load->model('ssti_model');
        $this->load->library('pagination');
    }

    public function index()
    {
        $this->global['pageTitle'] = 'CECAITRA: Adminstracion';

        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('socios');
        $this->load->view('includes/footer');
    }

//////////// VISTAS ///////////////

    public function verificar_protocolos()
    {
        $searchText = $this->input->post('searchText');
        $criterio = $this->input->post('criterio');
        $data['searchText'] = $searchText;
        $data['criterio'] = $criterio;

        $opciones = array(0 => 'Todos', 'PM.id' => 'Nº Protocolo', 'PM.equipo_serie' => 'Equipo', 'MUN.descrip' => 'Proyecto', '1' => 'Cantidad', '2' => 'Fecha TS', 'PV.descrip' => 'Estado');
        $estados = array(10, 20, 40);

        $count = $this->verificacion_model->verificacionListing($searchText, $criterio, null, null, $this->role, $this->session->userdata('userId'), $estados, $opciones);
     
        $returns = $this->paginationCompress("verificar_protocolos/", $count, CANTPAGINA);
        $data['protocolos'] = $this->verificacion_model->verificacionListing($searchText, $criterio, $returns["page"],
            $returns["segment"], $this->role, $this->session->userdata('userId'), $estados, $opciones);

        $data['titulo'] = 'Verificar Protocolos';
        $data['total'] = $count;
        $data['total_tabla'] = $this->verificacion_model->verificacionListing('', $criterio, null, null, $this->role, $this->session->userdata('userId'), $estados, $opciones);
        $data['opciones'] = $opciones;

        $verificadorRoles = array(20, 21);
        $data['verificadores'] = $this->verificacion_model->verificadores($verificadorRoles);
  
        //$data['permisosInfo'] = $this->user_model->getPermisosInfo($this->session->userdata('userId'));

        $this->global['pageTitle'] = 'CECAITRA: Protocolos a Verificar';
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('verificacion/protocolos_verificar', $data);
        $this->load->view('includes/footer');
    }

    public function protocolos_asignados()
    {
        $searchText = $this->input->post('searchText');
        $criterio = $this->input->post('criterio');
        $data['searchText'] = $searchText;
        $data['criterio'] = $criterio;

        $opciones = array(0 => 'Todos', 'PM.id' => 'Nº Protocolo', 'PM.equipo_serie' => 'Equipo', 'MUN.descrip' => 'Proyecto', '1' => 'Cantidad', '2' => 'Fecha TS', 'U.name' => 'Verificador', 'PV.descrip' => 'Estado');
        $estados = array(30);   

        $count = $this->verificacion_model->verificacionListing($searchText, $criterio, null, null, $this->role, $this->session->userdata('userId'), $estados, $opciones);
        $returns = $this->paginationCompress("verificar_protocolos/", $count, CANTPAGINA);
        $data['protocolos'] = $this->verificacion_model->verificacionListing($searchText, $criterio, $returns["page"], $returns["segment"], $this->role, $this->session->userdata('userId'), $estados, $opciones);

        $data['titulo'] = 'Protocolos Asignados';
        $data['total'] = $count;
        $data['total_tabla'] = $this->verificacion_model->verificacionListing('', $criterio, null, null, $this->role, $this->session->userdata('userId'), $estados, $opciones);
        $data['opciones'] = $opciones;
        
        //$data['permisosInfo'] = $this->user_model->getPermisosInfo($this->session->userdata('userId'));

        $this->global['pageTitle'] = 'CECAITRA: Protocolos Asignados';
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('verificacion/protocolos_asignados', $data);
        $this->load->view('includes/footer');
    }

    public function ver_editadas($id_protocolo = null)
    {   
        $data['fotos'] = $this->verificacion_model->getListadoFotosEA($id_protocolo, 26);
        $data['protocolo'] = $this->verificacion_model->getIDprotocolo($id_protocolo);
        $data['id_protocolo'] = $id_protocolo;
        $data['titulo'] = "Ver editadas";

        $this->global['pageTitle'] = 'CECAITRA : Editadas aprobadas';
        $this->load->view('includes/header_layout', $this->global);
        // $this->load->view('includes/menu', $this->menu);  //comenta el menu para que no lo muestre
        $this->load->view('verificacion/editadas_aprobadas', $data);
        $this->load->view('includes/footer');

    }

    public function verificacion_descartadas($id_protocolo = null)
    {
        $data['fotos'] = $this->verificacion_model->getListadoFotosEA($id_protocolo, 27);
        $data['protocolo'] = $this->verificacion_model->getIDprotocolo($id_protocolo);
        $data['id_protocolo'] = $id_protocolo;
        $data['titulo'] = "Verificacion descartadas";
        $this->global['pageTitle'] = 'CECAITRA : Verificacion descartadas';
        $this->load->view('includes/header_layout', $this->global);
        //$this->load->view('includes/menu', $this->menu);
        $this->load->view('verificacion/imagenes_verificadas', $data);
        $this->load->view('includes/footer');
    }

    public function verificacion_aprobadas($id_protocolo = null)
    {
        $data['fotos'] = $this->verificacion_model->getListadoFotosEA($id_protocolo, 26);
        $data['protocolo'] = $this->verificacion_model->getIDprotocolo($id_protocolo);
        $data['id_protocolo'] = $id_protocolo;
        $data['titulo'] = "Verificacion aprobadas";

        $this->global['pageTitle'] = 'CECAITRA : Verificacion aprobadas';
        $this->load->view('includes/header_layout', $this->global);
        //$this->load->view('includes/menu', $this->menu);
        $this->load->view('verificacion/imagenes_verificadas', $data);
        $this->load->view('includes/footer');
    }

    public function obtenerDatosEditor()
    {
        //recordar de cargarla en base de datos como 'verificacion' ya que los metodos de permisos del SC con ajax retorna el nombre del controlador 
        $imagen = $this->input->post('imgSRC');
        $url = "http://201.216.208.202/integral/exportar/get_datos_editor.php?imagen=$imagen"; //web service en integral net
        $jsonResponse = file_get_contents($url); // Obtener la respuesta JSON
        $pattern = '/{.*}/s'; //Expresion regular para quedarme solo con los datos del json 

        // Buscar el JSON en el string utilizando la expresión regular
        preg_match($pattern, $jsonResponse, $matches);

        if (!empty($matches)) {
            $json = $matches[0];
            echo $json;
        } else {
            echo "No se encontró un JSON válido en el string.";
        }
        $json = json_decode($jsonResponse);

    }

    public function control_verificacion()
    {
        $data['impactados'] = $this->verificacion_model->getProtocolosProyectos(10);

        $this->global['pageTitle'] = 'CECAITRA : Control de Verificacion';
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        
        $this->load->view('verificacion/control_verificacion', $data);
        $this->load->view('includes/footer');
    }

    ////////////////// ACCIONES

    public function actualizar_entrada($id_protocolo = null)
    {
        if ($id_protocolo == null) {
            $this->session->set_flashdata('error', 'Este protocolo no existe.');
            redirect('verificar_protocolos');
        }

        $imagenes = $this->verificacion_model->getFotosImpactar($id_protocolo, 27);

        if (!$imagenes) {
            //Actualizo protocolos_main.
            $verificacionInfo = array('incorporacion_estado' => 65, 'decripto' => 4, 'est_verificacion' => 60);
            $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);

            $this->session->set_flashdata('success', "Protocolo $id_protocolo finalizado correctamente.");
            redirect('verificar_protocolos');
        }

        $i = 0;

        foreach ($imagenes as $imagen) {
            $resultado = json_decode(file_get_contents("http://ssti.cecaitra.com/WS/_estado_entrada.php?id=$imagen->identrada&e=80"), true);

            if ($resultado == true) {
                $entradaInfo = array('estado' => 80);
                $this->ssti_model->updateEntradaAuxiliar($entradaInfo, $imagen->identrada);
            } elseif ($resultado == false) {
                $i++;
            } else {
                $i = 0;
            }
        }

        if ($i == 0) {
            //Elimino los registros de este protocolo de la tabla Entrada Auxiliar.
            $this->verificacion_model->eliminarProtocolo($id_protocolo);

            // Consulto las aprobadas y descartadas para armar el array de datos de protocolos_main.
            $asignacion = $this->verificacion_model->getAsignacion($id_protocolo);
            $verificacionInfo = array('incorporacion_estado' => 65, 'decripto' => 4, 'est_verificacion' => 50, 'info_aprobados' => $asignacion->aprobados, 'info_verificacion' => $asignacion->descartados);

            //Actualizo protocolos_main.
            $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);

            $this->session->set_flashdata('success', "Protocolo $id_protocolo impactado correctamente en Entrada.");
        } else {
            $this->session->set_flashdata('warning', "Protocolo $id_protocolo impactado parcialmente. $i registros no se impactaron correctamente, por favor volver a impactar.");
        }

        redirect('verificar_protocolos');
    }

    public function copiar_registros($id_protocolo = null)
    {
        if ($id_protocolo == null) {
            $this->session->set_flashdata('error', 'Este protocolo no existe.');
            redirect('verificar_protocolos');
        }

        //Preguntar si este protocolo existe en la tabla
        $protocolo = $this->verificacion_model->getProtocoloEntradaAux($id_protocolo);

        if (!$protocolo) {
            $fotosInfo = json_decode(file_get_contents("http://201.216.208.202/integral/exportar/_ws_registros_verificacion.php?p=$id_protocolo"), true);

            if (!$fotosInfo) {
                $this->session->set_flashdata('error', 'No hay registros en estado Aprobados (26). / El protocolo aun no fue impactado de Edicion. / Servidor ocupado, intentar mas tarde.');
                redirect('verificar_protocolos');
            }

            $i = 0;

            foreach ($fotosInfo as $fotoinfo) {
                $this->ssti_model->addProtocoloEA($fotoinfo);
                $i++;
            }

            $asignacionInfo = array('id_protocolo' => $id_protocolo, 'aprobados' => $i);
            $verificacionInfo = array('est_verificacion' => 20);

            $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);
            $this->verificacion_model->addVerificacionAsignados($asignacionInfo);

            $this->session->set_flashdata('success', 'Protocolo copiado correctamente al SC.');
        } else {
            $this->session->set_flashdata('error', 'El Protocolo existe, revisar el estado de la verificacion.');
        }

        redirect('verificar_protocolos');
    }

    public function asignar_verificador()
    {
        $id_protocolo = $this->input->post('id_protocolo');
        $verificador0 = $this->input->post('verificador');

        $asignacionInfo = array('usuario' => $verificador);
        $resultado = $this->verificacion_model->updateAsignacion($asignacionInfo, $id_protocolo);

        if ($resultado) {
            $verificacionInfo = array('est_verificacion' => 30);
            $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);

            $this->session->set_flashdata('success', 'Verificador asignado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al asignar verificador.');
        }

        redirect('verificar_protocolos');
    }

    public function cerrar_asignacion()
    {
        $id_protocolo = $this->input->post('id_protocolo');

        if ($id_protocolo == null) {
            $this->session->set_flashdata('error', 'Este protocolo no existe.');
            redirect('protocolos_asignados');
        }

        $verificacionInfo = array('est_verificacion' => 40);
        $resultado = $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);

        if ($resultado) {
            $this->session->set_flashdata('success', 'Asignacion cerrada correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al cerrar una asignacion');
        }

        redirect('protocolos_asignados');
    }

    public function volver_asignar()
    {
        $id_protocolo = $this->input->post('id_protocolo');
        if ($id_protocolo == null) {
            $this->session->set_flashdata('error', 'Este protocolo no existe.');
            redirect('verificar_protocolos');
        }

        $verificacionInfo = array('est_verificacion' => 30);
        $resultado = $this->verificacion_model->updateVerificacion($verificacionInfo, $id_protocolo);
        
        if ($resultado) {
            $this->session->set_flashdata('success', 'Protocolo re asignado correctamente.');
        } else {
            $this->session->set_flashdata('error', 'Error al reasingar el protocolo.');
        }

        redirect('verificar_protocolos');
    }

    public function habilitar_verificacion()
    {
        $protocolos = $this->verificacion_model->getProtocolosImpactados();

        if ($protocolos) {
            $verificacionInfo = array('incorporacion_estado' => 69, 'decripto' => 4, 'est_verificacion' => 10);

            foreach ($protocolos as $key => $protocolo) {
                $this->verificacion_model->updateVerificacion($verificacionInfo, $protocolo->id);
            }

            $this->session->set_flashdata('success', 'Protocolos habilitados para su Verificacion correctamente.');

        } else {
            $this->session->set_flashdata('error', 'Aun no hay Protocolos impactados.');

        }

        redirect('control_verificacion');
    }

    public function copiar_registros_proyecto($id_proyecto = null)
    {   
        // Buscar todos los protocolos que estan en estado 10 de todos o un proyecto en particular
        $protocolos = $this->verificacion_model->listadoProtocolosProyectos($id_proyecto, 10); 
        if (!$protocolos) {
            $this->session->set_flashdata('error', 'No hay protocolos para verificar en el SC.');
            redirect('control_verificacion');
        }

        //Recorro el listado de protocolos.
        foreach ($protocolos as $protocolo) {
            $id_protocolo = $this->verificacion_model->getProtocoloEntradaAux($protocolo->id);

            //Filtrar los proyectos que ya existente
            if ($id_protocolo) {
                $salto = 1;
                continue;
            }

            //Busco las fotos en Edicion
            $fotosInfo = json_decode(file_get_contents("http://201.216.208.202/integral/exportar/_ws_registros_verificacion.php?p=$protocolo->id"), true);

            //Si fallo en traer las fotos paso al siguiente protocolo.
            if (!$fotosInfo) {
                $salto = 1;
                continue;
            }

            //Inserto las fotos en la tabla Entrada Auxiliar.
            $i = 0;
            foreach ($fotosInfo as $fotoinfo) {
                $this->ssti_model->addProtocoloEA($fotoinfo);
                $i++;
            }

            //Actualizo el protocolo e inserto en la tabla verificacion asignados.
            $asignacionInfo = array('id_protocolo' => $protocolo->id, 'aprobados' => $i);
            $verificacionInfo = array('est_verificacion' => 20);
            $this->verificacion_model->updateVerificacion($verificacionInfo, $protocolo->id);
            $this->verificacion_model->addVerificacionAsignados($asignacionInfo);

        }
        
        if ($salto == 1) {
            $this->session->set_flashdata('error', 'Hubo algun protocolo con error de copiado o ya se copio, avisar a Sistemas.');
        } else {
            $this->session->set_flashdata('success', 'Protocolos copiado correctamente al SC.');
        }
        
        redirect('control_verificacion');
        
    }
    
    
    
    public function estadistica_editores()
    {
        // $data
        $url = "http://localhost/WS/cantidad_fotos_por_editor.php"; //web service en integral net
        $data['datos'] = json_decode(file_get_contents($url));   
        var_dump($data);
        die;
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('verificacion/estadisticas_editores',$data);
        $this->load->view('includes/footer');

    }

}
