<?php
/**
 *	Classe Log
 *	@since 1.0rc
 */

namespace PHPMVC;

/**
* 
*	Classe reponsável por centralizar qualquer lógica de log
*	
*	Creation: 27/02/2015
*	@author Douglas Zanotta <douglas.z.porto@gmail.com>
*/
class Log {

	/**
	* 
	*	Método estático que cria o arquivo de logs (caso necessário) e salva as informações neste arquivo.
	*	
	*	Creation: 27/02/2015
	*	@author Douglas Zanotta <douglas.z.porto@gmail.com>
	*	@param String $content Conteúdo a ser gravado no arquivo.
	*	@param String $file Caminho para o arquivo (relativo à pasta logs/)
	*/
	static public function Dump($content, $file){
		$fullFile = dirname(__FILE__) . "/../logs/" . $file;

		try{
			$log = fopen($fullFile, file_exists($fullFile) ? 'a' : 'x');
			fwrite($log,$content."\n");
			fclose($log);
		}catch(\Exception $e){
			// Não há o que fazer.
		}
	}
}

?>