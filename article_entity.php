<?php
	require_once("mother_entity.php");
	
	class Article extends Entity{
		// Attributs 
		private string $_content;
		
		// Méthodes - getters et setters
		public function getContent():string{
			return $this->_name;
		}
		public function setContent(string $strContent){
			$this->_content = $this->nettoyer($strContent);
		}
		
		public function getSummary(){
			return mb_strimwidth($arrDetArticle['article_content'], 0, 70, "...");
		}
	}