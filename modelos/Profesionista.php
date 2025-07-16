<?php

class Profesionista {
    public $id;
    public $idusr;
    public $nombre;
    public $correo;
    public $password;  
    public $idiomas;
    public $foto;
    public $genero;
    public $descripcion;
    public $fecha;
    public $edad;
    public $telefono;
    public $idServicio;
    public $costo;
    public $horario;
    public $diasLab;
    public $ubicacion;
    public $nomservicio;
    public $puntuacion;
    public $comentario;
    public $nombreusr;

    //Consulta general
    public static function lista() {
        $lista = [];
        include('config.php');

        $sql = 'SELECT 
            P.Id_Profesionista AS id,
            P.Nombre AS nombre,
            P.Id_Usuario AS idusr,
            U.Correo AS correo,
            U.Foto AS foto,
            P.Descripcion AS descripcion,
            P.Idiomas AS idiomas,
            P.Genero AS genero,
            P.F_Nacimiento AS fecha,
            TIMESTAMPDIFF(YEAR, P.F_Nacimiento, CURDATE()) AS edad,
            AVG(R.Puntuacion) AS puntuacion,
            P.Telefono AS telefono,
            MIN(S.Nombre) AS servicio, -- obtienes solo uno (el primero alfabéticamente)
            PS.Costo AS costo,
            PS.Dias_labo AS diasLab,
            PS.Horario AS horario,
            PS.DireccionyRef AS ubicacion
        FROM profesionistas P
        JOIN tusuarios U ON P.Id_Usuario = U.Id_Usuario
        JOIN ProfServ PS ON PS.Id_Profesionista = P.Id_Profesionista
        JOIN servicios S ON PS.Id_Servicio = S.Id_Servicio
        LEFT JOIN ReseñaProf R ON R.Id_Profesionista = P.Id_Profesionista
        GROUP BY P.Id_Profesionista;
        ';
        
        $resultado = $con->query($sql);
        while ($fila = $resultado->fetch_assoc()) {
            $elemento = new Profesionista();
            $elemento->id = $fila['id'];
            $elemento->nombre = $fila['nombre'];
            $elemento->correo = $fila['correo'];
            $elemento->foto = $fila['foto'];
            $elemento->descripcion = $fila['descripcion'];
            $elemento->idiomas = $fila['idiomas'];
            $elemento->genero = $fila['genero'];
            $elemento->fecha = $fila['fecha'];
            $elemento->edad = $fila['edad'];
            $elemento->puntuacion = $fila['puntuacion'];
            $elemento->telefono = $fila['telefono'];
            $elemento->servicio = $fila['servicio'];
            $elemento->costo = $fila['costo'];
            $elemento->horario = $fila['horario'];
            $elemento->diasLab = $fila['diasLab'];
            $elemento->ubicacion = $fila['ubicacion'];
            $lista[] = $elemento;
        }

        return $lista;
    }

    //Aquí buscamos un registro por su id
    public static function find($id) {
        $lista = [];
        include('config.php');

        $sql = 'SELECT 
            P.Id_Profesionista AS id,
            P.Nombre AS nombre,
            P.Id_Usuario As idusr,
            U.Correo AS correo,
         	U.Foto AS foto,
            P.Descripcion AS descripcion,
            P.Idiomas AS idiomas,
            P.Genero AS genero,
            P.F_Nacimiento AS fecha,
            TIMESTAMPDIFF(YEAR, P.F_Nacimiento, CURDATE()) AS edad,
            P.Telefono AS telefono,
            S.Nombre AS servicio,
            PS.Costo AS costo,
            PS.Dias_labo As diasLab,
            PS.Horario AS horario,
            PS.DireccionyRef AS ubicacion
        FROM profesionistas p
        JOIN tusuarios U ON P.Id_Usuario = U.Id_Usuario
        JOIN ProfServ PS ON Ps.Id_Profesionista = PS.Id_Profesionista
        JOIN servicios S ON PS.Id_Servicio = S.Id_Servicio
        WHERE P.Id_Profesionista= ' . $id;
        
        $resultado = $con->query($sql);
        if ($fila = $resultado->fetch_assoc()) {
            $elemento = new Profesionista();
            $elemento->id = $fila['id'];
            $elemento->nombre = $fila['nombre'];
            $elemento->correo = $fila['correo'];
            $elemento->idusr = $fila['idusr'];
            $elemento->foto = $fila['foto'];
            $elemento->descripcion = $fila['descripcion'];
            $elemento->idiomas = $fila['idiomas'];
            $elemento->genero = $fila['genero'];
            $elemento->fecha = $fila['fecha'];
            $elemento->telefono = $fila['telefono'];
            $elemento->servicio = $fila['servicio'];
            $elemento->costo = $fila['costo'];
            $elemento->horario = $fila['horario'];
            $elemento->diasLab = $fila['diasLab'];
            $elemento->ubicacion = $fila['ubicacion'];
            return $elemento;
        }

        return NULL;
    }

