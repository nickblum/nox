<?php
session_start();// because ajax?
$sectorID = $_POST['sector_id'];

$ret = new StdClass();
$ret->haserror = false;

// GET SECTOR DATA
$conn = new mysqli($_SESSION["servername"], $_SESSION["username"], $_SESSION["password"], $_SESSION["dbname"]);
if ($conn->connect_error) {
    // probably need to put this in an error log or something
    //$ret->error = $conn->connect_error;
}
$stmt = $conn->prepare("SELECT * FROM sectors WHERE sector_id=?");
$stmt->bind_param("i",$sectorID);
$stmt->execute();
$result = $stmt->get_result();
$ret->qry = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();

// OUTPUT HTML
$ret->data = $ret->qry[0]['title'];
/*
<<<HTML
SECTOR $sectorID ($ret->qry[0]->title)
HTML;*/

echo json_encode($ret);


/*
<script>
    var svg = document.getElementById("svg");
    var polygon = document.createElementNS("http://www.w3.org/2000/svg", "polygon");
    $( polygon ).attr("class","polymap hmm");
    svg.appendChild(polygon);

    var array = arr = [ 
        [190, 390], 
        [20, 240],
        [20, 140],
        [90, 50],
        [190, 10],
        [290, 10],
        [380, 70],
        [380, 330],
        [290, 390] ];
    
    var rscale = 1;
    var rposx = 0;//200;
    var rposy = 0;//440;

    for (value of array) {
        var point = svg.createSVGPoint();
        point.x = (value[0] * rscale) + rposx;
        point.y = (value[1] * rscale) + rposy;
        polygon.points.appendItem(point);
    }
    $(polygon).css("transform", "scale(20em 20em)");
</script>



<div style="width: 100%; max-width: 400px">
 <svg class="polysvg" viewBox="0 0 400 400">
     <polygon class="polymap-parent" points="190 390, 
                     20 240,
                     20 140,
                     90 50,
                     190 10,
                     290 10,
                     380 70,
                     380 330,
                     290 390
                     ">
     </polygon>

     <polygon class="polymap" bedid="1" points="190 380, 30 240, 90 240, 190 330"></polygon>

 </svg>
</div>

<div id="bedBox" style="display:none;width: 100%; max-width: 400px">
  <input type="button" value="Overview" onclick="observeBed();">
  <input type="button" value="Nodes" onclick="waterTest(this);">
  <input type="button" value="Schedule" onclick="showScheduler();">
  <input type="button" value="Edit" onclick="editBed();">


  <table>
      <tbody>
      <tr>
          <th>Start Date</th>  
          <th>Plant</th> 
      </tr>
      <tr>
          <td>2021-09-13</td>
          <td>Walking Onions</td>
      </tr>
      <tr>
          <td>2021-09-22</td>
          <td>Organic Potatoes</td>
      </tr>
      </tbody>
  </table>
</div> 


$servername = "localhost";
$username = "admin";
$password = "thistlenickssmartforest";
$dbname = "forest";


// RUN PY SCRIPT (success/fail agnostic -- handled separately)
passthru('python3 /var/www/html/nox/py/demo.py');

passthru('python3 /var/www/html/nox/py/rf_controller.py');

// DO PHP STUFF

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM nick_test ORDER BY id DESC LIMIT 10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
  echo "Last Accessed: " . $row["stuff"] . " (ID " . $row["id"]. ")<br>";
}
} else {
echo "0 results";
}
$conn->close();
*/

