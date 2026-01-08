<?php
// de forma aleatoria  obten 10 nombres de personas y otros 10 de apellidos 
// crea un array asociativo asociativo con los nombres y apellidos y muestralo por pantalla
$miarraynombres=["Maria", "Estrella","Adrian","Mario","Ruben","Cristina","Jesus","Alberto","Lucia","Ivan "];
$miarrayapellidos=["Chamorro","Gordillo","Palo","Rubio","Garcia","Rodríguez","Díaz","Martínez","Bermudez","Real"];

$arrayasociativo=[];   //$arrayasociativo=array(20)



for($i=0;$i<10;$i++){
    $nombretemp=$miarraynombres[rand(0,count($miarraynombres)-1)];
    //Elimina el nombre selecionado para no repetir
    
    //Array_splice elimina(arrayparaeliminar,posicion,nºelementos)
    //Array_search devuelve la posicion del elemento buscado 
    array_splice($miarraynombres,array_search($nombretemp,$miarraynombres),1);
    $apellidostemp=$miarrayapellidos[rand(0,count($miarrayapellidos)-1)];
    array_splice($miarrayapellidos,array_search($apellidostemp,$miarrayapellidos),1);
    $arrayasociativo[$nombretemp]=$apellidostemp;
}

foreach($arrayasociativo as $nombretemp => $apellidostemp){
    echo "Nombre $nombretemp : apellidos: $apellidostemp <br>";
}


//shuffle($miarray) funcion que baraja el array 
?>