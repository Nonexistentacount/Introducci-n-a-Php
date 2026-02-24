<?php
$frase = "";
$nivelCringe = 0;
$nivelCursi = 0;
$nivelRandom = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 3.1.1 Frase
    $frase = $_POST["frase"];

    // 3.1.2, 3.1.3, 3.1.4 Inicializar niveles
    $nivelCringe = 0;
    $nivelCursi = 0;
    $nivelRandom = 0;

    // 3.2.1 Cantidad de palabras
    $cantidadPalabras = str_word_count($frase);
    $nivelCringe += $cantidadPalabras;
    $nivelCursi += $cantidadPalabras;
    $nivelRandom += $cantidadPalabras;

    // 3.2.2 Verificar "éxito"
    if (str_contains(strtolower($frase), "éxito")) {
        $nivelCringe += 15;
        $nivelCursi += 15;
        $nivelRandom += 15;
    }

    // 3.2.3 Verificar "meta"
    if (str_contains(strtolower($frase), "meta")) {
        $nivelCringe += 15;
        $nivelCursi += 15;
        $nivelRandom += 15;
    }

    // 3.2.4 Verificar "sueños"
    if (str_contains(strtolower($frase), "sueños")) {
        $nivelCringe += 15;
        $nivelCursi += 15;
        $nivelRandom += 15;
    }

    // 3.2.5 Número aleatorio
    $aleatorio = random_int(0, 20);
    $nivelCringe += $aleatorio;
    $nivelCursi += $aleatorio;
    $nivelRandom += $aleatorio;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calificador de Frases</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
            text-align: center;
            padding: 40px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            box-shadow: 0px 0px 10px gray;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .resultado {
            margin-top: 20px;
            text-align: left;
        }

        .nivel {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Calificador de Frases Motivacionales</h2>

    <form method="POST">
        <input type="text" name="frase" placeholder="Escribe tu frase motivacional..." required>
        <br>
        <button type="submit">Calificar</button>
    </form>

    <?php if ($frase != ""): ?>
        <div class="resultado">
            <p><strong>Frase:</strong> <?php echo htmlspecialchars($frase); ?></p>
            <p class="nivel">Nivel Cringe: <?php echo $nivelCringe; ?></p>
            <p class="nivel">Nivel Cursi: <?php echo $nivelCursi; ?></p>
            <p class="nivel">Nivel Random: <?php echo $nivelRandom; ?></p>
        </div>
    <?php endif; ?>

</div>

</body>
</html>