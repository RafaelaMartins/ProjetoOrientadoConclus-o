<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $Alimento=$_POST['Nome'];
        $Calorias = $_POST['Calorias'];
        $Joule = $_POST ['Joule'];
        $TipoAlimento = $_POST['Tipo'];
        $porcao = $_POST ['Porcao'];
        $Quantidade = $_POST ['Quantidade'];
        $Dieta = $_POST['dieta'];
    
    
        $connect = mysql_connect('127.0.0.1','root','');
        $db = mysql_select_db('projeto');
	$query_select = "SELECT tipCodigo FROM Tipos_Alimentos WHERE tipNome = '$TipoAlimento' order by tipCodigo";
	$select = mysql_query($query_select,$connect);
                while ($array = mysql_fetch_array($select)) {
                print($array["tipCodigo"]);
                              }
                $array = mysql_fetch_array($select);
                $logarrayTipo = $array["tipCodigo"];
                
        $SelecionaPorcao = "SELECT porCodigo  FROM porcao WHERE PorNome = $porcao and porQuantidade= '$Quantidade' order by porCodigo";
	$ResultadoPorcao = mysql_query($SelecionaPorcao,$connect);
                 while ($array = ($ResultadoPorcao)) {
                 print($array["porCodigo"]);  
                }
                 print("cheguei");
                
	$arrayPorcao = mysql_fetch_array($select);
	$logarrayPorcao = $arrayPorcao["PorCodigo"];
        
        $SelecionaCaloria = "SELECT calCodigo  FROM calorias WHERE calKcal = $Calorias and calJoule= $Joule order by calCodigo";
	$ResultadoCaloria = mysql_query($SelecionaCaloria,$connect);
                 while ($array = ($ResultadoCaloria)) {
                 print($array["calCodigo"]);  
                }
                 print("cheguei");
                
	$arrayDieta = mysql_fetch_array($select);
	$logarrayDieta = $arrayDieta["dieCodigo"];
$SelecionaDieta = "SELECT dieCodigo  FROM dieta WHERE dienome = $Dieta and ind_dieCodigo=dieCodigo by dieCodigo";
	$ResultadoDieta = mysql_query($SelecionaDieta,$connect);
                 while ($array = ($ResultadoDieta)) {
                 print($array["dieCodigo"]);  
                }        
                 $query = "INSERT INTO informaoes_dieta (ind_infNome,ind_calCodigo,ind_porCodigo, ind_tipCodigo, ind_dieCodigo) VALUES ('$Alimento', $Calorias, $porcao, $TipoAlimento, $Dieta);";

                    $insertResultado = mysql_query($query,$connect);
                    
                           if($insertResultado) { 
                  
                      print("conectou");
		
	    echo"<script language='javascript' type='text/javascript'>alert('Alimento cadastrado com sucesso!');window.location.href='CadastroAlimento.html'</script>";
                           }				
            else { 
                               echo "<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse alimento');window.location.href='CadastroAlimento.html'</script>";
		}
                                                                                
                                                                                
		
        ?>
    </body>
</html>
