<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{

    /**
     * This function used to check the login credentials of the user
     * @param string $email : This is email of the user
     * @param string $password : This is encrypted password of the user
     */
    function loginMe($email, $encryptedPassword)
    {

        $this->db->select('usuarios.id_usuario, usuarios.nombre, Usuario_Rol.id_rol');
        // Usuario_Rol.id_rol, Roles.nombre_rol as role');
        $this->db->from('usuarios');
        $this->db->join('Usuario_Rol', 'usuarios.id_usuario = usuario_rol.id_usuario');
        $this->db->join('Roles', 'Usuario_Rol.id_rol = Roles.id_rol');
        $this->db->where('usuarios.correo', $email);
        $this->db->where('usuarios.contraseña', $encryptedPassword);
        $query = $this->db->get();
        

        return $query->result();
    }


}

?>
