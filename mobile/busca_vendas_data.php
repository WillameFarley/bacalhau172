<?php
include "mysqlconecta.php";
include "mysqlexecuta.php";
?><HEAD>
<?php
include "css.php";
?>
</HEAD>
<HTML>
<hr>
<div align=center>
<table cellpadding=0 cellspacing=0 border=0 width=600 bgcolor=#4682B4 border-color:white>
    <tr>
        <td align=center bgcolor=#8B8682>
            <font class="titulo">BUSCAR FT POR DATA
        </td>
    </tr>
    <tr>
        <td height=3 bgcolor=white></td>
    </tr>
    <tr>
        <form action="busca_ft.php" method="post">
        <td align="center">
            <font class="fonte">Buscar de: &nbsp;&nbsp;<input type=text name="data1" class="box" size="10">&nbsp;&nbsp; at&eacute; &nbsp;&nbsp; <input type="text" name="data2" class="box" size="10">
        </td>
    
    <tr>
        <td height=3></td>
    </tr>
    <tr>
        <td align=center>
            <font class=fonte>Posto: &nbsp;&nbsp;&nbsp;
            <select name="posto_ft" class=box>
            <option value="Todos">TODOS</option>
            <?php
             $sql_posto = "SELECT * FROM tab_postos ORDER BY str_postos ASC";
      
             $limite_posto = mysql_query("$sql_posto");
      
             while ($sql_posto=mysql_fetch_array($limite_posto)){
             ?>
             <option value="<?php echo $sql_posto['str_postos'];?>"><?php echo $sql_posto['str_postos'];?></option>
             <?php
             }
             ?>
             </select>
        </td>
    </tr>
    <tr>
        <td align="center">
            <input type="hidden" name="busca" value="1">
            <input type="submit" value="buscar ft" class="botao">
        </td>
        </form>
    </tr>
    <tr>
        <td height=3></td>
    </tr>
</table>
<hr>
<div align=center>
<table cellpadding=0 cellspacing=0 border=0 width=600>
   <tr>
      <td bgcolor=#4682B4 align=center>
         <font class=titulo>RESULTADO DA BUSCA DAS FT's
      </td>
   </tr>
   <tr>
      <td height=5 bgcolor=white></td>
   </tr>
</table>
<table cellpadding=0 cellspacing=0 width=600 border=1 class=tabela>
   <tr>
      <td align=center>
         <font class=fonte>Ocorr&ecirc;ncias
      </td>
   </tr>
<?php
$busca = $_POST['busca'];
if ($busca == 1){
    $data1 = $_POST['data1'];
    $data1_en = substr($data1,6,4) . "-" . substr($data1,3,2) . "-" . substr($data1,0,2);
    $data2 = $_POST['data2'];
    $data2_en = substr($data2,6,4) . "-" . substr($data2,3,2) . "-" . substr($data2,0,2);
    $posto_ft = $_POST['posto_ft'];
    echo $posto_ft;
    if ($posto_ft = "Todos"){
    $sql = "SELECT * FROM tab_ft WHERE str_dia BETWEEN '$data1_en' AND '$data2_en' ORDER BY str_dia DESC";
    }else{
    $sql = "SELECT * FROM tab_ft WHERE str_posto_cobertura='$posto_ft' AND str_dia BETWEEN '$data1_en' AND '$data2_en' ORDER BY str_dia DESC";
    }

    $limite = mysql_query("$sql") OR DIE (mysql_error());

    while ($sql=mysql_fetch_array($limite)){
        $colab = $sql['str_colab'];
        $dia = $sql['str_dia'];
        $dia_certo = substr($dia,8,2) . "/" . substr($dia,5,2) . "/" . substr($dia,0,4);
        $regime = $sql['str_regime'];
        $lugar_colab = $sql['str_lugar_colab'];
        $porque = $sql['str_porque'];
        $posto = $_POST['posto'];
        $posto_cobertura = $sql['str_posto_cobertura'];
        $horario = $sql['str_horario'];
?>
   <tr>
      <td align=center>
         Em decorr&ecirc;ncia da(o) <font color=#FFD700><b><?php echo $porque; ?></b></font> do colaborador(a) <font color=#FFD700><b><?php echo $colab; ?></b></font> no dia <font color=#FFD700><b><?php echo $dia_certo; ?></font> 
         , trabalhou em regime de <font color=#FFD700><b><?php echo $regime?></b></font> o colaborador(a) <font color=#FFD700><b><?php echo $lugar_colab?></b></font>, no posto <font color=#FFD700><b><?php echo $posto_cobertura?></b></font>
         no hor&aacute;rio das <font color=#FFD700><b><?php echo $horario?></b></font>.      </td>
<?php
    }
}
?>
</table>
</div>