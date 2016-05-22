<?php
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];
    $matrik = $_POST['matrik'];

    var_dump($matrik);

    $weight = rand(0.1, 1);
    $learningRate = 1;
    $bias = 0;
    $threshold = 0;

    // Target. Ganti ini untuk mengenali pola tertenru.
    // Sekarang polanya adalah AND.
    $target = array(1, -1, -1, -1);

    // X = input, W = Bobot, B = Bias.
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

    echo net([1,1], [2,4], 1);
?>
