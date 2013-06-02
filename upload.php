<?php
$title = "Upload";
include("head.php");
?>
<div class="content"> <span>Upload your our own images for printing</span>
  <h2>Upload</h2>
</div>
</div> <!-- content -->
<div id="featured-wrapper">
<div id="box1">
  <form action = "upload_submit.php" method="post"  enctype = "multipart/form-data">
    Pick a image from your hard drive to upload:<br/><br/>
    <input type= "file" id="image_upload" name="image"/><br/><br/>
    <p>Description of Image:</p>
    <div style= "max-height:400px;max-width:400px;overflow:auto;">
      <textarea rows = "5" cols="52" placeholder="Enter Description of Image here"  name="description" required="required"></textarea>
    </div>
    <p>
      <input type= "submit" value="Upload to Gallery&rarr;"/>
    </p>
  </form>
</div> <!-- box1 -->
</div> <!-- feature wrapper -->
<?php include("footer.php"); ?>