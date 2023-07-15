<?php
$data_menu = file_get_contents("https://raw.githubusercontent.com/LisoProgrammer/portfolio/1f454988a30b1cd73c150924d6011b19dfa745af/assets/delcaribe/menu/menu.json");
$menu = json_decode($data_menu,true);
$len = count($menu);
echo "Tamaño ".$len."<br>";
if($_GET){
    echo "Mesa: ".$_GET["mesa"]."<br>";
    echo "Cantidad: ".$_GET["cant"]."<br>";
    echo "Fecha y hora: ".$_GET["datetime"]."<br>";
    echo "Codigo del producto: ".$_GET["code_prod"]."<br>";
    $code_prod = $_GET["code_prod"];
    $mesa = $_GET["mesa"];
    $cantidad = $_GET["cant"];
    $f_hora = $_GET["datetime"];
    $prod = prod_find($code_prod,$menu);
    
    /*foreach($menu as $cat => $value ){
        echo '<pre>';
        foreach($value as $item){
            print_r($item);
        }
        echo '</pre>';
    }*/
    echo "<pre>";
    print_r($prod);
    echo "</pre>";
    //unset($value);
}
function prod_find($code, $menu){
    foreach($menu as $cat => $value ){
        foreach($value as $item){
            //print_r($item);
            //Si el codigo del producto es igual al enviado
            if($item["code"]==$_GET["code_prod"]){
                return $item;
            }
        }
    }
    unset($value);
}
?>
