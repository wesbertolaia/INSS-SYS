<?php
   //configurações de conexão ao banco de dados
   $host = "localhost";
   $usuario = "root";
   $senha = "";
   $dbname = "inss";

   //recebe o nome enviado pelo formulário
   $numero_processo = $_POST['numero_processo'];

   //conecta ao banco de dados usando o MySQLi
   $mysqli = new mysqli($host, $usuario, $senha, $dbname);

   //verifica se houve algum erro na conexão
   if($mysqli->connect_errno) {
      die("Erro na conexão ao banco de dados: " . $mysqli->connect_error);
   }

   //constrói a consulta SQL para buscar os dados correspondentes na tabela
   $sql = "SELECT * FROM processo WHERE numero_processo LIKE ?";
   $stmt = $mysqli->prepare($sql);
   $nome_param = "%{$numero_processo}%";
   $stmt->bind_param("s", $nome_param);
   $stmt->execute();
   $resultado = $stmt->get_result();

   //exibe os resultados na tela
   if($resultado->num_rows > 0) {
      while($linha = $resultado->fetch_assoc()) {
         echo $linha['numero_processo'] . "<br>";
         echo $linha['tipo_beneficio'] . "<br>";
         echo $linha['fileira'] . "<br>";
         echo "--------<br>";
      }
   } else {
      echo "Nenhum resultado encontrado.";
   }
?>
