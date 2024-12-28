<?php

define("ROOT", dirname(__FILE__));
include_once ROOT."/router/router.php";
// include_once ROOT."/functions.php";

$router = new Router();
$router->run();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алгебра и Геометрия</title>
    <style>
        /* Общие стили */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        body {
            background: linear-gradient(to right, #1a2a6c, #b21f1f, #fdbb2d);
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
        }

        .header {
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 80%;
        }

        .header h1 {
            font-size: 36px;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            animation: pulse 2s infinite;
        }

        /* Стили для кнопок */
        .offer {
            display: flex;
            justify-content: space-around;
            width: 80%;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .offer a {
            font-size: 18px;
            color: #fff;
            background: rgba(0, 0, 0, 0.7);
            padding: 20px 40px;
            border-radius: 10px;
            text-decoration: none;
            text-transform: uppercase;
            margin: 10px;
            transition: all 0.3s ease-in-out;
            font-weight: bold;
        }

        .offer a:hover {
            background: #fdbb2d;
            transform: scale(1.1);
            color: #1a2a6c;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Эффекты космического стиля */
        .offer a::before {
            content: '🔺';  /* Жёлтый треугольник */
            margin-right: 10px;
            color: yellow; /* Цвет треугольника */
            font-size: 24px;
            transition: transform 0.3s ease;
        }

        .offer a:nth-child(2)::before {
            content: '√';  /* Зеленый корень */
            margin-right: 10px;
            color: green; /* Цвет корня */
            font-size: 24px;
        }

        .offer a:hover::before {
            transform: rotate(180deg);
        }

        /* Анимации */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.7;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h1 class="header-text">
        Алгебра - Геометрия 9 - 11
    </h1>
</div>

<div class="offer">
    <a href="controller/countController.php">Решим задачу с формулами и вычислениями</a>
    <a href="controller/viewController.php">Откройте ум для новых задач и укрепления знаний</a>
</div>

</body>
</html>