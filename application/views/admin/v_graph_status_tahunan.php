<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Laporan Status Tahunan</title>

  </head>
  <body>
<?php
// print_r($data);
// die();

$tahun = null;
foreach($data as $key){
          $tahun = $key->tahun;
           $nama[] = $key->nama;
           $tepat[] = $key->tepat;
           $telat_lma_mnt[] = $key->telat_lma_mnt;
           $telat_tgaplh_mnt[] = $key->telat_tgaplh_mnt;
           $telat_dua_jm[] = $key->telat_dua_jm;
           $telat_lbhdua_jm[] = $key->telat_lbhdua_jm;
           $lpa_absen[] = $key->lpa_absen;
           $ss[] = $key->SS;
           $st[] = $key->ST;
           $id[] = $key->ID;
           $it[] = $key->IT;
           $a[] = $key->A;
           $j[] = $key->J;
           $pj[] = $key->PJ;
           $c[] = $key->C;
       }

 ?>
    <!-- <canvas id="canvas" width="1366" height="768"></canvas> -->

  <!-- <canvas id="bar-chart-horizontal" width="1366" height="768"></canvas> -->
  <div class="container">

    <canvas id="bar-chart" width="1366" height="768"></canvas>
    <canvas id="bar-chart2" width="1366" height="768"></canvas>
    <canvas id="bar-chart3" width="1366" height="768"></canvas>
    <canvas id="bar-chart4" width="1366" height="768"></canvas>
    <canvas id="bar-chart5" width="1366" height="768"></canvas>
    <canvas id="bar-chart6" width="1366" height="768"></canvas>
    <canvas id="bar-chart7" width="1366" height="768"></canvas>
    <canvas id="bar-chart8" width="1366" height="768"></canvas>
    <canvas id="bar-chart9" width="1366" height="768"></canvas>
    <canvas id="bar-chart10" width="1366" height="768"></canvas>
    <canvas id="bar-chart11" width="1366" height="768"></canvas>
    <canvas id="bar-chart12" width="1366" height="768"></canvas>
    <canvas id="bar-chart13" width="1366" height="768"></canvas>
    <canvas id="bar-chart14" width="1366" height="768"></canvas>

  </div>



  </body>
</html>

<script>
new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Datang Tepat Waktu",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data: <?php echo json_encode($tepat);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart2"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Datang Telat 5 Menit",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data: <?php echo json_encode($telat_lma_mnt);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart3"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Datang Telat 30 Menit",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data: <?php echo json_encode($telat_tgaplh_mnt);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart4"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Datang Telat 2 Jam",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($telat_dua_jm);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart5"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Datang Lebih dari 2 jam",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($telat_lbhdua_jm);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart6"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Lupa Absen",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($lpa_absen);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan  Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart7"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Sakit Dengan Surat",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($ss);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart8"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Sakit Tanpa Surat",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($st);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart9"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Izin di Ganti",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($id);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart10"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Izin Tidak Ganti",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($it);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart11"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "ALFA",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($a);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart12"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "JALDIS",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($j);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});

new Chart(document.getElementById("bar-chart13"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "Pulang JALDIS >23.00",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($pj);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});


new Chart(document.getElementById("bar-chart14"), {
    type: 'bar',
    data: {
      labels: <?php echo json_encode($nama);?> ,
      datasets: [
        {
          label: "CUTI",
          backgroundColor:["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#B0171F", "#FFB6C1", "#CD8C95", "#8B475D", "#8B8386", "#CD69C9", "#FF00FF", "#4B0082", "#6A5ACD", "#3A5FCD", "#B0E2FF", "#00BFFF", "#00CED1", "#00C957",
          "#CAFF70", "#EEEE00", "#FFC125", "#FFE7BA", "#FF9912", "#FF7256", "	#EEB4B4", "#FF3030", "#E3CF57", "#228B22", "#76EEC6", "#483D8B", "#FF69B4", "#BBFFFF", "#C0FF3E", "#FFDEAD", "#FF8C69", "#388E8E"],
          data:<?php echo json_encode($c);?>
        }
      ]
    },
    options: {
      legend: { display: true },
      title: {
        display: true,
        text: 'Laporan Kedisiplinan Tahun  <?= $tahun ?>'
      }
    }
});



</script>
