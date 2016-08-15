<?php 
if(empty($data)){
	echo "<h3 class='text-center'>Looks like you're in the wrong place, buddy!<br> Why not <a href='/phpTest'>hitch a ride back home?</h3>";
}else{ ?>
<div id="tables">
	<div class="row">
		<div class="col-md-12">
			<div class="table-responsive">
			<h3>A list of your uploads</h3>
			<table class="table">
				<thead>
					<tr>
						<th class="text-center">#</th>
						<th>Pic Name</th>
						<th>Description</th>
						<th>Uploaded Date</th>
						<th>Uploaded Time</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				if(!isset($data[0]['pic_id'])){
					//er... i don't know...
				}else {
					foreach($data as $par){
						echo '<tr>';
						echo 	'<td class="text-center">'.$par['pic_id'].'</td>';	
						echo 	'<td><a href=/phpTest/'.$par['image_full'].' class="gallery">'.$par['image_full'].'</a></td>';
						echo 	'<td>'.$par['description'].'</td>';
						echo 	'<td>'.$par['date_uploaded'].'</td>';
						echo 	'<td>'.$par['time_uploaded'].'</td>';
						echo '</tr>';
					}
					echo $par['image_full'];
				}?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
</div>

<form enctype="multipart/form-data" action="?action=upload" method="POST">
	<label  class="custom-file-input" >
		<input name="userfile" type="file" id="uploadBtn">
	</label>
	<input type="text" name="description" placeholder="enter image description">
	<button type="submit">upload!</button>
</form>

<div class='mb20'></div>
<?php }

?>