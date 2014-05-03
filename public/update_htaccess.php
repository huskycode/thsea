<?php
  if(isset($_POST['submit'])){
    file_put_contents('.htaccess', $_POST['htaccess_contents']);
    
    echo "<span style='color:green;'>The .htaccess file Saved successfully.</span>";
  }
?>
<form method="post">
  <strong>.htaccess content:</strong><br />
  <textarea name="htaccess_contents" rows="40" cols="100"><?php echo file_get_contents(".htaccess"); ?></textarea>
  <br />
  <input type="submit" name="submit" value="Update" />&nbsp;
  <input type="button" value="Reset" onclick="window.location='show_htaccess.php';" />
</form>