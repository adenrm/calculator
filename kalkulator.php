<?php
include 'system.php';

$kalkulator = new Kalkulator();
$hasil = '';

if (isset($_POST['submit'])) {
  $ekspresi = $_POST['ekspresi'];
  $ekspresi = str_replace(' ', '', $ekspresi); // Menghapus semua spasi dalam ekspresi
  $ekspresi = str_replace('x', '*', $ekspresi); // Mengganti huruf x dengan operator perkalian
  $ekspresi = str_replace('÷', '/', $ekspresi); // Mengganti titik dua dengan operator pembagian
  $ekspresi = str_replace('π', $kalkulator->phi(), $ekspresi); // Mengganti simbol pi dengan nilai phi

  // Menangani ekspresi yang mengandung akar
  if (strpos($ekspresi, '√') !== false) {
    $pattern = '/√(\d+(\.\d+)?)/'; // Memperbarui pola untuk mendukung bilangan desimal
    $ekspresi = preg_replace_callback($pattern, function($matches) {
      return sqrt(floatval($matches[1])); // Menggunakan fungsi sqrt langsung untuk menghitung akar
    }, $ekspresi);
    $hasil = $ekspresi; // Langsung menetapkan hasil karena eval tidak digunakan
  } else {
        // Menangani ekspresi yang mengandung sin
        if (strpos($ekspresi, 'sin(') !== false) {
          $pattern = '/sin\((\d+(\.\d+)?)\)/'; // Memperbarui pola untuk mendukung bilangan desimal
          $ekspresi = preg_replace_callback($pattern, function($matches) {
            return sin(deg2rad(floatval($matches[1]))); // Menggunakan fungsi tan langsung untuk menghitung sin
          }, $ekspresi);
        }
    // Menangani ekspresi yang mengandung cos
    if (strpos($ekspresi, 'cos(') !== false) {
      $pattern = '/cos\((\d+(\.\d+)?)\)/'; // Memperbarui pola untuk mendukung bilangan desimal
      $ekspresi = preg_replace_callback($pattern, function($matches) {
        return cos(deg2rad(floatval($matches[1]))); // Menggunakan fungsi cos langsung untuk menghitung cos
      }, $ekspresi);
    }
    // Menangani ekspresi yang mengandung tan
    if (strpos($ekspresi, 'tan(') !== false) {
      $pattern = '/tan\((\d+(\.\d+)?)\)/'; // Memperbarui pola untuk mendukung bilangan desimal
      $ekspresi = preg_replace_callback($pattern, function($matches) {
        return tan(deg2rad(floatval($matches[1]))); // Menggunakan fungsi tan langsung untuk menghitung tan
      }, $ekspresi);
    }
    // Menangani ekspresi yang mengandung log
    if (strpos($ekspresi, 'log(') !== false) {
      $pattern = '/log\((\d+(\.\d+)?)\)/'; // Memperbarui pola untuk mendukung bilangan desimal
      $ekspresi = preg_replace_callback($pattern, function($matches) {
        return log(floatval($matches[1])); // Menggunakan fungsi log langsung untuk menghitung log
      }, $ekspresi);
    }
    // Menangani ekspresi yang mengandung perpangkatan
    if (strpos($ekspresi, '^') !== false) {
      $pattern = '/(\d+(\.\d+)?)\^(\d+(\.\d+)?)/'; // Memperbarui pola untuk mendukung bilangan desimal
      $ekspresi = preg_replace_callback($pattern, function($matches) {
        return pow(floatval($matches[1]), floatval($matches[3])); // Menggunakan fungsi pow langsung untuk menghitung perpangkatan
      }, $ekspresi);
    }
    // Menangani ekspresi yang mengandung persen
    if (strpos($ekspresi, '%') !== false) {
      $pattern = '/(\d+(\.\d+)?)%/'; // Memperbarui pola untuk mendukung bilangan desimal
      $ekspresi = preg_replace_callback($pattern, function($matches) {
        return floatval($matches[1]) / 100; // Menggunakan pembagian untuk menghitung persen
      }, $ekspresi);
    }
    // Jika tidak ada akar, gunakan fungsi hitung dari kelas Kalkulator
    if (in_array(substr($ekspresi, -1), ['+', '-', '*', '/'])) {
      $ekspresi = substr($ekspresi, 0, -1);
    }
    if (strpos($ekspresi, '(') !== false && substr($ekspresi, -1) !== ')') {
      $ekspresi .= ')';
    }
    $ekspresi = preg_replace('/(?<=[0-9])(\()/i', '*$1', $ekspresi);
    $hasil = $kalkulator->hitung($ekspresi);
  }
}

$phi = $kalkulator->phi();

// if ($_POST['submit'] = 'phi') {
//     header('Location: kalkulator_phi.php');
// }

