<?php

$con = new mysqli('db','root','fer@1212', "empresa");

$query = $con->query("SELECT * FROM CLIENTE");


?>
<html>
	<meta charset="utf8" />
	<title>Empresa</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<form method="post">

<div class="form-row">
      <h1>CADASTRO DE CLIENTE</h1>
  <div class="col">
      <input type="text" class="form-control" name="nome" placeholder="Nome">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="cpf" placeholder="CPF">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">CADASTRAR</button>

</form>


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOME</th>
      <th scope="col">CPF</th>
    </tr>
  </thead>
  <tbody>
    <? while($cliente = $query->fetch_assoc()){ ?>
    <tr>
      <th><? echo $cliente["id_cliente"] ?></th>
      <td><? echo $cliente["nome"] ?></td>
      <td><? echo $cliente["cpf"] ?></td>
     
    </tr>
    <? } ?>

  </tbody>
</table>




</html>

<?php



if($_SERVER["REQUEST_METHOD"] == "POST"){
  $con = new mysqli('db','root','fer@1212', "empresa");
  $nome = $_POST["nome"];
  $cpf = $_POST["cpf"];


  $smt = $con->prepare("INSERT INTO CLIENTE(nome,cpf)VALUES(?,?)");
  $smt->bind_param('ss', $nome,$cpf);
 

  if(!$smt->execute())
  {
    $erro = $stmt->error;
  }
  else
  {
    $sucesso = "Dados cadastrados com sucesso!";
  }

}







?>