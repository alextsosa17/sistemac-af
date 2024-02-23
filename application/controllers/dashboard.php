<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController
{

    public function __construct() // This is default constructor of the class.

    {
        parent::__construct();
        $this->isLoggedIn();
        // $this->menuPermisos();
        // $this->load->model('dashboard_model');
        $this->load->model('user_model');
        // $this->load->model('municipios_model');
        // $this->load->model('ordenes_model');
        // $this->load->model('protocolos_model');
        // $this->load->model('ordenesb_model');
        // $this->load->model('socios_model');
        // $this->load->model('equipos_model');
        // $this->load->model('calib_model');
        // $this->load->model('utilidades_model');
    }

    public function index() // Index Page for this controller.

    {   
        
        $this->global['pageTitle'] = 'Sistema de Gestion';

        $role = $this->role;

        $userId = $this->session->userdata('userId');
        /*Equipos*/ //aca podria ir los datos de los productos 
            // $this->data['count_equipos'] = $this->dashboard_model->get_count_record($userId, $role, $grupoGestor); //Total de Equipos.
            // $this->data['count_operativos'] = $this->dashboard_model->contarOperativos(1, $userId, $role, $grupoGestor); //Total de Operativos.
            // $this->data['count_no_operativos'] = $this->dashboard_model->contarOperativos(0, $userId, $role, $grupoGestor); //Total de Operativos.

            /*Calibracion*/
            // $this->data['count_eqInti'] = $this->dashboard_model->get_count_estado(4, null, $userId, $role, $grupoGestor); //Total Equipos INTI.
            // $this->data['list_calibVencidas'] = $this->dashboard_model->equipos_calib_vencidas($userId, $role, $grupoGestor); //Calibraciones vencidas.
            // $this->data['list_calibVence'] = $this->dashboard_model->equipos_calib_vence($userId, $role, $grupoGestor); //Calibraciones a vencer.
            // $vencen = count($this->data['list_calibVence']);
            // $vencidas = count($this->data['list_calibVencidas']);
            // $this->data['requierenCalib'] = $vencen + $vencidas;

            // $documentacion = array(80, 81);
            // $this->data['documentacion'] = $this->calib_model->listadoOrdenes('', null, null, null, $this->role, $this->session->userdata('userId'), $documentacion);
            // /*Falta info y contadores*/

            /*Reparacion*/
            // $this->data['count_socio'] = $this->dashboard_model->get_count_estado(3, 20, $userId, $role, $grupoGestor); //Total equipos en Socio.
            // $this->data['count_oficina_tecnica'] = $this->dashboard_model->get_count_estado(5, null, $userId, $role, $grupoGestor); //Total equipos en la oficina Tecnica.
            // $this->data['count_proyecto_repa'] = $this->dashboard_model->get_count_estado(2, 20, $userId, $role, $grupoGestor); //Total equipos en la oficina Tecnica.

    //         $estadoSocio = array(1, 2, 3);
    //         $this->data['count_socio2'] = $this->socios_model->listadoRemitos('', null, null, null, $role, $userId, $estadoSocio);

    //         $estadosEquipos = array(3);
    //         $this->data['count_socio2'] = $this->dashboard_model->repa_ofTecnica(REPA_ABIERTAS, $estadosEquipos, $role, $userId);

    //         $estadosEquipos2 = array(1, 4, 5);
    //         $this->data['count_oficina_tecnica2'] = $this->dashboard_model->repa_ofTecnica(REPA_ABIERTAS, $estadosEquipos2, $role, $userId);

    //         $estadosEquipos3 = array(2);
    //         $this->data['count_proyecto_repa2'] = $this->dashboard_model->repa_ofTecnica(REPA_ABIERTAS, $estadosEquipos3, $role, $userId);

    //         $estadosRepa = array(2);
    //         $this->data['count_solicitudes_repa'] = $this->dashboard_model->repa_ofTecnica($estadosRepa, null, $role, $userId);

    //         /*Ordenes Abiertas*/
    //         $estadosM = array(3, 4, 5, 6, 9, 10, 11);
    //         $this->data['reparacion'] = $this->ordenes_model->getCountOrdenes(REPA_ABIERTAS, 'R', null, $searchText, $userId, $role);
    //         $this->data['mantenimiento'] = $this->ordenes_model->getCountOrdenes($estadosM, 'M', null, $searchText, $userId, $role);
    //         $this->data['instalacion'] = $this->ordenes_model->getCountOrdenes($estadosM, 'I', null, $searchText, $userId, $role);
    //         $this->data['bajada'] = $this->ordenesb_model->ordenesCount('', 'SP', null, $userId, $role);
    //         $abiertas = array(30, 40, 51, 60, 61);
    //         $this->data['calibraciones'] = $this->calib_model->listadoOrdenes('', null, null, null, $this->role, $this->session->userdata('userId'), $abiertas);

    //         /*Proyectos*/
    //         $this->data['proyecto_total'] = $this->municipios_model->municipiosListingCount('', null, $userId, $role, $grupoGestor, null);
    //         $this->data['proyecto_activos'] = $this->municipios_model->municipiosListingCount('', null, $userId, $role, $grupoGestor, 1);
    //         $this->data['proyecto_inactivos'] = $this->municipios_model->municipiosListingCount('', null, $userId, $role, $grupoGestor, 0);

    //         $this->data['porcentaje_activo'] = $this->utilidades_model->porcentaje($this->data['proyecto_activos'], $this->data['proyecto_total'], 0);
    //         $this->data['porcentaje_inactivo'] = $this->utilidades_model->porcentaje($this->data['proyecto_inactivos'], $this->data['proyecto_total'], 0);

    //         /*Estados de los equipos*/
    //         $this->data['count_deposito'] = $this->dashboard_model->get_count_estado(1, null, $userId, $role, $grupoGestor); //Total equipos en Deposito.
    //         $this->data['count_proyecto'] = $this->dashboard_model->get_count_estado(2, null, $userId, $role, $grupoGestor); //Total equipos en Proyecto.
    //         $this->data['count_socio'] = $this->dashboard_model->get_count_estado(3, null, $userId, $role, $grupoGestor); //Total equipos en Socio.
    //         $this->data['count_inti'] = $this->dashboard_model->get_count_estado(4, null, $userId, $role, $grupoGestor); //Total equipos en INTI.
    //         $this->data['count_oficina_tecnica'] = $this->dashboard_model->get_count_estado(5, null, $userId, $role, $grupoGestor); //Total equipos en la oficina Tecnica.
    //         $this->data['count_robados'] = $this->dashboard_model->get_count_estado(6, null, $userId, $role, $grupoGestor); //Total equipos Robados.
    //         $this->data['count_vandalizados'] = $this->dashboard_model->get_count_estado(7, null, $userId, $role, $grupoGestor); //Total equipos Vandalizados.

    //         $this->data['porcentaje_deposito'] = $this->utilidades_model->porcentaje($this->data['count_deposito'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_proyecto'] = $this->utilidades_model->porcentaje($this->data['count_proyecto'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_socio'] = $this->utilidades_model->porcentaje($this->data['count_socio'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_inti'] = $this->utilidades_model->porcentaje($this->data['count_inti'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_oficina_tecnica'] = $this->utilidades_model->porcentaje($this->data['count_oficina_tecnica'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_robados'] = $this->utilidades_model->porcentaje($this->data['count_robados'], $this->data['count_equipos'], 0);
    //         $this->data['porcentaje_vandalizados'] = $this->utilidades_model->porcentaje($this->data['count_vandalizados'], $this->data['count_equipos'], 0);

    //         /*Alertas*/
    //         $this->data['novedades'] = $this->ordenes_model->getOrdenes(1, null, null, '', $userId, $role, 6, null);

    //         $datos_calles = array('-', 0, "", " ");
    //         $tipos_equipos = array(1, 4, 8, 2403, 2406, 2407, 2414);
    //         $this->data['direccion'] = $this->dashboard_model->direccion($datos_calles, $tipos_equipos, $userId, $role, $grupoGestor);

    //         $datos_altura = array(0, " ", "");
    //         $this->data['altura'] = $this->dashboard_model->altura($datos_altura, $tipos_equipos, $userId, $role, $grupoGestor);

    //         $this->data['tipo'] = $this->dashboard_model->tipo($userId, $role, $grupoGestor);

    //         $equiposCalibrar = $this->calib_model->getEquiposCalibrar(1);
    //         $this->data['vencimiento'] = $this->dashboard_model->vencimiento($equiposCalibrar, $userId, $role, $grupoGestor);

    //         $this->data['calibracion'] = $this->dashboard_model->calibracion($equiposCalibrar, $userId, $role, $grupoGestor);

    //         $this->data['sentido'] = $this->dashboard_model->sentido($tipos_equipos, $userId, $role, $grupoGestor);

    //         $datos_geo = array(0, " ", "", "-");
    //         $this->data['longitud'] = $this->dashboard_model->longitud($datos_geo, $tipos_equipos, $userId, $role, $grupoGestor);

    //         $this->data['latitud'] = $this->dashboard_model->latitud($datos_geo, $tipos_equipos, $userId, $role, $grupoGestor);

    // //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //         $this->data['municipioInfo'] = $this->municipios_model->getMunicipioInfo(12);
    //         $this->data['estados'] = $this->equipos_model->getEstadosPorProyectos(7);

    //         $this->data['count_eqDeposito'] = $this->dashboard_model->get_count_estado(1, null, $userId, $role, $grupoGestor); //Total Equipos Depósito.
    //         $this->data['count_eqRepa'] = $this->dashboard_model->get_count_evento(20, $userId, $role, $grupoGestor); //Total Equipos Reparación.

    //         $this->data['count_eqAfect'] = $this->dashboard_model->get_count_evento(40, $userId, $role, $grupoGestor, 60); //Total Equipos Instalados.
    //         $this->data['count_activos_P'] = $this->dashboard_model->get_count_activosP($userId, $role, $grupoGestor); //Total de Equipos Activos.
    //         $this->data['count_eqcalib'] = $this->dashboard_model->get_count_calib(1, $userId, $role, $grupoGestor); //Requieren Calibracion.

    //         $this->data['list_eqAfect'] = $this->dashboard_model->equipos_evento(40, $userId, $role, $grupoGestor, 5); //Equipos Activos en los 14 dias.

    //         $this->data['afectados_municipios'] = $this->dashboard_model->equipos_evento(40, $userId, $role, $grupoGestor, null, 1); //Cantidad equipos afectados por proyectos

    //         $this->data['afectados_tipos'] = $this->dashboard_model->equipos_evento(40, $userId, $role, $grupoGestor, null, 2); //Cantidad tipo de equipos afectados.

    //         $this->data['total_instalados'] = count($this->dashboard_model->equipos_evento(40, $userId, $role, $grupoGestor, null));

    //         $this->data['total_avencer'] = $vencen;

    //         $this->data['total_novedades'] = $this->ordenes_model->getCountOrdenes(1, null, null, '', $userId, $role);

    //         $this->data['protocolos'] = $this->protocolos_model->protocolosList('', 6, 0, "Pendiente", null, $userId, $role);
    //         $this->data['total_protocolos'] = $this->protocolos_model->protocolosCount('', "Pendiente", null, $userId, $role);

    //         $this->data['bajadas'] = $this->ordenesb_model->ordenesList('', 6, 0, "SP", null, $userId, $role);

    //         $this->data['remitos_pendientes'] = $this->socios_model->contarRemitos($userId, $role, 0);
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('dashboard', $this->data);
        $this->load->view('includes/footer');
    }

    public function bienvenido()
    {
        $this->global['pageTitle'] = 'CECAITRA: Sistema';
        $userName = $this->session->userdata('name');
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        // Obtener la hora actual del servidor
        $hora_actual = date('H');
       
        // Determinar el momento del día
        if ($hora_actual >= 5 && $hora_actual < 12) {
            $saludo = "Buenos días $userName   ";
        } elseif ($hora_actual >= 12 && $hora_actual < 19) {
            $saludo = "Buenas tardes $userName   ";
        } else {
            $saludo = "Buenas noches $userName   ";
        }

        // Pasar el saludo a la vista a través del arreglo $this->data
        $this->data['saludo'] = $saludo;

        //---- carga de las vistas que tiene que mostrar luego de redireccionar el login----
        $this->load->view('includes/header', $this->global);
        $this->load->view('includes/menu', $this->menu);
        $this->load->view('bienvenido', $this->data);
        $this->load->view('includes/footer');

    }
}
