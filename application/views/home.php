<?php $this->load->view('commons/cabecalho'); ?>

<div class="container">
	<div class="page-header">
		<h1>Upload múltiplo com CodeIgniter e DropzoneJS</h1>
	</div>
	<div id="body">
		<form action="<?=base_url('upload')?>" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data"></form>
	</div>
</div>

<?php $this->load->view('commons/rodape'); ?>
