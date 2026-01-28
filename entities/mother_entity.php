<?php
	class Entity {

		protected int $_id;
		protected string $_prefixe = '';

		/**
		* Hydratation de l'objet en utilisant les setters 
		*/
		public function hydrate(array $arrData){
			foreach($arrData as $key=>$value){
				// nom de la méthode
				$strMethodName = "set".ucfirst(str_replace($this->_prefixe, '', $key));
				if (method_exists($this, $strMethodName)){
					$this->$strMethodName($value); 
				}
			}
			/*
			$this->setId($arrData['article_id']); 
			$this->setTitle($arrData['article_title']); 
			$this->setImg($arrData['article_img']); 
			$this->setContent($arrData['article_content']); 
			$this->setCreatedate($arrData['article_createdate']); 
			$this->setCreatorname($arrData['article_creatorname']); 
			*/
		}

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