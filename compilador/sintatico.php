<?php
	include("token.php");
	
	class sintatico extends token{
	
		private $programa;
		private $erro = array();
		private $token;
		
		function __construct($programa){			
			$this->programa = $programa;
			$this->token = new token();			
		
			$this->validaCodigo();		
		}
		
		protected function validaCodigo(){	
			$programa = explode(" ",$this->programa);
			
			$linhaPrograma = explode(";", $this->programa);
			
			for($i = 0; $i < sizeof($linhaPrograma); $i++){
				$this->analisaLinha($linhaPrograma); 
			}
			
			
			for($i = 0; $i < sizeof($programa); $i++){
				
				if ($programa[$i] != ""){
					
					$lexico = new lexico($programa[$i]);
					if(! $lexico->getErro() == null){
					
						if (!$this->token->expressaoRegular($programa[$i]))
							$this->erro[] = "O token ".$programa[$i]." eh sintaticamente incorreto";					
					}
				}
			
			}
		}
		public function analisaLinha($linhaPrograma){
			$linhaAnterior  = "";
			$linhaPosterior = "";
			$stringLinha = explode(" ",$linhaPrograma);
			
			// -  futuramente analisara token a token da linha
			for($i = 0; $i < sizeof($stringLinha); $i++){
				$linhaAnterior = $stringLinha[$i];
				
				$tipo = $this->token->expressaoRegular($stringLinha[$i]);
				
				
			}
			
			
			
		
		}
		
		public function getErro(){
			return $this->erro;		
		}
	}
?>