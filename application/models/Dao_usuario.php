<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Dao_usuario extends CI_Model{
	public function __construct(){
		parent::__construct();
	}
	public function usuario($id)
	{
		$this->db->where('id_usuario',$id);
		return $this->db->get('usuario')->result();
	}
    public function usuarios()
    {
        return $this->db->get('usuario')->result();
    }
	public function editar_usuario($id,$campos)
    {
    	$this->db->set($campos);
    	$this->db->where('id_usuario', $id);
    	return $this->db->update('usuario');
    }
    public function salvar_usuario($campos)
    {
    	$this->db->set($campos);
    	return $this->db->insert('usuario');
    }
    public function status_usuario($id,$status)
    {
        $this->db->set('ativo',$status);
        $this->db->where('id_usuario', $id);
        return $this->db->update('usuario');
    }
     public function deletar_usuario($id)
    {
     return $this->db->delete('usuario', array('id_usuario' => $id)); 
    }
}