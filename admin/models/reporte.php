<?php
    require_once(__DIR__.'/../model.php');

    class Reporte extends Model{

        function encabezado(){
            $encabezado='Yo soy el encabezado';
            return $encabezado;
        }

        function pie(){
            $pie='soy el pie';
            return $pie;
        }

        function a4(){
            return [
                'format' => 'A4',
                'margin_left' => 20,
                'margin_right' => 20,
                'margin_top' => 20,
                'margin_bottom' => 20
            ];
        }

        function letter(){
            return [
                'format' => 'Letter',
                'margin_left' => 20,
                'margin_right' => 20,
                'margin_top' => 20,
                'margin_bottom' => 20
            ];
        }






    }



?>