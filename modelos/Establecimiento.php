<?php

class Establecimiento{

    public $Id_Establecimiento;
    public $Nombre;
    public $Descripcion;
    public $Horario;
    public $Dias_labo;
    public $Foto;
    public $DireccionyRef;
    public $Comentario;
    public $Puntuacion;
    public $fechahorar;
    public $NombreUsr;
    
    public static function lista() {
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT establecimientos.Id_Establecimiento,
		 establecimientos.Nombre,
		 establecimientos.Descripcion,
		 establecimientos.Horario,
		 establecimientos.Dias_labo,
		 establecimientos.Foto,
		 establecimientos.DireccionyRef,
		 avg(reseñaest.Puntuacion) AS puntuacion
		 FROM establecimientos
		 left JOIN reseñaest ON establecimientos.Id_Establecimiento=reseñaest.Id_Establecimiento
		 GROUP BY establecimientos.Id_Establecimiento;';
        $resultado = $con->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            $elemento = new Establecimiento();
            $elemento->Id_Establecimiento = $fila['Id_Establecimiento'];
            $elemento->Nombre = $fila['Nombre'];
            $elemento->Descripcion = $fila['Descripcion'];
            $elemento->Puntuacion = $fila['puntuacion'];
            $elemento->Horario = $fila['Horario'];
            $elemento->Dias_labo = $fila['Dias_labo'];
            $elemento->Foto = $fila['Foto'];
            $elemento->DireccionyRef = $fila['DireccionyRef'];
           
           
            $lista[] = $elemento;
        }

        return $lista;
    }

    public static function find($Id_Establecimiento) {
        //Aquí buscamos un registro por su id
        $lista = [];
        include('conexion.php');

        $sql = 'SELECT * FROM establecimientos WHERE Id_Establecimiento=' . $Id_Establecimiento;
        $resultado = $con->query($sql);
        if ($fila = $resultado->fetch_assoc()) {
            $elemento = new Establecimiento();
            $elemento->Id_Establecimiento = $fila['Id_Establecimiento'];
            $elemento->Nombre = $fila['Nombre'];
            $elemento->Descripcion = $fila['Descripcion'];
            $elemento->Horario = $fila['Horario'];
            $elemento->Dias_labo = $fila['Dias_labo'];
            $elemento->Foto = $fila['Foto'];
            $elemento->DireccionyRef = $fila['DireccionyRef'];
            return $elemento;
        }
         return NULL;
    }

    public function save() {
        //Aquí guardamos datos
        include('conexion.php');
        
        if($this -> Id_Establecimiento==0){
        $sql = "INSERT INTO establecimientos (Nombre, Descripcion, Horario, Dias_labo, Foto, DireccionyRef) VALUES('". $this -> Nombre . "','". $this -> Descripcion . "', 
        '". $this -> Horario . "','". $this -> Dias_labo . "','". $this -> Foto . "','". $this -> DireccionyRef . "')";
        } else {
            
            $sql = "UPDATE establecimientos SET Nombre='". $this -> Nombre . "', Descripcion='". $this -> Descripcion . "', Horario='". $this -> Horario . "', Dias_labo='". $this -> Dias_labo . "', Foto='". $this -> Foto . "', DireccionyRef='". $this -> DireccionyRef . "' WHERE Id_Establecimiento=" . $this->Id_Establecimiento;
            
        }
        
        
        return $con->query($sql);
    
    }

    public function destroy() {
        //Aquí eliminamos datos
        include('conexion.php');
        $sql = "DELETE FROM establecimientos WHERE Id_Establecimiento=". $this -> Id_Establecimiento;
        return $con -> query($sql);
    }

    public function saveres($Id_Establecimiento){
        include('conexion.php');
        $sql="INSERT INTO ReseñaEst(Comentario, Puntuacion, NombreUsr, Id_Establecimiento) VALUES('" . $this->Comentario . "', " . $this->Puntuacion . ", '" . $this->NombreUsr . "', $Id_Establecimiento)";
        return $con->query($sql);
    }

    public static function findres($Id_Establecimiento) {
        include('conexion.php');
        $sql = "SELECT * FROM ReseñaEst WHERE Id_Establecimiento=" . $Id_Establecimiento;
        return $con->query($sql);
    }
}
?>