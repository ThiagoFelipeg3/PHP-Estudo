<?php
class Cache{

	public $cache;

	public function setVar($nome, $valor){
		$this->readCache();
		$this->cache->$nome = $valor;
		$this->saveCache();
	}
	public function getVar($nome){
		$this->readCache();
		return $this->cache->$nome;
	}

	public function readCache(){
		// stdClass() por padão é um objeto vazio
		$this->cache = new stdClass();

		//Verifica se existe um arquivo com o nome cache.cache 'file.exists('cache.cache')'
		if(file_exists('cache.cache')){

			// function file_get_contents irá pegar os valores no formato de string no arquivo 
			// function json_decode irá tranforma a string em objeto no formato de json
			// Json é a melhor forma de armazenar dados organizados
			$this->cache = json_decode(file_get_contents("cache.cache"));
		}
	}

	public function saveCache(){
		// file_put_contents irá escrever no arquivo. 
		file_put_contents("cache.cache", json_encode($this->cache));
	}
}
$cache = new Cache();
$cache->setVar("Profissão","Programador");
print_r($cache);

?>