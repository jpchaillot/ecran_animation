<?php
namespace HTML;

class BootstrapForm extends Form {

	protected function surround($html){
		return "<div class= \"form-group\">$html</div>";
	}



	public function input ($name, $label, $options =[]){
	    //var_dump($this);die;

		$type = isset($options['type']) ? $options['type'] : 'text' ;
		$label = '<label>' . $label . '</label>';

		if($type === 'textarea'){
			 		$input = '<textarea 
								name="'. $name . '"
								class="form-control">' . 
									$this->getValue($name) .
									'</textarea>';

		} else if ($type == 'tel') {
		  
				$input= '<input type="' . $type . '"
							name="'. $name . '" 
							value="'. $this->getValue($name) .'"
							class="form-control tel">' .
				        '<script src="../js/verifTel.js"></script>' ;
		} else {
		    $input= '<input type="' . $type . '"
							name="'. $name . '"
							value="'. $this->getValue($name) .'"
							class="form-control">' ;	    
		}

		return $this->surround( $label . $input);

	}
	
	
	
	
	public function selectTextareaSms ($name, $label, $valeur){
	    $label = '<label>'. $label . '</label>';
	    $input = '<select id="select_sms" class="form-control" name="'. $name .'">';
	   
	    foreach ($valeur as $k =>$v){
	        $attributes = '';

	        $input .= "<option value='".$v->id."' $attributes >".$v->titre." </option>";
	        
	        
	    }
	    
	    $input .='</select>';
	    
	    $gauche = $this->surround($label . $input);
	    
	    
	    $gauche .=' <p>
                	    <a class="btn btn-success" id="envoyer_sms" href="#">
                	       Envoyer le SMS
                	    </a>
            	    </p>';
	    //var_dump($valeur);die;
	    
	    
	    $droite = '<br> <b>Votre Message</b>
                        <textarea
                        id="text_sms" 
						name="'. $name . '"
						class="form-control">' .
						$valeur[0]->text_sms .
						'</textarea>';
	    
		$retour = '   <div class="row">
				        <div class="col-xs-3">'.$gauche.'</div>
				        <div class="col-xs-9">'.$droite . '</div>
		              </div>
                           <script> var sms= '.json_encode($valeur) . '</script>
                       	  <script src="../js/sms.js"></script>

                      <br>
     
                ';
		
		return $retour;
	    
	}
	




	public function select($name,$label, $options){
		$label = '<label>'. $label . '</label>';
		$input = '<select class="form-control" name="'. $name .'">';

		foreach ($options as $k =>$v){
			$attributes = '';
                      

			if ($k == $this->getValue($name)){
				$attributes = ' selected';
			}

			$input .= "<option value='$k' $attributes >$v </option>";

			
		}

		$input .='</select>';

		return $this->surround($label . $input);
	}


	public function submit (){
		return $this->surround('<button type="submit" class="btn btn-primary"> Envoyer </button>');
	}
        
        public function radioOuiNon ($name, $label,$valeur=false){
            return $this->surround(parent::radioOuiNon($name, $label, $valeur));
        }
       /*
        public function radioOuiNon ($name,$label){
            /*
            $input ='<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-primary active">
    <input type="checkbox" checked autocomplete="off"> Checkbox 1 (pre-checked)
  </label>
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off"> Checkbox 2
  </label>
  <label class="btn btn-primary">
    <input type="checkbox" autocomplete="off"> Checkbox 3
  </label>
</div>';
            return $input;
            
            
            
            
            
            
            
            $label = '<label>'. $label . '</label> <br>';
            $input = '<div class="btn-group" data-toggle="buttons">';
 
            
            foreach ($options as $k =>$v){
			$input .=' <label class="btn btn-primary">';
                            $input .='<input type="radio" name="'.$name.'" id="'.$k.'" autocomplete="off">'. $v;
			$input .= '</label>';	
		}
            $input .='</div>';
            return $this->surround($label . $input);
        
            
        } */

}