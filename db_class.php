<?php
	session_start();
	class db{
		//host
		private $host = 'localhost';
		//usuario
		private $usuario = 'root';//id13848263_root
		//semha
		private $senha = '';//_^X$H6Vgf@>YJ+xs
		//nome bd
		private $database = 'tarefas';//id13848263_agenda
		
		public function conecta_mysql(){
			$con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);
			
			//Ajusta o charset para a comunicação entre a aplicação e o BD
			mysqli_set_charset($con, 'utf8');
			
			if(mysqli_connect_error()){
				echo 'Tentativa de conectar com o Banco de Dados resultou em Erro:</br>' . mysqli_connect_error();	
			}			
			return $con;
		}
	}
	//alto acoplamento
	//usar SOLID?

	// classe usuarios reponsavel pelas operões de consulta e registro de novos usuarios(sem login)
	class Usuarios extends db{
		private $nome;
		private $telefone;
		private $email;
		private $usuario_id;

		public function get_usuario_id(){
			return $this->usuario_id;
		}
		
		function usuarios_parametros($nome, $telefone, $email){//
			$obj = new usuarios();
			$obj->nome = $nome;
			$obj->telefone = $telefone;
			$obj->email = $email;
			return $obj;
		}

		public function atualiza_usuario($nome, $email, $senha){
			$con = $this->conecta_mysql();
				$sql = "update usuarios set email='$email' where nome = '$nome'";
			//echo $sql."<br>";
			if(mysqli_query($con, $sql))
				$_POST['mensagem'] = 1; // Mensagem de Sucesso
			else
				$_POST['mensagem'] = 'Erro insperado';
		}
		
		public function inserir(){
			
			//verifica se nome ja existe / seleciona proximo id de usuario
			$sql = "select id FROM usuarios WHERE nome = '$this->nome' ";
			$con = $this->conecta_mysql();
			$resultado = mysqli_query($con, $sql);

			//Não permitir usuarios de mesmo nome
			if(mysqli_num_rows($resultado) !== 0){
				$_POST['mensagem'] = '*Existe outro usuario cadastrado com esse nome.<br>';
				return false;
			}
			
			$sql = "insert into usuarios(nome, telefone, email) values('$this->nome', '$this->telefone', '$this->email') ";
			
			if($result = mysqli_query($con, $sql)){
				$_POST['mensagem'] = 1;// 'Usuário cadastrado com sucesso!!!<br>';
				//echo 'Usuário cadastrado com sucesso!!!<br>';
			}else{
				$_POST['mensagem'] ='Erro ao inserir registro de usuario<br>';
				//echo 'Erro ao inserir registro de usuario<br>';
			}
		
		}
		
		public function autentica_usuario($nome, $senha){
			$con = $this->conecta_mysql();
			$sql = "select usuario, nome, senha, email, setor from usuarios where nome = '$nome'";
			$resultado = mysqli_query($con, $sql);
			//$dados = $resultado ? mysqli_fetch_array($resultado) : False;
			if($resultado){
				$dados = mysqli_fetch_array($resultado);
				if($dados['senha'] == $senha){
					return $dados;//senha incorreta 
				} else if(isset($dados['nome'])) return 3;
			}else return False;
		}		

		//buscar usuarios
		public function get_usuarios($nome){
			$con = $this->conecta_mysql();
			$sql = "select id, nome, email, telefone from usuarios where nome like '$nome%' order by nome";
			$resultado = mysqli_query($con, $sql);
			echo '<br>' . $sql . '<br>';
			//$dados = $resultado ? mysqli_fetch_array($resultado) : False;
			return $resultado; 
		}

		public function registra_eventos($usuario, $titulo, $inicio, $fim, $diatodo){
			$con = $this->conecta_mysql();
			$sql = "INSERT INTO lembretes(usuario, titulo, inicio, fim, diatodo) "
			. "VALUES ($usuario,'$titulo','$inicio','$fim',$diatodo)";
			$resultado = mysqli_query($con, $sql);
			//echo $sql . "<br>";
			return $resultado;
		}

		public function get_lembretes($usuario){
			$con = $this->conecta_mysql();
			$sql = "SELECT * FROM lembretes WHERE usuario = '$usuario' order by lembrete DESC";
			$resultado = mysqli_query($con, $sql);
			return $resultado;
		}

		public function altera_lembrete($ini, $fim, $id){
			$con = $this->conecta_mysql();
			$sql = "UPDATE lembretes set inicio='$ini', fim='$fim' where lembrete= $id";
			$resultado = mysqli_query($con, $sql);
			return $resultado;
		}

		public function apaga_usuario($id){
			$con = $this->conecta_mysql();
			$sql = "delete from usuarios where id = $id";
			$resultado = mysqli_query($con, $sql);
			if($resultado){
				$sql = "DELETE from tarefas where usuario = $id";
				$resultado = mysqli_query($con, $sql);
				if($resultado){
					echo 'O registro foi excluido.';
				}else{
					echo 'Falha ao excluir registro de tarefa.';
				}
			}else
				echo 'Falha ao excluir registro de usuário.';
		}
		
	}
	
	//Inserir atualizar e editar tarefas
	class tarefas extends db{	

		//busca id do usuario pelo nome
		public function get_usuario_id($nome){
			$con = $this->conecta_mysql();
			$sql = "select id from usuarios where nome = '$nome'";
			$resultado = mysqli_query($con, $sql);
			$vet = mysqli_fetch_array($resultado);
			$id  = $vet[0];
			return $id;

		}

		//Atualiza tarefa
		public function atualiza_tarefa($id ,$usuario, $dini, $dfim, $descricao){
			$con = $this->conecta_mysql();
			//caso o parametro $usuario seja o nome, busca o ID
			if(!is_numeric($usuario)){
				$usuario = $this->get_usuario_id($usuario);
			}
			$sql = "update tarefas set usuario=$usuario, dini='$dini', dfim='$dfim', descricao='$descricao' where id=$id";
			$resultado = mysqli_query($con, $sql);
			if($result = $con->query($sql)){
				echo '<p id="mensagem" style="color: blue">';
				echo 'Tarefa atualizada com sucesso!!!';
				echo '</p>';
			}else{
				echo '<p id="mensagem" style="color: red">';
				echo 'Erro ao atualizar registro';
				echo '</p>';
			}
		}

		//registra nova tarefa
		public function inserir($usuario, $dini, $dfim, $descricao){
			$con = $this->conecta_mysql();
			//caso o parametro $usuario seja o nome, busca o ID
			if(!is_numeric($usuario)){
				$usuario = $this->get_usuario_id($usuario);
			}
				
			$sql = "INSERT INTO tarefas (usuario, dini, dfim, descricao) values($usuario,'$dini','$dfim','$descricao')";
		
			if($result = $con->query($sql)){
				echo '<p id="mensagem" style="color: blue">';
				echo 'Nova tarefa cadastrada com sucesso!!!';
				echo '</p>';
			}else{
				echo '<p id="mensagem" style="color: red">';
				echo 'Erro ao efetuar registro';
				echo '</p>';
			}
		}

		public function get_tarefas($descricao){
			$con = $this->conecta_mysql();
			$sql = "SELECT usuarios.id as usuario, usuarios.nome as nome, \n"
			. "tarefas.id as tarefa, tarefas.descricao, tarefas.dini, tarefas.dfim\n"
			. "FROM usuarios JOIN tarefas ON (usuarios.id = tarefas.usuario) where descricao like '$descricao%'";
			$resultado = mysqli_query($con, $sql);
			return $resultado;
		}

		//busca tarefa pelo id
		public function get_tarefa($id){
			$con = $this->conecta_mysql();
			$sql = "SELECT * FROM tarefas WHERE id ='$id'";
			$resultado = mysqli_query($con, $sql);
			return $resultado;
		}

		public function apaga_tarefa($id){
			$con = $this->conecta_mysql();
			$sql = "delete from tarefas where id = $id";
			$resultado = mysqli_query($con, $sql);
			return $resultado;
		}
	}


?>



