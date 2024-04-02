<?php

class Mahasiswa {
    public $nim;
    public $nama;
    public $kampus;
    public $matkul;
    public $nilai;

    public function __construct($nim, $nama, $kampus, $matkul, $nilai) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->kampus = $kampus;
        $this->matkul = $matkul;
        $this->nilai = $nilai;
    }

    public function getStatus() {
        return ($this->nilai >= 65) ? "Lulus" : "Tidak Lulus";
    }
    
    public function getGrade() {
        if ($this->nilai >= 85) {
            return "A";
        } elseif ($this->nilai >= 75) {
            return "B";
        } elseif ($this->nilai >= 60) {
            return "C";
        } elseif ($this->nilai >= 40) {
            return "D";
        } else {
            return "E";
        }
    }
    
    public function getPredikat() {
        if ($this->nilai >= 85) {
            return "Sangat Memuaskan";
        } elseif ($this->nilai >= 75) {
            return "Memuaskan";
        } elseif ($this->nilai >= 60) {
            return "Cukup";
        } elseif ($this->nilai >= 40) {
            return "Kurang";
        } else {
            return "Sangat Kurang";
        }
    }
    
}

?>
