<?php
    // ====================== Deklarasi variabel ====================
    $baris = $_POST['baris'];
    $kolom = $_POST['kolom'];
    $matrik = $_POST['matrik'];

    $weight = array();
    $learningRate = 1;
    $bias = 1;
    $threshold = 0;
    $output;

    // Target. Ganti ini untuk mengenali pola tertenru.
    // Sekarang polanya adalah AND.
    // Sesuaikan pola dengan jumlah inputan (matrik).
    $target = array(1);


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
            array_push($weight, rand(0, 999999) / 100000);
        }

        return $weight;
    }

    // bobotLama = bobot awal, alpha = learningRate.
    // bobotLama, input, dan target adalah array.
    function perubahanBobot($bobotLama, $target, $alpha, $input, $output)
    {
        // Ganti ini untuk mengganti jumlah max perulangan.
        $maxEpoch = 10;
        $jumPerulangan = 0;

        $bobot = $bobotLama;

        // Proses pelatihan bobot sampai mengenali || maxEpoch.
        while(!($output === $target))
        {
            // Jika sudah sampai batas perulangan, hentikan pelatihan.
            if($jumPerulangan >= $maxEpoch)
            {
                return $bobot;
            }

            // Proses pelatihan.
            for($i = 0; $i < count($bobot); $i++)
            {
                // Perubahan bobot.
                $tmpDeltaW = $alpha * $target[0] * $input[$i];
                $bobot[$i] += $tmpDeltaW;

                // Perubahan Bias.
                // $tmpDeltaB = $alpha * $target[$i];
                // $bias[$i] += $tmpDeltaB;
            }

            $jumPerulangan++;
        }

        return $bobot;
    }


    // ======================= Main program ==========================
    // Inisialisasi bobot awal.
    $weight = inisialisasiBobot(count($matrik));

    // Hitung net.
    $net = net($matrik, $weight, $bias);

    // Hitung Y (output).
    $output = aktivasi($net, $threshold);

    $response = array();
    $response["inputan"] = $matrik;
    $response["bobot_lama"] = $weight;
    $response["bias"] = $bias;
    $response["threshold"] = $threshold;
    $response["learningRate"] = $learningRate;
    $response["net"] = $net;
    $response["output"] = $output;

    // Rubah bobot untuk menyesuaikan dengan target.
    $weight = perubahanBobot($weight, $target, $learningRate, $matrik, $output);

    $response["bobot_baru"] = $weight;

    echo json_encode($response);
?>
