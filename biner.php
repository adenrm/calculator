<?php
class converterAngka {
    private $angka;

    public function __construct($angka) {
        $this->angka = $angka;
    }

    public function convertToDesimal() {
        return bindec($this->angka);
    }
    public function convertToBiner() {
        return decbin($this->angka);
    }
}
echo "
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='index.php'>Calculator</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarNav'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='btn btn-outline-primary nav-link' aria-current='page' href='index.php'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='btn btn-outline-primary nav-link active' href='#'>Biner</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link disabled' href='#'>Pricing</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link disabled' href='#' tabindex='-1' aria-disabled='true'>Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class='mt-5 container'>
    <form action='' method='post'>
        <input class='form-control' type='text' name='angka' placeholder='Masukkan nilai biner'>
        <br>
        <select class='form-select' name='operator'>
            <option value='bindec'>biner to decimal</option>
            <option value='decbin'>decimal to biner</option>
        </select>
        <br>
        <input class='btn btn-primary' type='submit' name='submit' value='Konversi'>
    </form>
    </div>
";

if(isset($_POST['submit'])){
    if($_POST['operator'] == 'bindec'){
        $angka = $_POST['angka'];
        $converterDecimal = new converterAngka($angka);
        echo "Hasil Desimal: " . $converterDecimal->convertToDesimal();
    }else if($_POST['operator'] == 'decbin'){
        $angka = $_POST['angka'];
        $converterBiner = new converterAngka($angka);
        echo "Hasil Biner: " . $converterBiner->convertToBiner();
    }
}
?>