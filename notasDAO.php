<?php
class notasDAO{
    public $codigo;
    public $materia;
    public $notab1;
    public $notab2;
    public $notab3;
    public $notab4;

    public function exibir(){
        $objeto = new Conexao();
        $sql = "SELECT `codigo`, `materia`, `notab1`, `notab2`, `notab3`, `notab4` FROM `notas`";
        $objeto->set("sql", $sql);
        return $objeto->query();
    }

    public function set($prop, $value) {
        $this->$prop = $value;
    }
}
?>