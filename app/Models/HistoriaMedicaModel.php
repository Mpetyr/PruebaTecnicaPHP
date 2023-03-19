<?php namespace App\Models;

    use CodeIgniter\Model;
    class HistoriaMedicaModel extends Model {

        public function listarHistorias(){
            $Historias = $this->db->query("SELECT * FROM historias_medicas");
            return $Historias->getResult();
        }

        public function insertar($datos){
            $Historias = $this->db->table('historias_medicas');
            $Historias-> insert($datos);

            return $this->db->insertID();
        }

        public function obtenerHistoria($id){
            $historias = $this->db->table('historias_medicas');
            $historias->where($id);

            return $historias->get()->getResultArray();
        }

        public function actualizar($data, $id){
            $historias = $this->db->table('historias_medicas');
            $historias->set($data);
            $historias->where('id', $id);
            return $historias->update();
        }

        public function eliminar ($data){
            $historias = $this->db->table('historias_medicas');
            $historias->where($data);
            return $historias->delete();
        }
    }