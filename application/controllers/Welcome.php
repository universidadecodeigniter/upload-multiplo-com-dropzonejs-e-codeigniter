<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function upload(){
		$this->load->library('upload'); //carrega a biblioteca de upload do CI

		$path = './uploads'; //define o caminho para salvar as imagens

		//configuração do upload
		$config['upload_path'] = $path; //informa o diretorio para salvar as imagens
		$config['allowed_types'] = 'gif|jpg|jpeg|png'; //define os tipos de arquivos suportados
		$config['max_size'] = '5000'; //define o tamanho máximo do arquivo (em Kb)

		//verifica se o path é válido, se não for cria o diretório "uploads"
		if (!is_dir($path)) {
			mkdir($path, 0777, $recursive = true);
		}

		//Inicializa o método de upload
		$this->upload->initialize($config);

		//processa o upload e verifica o status
		if (!$this->upload->do_upload('file')) {
			return false; //O upload não foi executado
		} else {
			return true; //Upload executado com sucesso
		}
	}

}
