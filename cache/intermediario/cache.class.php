<?php
class Cache{

	public $html;

	public function __construct(){
		$this->readCache();
		$this->saveCache();
	}
	public function getCache(){
		return $this->html;
	}


	/************************************************************************** 
		Tudo que esta entre as funções ob_start() e ob_end_clean() não vai ser 
		motrado para o usuário mesmo com o require carregando uma pagina.

		A função od_get_contents() salva toda a pagína html na variável $html
		para logo após se mostrada para o usuário. Pegando o buffet de saída 
		e alocando na variável.
	***************************************************************************/ 
	public function readCache(){
		$this->html = '';

		if(file_exists("cache_inter.cache")){
			 //Vai pegar o conteúdo do arquivo em formato de string
			$this->html = file_get_contents("cache_inter.cache");
		}else{

			ob_start();
				require 'cache_inter.php';
				$this->html = ob_get_contents();
			ob_end_clean();
		}
	}
	public function saveCache(){

		file_put_contents('cache_inter.cache', $this->html);

	}

}

?>
