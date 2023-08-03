<?php

namespace App\Libraries;

use TCPDF;


class MY_TCPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = ROOTPATH . 'public//img/minahasa.png';
        /**
         * width : 50
         */
        $this->Image($image_file, 42, 6, 20, 24);
        // Set font
        $this->SetFont('times', 'B', 16);
        $this->setX(45);
        $this->Cell(0, 6, 'PEMERINTAH KABUPATEN MINAHASA', 0, 1, 'C');
        $this->setX(45);
        $this->Cell(0, 8, 'KECAMATAN TONDANO UTARA', 0, 1, 'C');
        $this->setX(45);
        $this->Cell(0, 8, 'DESA KEMBUAN', 0, 1, 'C');
    }
}
