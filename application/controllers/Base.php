<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function Index()
	{
		$this->load->view('home');
	}

	public function Upload(){
		//carrega a biblioteca de upload do CI
		$this->load->library('upload');

		//define o caminho para salvar as imagens
		$path = './uploads';

		//Configuração do upload

		//informa o diretorio para salvar as imagens
		$config['upload_path'] = $path;
		//define os tipos de arquivos suportados
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		//define o tamanho máximo do arquivo (em Kb)
		$config['max_size'] = '5000';

		//verifica se o path é válido, se não for cria o diretório "uploads"
		if (!is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		//Inicializa o método de upload
		$this->upload->initialize($config);

		//processa o upload e verifica o status
		if (!$this->upload->do_upload('file')) {
			//Determina o status do header
			$this->output->set_status_header('400');
			//Retorna a mensagem de erro a ser exibida
			echo $this->upload->display_errors(null,null);
		} else {
			//Determina o status do header
			$this->output->set_status_header('200');
		}
	}
}
