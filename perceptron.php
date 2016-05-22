<?php
    // ====================== Deklarasi variabel ====================
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];
    $matrik = $_POST['matrik'];

    var_dump($matrik);

    $weight = array();
    $learningRate = 1;
    $bias = 1;
    $threshold = 0;
    $output;

    // Target. Ganti ini untuk mengenali pola tertenru.
    // Sekarang polanya adalah AND.
    // Sesuaikan pola dengan jumlah inputan (matrik).
    $target = array(1, -1, -1, -1);


    // ===================== dKLARASI fUNGSI ==========================

    // X = input, W = Bobot, B = Bias.
    // $x dan $w adalah array.
    function net($x, $w, $b)
    {
        $indeks = 0;
        $hasil = 0;

        foreach ($x as $input)
        {
            $tmpHasil = $input * $w[$indeks];
            $hasil += $tmpHasil;
            $indeks++;
        }

        $hasil += $b;
        return $hasil;
    }

    // Fungsi aktivasi.
    function aktivasi($net , $threshold)
    {
        if($net > $threshold)
        {
            return 1;
        }
        else if($net == $threshold)
        {
            return 0;
        }
        else
        {
            return -1;
        }
    }

    // Inisialisasi bobot awal.
    function inisialisasiBobot($banyaknyaInput)
    {
        $weight = array();
        for($i = 0; $i < $banyaknyaInput; $i++)
        {
            array_push($weight, rand(0.1, 1));
        }

        return $weight;
    }

    // bobotLama = bobot awal, alpha = learningRate.
    // bobotLama dan target adalah array.
    function perubahanBobot($bobotLama, $target, $alpha)
    {

    }


    // ======================= Main program ==========================
    // Inisialisasi bobot awal.
    $weight = inisialisasiBobot(count($matrik));

    // Hitung net.
    $net = net($matrik, $weight, $bias);

    // Hitung Y (output).
    $output = aktivasi($net, $threshold);

    // Rubah bobot untuk menyesuaikan dengan target.
    $weight = perubahanBobot($weight, $target, $learningRate);



    var_dump($net);
    var_dump($weight);
    var_dump($output);
    echo "<br>bobot baru<br>";
    var_dump($weight);

?>
