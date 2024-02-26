<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends CI_Model
{
  function getMenus($tipo = 0, $role)
  {
      $this->db->select('M.id_menu, M.icono, M.nombre_menu,  M.link, M.orden, M.padre');
      $this->db->from('menu as M');
      $this->db->join('menu_permisos as MP', 'MP.id_menu= M.id_menu','left');
      // $this->db->where('M.tipo',$tipo);
      $this->db->where('MP.id_rol',$role);
      $this->db->order_by('M.orden', 'ASC');
    
      $query = $this->db->get();
      return $query->result();
  }

  function getAcceso($role,$uri)
  {
      $this->db->select('M.id_menu');
      $this->db->from('menu as M');
      $this->db->join('menu_permisos as MP', 'MP.id_menu= M.id_menu','left');
      $this->db->where('MP.id_rol',$role);
      $this->db->where('M.link',$uri);

      $query = $this->db->get();
    
  		return $query->num_rows();
  }

}

?>
