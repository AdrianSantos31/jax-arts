<?php
//if upload button is pressed
if(isset($_POST['submitData'])){
  //connect to the DB
  include('formAct.php');

  $target = "art/".basename($_FILES['image']['name']);

  $date = $_POST['date'];
  $artName = $_POST['artName'];
  $apk = $_POST['apk'];
  $location = $_POST['location'];
  $area = $_POST['area'];
  $points = $_POST['points'];
  $upBy = $_POST['upBy'];
  $image = $_FILES['image']['name'];
  // $image_name = addslashes($_FILES['image']['name']);
  // $image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!

  $required = array('date', 'artName', 'location', 'area', 'points', 'upBy');

  $error = false;
  foreach($required as $field) {
  if ( (empty($_POST[$field])) || (!$image)) {
    $error = true;
    }
  }

  if($error){
    $empty = '<div class="alert alert-warning alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Empty field/s detected: </strong> Please check the empty fields and please re-upload the picture. Thanks!
              </div>';
                }
  if(!$error){
    $sqlinsert = "INSERT INTO details_production(dateUp, artName, apk, location, area, points, upBy, image) VALUES ('$date', '$artName', '$apk', '$location', '$area', '$points', '$upBy','{$image}')";
    mysqli_query($dbcon, $sqlinsert);

    if(move_uploaded_file($_FILES["image"]['tmp_name'], $target)){
      $newrecord = '<div class="alert alert-success alert-dismissable fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Data submitted!</strong> You can now view the updates.
                    </div>';

    }else{
        $errorUpload = '<div class="alert alert-warning alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Uploading unsuccessful</strong> Please upload the photo again.
                        </div>';
    }

  }
  // $required = array('date', 'artName', 'location', 'area', 'points', 'upBy');

//   $error = false;
//   foreach($required as $field) {
//   if (empty($_POST[$field])) {
//     $error = true;
//   }
// }
//
//   if($error){
//     $empty = '<div class="alert alert-warning">
//                     <strong>Empty field</strong> Please check the empty fields and please re-upload the picture. Thanks!
//                   </div>';
//
//                 }
//                 if(!$error){
//                   $sqlinsert = "INSERT INTO details_production(dateUp, artName, apk, location, area, points, upBy, image) VALUES ('$date', '$artName', '$apk', '$location', '$area', '$points', '$upBy','{$image}')";
//                   $_POST = array();
//                   if(!mysqli_query($dbcon, $sqlinsert)){
//                     die('error inserting new record');
//                   }
//                   //Move thje pciture into folder: art
//                   if(move_uploaded_file($_FILES["image"]['tmp_name'], $target)){
//                     $newrecord;
//
//                   }else{
//                     $errorUpload = '<div class="alert alert-warning">
//                                     <strong>Uploading unsuccessful</strong> Please upload the photo again.
//                                   </div>';
//                   }
//
//                   $newrecord = '<div class="alert alert-success">
//                                   <strong>Data submitted!</strong> You can now view the updates.
//                                 </div>';
//                   }

}
 ?>

<html>
  <head>
    <title>JaxArt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Icon-->
    <link rel="icon" href="media/jaxart.jpeg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="css/style.css">
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
    <!--Google Adsense-->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-7030649239383558",
        enable_page_level_ads: true
      });
    </script>

  </head>


  <body>
    <!--NavBar-->
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">JaxArt</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="places/places.php">Public Art Map</a></li>
            <li><a href="gallery/gallery.php">Gallery</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://doodle.com/poll/5bg9kti2t34a9bii" target="_blank">Who's Available?</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Body-->
    <div class="container">
      <h1 id="mainQuestion"> Why we should fund (public and private) Art, Parks and Waterways?</h1>
      <?php
        echo $empty;
        echo $newrecord;
        echo $errorUpload;
       ?>
       <!-- <div class="row" id="result">
         <table class="table table-hover">
           <thead class="head-decorate">
             <tr>
               <td>Image</td>
             </tr>
           </thead>
           <tbody>
             <td> -->
      <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="submitted" value = "true"/>
      <h3> Step 1: Upload the picture</h3>
      <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
          <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse <input type="file" id="imgInp" name="image" value="<?php if(isset($_POST['image'])){echo $_POST['image']; }?>"/>
                </span>
          </span>
          <input type="text" class="form-control" readonly/>
        </div>
        <img id="img-upload" width="100%" height="auto"/>

        <h3> Step 2: Give Picture Details </h3>
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYYY" type="text" value="<?php if(isset($_POST['date'])){echo $_POST['date']; }?>"/>

        <label for="artName">Art Name:</label>
        <input type="text" class="form-control" id="artName" name="artName" value="<?php if(isset($_POST['artName'])){echo $_POST['artName']; }?>"/>

        <label for="apk">Art, Park, or Waterway?</label><br>
        <label class="radio-inline"><input type="radio" name="apk" value="Art" checked>Art</label>
        <label class="radio-inline"><input type="radio" name="apk" value="Park">Park</label>
        <label class="radio-inline"><input type="radio" name="apk" value="Waterway">Waterway</label>
        <br>
        <label for="loc">Location:</label>
        <input type="text" class="form-control" id="loc" name="location" value="<?php if(isset($_POST['location'])){echo $_POST['location']; }?>"/>

        <label for="area">Area:</label>
        <select class="form-control" id="area" name="area" value="<?php if(isset($_POST['area'])){echo $_POST['area']; }?>">
            <option>Select Area</option>
            <option>Downtown</option>
            <option>Beaches</option>
            <option>Northside</option>
            <option>Westside</option>
            <option>Southside</option>
            <option>Mandarin</option>
            <option>St. Augustine</option>
          </select>

        <label for="points">Expected Points:</label><br>
        <label class="radio-inline"><input type="radio" name="points" value="1" checked>1 (Known art locations)</label>
        <label class="radio-inline"><input type="radio" name="points" value="2">2 (Unknown art locations)</label>
        <br>
        <label for="upby">Uploaded by:</label>
        <select class="form-control" id="upby" name="upBy" value="<?php if(isset($_POST['upBy'])){echo $_POST['upBy']; }?>">
            <option>Select Team Member</option>
            <option>Lidija</option>
            <option>Marissa</option>
            <option>Veronika</option>
            <option>Kjelsie</option>
            <option>Zane</option>
            <option>Tiffany</option>
            <option>Grant</option>
            <option>Chayne</option>
            <option>Adrian</option>
            <option>Stevin</option>
          </select>
          <h3> Step 3: Press Submit </h3>
          <input type="submit" class="btn btn-primary btn-large btn-block" name="submitData"/>
        </form>
      </td>
        <tbody>
      </div>
    </div>
  <!-- </div> -->
  </body>
  <!--Custom JS-->
  <script src="js/datepick.js"></script>
  <script src="js/imgup.js"></script>
  <!--Google Analytics-->
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100758043-1', 'auto');
  ga('send', 'pageview');

</script>

</html>
