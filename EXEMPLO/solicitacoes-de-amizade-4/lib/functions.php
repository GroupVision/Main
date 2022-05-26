<?php
	function carrega_pagina($con){
		$pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';
		$dir = "pags/";
		$ext = ".php";

		if(file_exists($dir.$pagina.$ext)){
			include($dir.$pagina.$ext);
		}else{
			echo "<div class='alert alert-danger'>Página não encontrada</div>";
		}
	}

	function get_users($con){
		$sql = $con->prepare("SELECT * FROM usuarios ORDER BY id DESC");
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;

		if($total > 0){
			while($dados = $get->fetch_array()){
				echo "<a href='?pagina=perfil&id={$dados['usuario']}'>{$dados['nome']}</a><br>";
			}
		}
	}

	function get_perfil($con, $perfil){
		$sql = $con->prepare("SELECT * FROM usuarios WHERE usuario = ?");
		$sql->bind_param("s", $perfil);
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;

		if($total > 0){
			$dados = $get->fetch_assoc();
			echo "<h4>{$dados['nome']} <small>@{$dados['usuario']}</small></h4>";
			verfica_solicitacoes($con, $_SESSION['userLogin'], $perfil);
		}
	}

	function verifica_amizade($con, $id_de, $id_para){
		$sql = $con->prepare("SELECT * FROM amigos WHERE id_de = ? AND id_para = ? AND status = 0");
		$sql->bind_param("ss", $id_de, $id_para);
		$sql->execute();

		return $sql->get_result()->num_rows;
	}

	function send_solicitation($con, $id_para){
		if(verifica_amizade($con, $_SESSION['userLogin'], $id_para) <= 0){
			$sql = $con->prepare("INSERT amigos (id_de, id_para) VALUES (?, ?)");
			$sql->bind_param("ss", $_SESSION['userLogin'], $id_para);
			$sql->execute();

			if($sql->affected_rows > 0){
				redireciona("?pagina=perfil&id={$id_para}");
			}else{
				return false;
			}
		}else{
			redireciona("?pagina=perfil&id={$id_para}");
		}
		
	}

	function verfica_solicitacoes($con, $id_de, $id_para){		
		$sql = $con->prepare("SELECT * FROM amigos WHERE (id_de = ? AND id_para = ?) OR (id_para = ? AND id_de = ?)");
		$sql->bind_param("ssss", $id_de, $id_para, $id_de, $id_para);
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;

		if($total > 0){
			$dados = $get->fetch_assoc();

			if($dados['status'] == 1){
				echo "<a href='?pagina=desfazer-amizade&id={$dados['id']}' class='btn btn-danger btn-sm'>Desfazer Amizade</a>";
			}

			if($dados['id_para'] == $id_para && $dados['id_de'] == $id_de && $dados['status'] == 0){
				echo "<a href='?pagina=desfazer-amizade&id={$dados['id']}' class='btn btn-warning btn-sm'>Cancelar Solicitação</a>";
			}

			if($dados['id_de'] == $id_para && $dados['id_para'] == $id_de && $dados['status'] == 0){
				echo "<a href='?pagina=aceitar-amizade&id={$dados['id_de']}' class='btn btn-success btn-sm'>Aceitar Solicitação</a>";
				echo "<a href='?pagina=desfazer-amizade&id={$dados['id']}' class='btn btn-danger btn-sm'>Recusar Solicitação</a>";
			}
		}else if($total <= 0  && $id_para != $id_de){
			echo "<a href='?pagina=solicitar-amizade&id={$id_para}' class='btn btn-success btn-sm'>Adicionar Amigo</a>";
		}
	}

	function deleta_solicitacao($con, $id){
		$sql = $con->prepare("DELETE FROM amigos WHERE id = ?");
		$sql->bind_param("s", $id);
		$sql->execute();

		if($sql->affected_rows > 0){
			redireciona("?pagina=inicio");
		}else{
			return false;
		}
	}

	function recusar_solicitacao($con, $id){
		$sql = $con->prepare("DELETE FROM amigos WHERE id = ?");
		$sql->bind_param("s", $id);
		$sql->execute();

		if($sql->affected_rows > 0){
			redireciona("?pagina=solicitacoes");
		}else{
			return false;
		}
	}

	function aceita_solicitacao($con, $id_de){
		$sql = $con->prepare("SELECT * FROM amigos WHERE id_de = ? AND id_para = ? AND status = 0");
		$sql->bind_param("ss", $id_de, $_SESSION['userLogin']);
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;

		if($total > 0){
			$dados = $get->fetch_assoc();

			if($dados['id_para'] == $_SESSION['userLogin']){
				if(atualiza_solicitacao($con, $id_de, $_SESSION['userLogin']) > 0){
					redireciona("?pagina=perfil&id={$id_de}");	
				}else{
					echo "erro ao atualizar;";
				}
				
			}else{
				return false;
			}
		}
	}

	function atualiza_solicitacao($con, $id_de, $id_para){
		$sql = $con->prepare("UPDATE amigos SET status = 1 WHERE id_de = ? AND id_para = ?");
		$sql->bind_param("ss", $id_de, $id_para);
		$sql->execute();

		return $sql->affected_rows;
	}

	function redireciona($dir){
		echo "<meta http-equiv='Refresh' content='0; url={$dir}'/>";
	}

	function solicitacoes($con){
		if(isset($_SESSION['userLogin'])){
			$sql = $con->prepare("SELECT * FROM amigos WHERE id_para = ? AND status = 0");
			$sql->bind_param("s", $_SESSION['userLogin']);
			$sql->execute();
			$get = $sql->get_result();
			$total = $get->num_rows;

			if($total > 0){
				while($dados = $get->fetch_array()){
					echo "
					<ul>
						<li style='list-style:none;'>
						<a href='?pagina=perfil&id={$dados['id_de']}' target='_blank'>
						{$dados['id_de']} 
						<a href='?pagina=aceitar-amizade&id={$dados['id_de']}' class='btn btn-success btn-sm'>Aceitar Solicitação</a> 
						<a href='?pagina=recusar-solicitacao&id={$dados['id']}' class='btn btn-danger btn-sm'>Recusar Solicitação</a>
						</a>
						</li>
					</ul>";
				}
			}
		}else{
			exit();
		}
	}

	function return_total_solicitation($con){
		$sql = $con->prepare("SELECT * FROM amigos WHERE id_para = ? AND status = 0");
		$sql->bind_param("s", $_SESSION['userLogin']);
		$sql->execute();
		$get = $sql->get_result();
		$total = $get->num_rows;
		if($total > 0){
			return ": ".$total;
		}
		
	}

?>
