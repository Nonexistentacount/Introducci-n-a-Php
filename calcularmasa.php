<?php
$resultado = "";
$categoria = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peso = floatval($_POST["peso"]);
    $altura = floatval($_POST["altura"]);

    if ($peso > 0 && $altura > 0) {
        $imc = $peso / ($altura * $altura);
        $resultado = number_format($imc, 2);

        if ($imc < 18.5) {
            $categoria = "Bajo peso";
        } elseif ($imc >= 18.5 && $imc < 24.9) {
            $categoria = "Peso normal";
        } elseif ($imc >= 25 && $imc < 29.9) {
            $categoria = "Sobrepeso";
        } else {
            $categoria = "Obesidad";
        }
    } else {
        $resultado = "Datos inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de IMC</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4e73df;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2e59d9;
        }
        .resultado {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Calculadora de IMC</h2>
    <form method="post">
        <input type="number" step="0.01" name="peso" placeholder="Peso en kg" required>
        <input type="number" step="0.01" name="altura" placeholder="Altura en metros" required>
        <button type="submit">Calcular</button>
    </form>

    <?php if ($resultado !== ""): ?>
        <div class="resultado">
            IMC: <?php echo $resultado; ?><br>
            Categoría: <?php echo $categoria; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>