<script> 
document.write="Preparando...";
window.setTimeout("location.href='CadastroAlimento.html'", 4000);
</script>

<?php
    require_once('conexao.php');
    $nome_alimento=$_POST['nome'];
    $carboidratos=$_POST['carboidratos'];
    $proteinas = $_POST['proteinas'];
    $gorduras = $_POST['gorduras'];
    $fibras = $_POST['fibras'];
    $tipo_alimento = $_POST['tipo_alimento'];
    $calorias = $_POST['calorias'];
    $joule = $_POST['joule'];
    $porcao = $_POST['porcao'];
    $quantidade_porcao = $_POST['quantidade_porcao'];

    $insere_tipos_alimentos = "INSERT INTO tipos_alimentos (tipNome) 
    values 
    ('".$tipo_alimento."')";

    $insere_calorias = "INSERT INTO calorias (calKcal, calJoule) 
    values 
    ('".$calorias."','".$joule."')";

    $insere_porcao = "INSERT INTO porcao (porTipo, porQuantidade) 
    values 
    ('".$porcao."','".$quantidade_porcao."')";

    $query = mysql_query($insere_tipos_alimentos); // Insere em tipos_alimentos
    $query = mysql_query($insere_calorias); // Insere em calorias
    $query = mysql_query($insere_porcao); // Insere em porcao

    //consulta sql para pegar o calCodigo

	$query = mysql_query("SELECT calCodigo FROM calorias ORDER BY calCodigo ASC") or die(mysql_error());
 
	//faz um looping e cria um array com os campos da consulta

	while($array = mysql_fetch_array($query)){

  		//mostra na tela o nome e a data de nascimento

  		$ultimo_calCodigo = $array['calCodigo']."<br />";
  		// Estou pegando o último código, entendi que você quer pegá-lo e inserir na tabela informacoesnutricionais
	}

	//consulta sql para pegar o porCodigo

	$query = mysql_query("SELECT porCodigo FROM porcao ORDER BY porCodigo ASC") or die(mysql_error());
 
	//faz um looping e cria um array com os campos da consulta

	while($array = mysql_fetch_array($query)){

  		//mostra na tela o nome e a data de nascimento

  		$ultimo_porCodigo = $array['porCodigo']."<br />";
  		// Estou pegando o último código, entendi que você quer pegá-lo e inserir na tabela informacoesnutricionais
	}

	//consulta sql para pegar o tipCodigo

	$query = mysql_query("SELECT tipCodigo FROM tipos_alimentos ORDER BY tipCodigo ASC") or die(mysql_error());
 
	//faz um looping e cria um array com os campos da consulta

	while($array = mysql_fetch_array($query)){

  		//mostra na tela o nome e a data de nascimento

  		$ultimo_tipCodigo = $array['tipCodigo']."<br />";
  		// Estou pegando o último código, entendi que você quer pegá-lo e inserir na tabela informacoesnutricionais
	}

	// Inserindo tudo na tabela informacoesnutricionais

	$insere_informacoes_nutricionais = "INSERT INTO informacoesnutricionais (infNome, infCarboidratos, infProteinas, infGordurasTotais, infFibras, calCodigo, porCodigo, tipCodigo) 
    values 
    ('".$nome_alimento."','".$carboidratos."','".$proteinas."','".$gorduras."','".$fibras."','".$ultimo_calCodigo."','".$ultimo_porCodigo."','".$ultimo_tipCodigo."')";

    $query = mysql_query($insere_informacoes_nutricionais); // Insere em informacoesnutricionais

    echo "<br><br><center><h1>Cadastrado realizado com sucesso!</h1>";

?>