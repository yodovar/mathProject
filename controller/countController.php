<?php
    sleep(3);
    define("ROOT2", '/Applications/MAMP/htdocs/project');
    include_once ROOT2."/public/oop.php";

    class countController{
        public function actionFigure(){
            echo "<h1 class='header1'><center>Поможем решать ваши задачи по геометрии</center></h1>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geometric Shapes</title>
    <style>
        /* Общие стили для страницы */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4facfe, #00f2fe); /* Градиентный фон */
            overflow: hidden;
        }

        /* Фон с фигурами */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .header1 {
            margin-bottom: 100%;
            margin-left: -500px;
            font-style: italic;
        }

        .header1:hover{
            color: #ffffff;
            font-size: 31px;
            transform: translate(4px);
            font-style: oblique;
        }

        .shape {
            position: absolute;
            opacity: 0.3; /* Лёгкая прозрачность */
            animation: float 8s infinite ease-in-out;
        }

        /* Анимация для фигур */
        @keyframes float {
            0%, 100% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(45deg);
            }
        }

        /* Форма */
        form {
            background: #ffffff; /* Убрана прозрачность */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 600px;
            margin-left: 250px;
        }

        /* Анимация формы при наведении */
        form:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #333;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        h2:hover {
            color: #00aaff;
        }

        select {
            width: 80%;
            padding: 12px 20px;
            margin-bottom: 20px;
            border: 2px solid #00aaff;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            background-color: #f9f9f9;
            transition: 0.3s ease;
        }

        select:hover, select:focus {
            border-color: #0077cc;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        button {
            padding: 12px 25px;
            font-size: 18px;
            color: #fff;
            background-color: #00aaff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        button:hover {
            background-color: #0077cc;
            box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
            transform: translateY(-3px);
        }

        /* Эффект фокуса для всех инпутов */
        input[type="number"]:focus {
            border-color: #0077cc;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        /* Новые стили для динамических полей */
        .dynamic-input {
            margin-bottom: 15px;
            padding: 12px 20px;
            width: 80%;
            border-radius: 10px;
            border: 2px solid #ccc;
            background-color: #f9f9f9;
            transition: 0.3s ease;
        }

        .dynamic-input:focus {
            border-color: #0077cc;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }

        /* Добавим эффект анимации при наведении на результаты */
        #results {
            font-size: 20px;
            font-weight: 600;
            margin-top: 20px;
            color: #333;
            transition: color 0.3s ease;
        }

        #results:hover {
            color: #00aaff;
        }
    </style>
</head>
<body>
    <!-- Фон -->
    <div class="background">
        <!-- Геометрические фигуры -->
    </div>

    <form method="post" action="">
    <div>
        <h2 id="header" class="header">Выберите фигуру</h2>
    </div>
    <div>
        <select name="shapes" id="shapes">
            <option value="off" selected disabled>Нажмите, чтобы выбрать</option>
            <option value="circle">Круг</option>
            <option value="rectangle">Прямоугольник</option>
            <option value="square">Квадрат</option>
            <option value="triangle">Треугольник</option>
        </select>
    </div>
    <div id="dynamicContent"></div> <!-- Здесь будет отображаться дополнительное содержимое -->
    <button type="button" id="button">Выбрать</button>
    
    <!-- Здесь будут отображаться результаты -->
    <h1 id="results"></h1> 
