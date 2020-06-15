<?php

require_once "conexion.php";

class ModeloStatus{


	static public function mdlMostrarstatusop($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare("SELECT MLPnroPedido, MLPEstado,  LogInfo,  LogFecha,  LogEstadoDoc, case when LogTipoDoc = 'P' then 'PEDIDO' else 'RECEPCION' END AS LogTipoDoc, LogHora  from VW_ML_Pedidos ORDER BY LogFecha desc") ;

			$stmt -> bindParam(":aplicacion", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT MLPnroPedido, MLPEstado,  LogInfo,  LogFecha,  LogEstadoDoc, case when LogTipoDoc = 'P' then 'PEDIDO' else 'RECEPCION' END AS LogTipoDoc, LogHora  from VW_ML_Pedidos ORDER BY LogFecha desc");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}	


	static public function mdlMostrarDetalle($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare(" SELECT a.RutCliente, a.NrOP, a.CodProducto, case when a.UnidadMedida = 'CAJA' then CAST((a.Cantidad)/(c.UMPEquivalencia) AS INT) else a.Cantidad END as Cantidad, a.UnidadMedida, b.FechaCreacion from MLPedidoDetalle a inner join MLPedidoEncabezado b on b.NrOP = a.NrOP inner join equivalencia c on a.CodProducto = c.ProdCodigo where a.NrOP = $item ORDER BY a.CodProducto") ;			

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT a.RutCliente, a.NrOP, a.CodProducto, case when a.UnidadMedida = 'CAJA' then CAST((a.Cantidad)/(c.UMPEquivalencia) AS INT) else a.Cantidad  END as Cantidad, a.UnidadMedida, b.FechaCreacion from MLPedidoDetalle a inner join MLPedidoEncabezado b on b.NrOP = a.NrOP inner join equivalencia c on a.CodProducto = c.ProdCodigo ORDER BY a.CodProducto");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}	

	static public function mdlDescargaPDF($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare(" SELECT DoctNumero, REPLACE( Ruta, '\','/') as Ruta, Archivo FROM DocumentosProcesados ORDER BY DoctNumero") ;			

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare(" SELECT DoctNumero, REPLACE( Ruta, '\','/') as Ruta, Archivo FROM DocumentosProcesados ORDER BY DoctNumero");

			$stmt -> execute();

			return $stmt -> fetchAll();
		}

		$stmt -> close();

		$stmt = null;

	}	

}