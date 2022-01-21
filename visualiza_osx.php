<?php require_once('Connections/data.php'); ?>
<?php require_once('Connections/data.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_data, $data);
$query_DetailRS1 = sprintf("SELECT * FROM ordemservico INNER JOIN  cliente ON ordemservico.Cliente = nome WHERE Cod_Equipamento = %s", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $data) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style_pedidos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#apDiv1 {
	position: absolute;
	left: 62px;
	top: 37px;
	width: 94px;
	height: 15px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 221px;
	top: 37px;
	width: 101px;
	height: 15px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 392px;
	top: 37px;
	width: 151px;
	height: 15px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 34px;
	top: 62px;
	width: 363px;
	height: 15px;
	z-index: 4;
	font-size: 13px;
}
#apDiv4 {
	font-family: Tahoma;
}
#apDiv5 {
	position: absolute;
	left: 417px;
	top: 61px;
	width: 347px;
	height: 15px;
	z-index: 5;
	font-size: 13px;
}
#apDiv6 {
	position: absolute;
	left: 22px;
	top: 85px;
	width: 374px;
	height: 15px;
	z-index: 6;
	font-size: 13px;
}
#apDiv7 {
	position: absolute;
	left: 389px;
	top: 85px;
	width: 268px;
	height: 15px;
	z-index: 7;
	font-size: 13px;
}
#apDiv8 {
	position: absolute;
	left: 23px;
	top: 109px;
	width: 374px;
	height: 15px;
	z-index: 8;
}
#apDiv9 {
	position: absolute;
	left: 382px;
	top: 110px;
	width: 379px;
	height: 15px;
	z-index: 9;
	font-size: 13px;
}
#apDiv10 {
	position: absolute;
	left: 40px;
	top: 132px;
	width: 357px;
	height: 15px;
	z-index: 10;
	font-size: 13px;
}
#apDiv11 {
	position: absolute;
	left: 381px;
	top: 133px;
	width: 274px;
	height: 14px;
	z-index: 11;
	font-size: 13px;
}
#apDiv12 {
	position: absolute;
	left: 462px;
	top: 301px;
	width: 90px;
	height: 13px;
	z-index: 12;
}
#apDiv13 {
	position: absolute;
	left: 427px;
	top: 153px;
	width: 179px;
	height: 15px;
	z-index: 13;
	font-size: 13px;
}
#apDiv14 {
	position:absolute;
	left:0px;
	top:302px;
	width:60px;
	height:13px;
	z-index:12;
}
#apDiv15 {
	position: absolute;
	left: 382px;
	top: 209px;
	width: 76.8px;
	height: 13px;
	z-index: 12;
}
#apDiv16 {
	position: absolute;
	left: 80px;
	top: 210px;
	width: 252px;
	height: 13px;
	z-index: 12;
}
#apDiv17 {
	position: absolute;
	left: 513px;
	top: 37px;
	width: 152px;
	height: 13px;
	z-index: 12;
}
#apDiv18 {
	position:absolute;
	left:0px;
	top:233px;
	width:60px;
	height:13px;
	z-index:12;
}
#apDiv19 {
	position: absolute;
	left: 80px;
	top: 302px;
	width: 252px;
	height: 13px;
	z-index: 12;
}
#apDiv20 {
	position: absolute;
	left: 382px;
	top: 232px;
	width: 76.8px;
	height: 13px;
	z-index: 12;
}
#apDiv21 {
	position:absolute;
	left:0px;
	top:210px;
	width:60px;
	height:13px;
	z-index:12;
}
#apDiv22 {
	position: absolute;
	left: 80px;
	top: 233px;
	width: 252px;
	height: 13px;
	z-index: 12;
}
#apDiv23 {
	position: absolute;
	left: 461px;
	top: 232px;
	width: 90px;
	height: 13px;
	z-index: 12;
}
#apDiv24 {
	position: absolute;
	left: 382px;
	top: 278px;
	width: 76.8px;
	height: 13px;
	z-index: 12;
}
#apDiv25 {
	position:absolute;
	left:0px;
	top:256px;
	width:60px;
	height:13px;
	z-index:12;
}
#apDiv26 {
	position:absolute;
	left:0px;
	top:279px;
	width:60px;
	height:13px;
	z-index:12;
}
#apDiv27 {
	position: absolute;
	left: 80px;
	top: 279px;
	width: 252px;
	height: 13px;
	z-index: 12;
}
#apDiv28 {
	position: absolute;
	left: 80px;
	top: 256px;
	width: 253px;
	height: 13px;
	z-index: 12;
}
#apDiv29 {
	position: absolute;
	left: 382px;
	top: 301px;
	width: 76.8px;
	height: 13px;
	z-index: 12;
}
#apDiv30 {
	position: absolute;
	left: 382px;
	top: 255px;
	width: 76.8px;
	height: 13px;
	z-index: 12;
}
#apDiv31 {
	position: absolute;
	left: 462px;
	top: 255px;
	width: 90px;
	height: 13px;
	z-index: 12;
}
#apDiv32 {
	position: absolute;
	left: 462px;
	top: 278px;
	width: 90px;
	height: 13px;
	z-index: 12;
}
#apDiv33 {
	position: absolute;
	left: 509px;
	top: 328px;
	width: 86.4px;
	height: 20px;
	z-index: 14;
}
#apDiv34 {
	position: absolute;
	left: 46px;
	top: 352px;
	width: 121px;
	height: 15px;
	z-index: 15;
}
#apDiv35 {
    position: absolute;
    left: 56px;
    top: 376px;
    width: 143px;
    height: 15px;
    z-index: 16;
}
#apDiv36 {
	position: absolute;
	left: 461px;
	top: 209px;
	width: 90px;
	height: 13px;
	z-index: 12;
}
#apDiv37 {
    position: absolute;
    left: 110px;
    top: 352px;
    width: 150px;
    height: 17px;
    z-index: 17;
}
.style4 {font-size: 12px}
#apDiv38 {
	position: absolute;
	left: 403px;
	top: 353px;
	width: 191px;
	height: 32px;
	z-index: 15;
}
#apDiv39 {    position: absolute;
    left: 110px;
    top: 352px;
    width: 150px;
    height: 17px;
    z-index: 17;
}
-->
</style>
</head>
<body>
<div class="style4" id="apDiv7"><?php echo $row_DetailRS1['cpf']; ?></div>
<div class="style4" id="apDiv8"><?php echo $row_DetailRS1['endereco']; ?>&nbsp;&nbsp;&nbsp;<strong>N&ordm;</strong> <?php echo $row_DetailRS1['numero1']; ?>&nbsp;&nbsp;&nbsp;<strong>&nbsp;Comp.</strong> <?php echo $row_DetailRS1['complemento1']; ?></div>
<div class="style4" id="apDiv9"><?php echo $row_DetailRS1['insc_estadual']; ?> - <?php echo $row_DetailRS1['insc_municipal']; ?></div>
<div class="style4" id="apDiv10"><?php echo $row_DetailRS1['bairro']; ?></div>
<div class="style4" id="apDiv11"><?php echo $row_DetailRS1['cep']; ?></div>
<div class="style4" id="apDiv21">
  <div align="left"><?php echo $quant1 = $row_DetailRS1['Quant1']; ?></div>
