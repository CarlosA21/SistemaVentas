<?php
require_once "../config/connection.php";
class Persona extends Connection
{
  public static function mostrarDatos()
  {
    try {
      $sql = "SELECT * FROM public.clientes";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function obtenerDatoId($id)
  {
    try {
      $sql = "SELECT * FROM public.clientes WHERE id = :id";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $result = $stmt->fetch();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function guardarDato($data)
  {
    try {
      $sql = "INSERT INTO clientes (nombre, apellido, email, num_tel, direccion) VALUES (:nombre, :apellido, :email, :num_tel, :direccion)";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nombre', $data['nombre']);
      $stmt->bindParam(':apellido', $data['apellido']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':num_tel', $data['num_tel']);
      $stmt->bindParam(':direccion', $data['direccion']);
      $stmt->execute();
      return true;
      echo ($data);
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function actualizarDato($data)
  {
    try {
      $sql = "UPDATE public.clientes SET nombre = :nombre, apellido = :apellido, email = :email, num_tel = :num_tel, direccion = :direccion WHERE id = :id";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nombre', $data['nombre']);
      $stmt->bindParam(':apellido', $data['apellido']);
      $stmt->bindParam(':email', $data['email']);
      $stmt->bindParam(':num_tel', $data['num_tel']);
      $stmt->bindParam(':direccion', $data['direccion']);
      $stmt->bindParam(':id', $data['id']);
      $resultado = $stmt->execute();
      if ($resultado) {
        return array('success' => true, 'message' => 'Datos actualizados con éxito.');
      } else {
        return array('success' => false, 'message' => 'Error al actualizar los datos.');
      }
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function eliminarDato($id)
  {
    try {
      $sql = "DELETE FROM public.clientes WHERE id = :id";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return true;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
}
