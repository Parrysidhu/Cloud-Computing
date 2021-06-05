<html lang="en">
<head>
  <title>COVID-19 HOME CARE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src = "jquery/jquery.js"></script>
              <script type="text/javascript" >
               /* $(document).ready(function(){
                  setInterval(function(){
                    //alert("mah");
                    $('#show').load('#');
                  },15000);
                });*/
                setTimeout(function(){
                   window.location.reload(1);
                }, 5000);
              </script>
</head>
<body>
  <h3 class="text-primary">Patients Details</h3>
<div class=" col-lg-12 content-wrapper">

      <div class="row" id="show">

                    <table class="table table-hover">
                       <thead>
                          <tr class="text-primary">
                             <th>#</th>
                             <th>patients_id</th>
                             <th>name</th>
                             <th>patients_add</th>
                             <th>lat</th>
                             <th>lng</th>
                             <th>temp(Farenheit)</th>
                             <th>avg bpm</th>
                             <th>blood oxygen</th>
                             <th>date-time</th>
                          </tr>
                       </thead>

<?php
include('config.php');
$sql = "select * from patients where temp > 102" ;
if (mysqli_query($db, $sql)) {
echo "";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($db);
}
$count=1;
$result = mysqli_query($db , $sql);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) { ?>
                        <tbody>
                           <tr>
                              <th scope="row">
                              <?php echo $count; ?>
                              </th>
                              <td>
                              <?php echo $row['patients_id']; ?>
                              </td>
                              <td>
                              <?php echo $row['name']; ?>
                              </td>
                              <td>
                              <?php echo $row['patients_add']; ?>
                              </td>
                              <td>
                              <?php echo $row['lat']; ?>
                              </td>
                              <td>
                              <?php echo $row['lng']; ?>
                              </td>
                              <td>
                              <?php echo $row['temp']; ?>
                              </td>
                              <td>
                              <?php echo $row['bpm']; ?>
                              </td>
                              <td>
                              <?php echo $row['blood oxygen']; ?>
                              </td>
                              <td>
                              <?php echo $row['Date-Time']; ?>
                              </td>
                           </tr>
                        </tbody>
<?php
$count++;
}
} else {
echo "0 results";
}
?>
      </table>


</div>
</div>
</body>
</html>
