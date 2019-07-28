<div class="msg">
	<?php if(validation_errors() == true): ?>
		<div class="sucess"><?php echo validation_errors(); ?></div>
	<?php endif; ?>
	<?php if($this->session->flashdata('messagem')): ?>
		<div class="sucess"><p><?=$this->session->flashdata('messagem') ?></p></div>
	<?php endif;  ?>
</div>