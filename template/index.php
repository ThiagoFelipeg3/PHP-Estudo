<?php
require 'template.php';

$array = array(
    "titulo" => "Este é o title do site",
    "nome" => "Jair Messias Bolsonaro",
    "idade" => 63
);

$tpl = new Template('template.phtml');

$tpl->render($array);

?>