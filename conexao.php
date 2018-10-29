<?php
	$link = mysql_connect('localhost', 'root', '');
	mysql_query("SET NAMES 'utf8'");
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
	if (!$link) {
	   die('Não conseguiu conectar: ' . mysql_error());
	}

	// seleciona o banco projeto
	$db_selected = mysql_select_db('projeto', $link);
	if (!$db_selected) {
	   die ('Não pode selecionar o banco : ' . mysql_error());
	}

?>