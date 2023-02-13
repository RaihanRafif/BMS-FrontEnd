<div class="panel panel-primary" style="height:50vh; width:90vw">
    <canvas id="myChart7"></canvas>
    <script>
        const labels = newDataset

        const data = {
            labels: labels,
            datasets: [{
                    label: 'Current (A)',
                    backgroundColor: '#EA047E',
                    borderColor: '#EA047E',
                    data: [<?php
                            while ($b = mysqli_fetch_array($current)) {
                                echo  $b['current'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Voltage (V)',
                    backgroundColor: '#FF6D28',
                    borderColor: '#FF6D28',
                    data: [<?php
                            while ($b = mysqli_fetch_array($voltage)) {
                                echo  $b['voltage'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Power (Watt)',
                    backgroundColor: '#FCE700',
                    borderColor: '#FCE700',
                    data: [<?php
                            while ($b = mysqli_fetch_array($power)) {
                                echo  $b['power'] . ',';
                            }
                            ?>],
                },
                {
                    label: 'Electricity (Watt)',
                    backgroundColor: '#00F5FF',
                    borderColor: '#00F5FF',
                    data: [<?php
                            while ($b = mysqli_fetch_array($electricity)) {
                                echo  $b['electricity'] . ',';
                            }
                            ?>],
                },
            ]
        };

        const config = {
            type: 'line',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: 'Realtime Energy Monitoring'
                    }
                },
                animation: false,
                interaction: {
                    intersect: false,
                },
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart7'),
            config
        );
    </script>
</div>