<div id="battery-status" class="tabcontent" style="display:block;">
    <div class="title-panel-section">
        <div class="electrity">
            <h5>Electricity Status</h5>
        </div>
        <div class="kwh">
            <h5>kWh Electricity Status</h5>
        </div>
        <div class="cost">
            <h5>Cost Electricity</h5>
        </div>
        <div class="carbon">
            <h5>Carbon Footprint</h5>
        </div>
        <div class="status">
            <h5>Data Communication Status</h5>
        </div>
    </div>
    <div class="panel-section">
        <div id="electricity"></div>
        <div class="kwh" id="kwh"></div>
        <div class="cost" id="cost"></div>
        <div class="carbon" id="carbon"></div>
        <div class="status" id="status"></div>
    </div>
    <div class="title-chart-section">
        <div class="battery-options">
            <!-- <h5>Smartplug</h5> -->
            <select class="div-toggle" data-target=".my-info-1">
                <option value="" selected disabled hidden>Smartplug</option>
                <option value="Batt-1" data-show=".Batt-1">Smartplug - 1</option>
                <option value="Batt-2" data-show=".Batt-2">Smartplug - 2</option>
                <option value="Batt-3" data-show=".Batt-3">Smartplug - 3</option>
                <option value="Batt-4" data-show=".Batt-4">Smartplug - 4</option>
                <option value="Batt-5" data-show=".Batt-5">Smartplug - 5</option>
                <option value="Batt-6" data-show=".Batt-6">Smartplug - 6</option>
                <option value="Batt-7" data-show=".Batt-7">Smartplug - 7</option>
                <option value="Batt-8" data-show=".Batt-8">Smartplug - 8</option>
                <option value="Batt-9" data-show=".Batt-9">Smartplug - 9</option>
                <option value="Batt-10" data-show=".Batt-10">Smartplug - 10</option>
                <option value="Batt-11" data-show=".Batt-11">Smartplug - 11</option>
                <option value="Batt-12" data-show=".Batt-12">Smartplug - 12</option>
            </select>
        </div>
        <!-- <div class="electricity" style="margin-left:auto;"> -->
            <!-- <h5>Electricity</h5> -->
            <!-- <select class="div-toggle" data-target=".my-info-1">
                <option value="" selected disabled hidden>Electricity</option>
                <option value="voltage" data-show=".Batt-1">Voltage</option>
                <option value="current" data-show=".Batt-2">Current</option>
                <option value="power" data-show=".Batt-3">Power</option>
            </select> -->
        <!-- </div> -->
        <!-- <div class="kwh"> -->
            <!-- <h5>kWh</h5> -->
            <!-- <select class="div-toggle" data-target=".my-info-1">
                <option value="" selected disabled hidden>Electricity</option>
                <option value="voltage" data-show=".Batt-1">Voltage</option>
                <option value="current" data-show=".Batt-2">Current</option>
                <option value="power" data-show=".Batt-3">Power</option>
            </select> -->
        <!-- </div> -->
        <!-- <div class="cost"> -->
            <!-- <h5>Cost</h5> -->
        <!-- </div> -->
        <!-- <div class="carbon"> -->
            <!-- <h5>Carbon </h5> -->
        <!-- </div> -->
    </div>
    <div class="chart-section">
        <div class="Batt-1" id="responsecontainer1"></div>
        <script>
            var refreshId = setInterval(function() {
                // $('#responsecontainer1').load('./data/ultrasonic.php');
                $('#responsecontainer1').load('./data/batt1.php');
                $('#electricity').load('./components/battery-status/electricity-component.php');
                $('#kwh').load('./components/battery-status/kwh-component.php');
                $('#cost').load('./components/battery-status/cost-electricity-component.php');
                $('#carbon').load('./components/battery-status/carbon-component.php');
                $('#status').load('./components/battery-status/status-component.php');
            }, 1000);
        </script>
    </div>
</div>