</form>
<script>
  function SelectOption() {
      const shapes = document.getElementById('shapes');
      const button = document.getElementById('button');
      const dynamicContent = document.getElementById('dynamicContent');
      const results = document.getElementById('results'); // Здесь будем выводить результаты

      button.addEventListener('click', function(event) {
          event.preventDefault(); // Предотвращаем отправку формы

          const selectedShape = shapes.value;

          // Очищаем старое содержимое перед добавлением нового
          dynamicContent.innerHTML = '';
          results.innerHTML = ''; // Очищаем результаты перед обновлением

          // Для Круга
          if (selectedShape == 'circle') {
              const inputRadius = document.createElement('input');
              inputRadius.placeholder = "Радиус";
              inputRadius.type = 'number';
              inputRadius.name = 'radius';
              inputRadius.addEventListener('input', updateCircleValues);

              const inputDiameter = document.createElement('input');
              inputDiameter.placeholder = "Диаметр";
              inputDiameter.type = 'number';
              inputDiameter.name = 'diameter';
              inputDiameter.addEventListener('input', updateCircleValues);

              dynamicContent.appendChild(inputRadius);
              dynamicContent.appendChild(inputDiameter);

              function updateCircleValues() {
                  const radius = parseFloat(inputRadius.value) || (parseFloat(inputDiameter.value) / 2);
                  const diameter = radius * 2;
                  const area = Math.PI * Math.pow(radius, 2);
                  const perimeter = 2 * Math.PI * radius;

                  // Обновление значений
                  if (!inputRadius.value) inputRadius.value = radius;
                  if (!inputDiameter.value) inputDiameter.value = diameter;

                  // Отображаем результаты на странице, а не через alert
                  results.innerHTML = `Круг: Площадь = ${area.toFixed(2)}, Периметр = ${perimeter.toFixed(2)}`;
              }
          }

          // Для Прямоугольника
          if (selectedShape == 'rectangle') {
              const inputLength = document.createElement('input');
              inputLength.placeholder = "Длина";
              inputLength.type = 'number';
              inputLength.name = 'length';
              inputLength.addEventListener('input', updateRectangleValues);

              const inputWidth = document.createElement('input');
              inputWidth.placeholder = "Ширина";
              inputWidth.type = 'number';
              inputWidth.name = 'width';
              inputWidth.addEventListener('input', updateRectangleValues);

              dynamicContent.appendChild(inputLength);
              dynamicContent.appendChild(inputWidth);

              function updateRectangleValues() {
                  const length = parseFloat(inputLength.value) || 0;
                  const width = parseFloat(inputWidth.value) || 0;

                  const area = length * width;
                  const perimeter = 2 * (length + width);

                  // Отображаем результаты на странице
                  results.innerHTML = `Прямоугольник: Площадь = ${area}, Периметр = ${perimeter}`;
              }
          }

          // Для Квадрата
          if (selectedShape == 'square') {
              const inputSide = document.createElement('input');
              inputSide.placeholder = "Сторона";
              inputSide.type = 'number';
              inputSide.name = 'side';
              inputSide.addEventListener('input', updateSquareValues);

              dynamicContent.appendChild(inputSide);

              function updateSquareValues() {
                  const side = parseFloat(inputSide.value) || 0;
                  const area = Math.pow(side, 2);
                  const perimeter = 4 * side;

                  // Отображаем результаты на странице
                  results.innerHTML = `Квадрат: Площадь = ${area}, Периметр = ${perimeter}`;
              }
          }

          // Для Треугольника
          if (selectedShape == 'triangle') {
              const inputBase = document.createElement('input');
              inputBase.placeholder = "Основание";
              inputBase.type = 'number';
              inputBase.name = 'base';
              inputBase.addEventListener('input', updateTriangleValues);

              const inputHeight = document.createElement('input');
              inputHeight.placeholder = "Высота";
              inputHeight.type = 'number';
              inputHeight.name = 'height';
              inputHeight.addEventListener('input', updateTriangleValues);

              dynamicContent.appendChild(inputBase);
              dynamicContent.appendChild(inputHeight);

              function updateTriangleValues() {
                  const base = parseFloat(inputBase.value) || 0;
                  const height = parseFloat(inputHeight.value) || 0;

                  const area = 0.5 * base * height;
                  
                  // Отображаем результаты на странице
                  results.innerHTML = `Треугольник: Площадь = ${area}`;
              }
          }
      });
  }

  SelectOption();

        // Функция для создания геометрических фигур
        function createShapes() {
            const background = document.querySelector('.background');
            const colors = ['#ff9999', '#66b3ff', '#99ff99', '#ffcc99', '#c299ff'];

            // Создаём 15 фигур
            for (let i = 0; i < 15; i++) {
                const shape = document.createElement('div');
                const size = Math.random() * 100 + 30; // Размер от 30 до 130px
                const shapeType = Math.floor(Math.random() * 3); // Тип фигуры: 0 - круг, 1 - квадрат, 2 - треугольник

                shape.classList.add('shape');
                shape.style.width = `${size}px`;
                shape.style.height = `${size}px`;
                shape.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                shape.style.top = `${Math.random() * 100}vh`;
                shape.style.left = `${Math.random() * 100}vw`;
                shape.style.animationDuration = `${Math.random() * 4 + 6}s`;

                // Установка типа фигуры
                if (shapeType === 0) {
                    shape.style.borderRadius = '50%'; // Круг
                } else if (shapeType === 1) {
                    shape.style.borderRadius = '0'; // Квадрат
                } else {
                    // Треугольник
                    shape.style.width = '0';
                    shape.style.height = '0';
                    shape.style.backgroundColor = 'transparent';
                    shape.style.borderLeft = `${size / 2}px solid transparent`;
                    shape.style.borderRight = `${size / 2}px solid transparent`;
                    shape.style.borderBottom = `${size}px solid ${colors[Math.floor(Math.random() * colors.length)]}`;
                }

                background.appendChild(shape);
            }
        }

        createShapes();


    </script>
</body>
</html>
<?php 


// ========================
//     if($_SERVER['REQUEST_METHOD'] === 'POST'){
//         $selectedShape = $_POST['shapes'] ?? '';

//         if($selectedShape == "круг"){
//                           ////Круг
//     $radiusValue = $_POST['radius'] ?? null;
//     $diametrValue = $_POST['diametr'] ?? null;

//     $circle = new circle();
    
//    echo "<pre>";
//     // $circle->doForCircle( $radiusValue, '');
//     $circle->getRadiusInfo();
//     $circle->Radius($radiusValue);

//     echo "</pre>";

//     $circle->getDiametrInfo();
//     $circle->Diametr($diametrValue);  
//         }
//     }
// ?>
<script>
    // let Radius = 
</script>


