
<!DOCTYPE html>
<html>

  <head>
    <title>JaxArt - Map</title>
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
    <nav class="navbar navbar-inverse">
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
            <li class="active"><a href="places.php">Public Art Map</a></li>
            <li><a href="../gallery/gallery.php">Gallery</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="https://doodle.com/poll/5bg9kti2t34a9bii" target="_blank">Who's Available?</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <!--Body-->
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <li>Green Icons = Art in Public Places Official Collection</li>
        </div>
        <div class="col-md-3">
          <li>Blue Icons = Art in Public Places Collaborations</li>
        </div>
        <div class="col-md-3">
          <li>Orange Icons = Privately Owned Public Art</li>
        </div>
        <div class="col-md-3">
          <li>Blue Marker = Group Discovered Art, Park, Waterway</li>
        </div>

      </div>
      <div class="row">
        <div class="col-md-6">
          <h3>Public and Private Art Map</h3>
          <p>Map from cultural council</p>
          <iframe src="https://www.google.com/maps/d/embed?mid=1VJbiHNDcJ02kZjWHP30jC-rDsE8" width="100%" height="350"></iframe>
        </div>
        <div class="col-md-6">
          <h3>Coolest Group Progress</h3>
          <p>Icons will color up once activated</p>
          <iframe src="https://www.google.com/maps/d/embed?mid=1FJs8O3GF_GvfoC7bUbDt5Aj3oQA" width="100%" height="350"></iframe>
        </div>
      </div>

      <div class="row" id="result">
        <h3>Arts, Parks and Waterways List</h3>
        <table class="table table-hover">
          <thead class="head-decorate">
            <tr>
              <td>#</td>
              <td>Date</td>
              <td>Art Name</td>
              <td>APK</td>
              <td>Location</td>
              <td>Area</td>
              <td>Expected Points</td>
              <td>Uploaded by</td>
            </tr>
          </thead>
          <tbody id="answers">
            <?php
                include('../formAct.php');
                $query = "SELECT * FROM details_final ORDER BY id DESC";
                $result = mysqli_query($dbcon, $query);
                while($row = mysqli_fetch_array($result)){
                  echo '<tr>';
                  echo '<td>' .$row["id"] .'</td>';
                  echo '<td>' .$row["dateUp"] .'</td>';
                  echo '<td>' .$row["artName"] .'</td>';
                  echo '<td>' .$row["apk"] .'</td>';
                  echo '<td>' .$row["location"] .'</td>';
                  echo '<td>' .$row["area"] .'</td>';
                  echo '<td>' .$row["points"] .'</td>';
                  echo '<td>' .$row["upBy"] .'</td>';
                  echo '</tr>';
                }
             ?>

          </tbody>
        </table>
      </div>

    </div>
  </body>
  <!--Custom JS-->
  <script src="../js/datepick.js"></script>
  <script src="../js/imgup.js"></script>
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


</html>
