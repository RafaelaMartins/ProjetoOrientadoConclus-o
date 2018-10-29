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
        $loginUsuario = $_POST['Login'];;
	$entrar = $_POST['entrar'];
	$senhaUsuario = MD5($_POST['Senha']);
	$connect = mysql_connect('127.0.0.1','root','');
	$db = mysql_select_db('mydb');
	if (isset($entrar)) 
	{
									    
	$verifica = mysql_query("SELECT * FROM cadastro WHERE Login='$loginUsuario' AND  Senha='$senhaUsuario'") or die("erro ao selecionar");
        if (mysql_num_rows($verifica)<=0)
	{
	echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='loginUsuario.html';</script>";
	die();
	}
	else
	{ 
            
	setcookie("Login",$loginUsuario);
	header("Location:index.php");
										}
									}
        ?>
    </body>
</html>
