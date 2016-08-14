<h2>you're now logged in. welcome back <?php echo $_POST['username'];?>. how bout you upload some pictures?</h2>

<form enctype="multipart/form-data" action="?action=upload" method="POST">
	upload a file: <input name="userfile" type="file" />
	<button type="submit">upload!</button>
</form>