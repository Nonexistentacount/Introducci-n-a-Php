<?php

// Función para calcular puntaje
function calcularPuntaje($nombre) {
    $puntaje = strlen($nombre); // cantidad de letras

    // Verificar si contiene la letra "a" (mayúscula o minúscula)
    if (stripos($nombre, 'a') !== false) {
        $puntaje += 15;
    }

    return $puntaje;
}

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre1 = $_POST["nombre1"];
    $nombre2 = $_POST["nombre2"];

    // Alias dinámicos - combinación de ambos nombres
    $alias1 = "Alias_" . substr($nombre1, 0, 3) . substr($nombre2, 0, 3);
    $alias2 = "Alias_" . substr($nombre2, 0, 3) . substr($nombre1, 0, 3);

    $puntaje1 = calcularPuntaje($nombre1);
    $puntaje2 = calcularPuntaje($nombre2);

    $total = $puntaje1 + $puntaje2 + random_int(0, 30);

    $resultado = "
        Alias 1: $alias1 (Nombre: $nombre1)<br>
        Alias 2: $alias2 (Nombre: $nombre2)<br>
        Porcentaje total: $total%
    ";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calcular Porcentaje</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-width: 500px;
            width: 90%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"] {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }

        .resultado {
            background: #f5f5f5;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
            border-left: 4px solid #667eea;
        }

        .resultado br {
            margin: 10px 0;
        }

        .resultado {
            color: #333;
            line-height: 1.8;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Ingresa dos nombres</h2>

        <form method="POST">
            <input type="text" name="nombre1" placeholder="Primer nombre" required>
            <input type="text" name="nombre2" placeholder="Segundo nombre" required>
            <button type="submit">Calcular</button>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <?php echo $resultado; ?>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>