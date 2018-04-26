<?php
	include_once 'config\database.php';
	include_once 'objects\Dispositivo.php';
	
	$db = new Database();
	$dbConn = $db->getConnection();
	$dispositivoArray = array();
	$dispositivoArray['dispositivo']=array();

	if($dbConn != null){
		$sql = "SELECT ID,Nome,Posizione,Sensori
				FROM dispositivo";
		$res = $dbConn->query($sql);
		if($res && $res->num_rows>0){
			while($obj = $res->fetch_object()){
				$dispositivo = array(
					"ID" => $obj->ID,
					"Nome" => $obj->Nome,
					"Posizione" => $obj->Posizione,
					"Sensori" => $obj->Sensori
				);
				array_push($dispositivoArray['dispositivo'], $dispositivo);
			}
			print json_encode($dispositivoArray);
		}
		else{print json_encode(array("messaggio"=>"Nessun prodotto"));}
		$db->closeDB();
	}
	
	

?>