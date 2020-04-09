<?php

//echo phpinfo();

//die();
	$inputFile = realpath("projeto.mpp");

	function getExecutor($vl){
		$dado = str_replace("[[","", $vl);
		$dado = str_replace("]]","", $dado);
		$matrizR = explode(",",$dado);

		$executores = array();

		foreach($matrizR as $valueR)
		{
			$posI = strpos($valueR, "resource")+9;
			$posF = (strpos($valueR, "start")-$posI);

			array_push($executores, substr($valueR,$posI,$posF));
		}

		return $executores;
	}

	try {

		$comSimple = new COM("MSProject.Functions");
		$matriz = json_decode(utf8_encode( $comSimple->GetDados($inputFile) ) );
		//print_r( $matriz );exit;
		//$json = json_decode($matriz, true);
		foreach($matriz as $value){
			$ID 						= $value->ID;
			$UniqueID 					= $value->UniqueID;
			$ChildID 					= $value->ChildID;
			$Name 						= $value->Name;
			$Start 						= $value->Start;
			$Deadline 					= $value->Deadline;
			$Finish 					= $value->Finish;
			$Contact 					= $value->Contact;
			$PorcentagemPlanejado	= $value->PorcentagemPlanejado;
			$PorcentagemConcluida	= $value->PorcentagemConcluida;
			$Porcentagem			= $value->Porcentagem;
			$Executor				= json_encode(getExecutor($value->Executor));
			
			echo "ID = " . $ID."<br>";
			echo "UniqueID = " . $UniqueID."<br>";
			echo "ChildID = " . $ChildID."<br>";
			echo "Name = " . $Name."<br>";
			echo "Start = " . $Start."<br>";
			echo "Deadline = " . $Deadline."<br>";
			echo "Finish = " . $Finish."<br>";
			echo "Contact = " . $Contact."<br>";
			echo "ChildPorcentagemPlanejado = " . $PorcentagemPlanejado. "<br>";
			echo "ChildPorcentagemConcluida = " . $PorcentagemConcluida. "<br>";
			echo "ChildPorcentagem = " . $Porcentagem. "<br>";
			echo "Executor = " . $Executor. "<br>";
			
			echo '<hr>';

			//var_dump($value->ID);
		}
		//echo count($matriz);
		//die("FIM");
		
	}catch( com_exception $e ) {
    	print_r( 
    		array( 
				'errorCode' => $e->getCode(),
                'errorMessage' => utf8_encode($e->getMessage()),
                'errorFile' => $e->getFile(),
                'errorLine' => $e->getLine()
            )
    	);  
	}
?>
		
