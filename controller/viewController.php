<?php
class viewController{
    public function actionView(){
        echo "<h6 class='h6'>Здесь вы можете получать ответ на любой ваш вопрос</h6>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Алгебра</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #ff7e5f, #feb47b);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        #mathForm {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }

        #mathForm:hover {
            transform: scale(1.05);
        }

        h1, h4 {
            font-size: 22px;
            color: #333;
        }

        h6{
            font-size: 0px;
        }

        label {
            font-size: 18px;
            color: #555;
            display: block;
            margin-bottom: 12px;
            text-transform: uppercase;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            height: 150px;
            padding: 15px;
            border: 2px solid #ff7e5f;
            border-radius: 8px;
            font-size: 18px;
            resize: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        textarea:focus {
            border-color: #feb47b;
            box-shadow: 0 0 10px rgba(255, 182, 123, 0.5);
        }

        #button {
            background-color: #ff7e5f;
            color: white;
            padding: 15px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            margin-top: 20px;
        }

        #button:hover {
            background-color: #feb47b;
            transform: scale(1.1);
        }

        #h1 {
            font-size: 20px;
            color: #555;
            margin-top: 20px;
            transition: color 0.3s ease;
        }

        #h1.success {
            color: #4CAF50;
        }

        #h1.error {
            color: #FF0000;
        }

        .math-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            justify-content: center;
        }

        .math-buttons button {
            padding: 10px;
            background-color: #feb47b;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .math-buttons button:hover {
            background-color: #ff7e5f;
        }

    </style>
</head>
<body>
    <form id="mathForm" action="" method="post">
        <label for="examples">Напишите ваши проблемы по алгебре</label><br>

        <div class="math-buttons">
            <button type="button" onclick="addSymbol('sqrt(')">√</button>
            <button type="button" onclick="addSymbol('^')">^</button>
            <button type="button" onclick="addSymbol('(')">(</button>
            <button type="button" onclick="addSymbol(')')">)</button>
        </div>

        <textarea name="question" id="question" placeholder="Какие проблемы?"></textarea><br>
        <input type="button" id="button" value="Решать">
        <h1 id="h1"></h1>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let textFromArea = document.getElementById('question');
        let process = document.getElementById('h1');

        function funcBefore() {
            process.innerHTML = "Запрос отправляется...";
        }

        function funcSucces() {
            process.innerHTML = "Успешно";
        }

        function addSymbol(symbol) {
            const currentText = textFromArea.value;
            if (symbol === 'sqrt(') {
                textFromArea.value = currentText + '√(';
            } else {
                textFromArea.value = currentText + symbol;
            }
        }

        document.getElementById('button').addEventListener('click', function(event) {
            event.preventDefault();

            $.ajax({
                url: "http://localhost:8888/project/controller/countController.php",
                type: "POST",
                data: { name: textFromArea.value },
                dataType: "html",
                beforeSend: funcBefore,
                success: funcSucces
            });
        });
    </script>
</body>
</html>