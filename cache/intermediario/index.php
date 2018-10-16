<?php
require "cache.class.php";
/*
	O objetivo do cache é evitar o processamento, por isso temos de testar se ele já existe 

*/

$cache = new Cache();

echo $cache->getCache();

?>