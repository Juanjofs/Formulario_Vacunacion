<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VACUNACIÓN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <body style="background-color:hsla(201, 88%, 87%, 0.76)">
    <br>
    <form method="POST" action="">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <!-- 1 of 3 -->
            </div>
            <div class="col-md-auto">
                <h1>REGISTRO DE VACUNACIÓN</h1>
            </div>
            <div class="col col-lg-2">
                <!-- 3 of 3 -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <!-- 1 of 3 -->
            </div>
            <div class="col-md-auto">
                <br>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Identificación:</p></div>
                        <div class="col-6"> <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="txt_id" id="txt_id" required>
                                            <label for="floatingInput" require>Documento</label>
                                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Nombres:</p></div> 
                        <div class="col-6"> <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="txt_nombres" id="txt_nombres" required>
                                            <label for="floatingInput">Nombres</label>
                                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Apellidos:</p></div>
                        <div class="col-6"> <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="txt_apellido" id="txt_apellido" required>
                                            <label for="floatingInput">Apellidos</label>
                                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Tipo de Biológico:</p></div>
                        <div class="col-6"> <div class="form-floating mb-2">
                                            <input type="text" class="form-control" name="txt_biologico" id="txt_biologico" required>
                                            <label for="floatingInput">Laboratorio</label>
                                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Fecha Primera Dósis:</p></div>
                        <div class="col-6"><input type="date" name="txt_fp" id="txt_fp" required> <br> </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-6"><p class="fw-bolder">Fecha Segunda Dósis:</p></div>
                        <div class="col-6"> <input type="date" name="txt_sd" id="txt_sd" required> <br> </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2">
                <!-- 3 of 3 -->
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col col-lg-2">
                <!-- 1 of 3 -->
            </div>
            <div class="col-md-auto">
                <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
            </div>
            <div class="col col-lg-2">
                <!-- 3 of 3 -->
            </div>
        </div>
    </div>
    </form>
    <br>
</body>
<?php
    if(isset($_POST["txt_id"]))
    {
        $txt_id = $_POST["txt_id"];
        $txt_nom = $_POST["txt_nombres"];
        $txt_ape = $_POST["txt_apellido"];
        $txt_bio = $_POST["txt_biologico"];
        $txt_fp = $_POST["txt_fp"];
        $txt_sd = $_POST["txt_sd"];

        $fh = fopen("registro_vacunacion.txt",'a');
        fwrite($fh, $txt_id.";".$txt_nom.";".$txt_ape.";".$txt_bio.";".$txt_fp.";".$txt_sd."\n");
        fclose($fh);
        echo "<div class='container'>";
            echo "<div class='row'>";
                echo "<div class='col'>";
                    //1 of 3
                echo "</div>";
                echo "<div class='col-9'>";
                    echo "<table class='table table-striped table-hover'>";
                        echo "<thead>";
                            echo "<tr>";
                                echo "<th scope='col'>Identificación</th>";
                                echo "<th scope='col'>Nombre</th>";
                                echo "<th scope='col'>Apellido</th>";
                                echo "<th scope='col'>Nombre Biológico</th>";
                                echo "<th scope='col'>Fecha Primera Dósis</th>";
                                echo "<th scope='col'>Fecha Segunda Dósis</th>";
                            echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        $fp = fopen("registro_vacunacion.txt", 'r');
                        while(!feof($fp)) {
                            $linea = fgets($fp);
                            $registro = explode(";", $linea);
                            echo "<tr>";
                                echo "<th scope='row'>$registro[0]</th>";
                                for($i=1; $i<count($registro); $i++)
                                {
                                    echo "<td>$registro[$i]</td>";                                
                                }
                            echo "</tr>";            
                        }
                        fclose($fp);
                        echo "</tbody>";
                    echo "</table>";
                echo "</div>";
                echo "<div class='col'>";
                    //3 of 3
                echo "</div>";
            echo "</div>";
        echo "</div>";
        
    }
?>
</html>