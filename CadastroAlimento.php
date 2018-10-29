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
        $nomeAlimento=$_POST['Nome'];
	$Carboidratos=$_POST['Carboidratos'];
	$Proteinas=$_POST['Proteinas'];
	$GordurasTotais=$_POST['Gorduras'];
    $Fibras = $_POST['Fibras'];
    $TipoAlimento = $_POST['Tipo'];
    $Calorias = $_POST['Calorias'];
    $Joule = $_POST ['Joule'];
    $porcao = $_POST ['Porcao'];
    $Quantidade = $_POST ['Quantidade'];
        $connect = mysql_connect('127.0.0.1','root','');
		$db = mysql_select_db('mydb');
	
      $query_select = "SELECT tipCodigo FROM Tipos_Alimentos WHERE tipNome = '$TipoAlimento' order by tipCodigo";
				$select = mysql_query($query_select,$connect);
                                
                                while ($array = mysql_fetch_array($select)) {
                                  print($array["tipCodigo"]);
                              
                                }
                                
				$array = mysql_fetch_array($select);
                                
				$logarrayTipo = $array["tipCodigo"];
                                $Tipo=$logarrayTipo;
                                echo $Tipo;
		     
                                
                                //faz a consulta
                              //  $consulta = "SELECT tipCodigo FROM Tipos_Alimentos WHERE tipNome = '$TipoAlimento' order by tipCodigo'";
                                //verifcaçao
                             ////   while($consulta){
                           ///         $cod=$consulta[tipcodigo];
                           //     }
								 
		
                    print("aqui");
		$SelecionaPorcao = "SELECT porCodigo  FROM porcao WHERE PorNome = '$porcao' and porQuantidade= '$Quantidade' order by porCodigo";
		$ResultadoPorcao = mysql_query($SelecionaPorcao,$connect);
                
                while ($array = ($ResultadoPorcao)) {
                   print($array["porCodigo"]);  
                }
                print("cheguei");
                
				$arrayPorcao = mysql_fetch_array($select);
		$logarrayPorcao = $arrayPorcao["PorCodigo"];
	
		
		
		      $InsereCalorias = "INSERT INTO calorias (calKcal, calJoule) VALUES ($Calorias, $Joule)";
                      $ResultadoCalorias = mysql_query($InsereCalorias,$connect);
                      print("inseriu");
                      
		if($ResultadoCalorias) {
                    
                   $SelecionaCalorias = "SELECT calCodigo FROM calorias WHERE calkcal = $Calorias and calJoule='$Joule' order by calCodigo";
                  //Quando está usando um código sql, e vai colocar uma variavel PHP, usa-se __________
                   
                   
                   $ResultadoKcal = mysql_query($SelecionaCalorias, $connect);
                    while ($array = mysql_fetch_array($ResultadoKcal)) {
                        echo "_______________________________________<br>";
                       print($array["calCodigo"]);
                       echo "<br>_______________________________________<br>";
                        
                    }
                     $logarrayCalorias = $array["calCodigo"];
                     
                    echo $nomeAlimento;
                    echo $Carboidratos;
                    echo $Proteinas;
                    echo $GordurasTotais;
                    echo $Fibras;
                    echo $logarrayCalorias;///o erro está aqui nestas tres linhas para baixo. Devido a erro na criação dessa variável
                    echo $logarrayPorcao;
                    echo $Tipo;
                    
                     
                    
                    
                    $query = "INSERT INTO informacoesnutricionais(infNome, infCarboidratos, infProteinas, infGordurasTotais, infFibras, calCodigo, porCodigo, tipCodigo) VALUES ('$nomeAlimento', $Carboidratos, $Proteinas, $GordurasTotais, $Fibras, $logarrayCalorias, $logarrayPorcao, $Tipo);";

                    $insertTabela = mysql_query($query,$connect);
                    echo $nomeAlimento;
                    echo $Carboidratos;
                    echo $Proteinas;
                    echo $GordurasTotais;
                    echo $Fibras;
                    echo $logarrayCalorias;
                    echo $logarrayPorcao;
                    echo $Tipo;
                    
                  if($insertTabela) 
                  {
                      print("conectou");
		
	    echo"<script language='javascript' type='text/javascript'>alert('Alimento cadastrado com sucesso!');window.location.href='CadastroAlimento.html'</script>";
										}
		else
                    
                    echo $nomeAlimento;
                    echo $Carboidratos;
                    echo "<br>";
                    echo $Proteinas;
                    echo "<br>";
                    echo $GordurasTotais;
                    echo "<br>";
                    echo $Fibras;
                    echo "<br>";
                    echo $logarrayCalorias;
                    echo "<br>";
                    echo $logarrayPorcao;
                    echo "<br>";
                    echo $logarrayTipo;		
									{
	   echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse alimento');window.location.href='CadastroAlimento.html'</script>";
		echo $nomeAlimento;
                    echo $Carboidratos;
                    echo "<br>";
                    echo $Proteinas;
                    echo "<br>";
                    echo $GordurasTotais;
                    echo "<br>";
                    echo $Fibras;
                    echo "<br>";
                    echo $logarrayCalorias;
                    echo "<br>";
                    echo $logarrayPorcao;
                    echo "<br>";
                    echo $logarrayTipo;								}
                }
                     
                   
        ?>
    </body>
</html>
