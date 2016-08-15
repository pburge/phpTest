<?php
if(empty($data)){
	echo "<h1 class='text-center'>looks like there's nothing here yet!</h1>";
}else{
	echo '<div class="mb20"></div>';
	echo '<div class="row">';
	foreach($data as $par){
		echo '<div class="col-lg-2">';
		echo '<a class="thumbnail gallery mb20" href="/phpTest/'.$par['image_full'].'">';
		echo 	'<img src="'.$par['image_resized'].'" alt="" class="">';
		echo	'<div class="">';
		echo 		'<p>Description: '.$par['description'].'</p>';
		echo 		'<p>Uploaded By: '.$par['username'].'</p>';
		echo 	'</div>';
		echo '</a>';
		echo '</div>';
	}
		echo '</div>';
	echo '<div class="mb20"></div>';
}

?>