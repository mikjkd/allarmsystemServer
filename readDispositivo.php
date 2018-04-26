<?php
	include_once 'config\database.php';
	include_once 'objects\Dispositivo.php';
	
	$db = new Database();
	$dbConn = $db->getConnection();
	$dQuery;
	if($dbConn != null){
		$dQuery =  isset($_GET['ID']) ? $_GET['ID']:die("ID non esistente");
		$sql = "SELECT ID,Nome,Posizione,Sensori
				FROM dispositivo
				WHERE ID='$dQuery'";
		$res =$dbConn->query($sql);
		if($res && $res->num_rows>0){
			$obj = $res->fetch_object();
			$dispositivo = array(
				"ID" => $obj->ID,
				"Nome" => $obj->Nome,
				"Posizione" => $obj->Posizione,
				"Sensori" => $obj->Sensori
			);
			print json_encode($dispositivo);
		}
		else{
			print json_encode(array("messaggio"=>"Prodotto non esistente"));
		}
		$db->closeDB();
	}else{print "errore connessione";}
?>