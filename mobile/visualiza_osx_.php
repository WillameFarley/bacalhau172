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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style_pedidos.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:153.6px;
	top:147.08px;
	width:94px;
	height:15px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:345.6px;
	top:147.08px;
	width:102px;
	height:15px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:552px;
	top:147.08px;
	width:151px;
	height:15px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:124.8px;
	top:175.8px;
	width:383px;
	height:15px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:580.8px;
	top:175.8px;
	width:210px;
	height:15px;
	z-index:5;
}
#apDiv6 {
	position:absolute;
	left:105.6px;
	top:207.8px;
	width:402px;
	height:15px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:337.6px;
	top:207.8px;
	width:253.2px;
	height:15px;
	z-index:7;
}
#apDiv8 {
	position:absolute;
	left:110.4px;
	top:239.8px;
	width:399px;
	height:15px;
	z-index:8;
}
#apDiv9 {
	position:absolute;
	left:528px;
	top:239.8px;
	width:262.8px;
	height:19px;
	z-index:9;
}
#apDiv10 {
	position:absolute;
	left:115.2px;
	top:271.7px;
	width:394px;
	height:15px;
	z-index:10;
}
#apDiv11 {
	position:absolute;
	left:528px;
	top:271.7px;
	width:262.8px;
	height:14px;
	z-index:11;
}
#apDiv12 {
	position:absolute;
	left:672px;
	top:495.60px;
	width:96px;
	height:13px;
	z-index:12;
}
#apDiv13 {
	position:absolute;
	left:595.2px;
	top:303.7px;
	width:195.6px;
	height:15px;
	z-index:13;
}
#apDiv14 {
	position:absolute;
	left:62.4px;
	top:495.60px;
	width:52.8px;
	height:13px;
	z-index:12;
}
#apDiv15 {
	position:absolute;
	left:576px;
	top:367.71px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv16 {
	position:absolute;
	left:153.6px;
	top:367.71px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv17 {
	position:absolute;
	left:67px;
	top:326px;
	width:751px;
	height:13px;
	z-index:12;
}
#apDiv18 {
	position:absolute;
	left:62.4px;
	top:399.68px;
	width:52.8px;
	height:13px;
	z-index:12;
}
#apDiv19 {
	position:absolute;
	left:153.6px;
	top:495.60px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv20 {
	position:absolute;
	left:576px;
	top:399.68px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv21 {
	position:absolute;
	left:62.4px;
	top:367.71px;
	width:52.8px;
	height:13px;
	z-index:12;
}
#apDiv22 {
	position:absolute;
	left:153.6px;
	top:399.68px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv23 {
	position:absolute;
	left:672px;
	top:399.68px;
	width:96px;
	height:13px;
	z-index:12;
}
#apDiv24 {
	position:absolute;
	left:576px;
	top:463.63px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv25 {
	position:absolute;
	left:62.4px;
	top:431.65px;
	width:52.8px;
	height:13px;
	z-index:12;
}
#apDiv26 {
	position:absolute;
	left:62.4px;
	top:463.63px;
	width:52.8px;
	height:13px;
	z-index:12;
}
#apDiv27 {
	position:absolute;
	left:153.6px;
	top:463.63px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv28 {
	position:absolute;
	left:153.6px;
	top:431.65px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv29 {
	position:absolute;
	left:576px;
	top:495.60px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv30 {
	position:absolute;
	left:576px;
	top:431.65px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv31 {
	position:absolute;
	left:672px;
	top:431.65px;
	width:96px;
	height:13px;
	z-index:12;
}
#apDiv32 {
	position:absolute;
	left:672px;
	top:463.63px;
	width:96px;
	height:13px;
	z-index:12;
}
#apDiv33 {
	position:absolute;
	left:700.8px;
	top:527.6px;
	width:86.4px;
	height:20px;
	z-index:14;
}
#apDiv34 {
	position:absolute;
	left:134.4px;
	top:559.55px;
	width:121px;
	height:15px;
	z-index:15;
}
#apDiv35 {
	position:absolute;
	left:144px;
	top:591.53px;
	width:143px;
	height:15px;
	z-index:16;
}
#apDiv36 {	position:absolute;
	left:672px;
	top:367.71px;
	width:96px;
	height:13px;
	z-index:12;
}
-->
</style>
</head>
<body>
<div id="apDiv7"><?php echo $row_DetailRS1['cpf']; ?></div>
<div id="apDiv8"><?php echo $row_DetailRS1['endereco']; ?></div>
<div id="apDiv9"><?php echo $row_DetailRS1['insc_estadual']; ?>-<?php echo $row_DetailRS1['insc_municipal']; ?></div>
<div id="apDiv10"><?php echo $row_DetailRS1['bairro']; ?></div>
<div id="apDiv11"><?php echo $row_DetailRS1['cep']; ?></div>
<div id="apDiv21">
  <div align="center"><?php echo $quant1 = $row_DetailRS1['Quant1']; ?></div>
