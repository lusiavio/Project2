<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Chart</title>

  </head>
  <body>
<?php
// print_r($x);
// die();
foreach($data as $data){
           $nama[] = $data->nama;
           $poin[] = (float) $data->poin;
       }
 ?>
    <!-- <canvas id="canvas" width="1366" height="768"></canvas> -->

  <canvas id="bar-chart-horizontal" width="1200" height="468"></canvas>

  <canvas id="doughnut-chart" width="1366" height="768"></canvas>

  <canvas id="bar-chart" width="1366" height="768"></canvas>

  <canvas id="line-chart" width="1366" height="768"></canvas>

  </body>
</html>

<script>
    //
    //     let lineChartData = {
    //         labels : <?php echo json_encode($nama);?>,
    //         datasets : [
    //
    //             {
    //                 fillColor: "rgba(60,141,188,0.9)",
    //                 strokeColor: "rgba(60,141,188,0.8)",
    //                 pointColor: "#3b8bba",
    //                 pointStrokeColor: "#fff",
    //                 pointHighlightFill: "#3b",
    //                 pointHighlightStroke: "rgba(152,235,239,1)",
    //                 data : <?php echo json_encode($poin);?>
    //             }
    //
    //         ]
    //     }
    //
    // let myLine = new Chart(document.getElementById("canvas").getContext("2d")).Bar(lineChartData);

    // horizontal Chart
    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Point didapat",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data: <?php echo json_encode($poin);?>
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Hasil Point'
      }
    }
});

    // Doghnout chart
    // new Chart(document.getElementById("doughnut-chart"), {
    // type: 'doughnut',
    // data: {
    //   labels: <?php echo json_encode($nama);?> ,
    //   datasets: [
    //     {
    //       label: "Population (millions)",
    //       backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
    //       "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
    //       data: <?php echo json_encode($poin);?>
    //     }
    //   ]
    // },
    // options: {
    //   title: {
    //     display: true,
    //     text: 'Predicted world population (millions) in 2050'
    //   }
    // }
    // });

    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($nama);?> ,
          datasets: [
            {
              label: "Population (millions)",
              backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
              "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
              data: <?php echo json_encode($poin);?>
            }
          ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: 'Predicted world population (millions) in 2050'
          }
        }
    });

    // Line chart
//     new Chart(document.getElementById("line-chart"), {
//   type: 'line',
//   data: {
//     labels: [1500,1600,1700,1750,1800,1850,1900,1950,1999,2050],
//     datasets: [{
//         data: [86,114,106,106,107,111,133,221,783,2478],
//         label: "Africa",
//         borderColor: "#3e95cd",
//         fill: false
//       }, {
//         data: [282,350,411,502,635,809,947,1402,3700,5267],
//         label: "Asia",
//         borderColor: "#8e5ea2",
//         fill: false
//       }, {
//         data: [168,170,178,190,203,276,408,547,675,734],
//         label: "Europe",
//         borderColor: "#3cba9f",
//         fill: false
//       }, {
//         data: [40,20,10,16,24,38,74,167,508,784],
//         label: "Latin America",
//         borderColor: "#e8c3b9",
//         fill: false
//       }, {
//         data: [6,3,2,2,7,26,82,172,312,433],
//         label: "North America",
//         borderColor: "#c45850",
//         fill: false
//       }
//     ]
//   },
//   options: {
//     title: {
//       display: true,
//       text: 'World population per region (in millions)'
//     }
//   }
// });

</script>
