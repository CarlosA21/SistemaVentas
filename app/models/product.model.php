<?php
require_once "../config/connection.php";
class Producto extends Connection
{
  public static function mostrarDatos()
  {
    try {
      $sql = "SELECT * FROM public.productos";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->execute();
      $result = $stmt->fetchAll();
      return $result;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function obtenerDatoId($cod_pro)
  {
    try {
      $sql = "SELECT * FROM public.productos WHERE cod_pro = :cod_pro";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':cod_pro', $cod_pro);
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
      $sql = "INSERT INTO clientes (nom_pro, des_pro, cant_exi, pre_uni, ubi_alm) VALUES (:nom_pro, :des_pro, :cant_exi, :pre_uni, :ubi_alm)";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nom_pro', $data['nom_pro']);
      $stmt->bindParam(':des_pro', $data['des_pro']);
      $stmt->bindParam(':cant_exi', $data['cant_exi']);
      $stmt->bindParam(':pre_uni', $data['pre_uni']);
      $stmt->bindParam(':ubi_alm', $data['ubi_alm']);
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
      $sql = "UPDATE public.Productos SET nom_pro = :nom_pro, des_pro = :des_pro, cant_exi = :cant_exi, pre_uni = :pre_uni, ubi_alm = :ubi_alm WHERE cod_pro = :cod_pro";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':nom_pro', $data['nom_pro']);
      $stmt->bindParam(':des_pro', $data['des_pro']);
      $stmt->bindParam(':cant_exi', $data['cant_exi']);
      $stmt->bindParam(':pre_uni', $data['pre_uni']);
      $stmt->bindParam(':ubi_alm', $data['ubi_alm']);
      $stmt->bindParam(':cod_pro', $data['cod_pro']);
      $stmt->execute();
      return true;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
  public static function eliminarDato($cod_pro)
  {
    try {
      $sql = "DELETE FROM public.Productos WHERE cod_pro = :cod_pro";
      $stmt = Connection::getConnection()->prepare($sql);
      $stmt->bindParam(':cod_pro', $cod_pro);
      $stmt->execute();
      return true;
    } catch (PDOException $th) {
      echo $th->getMessage();
    }
  }
}
