<?php
class Kalkulator {
    public function hitung($ekspresi) {
        try {
            $hasil = eval('return ' . $ekspresi . ';');
            return $hasil;
        } catch (ParseError $e) {
            return "Masukkan Nilai Dengan Benar!";
        }
    }
        public function phi() {
            return round(pi(), 2);
        }
        
        public function pangkat($angka, $pangkat) {
            return pow($angka, $pangkat);
        }
    
        public function akar($angka) {
            return sqrt($angka);
        }
}

?>