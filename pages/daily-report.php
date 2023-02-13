<?php
include('./database/config.php');

$time  = mysqli_query($connect, 'SELECT time FROM tuya_smart_plug_1 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 1');
$voltage  = mysqli_query($connect, 'SELECT voltage FROM tuya_smart_plug_1 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 20');
$current  = mysqli_query($connect, 'SELECT current FROM tuya_smart_plug_1 WHERE current IS NOT NULL ORDER BY id DESC LIMIT 20');
$power  = mysqli_query($connect, 'SELECT power FROM tuya_smart_plug_1 WHERE power IS NOT NULL ORDER BY id DESC LIMIT 20');
$electricity  = mysqli_query($connect, 'SELECT electricity FROM tuya_smart_plug_1 WHERE electricity IS NOT NULL ORDER BY id DESC LIMIT 20');
// $day  = mysqli_query($connect, 'SELECT day FROM tuya_smart_plug_1 WHERE day IS NOT NULL ORDER BY id DESC ');
// $week  = mysqli_query($connect, 'SELECT week FROM tuya_smart_plug_1 WHERE week IS NOT NULL ORDER BY id DESC ');
// $month  = mysqli_query($connect, 'SELECT month FROM tuya_smart_plug_1 WHERE month IS NOT NULL ORDER BY id DESC ');
// $total_electricity  = mysqli_query($connect, 'SELECT total_electricity FROM tuya_smart_plug_1 WHERE total_electricity IS NOT NULL ORDER BY id DESC ');
// $total_cost  = mysqli_query($connect, 'SELECT total_cost FROM tuya_smart_plug_1 WHERE total_cost IS NOT NULL ORDER BY id DESC ');

$carbon_emission  = mysqli_query($connect, 'SELECT carbon_emission FROM tuya_smart_plug_1 WHERE carbon_emission IS NOT NULL ORDER BY id DESC ');
$upper1  = mysqli_query($connect, 'SELECT id,time,voltage,current,power,electricity,day,week,month FROM tuya_smart_plug_1 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 10');
$under1 = mysqli_query($connect, 'SELECT total_electricity,total_cost,carbon_emission FROM tuya_smart_plug_1 WHERE total_electricity IS NOT NULL ORDER BY id DESC LIMIT 10');



?>

<div id="daily-report" class="tabcontent" style="display:none;">
  <section class="header">
    <div class="items-controller">
      <h5>Show</h5>
      <select name="" id="itemperpage">
        <option value="04">04</option>
        <option value="05">05</option>
        <option value="08" selected>08</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
      <h5>Per Page</h5>
    </div>
    <div class="search">
      <h5>Search</h5>
      <input type="text" name="" id="search" placeholder="search">
    </div>
  </section>
  <section class="field">
    <table id="sampleTableA" class="table table-striped sampleTable">
      <thead>
        <tr>
          <th>id</th>
          <th>Time</th>
          <th>Voltage</th>
          <th>Current</th>
          <th>Power</th>
          <th>Electricity</th>
          <th>Day</th>
          <th>Week</th>
          <th>Month</th>
          <th>Total Electricity</th>
          <th>Total Cost</th>
          <th>Carbon Emission</th>
        </tr>
      </thead>
      <tbody id="theData">
      </tbody>
    </table>
    <div class="bottom-field">
      <ul class="pagination">
        <li class="prev"><a href="#" id="prev">&#139;</a></li>
        <!-- page number here -->
        <li class="next"><a href="#" id="next">&#155;</a></li>
      </ul>
    </div>
  </section>
</div>


<script>
  var dataUpper = [];
  var dataUnder = [];
  let fusionData = []
</script>
<?php
while ($upper = mysqli_fetch_assoc($upper1)) {
?>
  <script>
    dataUpper.push([<?php echo $upper['id']; ?>, <?php echo '"' . $upper['time'] . '"'; ?>, <?php echo $upper['voltage']; ?>, <?php echo $upper['current']; ?>, <?php echo $upper['power']; ?>, <?php echo $upper['electricity']; ?>, <?php echo $upper['day']; ?>, <?php echo $upper['week']; ?>, <?php echo $upper['month']; ?>])
  </script>
<?php
}
?>

<?php
while ($under = mysqli_fetch_assoc($under1)) {
?>
  <script>
    dataUnder.push([<?php echo $under['total_electricity']; ?>, <?php echo '"' . $under['total_cost'] . '"'; ?>, <?php echo $under['carbon_emission']; ?>])
  </script>
<?php
}
?>


<script>
  dataUpper.map((value, index) => {
    fusionData.push(value.concat(dataUnder[index]))
  })

  var tableData = "";
  fusionData.forEach(data => {
    tableData += "<tr>";
    tableData += `<td>${data[0]}</td>`
    tableData += `<td>${data[1]}</td>`
    tableData += `<td>${data[2]}</td>`
    tableData += `<td>${data[3]}</td>`
    tableData += `<td>${data[4]}</td>`
    tableData += `<td>${data[5]}</td>`
    tableData += `<td>${data[6]}</td>`
    tableData += `<td>${data[7]}</td>`
    tableData += `<td>${data[8]}</td>`
    tableData += `<td>${data[9]}</td>`
    tableData += `<td>${data[10]}</td>`
    tableData += `<td>${data[11]}</td>`
    tableData += "</tr>"
  });
  document.getElementById("theData").innerHTML = tableData;
</script>