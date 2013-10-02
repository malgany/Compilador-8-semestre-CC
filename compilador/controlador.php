<?php
	
	include("lexico.php");
	include("sintatico.php");
	
	if(isset($_POST["operacao"]))	
		$operacao = $_POST["operacao"];
	
	
	if (isset($_POST["programa"]) && $operacao == "lexico") {
		$programa = $p = str_replace("\n", " ", ltrim(rtrim($_POST[ 'programa' ])));
	
		$lexico = new lexico($programa);	
		
		$tamanho =  sizeof($lexico->getErro());
		$retorno = $lexico->getErro();
		$msg = "";
			
		if ($tamanho == 0){
			echo "Parabens, nao ha erros lexicos";
		}else{
			for($i = 0; $i < $tamanho; $i++)
				$msg .= $retorno[$i]."|"."\n";
					
			echo($msg);
		}	
	}else if( isset($_POST["programa"]) && $operacao == "sintatico"){
		$programa = $p = str_replace("\n", " ", ltrim(rtrim($_POST[ 'programa' ])));
		
		$sintatico = new sintatico($programa);	
		
		$tamanho =  sizeof($sintatico->getErro());
		$retorno = $sintatico->getErro();
		$msg = "";
			
		if ($tamanho == 0){
			echo "Parabens, nao ha erros sintaticos";
		}else{
			for($i = 0; $i < $tamanho; $i++)
			$msg .= $retorno[$i]."|"."\n";
					
			echo($msg);
		}	
	
	}
	
?>