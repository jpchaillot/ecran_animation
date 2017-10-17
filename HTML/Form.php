<?php
namespace HTML;

/**
	* Class Form
	* permet de créer des formulaires
*/

class Form {

	/**
	 * @var array donnée utilisé par le formulaire
	 */
	protected $data ;

	/**
	 * @var string tag utilisé pour entouré un champ de formulaire 
	 */
	public $surround = 'p';

	/**
	 * @param array donnée utilisé par le formulaire
	 */
	public function __construct ($data=array()){
			$this->data = $data;
	}

	protected function surround($html){
		return "<{$this->surround}>$html</{$this->surround}>";
	}

	protected function getValue($index){
		if(is_object($this->data)){
			return $this->data->$index;
		}
		
		return isset($this->data[ $index]) ? $this->data[$index] : null;

		
	}

	public function input ($name, $label, $options =[]){

		$type = isset($option['type']) ? $option['type'] : 'text' ;

		return $this->surround('<input type="' . $type . '"
			name="'. $name . '" 
			value="'. $this->getValue($name) .'"> ') ;

	}
	

	
	
	
	


	public function submit (){
		return $this->surround('<button type="submit"> Envoyer </button>');
	}
        
        public function radioOuiNon ($name, $label,$valeur=false){
            $label = '<label>'. $label . '</label> <br>';
            $input = '<div class="btn-group" >';
            $checked= '';
          
            if($valeur){ $checked = ' checked '; }
            $input .='<input type="radio" name="'.$name.'" value="1" id="'.$name.'1" '.$checked.'/>'
                    . '<label for="'.$name.'1"> OUI </label>&nbsp &nbsp &nbsp &nbsp';
            $checked= '';
            if(!$valeur){ $checked = ' checked '; }
            $input .='<input type="radio" name="'.$name.'" value="0" id="'.$name.'0" '.$checked.' />'
                    . '<label for="'.$name.'0"> NON </label><br><br>';
            
            return $label.$input;
        }
}