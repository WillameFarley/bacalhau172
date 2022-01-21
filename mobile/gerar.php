<?php
$nome_arquivo = $_POST['arquivo']; // pego nessa variavel o nome que você atribuiu no formulario da pagina index.php para o arquivo a ser gerado .xls - excel
// peguei a variavel datainicio vindo do form e transformei ela pra o formato ingles do SQL Y-m-d
//a variavel de saida final da data em formato SQL é a $datavencinicio
$datainicio = $_POST['datainicio']; 
$datavencinicio = "$datainicio";
$diavencinicio = substr("$datavencinicio",0,2);
$mesvencinicio = substr("$datavencinicio",3,2);
$anovencinicio = substr("$datavencinicio",6,4);
$datavencinicio = $anovencinicio."-".$mesvencinicio."-".$diavencinicio;

// peguei a variavel datafinal vindo do form e transformei ela pra o formato ingles do SQL Y-m-d
//a variavel de saida final da data em formato SQL é a $datavencfinal
$datafinal = $_POST['datafinal'];
$datavencfinal = "$datafinal";
$diavencfinal = substr("$datavencfinal",0,2);
$mesvencfinal = substr("$datavencfinal",3,2);
$anovencfinal = substr("$datavencfinal",6,4);
$datavencfinal = $anovencfinal."-".$mesvencfinal."-".$diavencfinal;

//Incluir a classe excelwriter
include("excelwriter.inc.php");

//Você pode colocar aqui o nome do arquivo que você deseja salvar.
$excel=new ExcelWriter("".$nome_arquivo."");

if ($excel==false) {
    echo $excel->error;
}

//Escreve o nome dos campos de uma tabela. Esses vão ser o texto do titulo das colunas no arquivo gerado
$myArr = array('Cod_Equipamento','Cliente','Valor1','Valor2','Valor3','cpf','insc_estadual','data_emissao');
$excel->writeLine($myArr);

//Seleciona os campos de uma tabela
$conn = mysql_connect("localhost", "willame", "gabriele") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
//$conn = mysql_connect("localhost", "root", "") or die ('Não foi possivel conectar ao banco de dados! Erro: ' . mysql_error());
if ($conn) {
    mysql_select_db("data", $conn);
}
//$consulta = "SELECT * FROM novanota WHERE data_emissao BETWEEN '01/07/2014' AND '31/07/2014' ORDER BY Cod_Equipamento";
$consulta = "select * from novanota where data_emissao BETWEEN '$datavencinicio' AND '$datavencfinal' order by Cod_Equipamento";            
$resultado = mysql_query($consulta);
if ($resultado == true) {
    while($linha = mysql_fetch_array($resultado)){
        $myArr = array($linha['Cod_Equipamento'],$linha['Cliente'],$linha['Valor1'],$linha['Valor2'],$linha['Valor3'],$linha['cpf'],$linha['insc_estadual'],$linha['data_emissao']); //campos da tabela dados
        $excel->writeLine($myArr);
    }
}

$excel->close();
echo "O relatório de dados cadastrados de ".$datainicio." até ".$datafinal." foi gerado com sucesso.<br>
<a href=\"".$nome_arquivo."\">Clique aqui para fazer o download do arquivo</a>";
?>