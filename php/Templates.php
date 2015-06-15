<?php 
/**
* 
*/

class Templates {

	public function getTemplate($page_info){
		$template_id = "";
		if( !empty($page_info) ){
			$template_id = $page_info['template_id'];
		}
		if($template_id != ''){
				include('templates/' . $page_info['templates']['template_name'] . '.tmp.php');
		} else {
			// echo "<meta http-equiv='refresh' content='0;url=/404'>";
		}

	}

}
 ?>