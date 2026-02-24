<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Tiempo Vivido</title>
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
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
            color: #333;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            background: #4e73df;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #2e59d9;
        }

        .resultado {
            margin-top: 20px;
            text-align: left;
        }

        .resultado p {
            margin: 5px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Calculadora de Vida</h1>

    <form method="POST">
        <input type="number" name="edad" placeholder="Ingresa tu edad" required>
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if (isset($_POST['edad'])) {
        $edad = $_POST['edad'];

        $dias = $edad * 365;
        $horas = $dias * 24;
        $minutos = $horas * 60;

        echo "<div class='resultado'>";
        echo "<p>Edad: $edad años</p>";
        echo "<p>Días vividos: $dias días</p>";
        echo "<p>Horas vividas: $horas horas</p>";
        echo "<p>Minutos vividos: $minutos minutos</p>";
        echo "</div>";
    }
    ?>

</div>

</body>
</html>