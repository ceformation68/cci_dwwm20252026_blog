<?php
	class Entity {
		
		
		// Méthodes 
		protected function nettoyer(string $strText){
			$strText	= trim($strText);
			$strText	= str_replace("<script>", "", $strText);
			$strText	= str_replace("</script>", "", $strText);
			return $strText;
		}
				
		
		
		
	}