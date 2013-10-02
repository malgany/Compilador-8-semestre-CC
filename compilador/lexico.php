<?php
	include("token.php");

	class lexico extends token{

		private $programa;
		private $erro = array();
		
		function __construct($programa){			
			$this->programa   = $programa;			
			$token = new token();
			$this->validaCodigo();		
		}
		
		protected function validaCodigo(){	
		
			$programa = explode(" ",$this->programa);
					
			for($i = 0; $i < sizeof($programa); $i++){
				
				if ($programa[$i] != ""){
					if (!(in_array($programa[$i], $this->opRelacionais) || in_array($programa[$i], $this->opAritmeticos) || in_array($programa[$i], $this->opLogicos)
						|| in_array($programa[$i], $this->opAtribuicao) || in_array($programa[$i], $this->delimitador) || in_array($programa[$i], $this->caracterEspeciais)
						|| in_array($programa[$i], $this->inicioPrograma) || in_array($programa[$i], $this->tipoVariaveis) || in_array($programa[$i], $this->condicao) 
						|| in_array($programa[$i], $this->fimPrograma) || in_array($programa[$i], $this->inicioBloco) || in_array($programa[$i], $this->fimBloco)
						|| in_array($programa[$i], $this->nomeFuncao) || in_array($programa[$i], $this->comentario) || in_array($programa[$i], $this->demaisTokens)
						|| in_array($programa[$i], $this->declarVariavel))){
						
						$this->erro[] = "O token ".$programa[$i]." nao foi identificado";
					}
				}
				
			}
		}
		public function getErro(){
			return $this->erro;		
		}
	}

?>