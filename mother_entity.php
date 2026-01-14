<?php
	class Entity {

		protected int $_id;

		/**
		* Récupération de l'identifiant
		* @return int l'identifiant de l'objet
		*/
		public function getId():int{
			return $this->_id;
		}
		/**
		* Mise à jour de l'identifiant
		* @param int le nouvel identifiant
		*/
		public function setId(int $intId){
			$this->_id = $intId;
		}
		
		// Méthodes 
		protected function nettoyer(string $strText){
			$strText	= trim($strText);
			$strText	= str_replace("<script>", "", $strText);
			$strText	= str_replace("</script>", "", $strText);
			return $strText;
		}
				
		
		
		
	}