<!DOCTYPE html>
<htmllang="en">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Upload</title>
  <link rel="stylesheet" href="css/master.css" type="text/css" media="screen" title="no title" charset="utf-8">
</head>
<body>
<?php include("menu_bar.php"); ?>
  <h1>Upload:</h1>
  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your own Images for printing</h2>
  <form action = "upload_submit.php" method="post"  enctype = "multipart/form-data">
    Pick a image from your hard drive to upload:<br/><br/>
    <input type= "file" id="image_upload" name="image"/><br/><br/>
    <p>Description of Image:</p>
    <div  style                         = "max-height:400px;max-width:400px;overflow:auto;">
      <textarea rows                    = "5" cols="52" placeholder="Enter Description of Image here"  name="description" required="required"></textarea>
    </div>
    <p>
      <input type                     = "submit" value="Upload to Gallery&rarr;"/>
    </p>
  </form>

</body>
</html>

</body>
</html>