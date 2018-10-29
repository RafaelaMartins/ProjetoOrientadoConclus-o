<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
				
				$nomeUsuario = $_POST['Nome'];
				$EmailUsuario = $_POST['Email'];
				$IdadeUsuario = $_POST['Idade'];
				$PesoUsuario = $_POST['Peso'];
                                $AlturaUsuario = $_POST['Altura'];
                                $loginUsuario = $_POST['Login'];
                                $senhaUsuario = MD5($_POST['senha']);
                                $connect = mysql_connect('127.0.0.1','root','');
				$db = mysql_select_db('mydb');
				$query_select = "SELECT Login  FROM cadastro WHERE login = '$loginUsuario'";
				$select = mysql_query($query_select,$connect);
				$array = mysql_fetch_array($select);
				$logarray = $array['Login'];
		     if($loginUsuario == "" || $loginUsuario == null)
		{
                echo"<script language='javascript' type='text/javascript'>alert('O campo login deve ser preenchido');window.location.href='cadastroUsuario.html';</script>";
								 }
		     else
								 {
		if($logarray == $loginUsuario)
		{
	       echo"<script language='javascript' type='text/javascript'>alert('Esse login já existe');window.location.href='cadastroUsuario.html';</script>";
		    die();
								}
		else 
		{
	     $query = "INSERT INTO cadastro (Nome,Email,Idade,Peso,Altura,Senha,Login) VALUES ('$nomeUsuario','$EmailUsuario','$IdadeUsuario','$PesoUsuario','$AlturaUsuario','$senhaUsuario','$loginUsuario')";
	     $insert = mysql_query($query,$connect);
		if($insert)
		{
	     echo"<script language='javascript' type='text/javascript'>alert('Usuário cadastrado com sucesso!');window.location.href='LoginUsuario.html'</script>";
										}
		else
										{
	    echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='cadastroUsuario.html'</script>";
										}
									}
								 }    
        ?>
    </body>
</html>
