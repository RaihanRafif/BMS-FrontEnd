<?php
include('../database/config.php');

$time  = mysqli_query($connect, 'SELECT time FROM tuya_smart_plug_3 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 20');
$voltage  = mysqli_query($connect, 'SELECT voltage FROM tuya_smart_plug_3 WHERE voltage IS NOT NULL ORDER BY id DESC LIMIT 20');
$current  = mysqli_query($connect, 'SELECT current FROM tuya_smart_plug_3 WHERE current IS NOT NULL ORDER BY id DESC LIMIT 20');
$power  = mysqli_query($connect, 'SELECT power FROM tuya_smart_plug_3 WHERE power IS NOT NULL ORDER BY id DESC LIMIT 20');
$electricity  = mysqli_query($connect, 'SELECT electricity FROM tuya_smart_plug_3 WHERE electricity IS NOT NULL ORDER BY id DESC LIMIT 20');

?>
<script>
    var dataset = [];
    var newDataset = [];
</script>
<?php
while ($b = mysqli_fetch_array($time)) {
?>
    <script>
        dataset.push(<?php echo '"' . $b['time'] . '",'; ?>)
    </script>
<?php
}
?>
<script>
    dataset.forEach((score) => {
        let newTimeFormat = score.split(":");
        newDataset.push(`${newTimeFormat[0]}:${newTimeFormat[1]}`)
    })
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<?php include('../components/battery-status/charts/smartplug-3.php') ?>