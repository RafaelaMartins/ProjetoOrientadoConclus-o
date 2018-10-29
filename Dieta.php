<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $nome= $_POST['Nome'];
	$Finalidade= $_POST['Finalidade'];
	$Total= $_POST['Total'];
        $connect = mysql_connect('127.0.0.1','root','');
		$db = mysql_select_db('projeto');
                $query_select = "INSERT INTO dieta (dieNome,dieFinalidade,dieCaloriaTotal) value ('$nome','$Finalidade',$Total)";
                $Insercao = mysql_query($query_select,$connect);
                
                if($Insercao) 
                  {
                      
		
	    echo"<script language='javascript' type='text/javascript'>alert('Alimento cadastrado com sucesso!');window.location.href='CadastroAlimento.html'</script>";
										}
		else
                    
                   		
									{
	   echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse alimento');window.location.href='CadastroAlimento.html'</script>";
                                                                        }
        ?>
    </body>
</html>
