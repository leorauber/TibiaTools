<?php

class General_model extends CI_Model{
	
	function registra_vencedor($vencedor, $pontos){
            $data = array(
                'Jogador' => $vencedor,
                'Pontos' => $pontos
            );
            $this->db->insert('resultados', $data);
            //INSERT INTO resultados (Jogador, Pontos) VALUES ($vencedor, $pontos)
            return;
//            return $query->result();
	}
        
}