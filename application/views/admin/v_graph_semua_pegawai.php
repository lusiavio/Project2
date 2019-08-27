<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laporan Poin Semua Pegawai</title>

  </head>
  <body>
<?php
// print_r($data);
// die();
$bulan = null;
$tahun = null;
foreach($data as $key){
          $bulan = $key->bulan;
          $tahun = $key->tahun;
           $nama[] = $key->nama;
           $poin[] = (float) $key->poin;
       }
 ?>
    <!-- <canvas id="canvas" width="1366" height="768"></canvas> -->
<div class="container">

  <canvas id="bar-chart-horizontal" width="1366" height="768"></canvas>

</div>

  </body>
</html>

<script>

    // horizontal Chart
    new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: 'Total Poin',
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
        text: 'Point Bulan <?= $bulan ?> <?= $tahun ?>'
      }
    }
});

</script>
