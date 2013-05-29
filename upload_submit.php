<?php
$url=parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"],1);

$link = mysql_connect($server, $username, $password);
if (!$link) {
  echo "Can't Link";
  die('Not connected : ' . mysql_error());
}      

$db_selected = mysql_select_db($db, $link);
if (!$db_selected) {
  echo "Can't connect to database";
  die ('Can\'t use foo : ' . mysql_error());
}

$image_name = $_FILES['image']['name'];
$mime_type = $_FILES['image']['type'];
$tmp_location = $_FILES['image']['tmp_name'];
$err_code = $_FILES['image']['error'];
$file_size = $_FILES['image']['size'];

$description = $_POST['description'];
$title = "Upload Image";
include("menu_bar.php");
$array = array('image/jpeg', 'image/pjpeg', 'image/gif', 'image/png');
if(in_array($mime_type, $array)){
//this will be used if the image is resized
$new_image_name = $image_name;





//IMPORTANT: this code assumes your images are to be stored
//in the hardcoded director below
//If the directory does not exist it will be created

$directory = "/comp2405/images/";
$dir_path = $_SERVER['DOCUMENT_ROOT'].$directory;

// check to see if directory specified by dir_path
// exists and if not create it
if(!is_dir($dir_path)){
  //create the directory 
  if(!mkdir($dir_path, 0777, TRUE)){
    //make dir failed so throw exception
    //the TRUE paramater above allows recursion or nested folders
    throw new Exception("Could not create directory");
  }
};



$file_path = $directory.$image_name;
$resized_file_path = $directory.$new_image_name;
//create the path to store the images      
$absolute_path = $_SERVER['DOCUMENT_ROOT'].$file_path;
//use this path if the image is resized
$resized_absolute_path = $_SERVER['DOCUMENT_ROOT'].$resized_file_path;


//Resize the image if necessary

//get the image info
//info will contain size and type information
$info = getimagesize($tmp_location);
//determine if the uploaded file is a jpeg, gif, or png
//set the required image creation and resampling
//functions (Note php has dedicated functions for
  //each format)

  $format = "invalid"; //image format
  $image_create_fn;  //image resource create function
  $image_save_fn;    //image save function

  switch($info['mime']){
    case 'image/jpeg':
    case 'image/pjpeg':
    $format = "jpeg";
    $image_create_fn = imagecreatefromjpeg;
    $image_save_fn = imagejpeg;
    break;
    case 'image/gif':
    $format = "gif";
    $image_create_fn = imagecreatefromgif;
    $image_save_fn = imagegif;
    break;
    case 'image/png':
    $format = "png";
    $image_create_fn = imagecreatefrompng;
    $image_save_fn = imagepng;
    break;
    default:
    $format = "invalid";             
    break;
  }



  if($format !== "invalid"){

    //define the max dimension a picture is allowed to have
    //hardcode max size
    $max_width = 400; //max allowed width
    $max_height = 400; //max allowed height


    //get current image size
    $image_width = $info[0];  //current image width
    $image_height = $info[1]; //current image height

    $new_width;  //new image width 
    $new_height; //new image height

    //determine if resizing is necessary
    $resize_required = false;
    $scale_factor = 1.0;
    if($image_width > $max_width || $image_height > $max_height){
      $resize_required = true;
      $scale_factor = min($max_width/$image_width, $max_height/$image_height);
      $new_width = round($image_width * $scale_factor);
      $new_height = round($image_height * $scale_factor);

    }

    $resampled = false;
    if($resize_required){

      //create image resources for resampling
      $src_img = $image_create_fn($tmp_location); 
      $new_img = imagecreatetruecolor($new_width, $new_height);

      //resample the image
      if(imagecopyresampled($new_img, $src_img, 
        0,0,0,0,
        $new_width,$new_height,$image_width,$image_height
      )){

        $resampled = true;
        imagedestroy($src_img);
      }
      else{
        throw new Exception("Could not resample image");
      }

    } //end proceeding with resize

  } //end image size check

  //Save the original image by moving it to the destination
  //directory by making use of the move_uploaded_file 
  //function
  if(!move_uploaded_file($tmp_location, $absolute_path)){
    throw new Exception("Could not save the image");
  }
    $sql = "INSERT INTO images(image_name, description) values ('$image_name', '$description')";
    $result = mysql_query($sql, $link);
    mysql_close($link);
    ?>
    <h1>Image Successfully Uploaded!</h1>
    <h2>Congratulations!</h2>
    <p>Go to our Gallery and browse our uploaded images and see the one you just uploaded</p>

    <?php
}
else{
  ?>

  <h1>Image Could not be Uploaded!</h1>
  <h2>ERROR!!!</h2>
  <h3>You most likely entered an invalid file format, try again</h3><p>&nbsp;valid formats include jpeg, png, and gif...</p>
  <?php
}
?>

</body>
</html>