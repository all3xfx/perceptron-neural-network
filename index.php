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
                    }
                );
            });


        </script>
    </body>
</html>
