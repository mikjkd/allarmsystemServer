<?php
	include_once 'config\database.php';
	include_once 'objects\Dispositivo.php';
	
	if($_SERVER['REQUEST_METHOD']==="POST"){
		$db = new Database();
		$dbConn = $db->getConnection();
		$payload = file_get_contents('php://input');
		$jsonPayload = json_decode($payload,TRUE);
		$id = $jsonPayload['ID'];
		$nome = $jsonPayload['Nome'];
		$posizione = $jsonPayload['Posizione'];
		$sql = "INSERT INTO dispositivo (ID,Nome,Posizione)
			VALUES ('$id','$nome','$posizione')";
		$res =$dbConn->query($sql);
		if($res){
			print json_encode(array("messaggio"=>"ok"));
		}else{print json_encode(array("messaggio"=>"errore"));}
		$db->closeDB();
	}else{
		print json_encode(array("messaggio"=>"metodo errato"));
	}
	
?>