<div class="msg" id="msg">
	<?php
		if(isset($_SESSION["msg"]) && $_SESSION["msg"] != '') {
    		echo '<div class="sucess"><p >'.$_SESSION["msg"].'</p></div>';
    		$_SESSION["msg"] = '';
		}
	 ?>
</div>