?>
    <title>Kalkulator</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.0/mdb.min.css"
    rel="stylesheet"
    />
    <style>
      .screen {
        background-color: black;
        color: white;
        height: 80px;
        text-align: right;
        font-size: 50px;
        border: none;
      }
      button {
    height: 70px;
    width: 140px;
    font-size: 2rem!important;
  }
  .keys {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-gap: 20px;
    padding: 20px;
  }
  .calculator-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
    </style>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#323bae;">
    <!-- Container wrapper -->
    <div class="container-fluid">
  
      <!-- Navbar brand -->
      <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" style="width: 50px;">  Project Kalkulator</a>
  
      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
  
      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
  
          <!-- Link -->
          <li class="nav-item">
            <a class="nav-link btn" href="index.html"><i class="bi bi-house"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="kalkulator_js.php"><img src="img/logo-js.png" alt="JS" width="20px"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn active" href="#"><img src="img/logo-php.png" alt="PHP" width="25px"></a>
          </li>
  
        </ul>
  
        <!-- Icons -->
        <ul class="navbar-nav d-flex flex-row me-1">
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" target="_blank" href="https://wa.me/6282159571001/"><i class="bi bi-whatsapp"></i></a>
              </li>
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" target="_blank" href="https://instagram.com/ydznq/"><i class="bi bi-instagram"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://github.com/adenrm"><i class="bi bi-github"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="https://adenrm.github.io/"><i class="bi bi-file-person"></i></a>
          </li>
          <li class="nav-item me-3 me-lg-0">
            <a class="nav-link" target="_blank" href="info.html"><i class="bi bi-info-lg"></i></a>
          </li>
        </ul>
  
      </div>
    </div>
    <!-- Container wrapper -->
  </nav>
  <!-- Navbar -->
 <div class="container mt-5 calculator-container">
     <form action="" method="post">
        <table>
          <tr>
            <td>
              <input class="form-control screen" readonly type="text" name="ekspresi" value="<?php echo $hasil; ?>">
            </td>
          </tr>
          <tr>
              <td>
                <div class="keys">
                  <button type="button" class="btn btn-secondary" onclick="tambahAngka('√')">√</button>
                  <button type="button" class="btn btn-secondary" onclick="tambahAngka(1)">1</button>
                  <button type="button" class="btn btn-secondary" onclick="tambahAngka(2)">2</button>
                  <button type="button" class="btn btn-secondary" onclick="tambahAngka(3)">3</button>
                  <button type="button" class="btn btn-secondary" onclick="tambahOperator('+')">+</button>
                </div>
                  </td>
                </tr>
                <tr>
                  <td>
                    <div class="keys">
                      <button type="button" class="btn btn-secondary" onclick="tambahPi()">π</button>
                      <button type="button" class="btn btn-secondary" onclick="tambahAngka(4)">4</button>
                      <button type="button" class="btn btn-secondary" onclick="tambahAngka(5)">5</button>
                      <button type="button" class="btn btn-secondary" onclick="tambahAngka(6)">6</button>
                      <button type="button" class="btn btn-secondary" onclick="tambahOperator('-')">-</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="keys">
                    <button type="button" class="btn btn-secondary" onclick="tambahTitik()">.</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka(7)">7</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka(8)">8</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka(9)">9</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahOperator('x')">&times;</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="keys">
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka('(')">(</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka(')')">)</button>
                    <button type="button" class="btn btn-warning" onclick="document.forms[0].ekspresi.value = document.forms[0].ekspresi.value.slice(0, -1);"><i class="fas fa-delete-left"></i></button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka(0)">0</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahOperator('÷')">÷</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="keys">
                  <button type="button" class="btn btn-secondary" onclick="tambahAngka('sin(')">sin</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka('cos(')">cos</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka('tan(')">tan</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahAngka('log(')">log</button>
                    <button type="button" class="btn btn-secondary" onclick="tambahOperator('^')">^</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="keys">
                    <button type="button" class="btn btn-secondary" onclick="tambahOperator('%')">%</button>
                    <button type="button" class="btn btn-danger" onclick="document.forms[0].ekspresi.value = '';">AC</button>
                    <input class="btn btn-primary hitung" type="submit" name="submit" onclick="hitung()" value="=">
                  </div>
                </td>
              </tr>
              </table>
            </form>
          </div>
          
          <script>
//             function tambahNol() {
//               var nol = 0;
//   if (document.forms[0].ekspresi.value === '' || !nol.includes(document.forms[0].ekspresi.value.slice(-1))) {
//     document.forms[0].ekspresi.value += '0';
//   }
//             }
            function tambahAngka(angka) {
  document.forms[0].ekspresi.value += angka;
}
function tambahOperator(operator) {
  var opsinye = ['+', '-', 'x', '÷', '^', '%'];
  if (document.forms[0].ekspresi.value === '' || !opsinye.includes(document.forms[0].ekspresi.value.slice(-1))) {
    document.forms[0].ekspresi.value += ' ' + operator + ' ';
  }
}
function tambahTitik() {
  var titik = '.';
  if (!document.forms[0].ekspresi.value.includes(titik)) {
    document.forms[0].ekspresi.value += titik;
  }
}
function tambahPi() {
  var ekspresi = document.forms[0].ekspresi.value;
  var opsinye = ['+', '-', 'x', '÷'];

  // Cek apakah ekspresi kosong atau karakter terakhir adalah operator dan tidak ada angka lain sebelumnya
  if (ekspresi === '' || (opsinye.includes(ekspresi.slice(-1)) && !/\d/.test(ekspresi.slice(0, -1)))) {
    document.forms[0].ekspresi.value += 'π';
  } else {
    // Cek apakah sudah ada '3.14' di ekspresi dan karakter terakhir bukan operator
    if (!ekspresi.includes('π') || opsinye.includes(ekspresi.slice(-1))) {
      document.forms[0].ekspresi.value += 'π';
    }
  }
}



// function hitung() {
//   var opsinye = ['+', '-', '*', '/'];
//   if (document.forms[0].ekspresi.value === '' || !opsinye.includes(document.forms[0].ekspresi.value.slice(-1))) {
//    <?php $ekspresi = $_POST['ekspresi'];
//          $hasil = $kalkulator->hitung($ekspresi); ?>
//   }
// }
</script>