</div>
<div id="apDiv18">
  <div align="center"><?php echo $quant2 = $row_DetailRS1['Quant2']; ?></div>
</div>
<div id="apDiv25">
  <div align="center"><?php echo $quant3 = $row_DetailRS1['Quant3']; ?></div>
</div>
<div id="apDiv26">
  <div align="center"><?php echo $quant4 = $row_DetailRS1['Quant4']; ?></div>
</div>
<div id="apDiv14">
  <div align="center"><?php echo $quant5 = $row_DetailRS1['Quant5']; ?></div>
</div>
<div id="apDiv15">
  <div align="right"><?php echo $Vlr1 = $row_DetailRS1['Valor1']; ?></div>
</div>
<div id="apDiv20">
  <div align="right"><?php echo $Vlr2 = $row_DetailRS1['Valor2']; ?></div>
</div>
<div id="apDiv30">
  <div align="right"><?php echo $Vlr3 = $row_DetailRS1['Valor3']; ?></div>
</div>
<div id="apDiv24">
  <div align="right"><?php echo $Vlr4 = $row_DetailRS1['Valor4']; ?></div>
</div>
<div id="apDiv29">
  <div align="right"><?php echo $Vlr5 = $row_DetailRS1['Valor5']; ?></div>
</div>


<div id="apDiv36">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant1'];
	$Vlr1 = $row_DetailRS1['Valor1'];
	$produto1 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo $produto1;}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv23">
  <div align="right">
    <?php 
	$quant2 = $row_DetailRS1['Quant2'];
	$Vlr2 = $row_DetailRS1['Valor2'];
	$produto2 = $quant2 * $Vlr2;
	if (($quant2 != " ") and ($Vlr2 != "")) {echo $produto2;}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv31">
  <div align="right">
    <?php
	$quant3 = $row_DetailRS1['Quant3'];
	$Vlr3 = $row_DetailRS1['Valor3'];
	$produto3 = $quant3 * $Vlr3;
	if (($quant3 != " ") and ($Vlr3 != "")) {echo $produto3;}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv32">
  <div align="right">
    <?php
	$quant4 = $row_DetailRS1['Quant4'];
	$Vlr4 = $row_DetailRS1['Valor4'];
	$produto4 = $quant4 * $Vlr4;
	if (($quant4 != " ") and ($Vlr4 != "")) {echo $produto4;}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv12">
  <div align="right">
    <?php
	$quant5 = $row_DetailRS1['Quant5'];
	$Vlr5 = $row_DetailRS1['Valor5'];
	$produto5 = $quant5 * $Vlr5;
	if (($quant5 != " ") and ($Vlr5 != "")) {echo $produto5;}
else {echo "";
}?>
  </div>
</div>

<div id="apDiv16"><?php echo $prod1 = $row_DetailRS1['Prod1']; ?></div>
<div id="apDiv22"><?php echo $prod2 = $row_DetailRS1['Prod2']; ?></div>
<div id="apDiv28"><?php echo $prod3 = $row_DetailRS1['Prod3']; ?></div>
<div id="apDiv27"><?php echo $prod4 = $row_DetailRS1['Prod4']; ?></div>
<div id="apDiv19"><?php echo $prod5 = $row_DetailRS1['Prod5']; ?></div>

<div id="apDiv13"><?php echo $row_DetailRS1['Prazo_Pgto']; ?></div>
<div id="apDiv33">
  <div align="right"><strong>
    <?php $Valor_Total = $produto1 + $produto2 + $produto3 + $produto4 + $produto5; echo $Valor_Total; ?>
  </strong></div>
</div>
<div id="apDiv34"><?php echo $row_DetailRS1['Data_Entrega']; ?></div>
<div id="apDiv35"><?php echo $row_DetailRS1['Data_Cobanca']; ?></div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="apDiv1"><strong><?php echo $row_DetailRS1['Cod_Equipamento']; ?></strong></div>
<div id="apDiv2"><strong><font color="#000000"><?php echo $row_DetailRS1['Funcionario']; ?></font></strong></div>
<div id="apDiv3"><strong><font color="#000000"><?php echo $row_DetailRS1['Funcionario']; ?></font></strong></div>
<div id="apDiv4"><?php echo $row_DetailRS1['Cliente']; ?></div>
<div id="apDiv5"><?php echo $row_DetailRS1['razao']; ?></div>
<div id="apDiv6"><?php echo $row_DetailRS1['fone_com']; ?> /<span class="verdana"></span> <?php echo $row_DetailRS1['fone_res']; ?> /<span class="verdana"></span> <?php echo $row_DetailRS1['celular']; ?></div>
<script type="text/javascript">
self.print ();
  </script>
<div align="center"></div>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
