<?php
//Dados para a conexão com o banco de dados
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "inss";

//Criando a conexão com o banco de dados
$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

//Verificando se a conexão foi estabelecida com sucesso
if (!$conexao) {
	die("Falha na conexão: " . mysqli_connect_error());
}

//Recebendo os dados do formulário
$aps = $_POST['aps'];
$especie = $_POST['especie'];
$numero_beneficio = $_POST['numero_beneficio'];
$nome_titular = $_POST['nome_titular'];
$fileira = $_POST['fileira'];
$estante = $_POST['estante'];
$prateleira = $_POST['prateleira'];
$caixa = $_POST['caixa'];

//Inserindo os dados no banco de dados
$sql = "INSERT INTO processo (aps, especie, numero_beneficio, nome_titular, fileira, estante, prateleira, caixa) VALUES ('$aps', '$especie', '$numero_beneficio', '$nome_titular', '$fileira', '$estante', '$prateleira', '$caixa')";

if (mysqli_query($conexao, $sql)) {
	echo "Cadastro realizado com sucesso!";
} else {
	echo "Erro ao realizar o cadastro: " . mysqli_error($conexao);
}

//Fechando a conexão com o banco de dados
mysqli_close($conexao);
?>
