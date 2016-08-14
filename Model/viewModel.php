<?php
class View{ 	
	public function getView($pagename='',$data=''){
		include $pagename.'.php';
	}
}
?>