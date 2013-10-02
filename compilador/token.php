<?php

	class token{
		
		protected $opRelacionais     = array('<', '>', '<=', '>=', '==', '!=');
		protected $opAritmeticos 	 = array('+', '-', '*', '/', '-');	
		protected $opLogicos		 = array('&&', '||', '!');
		protected $opAtribuicao		 = array('=');
		protected $delimitador 		 = array(';');
		protected $caracterEspeciais = array('(', ')', '[', ']');
		protected $tipoVariaveis	 = array('int', 'float', 'string');
		protected $condicao			 = array('if', 'else');
		protected $inicioPrograma	 = array('<#');
		protected $fimPrograma		 = array('#>');			
		protected $inicioBloco 		 = array('{');
		protected $declarVariavel    = array('var{');
		protected $fimBloco 		 = array('}');
		protected $nomeFuncao		 = array('function');
		protected $comentario        = array('//');
		protected $demaisTokens      = array('RBR', 'RBL', 'RJU', 'RJD', 'RHR', 'RHL', 'RHU', 'RHD', 'WEL', 'GTM', 
											'GHG', 'MOV', 'ADD', 'SUB', 'MUL', 'DIV', 'JMP', 'IFZ', 'IFP', 'IFN');	
		
		// Definição das expressões regulares
		private $erNumInteiro     = "/^[0-9]+$/";
		private $erNumReal        = "/^[0-9]+[.][0-9]+$/";
		private $erVariavel       = "/^[a-zA-Z]+[0-9]*$/";
		private $erNomeFuncao     = "/^[a-zA-Z]+[0-9]*$/";
		private $erDeclarVariavel = "/^[var{][a-zA-Z || 0-9]+[;][}]$/";
		
		
		
		// declarações especificas
		private $fimLinha = "/^[;]{1}$/";
		
		// - Fim definição de expressões regulares
		
		public function getOpRelacionais(){
			return $this->opRelacionais;
		}
		
		public function getOpAritmeticos(){
			return $this->opAritmeticos;
		}
	
		public function getOpLogicos(){
			return $this->opLogicos;
		}
		
		public function getOpAtribuicao(){
			return $this->opAtribuicao;
		}
		
		public function getDelimitador(){
			return $this->delimitador;
		}
		
		public function getCaracterEspecial(){
			return $this->caracterEspeciais;
		}
		
		public function getTipoVariaveis(){
			return $this->tipoVariaveis;
		}
	
		public function getCondicao(){
			return $this->condicao;
		}
		
		public function getInicioPrograma(){
			return $this->inicioPrograma;
		}
		
		public function getFimPrograma(){
			return $this->fimPrograma;
		}
		
		public function getInicioBloco(){
			return $this->inicioBloco;
		}
		
		public function getFimBloco(){
			return $this->fimBloco;		
		}
		
		public function getNomeFuncao(){
			return $this->nomeFuncao;		
		}
		
		public function getComentario(){
			return $this->comentario;
		}
		
		public function getDeclarVariavel(){
			return $this->declarVariavel;
		}
		
		public function getDemaisTokens(){
			return $this->demaisTokens;
		}
		
		// Funções para as expressões regulares
		
		public function expressaoRegular($token){
		
			// - verifica declaracao de variavel
			
		
			// - Verifica se eh varivel
			if(preg_match($this->erVariavel, $token))
				return true;
			// - Verifica se eh nome de função	
			else if(preg_match($this->erNomeFuncao, $token))
				return true;
			// - Verifica se é numero inteiro
			else if(preg_match($this->erNumInteiro, $token))
				return true;
			// - Verifica se é um numero real
			else if(preg_match($this->erNumReal, $token))
				return true;
			
			
			else{
				return false;
			}
		
		}
		
		// funções para expressões regulares especificas
		public function getFimLinha(){
			return $this->fimLinha();
		}
		
		
		
		
		
		
	}
?>