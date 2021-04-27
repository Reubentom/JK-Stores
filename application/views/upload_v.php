<html>


<body>
<form method="post" enctype="multipart/form-data" action="<?php base_url();?>upload/up">
<input type="file" name="user_file">
<input type="submit" value="upload">
<h1><?php echo $msg; ?></h1>
</form>
</body>
</html>
