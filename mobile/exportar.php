<?php
 
$host = "localhost";#CONFIGURE SEU HOST AQUI

$user = "root";#USUARIO DO BANCO DE DADOS

$pass = "";#SENHA DO BANCO DE DADOS

$db = "bacalhau172";#BASE QUE OS DADOS SERAO EXPORTADOS

$arquivoSQL = "BasedeDados.txt";#ARQUIVO TXT NO QUAL VOCE QUER GUARDAR OS INSERTS, PODE SER .SQL TAMBÉM

#SE O ARQUIVO NAO EXISTIR ELE SERÁ CRIADO.

$clausulaSQL = DumpSQL($host, $user, $pass, $db);#AQUI EU CHAMO A FUNÇAO DumpSQL, QUE GUARDA NA VARIAVEL

#$clausulaSQL OS DADOS NA FORMA DE INSERT INTO.

escreveNoTXT($clausulaSQL, $arquivoSQL);#ESCREVE NO ARQUIVO BasedeDados.txt O VALOR DA VARIAVEL $clausulaSQL.

function escreveNoTXT($consultasSQL, $arquivoSQL){
 
//ARQUIVO TXT
 
$arquivo = $arquivoSQL;
 
//TENTA ABRIR O ARQUIVO TXT
 
if (!$abrir = fopen($arquivo,"w")){
 
      $retorno = "ERRO AO ABRIR";
 
}else{
 
$retorno = true;
 
}
 
//ESCREVE NO ARQUIVO TXT
 
if (!fwrite($abrir,$consultasSQL)){
 
$retorno = "ERRO AO ESCREVER";
 
}else{
 
$retorno = true;
 
}
 
//FECHA O ARQUIVO
 
fclose($abrir);
 
return $retorno;
 
}
 
function DumpSQL($host, $user, $pass, $db){
 
mysql_connect( $host,$user, $pass) or die(mysql_error( ));
 
mysql_select_db($db) or die(mysql_error( ));
 
#mysql_list_tables PEGA TODAS AS TABELAS DA BASE DE DADOS

$res = mysql_list_tables($db) or die(mysql_error());
 
while($row = mysql_fetch_row($res)){
 
$table = $row[0]; #CADA TABELA DA BASE DE DADOS

$res3 = mysql_query("SELECT * FROM $table");
 
while($r=mysql_fetch_row( $res3)){ #AQUI OCORRE A EXTRAÇAO DOS DADOS DA TABELA

$sql="INSERT INTO $table VALUES ('";
 
$sql .= implode("','",$r);
 
$sql .= "');\n";
 
$back.=$sql;
 
}
 
}
 
$data = date("d/m/Y");
 
$back .= "\n\n–Backup feito em $data";
 
mysql_free_result($res);
 
return $back;
 
}
 
?>