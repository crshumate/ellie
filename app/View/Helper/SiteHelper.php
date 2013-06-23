<?php 
App::uses('AppHelper', 'View/Helper');

class SiteHelper extends AppHelper {
    public $helpers = array('Html', 'Form');

	public function links(){
		$str = "<h4>Misc. Links:</h4>";
		
		$str.="<ul class='nav nav-tabs nav-stacked'>";
		$str.="<li>".$this->Html->link('Google.com','http://google.com/')."</li>";
		$str.= "<li>".$this->Html->link('TED','http://ted.com')."</li>";
		
		$str.="<li>".$this->Html->link('National Geographic','http://www.nationalgeographic.com/')."</li>";
		$str.="</ul>";
		return $str;
	}
	
	
	public function createSourceList($str){
		
		$output="<h4>Article Sources:</h4>";
		$output.="<ul class='nav nav-tabs nav-stacked'>";

		if(strpos($str, "\n")){
			$arr = explode("\n",$str);
			foreach($arr as $a){
				if(strpos($a,"::")){
						$strArr = explode("::",$a);
						$output .= sprintf("<li><a href='%s' target='_blank'>%s</a></li>", $strArr[1], $strArr[0]);
				}else{
				$output .= sprintf("<li>%s</li>", $a);	
				}

			}

		}else{
			if(strpos($str,"::")){
					$strArr = explode("::",$str);
					$output .= sprintf("<li><a href='%s'>%s</a></li>", $strArr[1], $strArr[0]);
			}else{
			$output .= sprintf("<li>%s</li>", $str);	
			}
		}
		$output.="</ul>";
		return $output;
	}
	
	
	
	public function imageIframe(){
		$addImageUrl = $this->Html->url(array('controller'=>'images', 'action'=>'admin_add'));
		$str = <<<EOT
		<div class="span12 add-images">
				<h3>Add Images</h3>
				<div class="uploaded-images">
				<ul>

				</ul>
			</div>
				<iframe id='image-add' frameborder="no" scrolling="no" height="75px" width="200px" src="	$addImageUrl"></iframe>
				<button id="more-images" style="display:none;">Additional Images</button>
			</div>
EOT;
return $str;
	
	}
	
		public function imageIframeEdit($images){
			$addImageUrl = $this->Html->url(array('controller'=>'images', 'action'=>'admin_add'));
			$str = <<<EOT
			<div class="span12 add-images">
					<h3>Add Images</h3>
					<div class="uploaded-images">
					<ul>
EOT;

foreach($images as $image){
 $str.="<li><div class='image-row uploads-container'>";
 $str.="<a  class='image-link' href='/".IMAGES_URL.$image['Image']['filename']."'>".$image['Image']['filename']."</a>";

$str.="<a href='#' class='btn btn-danger delete-image btn-mini' data-image_id='".$image['Image']['id']. "'>delete</a>";
}

		$str.=<<<EOT
							
			</ul>
				</div>

					<button id="more-images">Add Images</button>
				</div>

EOT;

	return $str;

		}
}

?>