<?php


class Query {
   
    
    public function pesquisar($query) {
        
        $con = new Conection();
        
       
        $pesquisar = $con->conex()->query ($query);       
        return $pesquisar;
    }
    public function salvar($table,$param, $param_in) {

$salvar = $this->pesquisar("INSERT INTO $table($param) VALUES ($param_in)");

return $salvar;
        
    }
    public function editar($table, $param, $valor, $param2, $valor2) {
        $editar = $this->pesquisar("UPDATE `$table` SET $param = '$valor' where $param2 = $valor2");
        return $editar;
    }
    public function excluir($table,$param,$valor) {
        $excluir = $this->pesquisar("DELETE FROM `$table` WHERE $param = '$valor'");
        return $excluir;
    }
    public function consultaTudo($table, $param, $valor) {
        $result = $this->pesquisar("SELECT * FROM $table where $param = $valor");
        return $result;
    }
    public function consulta($registros, $table, $param, $valor, $complemento) {
        $result = $this->pesquisar("SELECT $registros FROM $table where $param = $valor $complemento");
        return $result;
    }
   }
   
   