<?php
$title = "Upload";
include("head.php");
?>
<div class="content"> <span>Upload your our own images to our gallery</span>
  <h2>Upload</h2>
</div> <!-- content -->
</div> <!-- page -->
<div id="featured-wrapper">
<div id="fullbox">
  <form action = "upload_submit.php" method="post"  enctype = "multipart/form-data">
    <h3>Choose an image from your hard drive to upload:</h3><br/><br/>
    <input type= "file" id="file" name="file"/><br/><br/>
    <p>Description of Image:</p>
    <div style= "max-height:400px;max-width:400px;overflow:auto;">
      <textarea rows = "5" cols="52" placeholder="Please enter a brief description of the image that you're uploading"  name="description" required="required"></textarea>
    </div>
    <p><input type= "submit" name="submit" value="Submit" value="Upload to Gallery&rarr;"/></p>
  </form>
</div> <!-- fullboxdis -->
</div> <!-- feature wrapper -->
<script type="text/javascript" charset="utf-8">
$('#upload').addClass('current_page_item');
</script>
<?php include("footer.php"); ?>