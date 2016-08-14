<?php

class imgResize{
	public function imageResize($orgfile, $newfile, $h,$w){

		$ext = pathinfo($orgfile, PATHINFO_EXTENSION);

		if($ext == 'jpg'){
			$n = imagecreatefromjpeg($orgfile);
			$ar = getimagesize($orgfile);
			$orgw = $ar[0];
			$orgh = $ar[1];
			$cont = imagecreatetruecolor($w,$h);
			imagecopyresampled($cont,$n,0,0,0,0,$w,$h,$orgw,$orgh);
			imagejpeg($cont,$newfile,100);
			imagedestroy($n);
		}else if($ext == 'png'){
			$n = imagecreatefrompng($orgfile);
			$ar = getimagesize($orgfile);
			$orgw = $ar[0];
			$orgh = $ar[1];
			$cont = imagecreatetruecolor($w,$h);
			imagecopyresampled($cont,$n,0,0,0,0,$w,$h,$orgw,$orgh);
			imagepng($cont,$newfile,9);
			imagedestroy($n);
		}
	}
}

?>