

<!DOCTYPE html>
<html>
  <head>
    <title>JaxArt - Gallery</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!--Icon-->
    <link rel="icon" href="../media/jaxart.jpeg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Custom Stylesheet-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap Date-Picker Plugin -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />

  </head>


  <body>
    <!--NavBar-->
    <!-- <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../index.php">JaxArt</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="../index.php">Home</a></li>
            <li><a href="../places/places.php">Public Art Map</a></li>
            <li class="active"><a href="gallery.php">Gallery</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://doodle.com/poll/5bg9kti2t34a9bii" target="_blank">Who's Available?</a></li>
          </ul>
        </div>
      </div>
    </nav> -->

    <div class="container">
      <div id="artDetails">
        <div class="row" id="result">
          <h1>Art Details</h1>
                <?php
                //connect to DB
                  include('../formAct.php');

                  $artID = $_GET['artID'];

                  $query = "SELECT * FROM details_production WHERE id =" .$artID;
                  $result = mysqli_query($dbcon, $query);
                  while($row = mysqli_fetch_array($result)){
                    // echo '<tr>';
                    // echo '<td>';
                    echo '<div class="row">';
                    echo '<div class="col-md-8">';
                    echo '<img class="clickPicDetails" id="'.$row['id'] .'"onclick="showArtDetails(this.id)" src="../art/'.($row['image']).'"/>';
                    echo '</div>';
                    echo '<div class="col-md-4">';
                    echo '<h3> Art Name: <small>'.$row["artName"] .'</small></h3>';
                    echo '<h3> Art, Park or Waterway: <small>'.$row["apk"] .'</small></h3>';
                    echo '<h3> Location: <small>'.$row["location"] .'</small></h3>';
                    echo '<h3> Area: <small>'.$row["area"] .'</small></h3>';
                    echo '<a class="btn btn-success" href="gallery.php"> Back to Gallery </a>';
                    echo '</div>';
                    echo '</div>';

                    // echo '</td>';
                    // echo '<td>';
                    // echo 'ID: ' .$row["id"] .'<br>' .'Art Name: '.$row["artName"] .'<br>' .'APK: '.$row["apk"] .'<br>' .'Location: ' .$row["location"] .'<br>' .'Area: '.$row["area"];
                    // echo '</td>';
                    // echo '</tr>';
                  }
                 ?>
        <!-- </div>
      </div>
    </div>
  </body>
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
