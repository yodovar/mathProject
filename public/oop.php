<?php
// interface fourAngle{
//     function S();
//     function P();
//     function dioganal();
//     function h();
// }

// interface circle{
//     function R();
//     function D();
// }

// trait S{

// }

class circle{
    private $R;
    private $D;

    function __construct(){
        echo "<form method='post' action='countController.php'><center>
                <label>
                    Радиус
                </label>
                <input type='number' name='radius' min='1' placeholder='Значение если оно есть'><pre />";
        echo "<label>Диаметр</label><input name='diametr' min='1' placeholder='Значение если оно есть'><pre /><input type='submit' value='готово'></center></form>";
        
    }

    public function Radius($R){
       echo $R;
        
    }

    public function Diametr($D){
        print_r($D);
    }



    public function getRadiusInfo(){
        echo "Радиус : ";
        // echo "Диаметр : $this->D";
    }

    public function getDiametrInfo(){
        echo "Диаметр : ";
    }

    // public function doForCircle($R, $D){
    //     $R = $D / 2;
    //     $D = $R * 2;
    //     echo $D;
    // }
}




// ?>