    //Aquí guardamos datos
    public function save() {
        include('config.php');
        if ($this->id==0){
        try{

            $con->begin_transaction();
            
            $sql1 = $con->prepare("INSERT INTO TUsuarios (Correo, Foto, password) VALUES(?, ?, ?)");
            $sql1->bind_param("sss", $this->correo, $this->foto, $this->password);
            $sql1->execute();
            $this->idusr=$con->insert_id;

            $sql2 = $con->prepare("INSERT INTO Profesionistas (Nombre, Telefono, Idiomas, Genero, Descripcion, F_Nacimiento, Id_Usuario) VALUES(?, ?, ?, ?, ?, ?, ?)");
            $sql2->bind_param("ssssssi", $this->nombre, $this->telefono, $this->idiomas, $this->genero, $this->descripcion, $this->fecha, $this->idusr);
            $sql2->execute();
            $this->id=$con->insert_id;

            $sql3 = $con->prepare("INSERT INTO ProfServ(Id_Profesionista, Id_Servicio, Costo, Horario, Dias_Labo, DireccionyRef) VALUES(?, ?, ?, ?, ?, ?)");
            $sql3->bind_param("iidsss", $this->id, $this->idServicio, $this->costo, $this->horario, $this->diasLab, $this->ubicacion);
            $sql3->execute();

            $con->commit();
            $con->close();
            return true;

        } catch (Exception $e) {
            $con->rollback();   
            echo "Error en la transacción: " . $e->getMessage();
            $con->close();
            return false; 
        }

        } else {
            try {
                $con->begin_transaction();

                $sql1 = $con->prepare("UPDATE TUsuarios SET Correo = ?, Password = ? WHERE Id_Usuario = ?");
                $sql1->bind_param("ssi", $this->correo, $this->password, $this->idusr);
                $sql1->execute();

                $sql2 = $con->prepare("UPDATE Profesionistas SET Nombre = ?, Telefono = ?, Idiomas = ?, Genero = ?, Descripcion = ?, F_Nacimiento = ? WHERE Id_Profesionista = ?");
                $sql2->bind_param("ssssssi", $this->nombre, $this->telefono, $this->idiomas, $this->genero, $this->descripcion, $this->fecha, $this->id);
                $sql2->execute();

                $sql3 = $con->prepare("UPDATE ProfServ SET Id_Servicio = ?, Costo = ?, Horario = ?, Dias_Labo = ?, DireccionyRef = ? WHERE Id_Profesionista = ?");
                $sql3->bind_param("idsssi", $this->idServicio, $this->costo, $this->horario, $this->diasLab, $this->ubicacion, $this->id);
                $sql3->execute();

                $con->commit();
                $con->close();
                return true;

            } catch (Exception $e) {
                $con->rollback();
                echo "Error al actualizar: " . $e->getMessage();
                $con->close();
                return false;
            }
        }
    }

    public static function finds() {
        $lista = [];
        include('config.php');

        $sql = 'SELECT * from Servicios;'; 
        $resultado = $con->query($sql);

        while ($fila = $resultado->fetch_assoc()) {
            $elemento = new Profesionista();
            $elemento->idServicio = $fila['Id_Servicio'];
            $elemento->nomservicio = $fila['Nombre'];
            $lista[] = $elemento;
        }

        return $lista;
    }

    //Aquí eliminamos datos
    public function destroy() {
        include('config.php');
        $sql="DELETE FROM TUsuarios WHERE Id_Usuario=" . $this->idusr;
        return $con->query($sql);
    }

    public function saveres($id){
        include('config.php');
        $sql="INSERT INTO ReseñaProf(Puntuacion, Comentario, NombreUsr, Id_Profesionista) VALUES(" . $this->puntuacion . ", '" . $this->comentario . "', '" .$this->nombreusr . "', $id)";
        return $con->query($sql);
    }

    public static function findres($id) {
        include('config.php');
        $sql="SELECT * FROM ReseñaProf WHERE Id_Profesionista= " . $id;
        return $con->query($sql);
    }
}

?>