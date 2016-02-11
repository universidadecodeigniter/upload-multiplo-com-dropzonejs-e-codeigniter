# Exemplo de upload múltiplo com CI 3 e DropzoneJS

Esse é um exemplo simples que utiliza o DropzoneJS para possibilitar upload múltiplo no CI de forma fácil e com Drag & Drop de arquivos.

Na estrutura padrão do CI foi adicionado o diretório `assets`, com os seguintes subdiretórios: `css` e `js`. Nesses diretórios são armazenados os arquivos do DropzoneJS.

Na view `welcome_message.php` foi adicionado o formulário com a classe `dropzone` e o path para execução do upload (welcome/upload). Só o fato de ter informado a classe `dropzone` no elemento `form` e ter adicionado o carregamento do arquivo `dropzone.js` na página, faz com que o mesmo seja renderizado de forma automática.

```html
<div id="container">
	<h1>Upload múltiplo com CodeIgniter e DropzoneJS</h1>

	<div id="body">
		<form action="<?=base_url('welcome/upload')?>" class="dropzone" id="myAwesomeDropzone" enctype="multipart/form-data"></form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script src="<?= base_url('assets/js/dropzone.js')?>"></script>
```

No controller `Welcome` foi adicionado o método `upload`, que contem a rotina de upload de arquivo. Está implementada de forma simples, mas dependendo da necessidade é possível ampliar a rotina, com diversos tipos de validação e procedimentos.

```php
public function upload(){
  $this->load->library('upload');

  $path = './uploads';

  $config['upload_path'] = $path;
  $config['allowed_types'] = 'gif|jpg|jpeg|png';
  $config['max_size'] = '5000';

  if (!is_dir($path)) {
    mkdir($path, 0777, $recursive = true);
  }

  $this->upload->initialize($config);

  if (!$this->upload->do_upload('file')) {
    return false;
  } else {
    return true;
  }
}
```

Para facilitar a compreensão, o código do método `upload` está todo comentado no arquivo `controllers/Welcome.php`.

### Curta a fanpage e fique por dentro de novidades

https://www.facebook.com/universidadecodeigniter/