<div align="left"></div></div>
<div class="style4" id="apDiv18">
  <div align="left"><?php echo $quant2 = $row_DetailRS1['Quant2']; ?></div>
</div>
<div class="style4" id="apDiv25">
  <div align="left"><?php echo $quant3 = $row_DetailRS1['Quant3']; ?></div>
</div>
<div class="style4" id="apDiv26">
  <div align="left"><?php echo $quant4 = $row_DetailRS1['Quant4']; ?></div>
</div>
<div class="style4" id="apDiv14">
  <div align="left"><?php echo $quant5 = $row_DetailRS1['Quant5']; ?></div>
</div>
<div class="style4" id="apDiv15">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor1'], 2, ",", "."); ?></div>
</div>
<div class="style4" id="apDiv20">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor2'], 2, ",", "."); ?></div>
</div>
<div class="style4" id="apDiv30">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor3'], 2, ",", "."); ?></div>
</div>
<div class="style4" id="apDiv24">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor4'], 2, ",", "."); ?></div>
</div>
<div class="style4" id="apDiv29">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor5'], 2, ",", "."); ?></div>
</div>


<div class="style4" id="apDiv36">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant1'];
	$Vlr1 = $row_DetailRS1['Valor1'];
	$produto1 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto1, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div class="style4" id="apDiv23">
  <div align="right">
    <?php 
	$quant2 = $row_DetailRS1['Quant2'];
	$Vlr2 = $row_DetailRS1['Valor2'];
	$produto2 = $quant2 * $Vlr2;
	if (($quant2 != " ") and ($Vlr2 != "")) {echo number_format($produto2, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div class="style4" id="apDiv31">
  <div align="right">
    <?php
	$quant3 = $row_DetailRS1['Quant3'];
	$Vlr3 = $row_DetailRS1['Valor3'];
	$produto3 = $quant3 * $Vlr3;
	if (($quant3 != " ") and ($Vlr3 != "")) {echo number_format($produto3, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div class="style4" id="apDiv32">
  <div align="right">
    <?php
	$quant4 = $row_DetailRS1['Quant4'];
	$Vlr4 = $row_DetailRS1['Valor4'];
	$produto4 = $quant4 * $Vlr4;
	if (($quant4 != " ") and ($Vlr4 != "")) {echo number_format($produto4, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div class="style4" id="apDiv12">
  <div align="right">
    <?php
	$quant5 = $row_DetailRS1['Quant5'];
	$Vlr5 = $row_DetailRS1['Valor5'];
	$produto5 = $quant5 * $Vlr5;
	if (($quant5 != " ") and ($Vlr5 != "")) {echo number_format($produto5, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>

<div class="style4" id="apDiv16"><?php echo $prod1 = $row_DetailRS1['Prod1']; ?></div>
<div class="style4" id="apDiv22"><?php echo $prod2 = $row_DetailRS1['Prod2']; ?></div>
<div class="style4" id="apDiv28"><?php echo $prod3 = $row_DetailRS1['Prod3']; ?></div>
<div class="style4" id="apDiv27"><?php echo $prod4 = $row_DetailRS1['Prod4']; ?></div>
<div class="style4" id="apDiv19"><?php echo $prod5 = $row_DetailRS1['Prod5']; ?></div>

<div class="style4" id="apDiv13"><?php echo $row_DetailRS1['Prazo_Pgto']; ?></div>
<div class="style4" id="apDiv33">
  <div align="right"><strong>
    <span style="font-size: 13px"></span>
    <span style="font-size: 13px"></span>
    <?php 
	$moeda = 'R$ ';
	$Valor_Total = $produto1 + $produto2 + $produto3 + $produto4 + $produto5; echo number_format($Valor_Total, 2, ",", "."); ?>
  </strong></div>
</div>
<div class="style4" id="apDiv34"><?php echo $row_DetailRS1['Data_Entrega']; ?></div>
<div class="style4" id="apDiv35"><strong><?php echo $row_DetailRS1['Hora_Entrada']; ?></strong></div>
<div class="style4" id="apDiv37">-&nbsp;&nbsp;&nbsp;<?php echo $row_DetailRS1['Hora_Entrega']; ?></div>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<div class="style4" id="apDiv17"><strong><?php echo $row_DetailRS1['Data_Entrada']; ?></strong></div>
<p class="style4">&nbsp;</p>
<div class="style4" id="apDiv38"><strong>TAXA DE ENTREGA<br />
  R$</strong>&nbsp;<?php echo $row_DetailRS1['taxaEntrega']; ?></div>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<p class="style4">&nbsp;</p>
<div class="style4" id="apDiv1"><strong><?php echo $row_DetailRS1['Cod_Equipamento']; ?></strong></div>
<div class="style4" id="apDiv2"><strong><font color="#000000"><?php echo $row_DetailRS1['codigo']; ?></font></strong></div>
<div class="style4" id="apDiv3"><strong><font color="#000000"><?php echo $row_DetailRS1['Funcionario']; ?></font></strong></div>
<div class="style4" id="apDiv4"><strong><font color="#0000000"><?php echo $row_DetailRS1['Cliente']; ?></strong></div>
<div class="style4" id="apDiv5"><?php echo $row_DetailRS1['nome_razao']; ?><br />
  </div>
<div class="style4" id="apDiv6"><?php echo $row_DetailRS1['fone_com']; ?> / <?php echo $row_DetailRS1['fone_res']; ?> / <?php echo $row_DetailRS1['celular']; ?></div>
<span class="style4">
<script type="text/javascript">
self.print ();
  </script>
</span>
<div align="center" class="style4"></div>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
