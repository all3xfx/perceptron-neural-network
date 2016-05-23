<?php


?>

<html>
    <head>
        <title>Perceptron</title>
    </head>
    <body>
        <label for="baris">Baris</label>
        <input name="baris" type="text" placeholder="baris"/><br>
        <label for="kolom">Kolom</label>
        <input name="kolom" type="text" placeholder="kolom"/><br>
        <button id="btnSetMatrik" type="button">Proses</button><br>

        <div id="areaMatrik"></div>
        <div id="areaOutput"></div>

        <script src="jquery.js"></script>
        <script>
            var matrik = [];
            var baris;
            var kolom;

            $('#btnSetMatrik').click(function(){
                baris = $('input[name="baris"]').val();
                kolom = $('input[name="kolom"]').val();

                $('#areaMatrik').html("");
                $('#areaMatrik').append("<h2>Input nilai matriks</h2>");

                for(var h = 0; h < baris; h++){
                    for(var i = 0; i < kolom; i++){
                        var inputan = $('<input id="input' + i + '" class="inputan">')
                        $('#areaMatrik').append(inputan);
                    }
                    $('#areaMatrik').append("<br>");
                }

                var btnGetMatrik = $('<button id="btnGetMatrik">Proses nilai matrik</button>');
                $('#areaMatrik').append(btnGetMatrik);
            });

            $(document).on('click', '#btnGetMatrik', function(){
                $('.inputan').each(function(){
                    matrik.push($(this).val());
                });

                $.post('perceptron.php',
                    {
                        "matrik": matrik,
                        "baris": baris,
                        "kolom": kolom
                    },
                    function(dataPost){
                        console.log(dataPost);
                        var data = $.parseJSON(dataPost);

                        var inputan = data.inputan;
                        var bobotLama = data.bobot_lama;
                        var biasLama = data.bias_lama;
                        var threshold = data.threshold;
                        var learningRate = data.learningRate;
                        var net = data.net;
                        var output = data.output;
                        var bobotBaru = data.bobot_baru;
                        var biasBaru = data.bias_baru;
                        var target = data.target;
                        var epoch = data.epoch;


                        $('#areaOutput').append("<h2>Output</h2>");
                        $('#areaOutput').append("<b>inputan</b><br>");
                        $('#areaOutput').append(inputan + "<br><br>");
                        $('#areaOutput').append("<b>Bobot lama</b><br>");
                        $('#areaOutput').append(bobotLama + "<br><br>");
                        $('#areaOutput').append("<b>Bias Lama</b><br>");
                        $('#areaOutput').append(biasLama + "<br><br>");
                        $('#areaOutput').append("<b>threshold</b><br>");
                        $('#areaOutput').append(threshold + "<br><br>");
                        $('#areaOutput').append("<b>learning Rate</b><br>");
                        $('#areaOutput').append(learningRate + "<br><br>");
                        $('#areaOutput').append("<b>Net</b><br>");
                        $('#areaOutput').append(net + "<br><br>");
                        $('#areaOutput').append("<b>Output</b><br>");
                        $('#areaOutput').append(output + "<br><br>");
                        $('#areaOutput').append("<b>Bobot Baru</b><br>");
                        $('#areaOutput').append(bobotBaru + "<br><br>");
                        $('#areaOutput').append("<b>Bias Baru</b><br>");
                        $('#areaOutput').append(biasBaru + "<br><br>");
                        $('#areaOutput').append("<b>Target</b><br>");
                        $('#areaOutput').append(target + "<br><br>");
                        $('#areaOutput').append("<b>Jumlah epoch</b><br>");
                        $('#areaOutput').append(epoch + "<br><br>");
                    }
                );
            });


        </script>
    </body>
</html>
