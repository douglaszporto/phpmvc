<?php
/**
 *	Classe I18n
 *	@since 1.1
 */

namespace PHPMVC;

/**
* 
*	Classe responável por centralizar lógica de tradução
*	
*	Creation: 07/05/2017
*	@author Douglas Zanotta <douglas.z.porto@gmail.com>
*	
*/
class I18n{

    private $lang;
    private $strings;

    public function __construct($lang){
        $this->lang = $lang;

        $file = file_get_contents(PATH_DIR . 'i18n/' . $lang . '.json');

        try{
            $this->strings = json_decode($file, true);
        }catch(\Exception $e){
            // TODO: Log error!
            $this->strings = array();
        }

    }

    public function getStrings(){
        return $this->strings;
    }
}

?>