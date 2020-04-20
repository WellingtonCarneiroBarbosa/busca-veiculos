<?php
    /**
     * Carrega as marcas para exibição da página
     * 
     */
    require "./vendor/autoload.php";
    require "./app/getMarcas.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca Veículos</title>
    <style>
    html {
        font-family: sans-serif;
    }
    </style>
</head>
<body>
    <center>
        <h1>Busca veículos</h1>
        <hr>
        <label for="marca">Selecione uma marca</label>
        <select name="marca" id="marca">
            <?php 
                foreach($marcas as $marca){
                    ?>
                    <option value="<?php echo $marca['codigo']; ?>"><?php echo $marca['nome']; ?></option>
                <?php } ?>
        </select>

        <br>
        <br>
        <label for="modelo" id="labelModelo" style="display: none;">Selecione um modelo</label>
        <select name="modelo" id="modelo" style="display: none;"></select>
    </center>

    <!--jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

    <script>
    $(document).ready(function (){
        /**
         * Carrega os modelos
         * após o change do select
         * de marcas
         * 
         */
        $("#marca").change(function (){
            var marca = $("#marca");
            var codigoMarca = marca.val();
            var modelo = $("#modelo");
            var labelModelo = $("#labelModelo");

            $.ajax({
                /**
                 * ajuste essa url de acordo com seu projeto!
                 * 
                 */
                url: 'http://localhost/busca-veiculos/app/getModelos.php',
                type: 'POST', 
                data:{"codigoMarca" : codigoMarca},

                beforeSend: function(){
                    alert('Carregando dados! Por favor, aguarde.');
                },

                success: function(data) { 
                    /**
                     * imprime os options
                     * 
                     */
                    modelo.show();
                    labelModelo.show();
                    modelo.html(data);
                    console.log('Dados carregados com sucesso!');
                },

                error: function(err){
                    alert('Erro ao carregar dados! '+ err);
                    console.log('Erro ao carregar dados! '+ err);
                }
            });
        });
    });
 
    </script>
</body>
</html>