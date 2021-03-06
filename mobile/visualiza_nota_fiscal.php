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
$query_DetailRS1 = sprintf("SELECT * FROM nota INNER JOIN  Cliente ON nota.Cliente = nome WHERE Cod_Nota = %s", GetSQLValueString($colname_DetailRS1, "int"));
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
	position:absolute;
	left:70px;
	top:47px;
	width:94px;
	height:15px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:275px;
	top:47px;
	width:102px;
	height:15px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:477px;
	top:47px;
	width:151px;
	height:15px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:46px;
	top:72px;
	width:383px;
	height:15px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:498px;
	top:72px;
	width:240px;
	height:15px;
	z-index:5;
}
#apDiv6 {
	position:absolute;
	left:28px;
	top:95px;
	width:365px;
	height:15px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:469px;
	top:96px;
	width:268px;
	height:15px;
	z-index:7;
}
#apDiv8 {
	position:absolute;
	left:36px;
	top:118px;
	width:357px;
	height:15px;
	z-index:8;
}
#apDiv9 {
	position:absolute;
	left:464px;
	top:118px;
	width:275px;
	height:15px;
	z-index:9;
}
#apDiv10 {
	position:absolute;
	left:53px;
	top:141px;
	width:340px;
	height:15px;
	z-index:10;
}
#apDiv11 {
	position:absolute;
	left:464px;
	top:141px;
	width:274px;
	height:14px;
	z-index:11;
}
#apDiv12 {
	position:absolute;
	left:570px;
	top:302px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv13 {
	position:absolute;
	left:539px;
	top:168px;
	width:179px;
	height:15px;
	z-index:13;
}
#apDiv14 {
	position:absolute;
	left:0px;
	top:302px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv15 {
	position:absolute;
	left:470px;
	top:210px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv16 {
	position:absolute;
	left:65px;
	top:210px;
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
	left:0px;
	top:233px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv19 {
	position:absolute;
	left:65px;
	top:302px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv20 {
	position:absolute;
	left:470px;
	top:233px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv21 {
	position:absolute;
	left:0px;
	top:210px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv22 {
	position:absolute;
	left:65px;
	top:233px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv23 {
	position:absolute;
	left:570px;
	top:233px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv24 {
	position:absolute;
	left:470px;
	top:279px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv25 {
	position:absolute;
	left:0px;
	top:256px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv26 {
	position:absolute;
	left:0px;
	top:279px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv27 {
	position:absolute;
	left:65px;
	top:279px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv28 {
	position:absolute;
	left:65px;
	top:256px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv29 {
	position:absolute;
	left:470px;
	top:302px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv30 {
	position:absolute;
	left:470px;
	top:256px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv31 {
	position:absolute;
	left:570px;
	top:256px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv32 {
	position:absolute;
	left:570px;
	top:279px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv33 {
	position:absolute;
	left:598px;
	top:335px;
	width:86.4px;
	height:20px;
	z-index:14;
}
#apDiv34 {
	position:absolute;
	left:58px;
	top:358px;
	width:121px;
	height:15px;
	z-index:15;
}
#apDiv35 {
	position:absolute;
	left:68px;
	top:382px;
	width:143px;
	height:15px;
	z-index:16;
}
#apDiv36 {
	position:absolute;
	left:570px;
	top:210px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv {	position:absolute;
	left:0px;
	top:91px;
	width:324px;
	height:15px;
	z-index:4;
}
#apDiv37 {	position:absolute;
	left:640px;
	top:91px;
	width:118px;
	height:15px;
	z-index:3;
}
#apDiv40 {	position:absolute;
	left:0;
	top:55px;
	width:233px;
	height:15px;
	z-index:17;
}
#apDiv41 {	position:absolute;
	left:240px;
	top:55px;
	width:58px;
	height:15px;
	z-index:18;
}
#apDiv42 {	position:absolute;
	left:640px;
	top:115px;
	width:115px;
	height:15px;
	z-index:19;
}
#apDiv43 {	position:absolute;
	left:297px;
	top:55px;
	width:114px;
	height:15px;
	z-index:20;
}
#apDiv44 {	position:absolute;
	left:415px;
	top:139px;
	width:28px;
	height:15px;
	z-index:21;
}
#apDiv45 {	position:absolute;
	left:560px;
	top:210px;
	width:30px;
	height:13px;
	z-index:22;
}
#apDiv46 {	position:absolute;
	left:560px;
	top:233px;
	width:30px;
	height:13px;
	z-index:23;
}
#apDiv47 {	position:absolute;
	left:560px;
	top:256px;
	width:30px;
	height:16px;
	z-index:24;
}
#apDiv48 {	position:absolute;
	left:560px;
	top:279px;
	width:30px;
	height:11px;
	z-index:25;
}
#apDiv49 {	position:absolute;
	left:560px;
	top:302px;
	width:30px;
	height:14px;
	z-index:26;
}
#apDiv50 {	position:absolute;
	left:640px;
	top:142px;
	width:73px;
	height:14px;
	z-index:27;
}
#apDiv51 {	position:absolute;
	left:701px;
	top:-4px;
	width:81px;
	height:15px;
	z-index:28;
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
<div id="apDiv21">  <?php echo $Cod_Prod = $row_DetailRS1['Cod_Prod']; ?></div>
<div id="apDiv18">  <?php echo $Cod_Prod = $row_DetailRS1['Cod_Prod']; ?></div>
<div id="apDiv25">  <?php echo $Cod_Prod = $row_DetailRS1['Cod_Prod']; ?></div>
<div id="apDiv26">  <?php echo $Cod_Prod = $row_DetailRS1['Cod_Prod']; ?></div>
<div id="apDiv14">  <?php echo $Cod_Prod = $row_DetailRS1['Cod_Prod']; ?></div>
<div id="apDiv15">
  <div align="right"><?php echo $Vl_Unit = number_format($row_DetailRS1['Vl_Unit'], 2, ",", "."); ?></div>
</div>
<div id="apDiv20">
  <div align="right"><?php echo $Vl_Unit = number_format($row_DetailRS1['Vl_Unit'], 2, ",", "."); ?></div>
</div>
<div id="apDiv30">
  <div align="right"><?php echo $Vl_Unit = number_format($row_DetailRS1['Vl_Unit'], 2, ",", "."); ?></div>
</div>
<div id="apDiv24">
  <div align="right"><?php echo $Vl_Unit = number_format($row_DetailRS1['Vl_Unit'], 2, ",", "."); ?></div>
</div>
<div id="apDiv29">
  <div align="right"><?php echo $Vl_Unit = number_format($row_DetailRS1['Vl_Unit'], 2, ",", "."); ?></div>
</div>


<div id="apDiv36">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant'];
	$Vlr1 = $row_DetailRS1['Vl_Unit'];
	$produto1 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto1, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv23">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant'];
	$Vlr1 = $row_DetailRS1['Vl_Unit'];
	$produto2 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto2, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv31">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant'];
	$Vlr1 = $row_DetailRS1['Vl_Unit'];
	$produto3 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto3, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv32">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant'];
	$Vlr1 = $row_DetailRS1['Vl_Unit'];
	$produto4 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto4, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>
<div id="apDiv12">
  <div align="right">
    <?php
	$quant1 = $row_DetailRS1['Quant'];
	$Vlr1 = $row_DetailRS1['Vl_Unit'];
	$produto5 = $quant1 * $Vlr1;
	if (($quant1 != " ") and ($Vlr1 != "")) {echo number_format($produto5, 2, ",", ".");}
else {echo "";
}?>
  </div>
</div>

<div id="apDiv16"><?php echo $Desc_Prod = $row_DetailRS1['Desc_Prod']; ?></div>
<div id="apDiv22"><?php echo $Desc_Prod = $row_DetailRS1['Desc_Prod']; ?></div>
<div id="apDiv28"><?php echo $Desc_Prod = $row_DetailRS1['Desc_Prod']; ?></div>
<div id="apDiv27"><?php echo $Desc_Prod = $row_DetailRS1['Desc_Prod']; ?></div>
<div id="apDiv19"><?php echo $Desc_Prod = $row_DetailRS1['Desc_Prod']; ?></div>

<div id="apDiv13"><?php echo $row_DetailRS1['Municipio']; ?></div>
<div id="apDiv34">
  <div align="right">
    <?php
	$moeda = 'R$ ';
	$Valor_Total = $produto1 + $produto2 + $produto3 + $produto4 + $produto5; echo number_format($Valor_Total, 2, ",", "."); ?>
  </div>
</div>
<div id="apDiv35">
  <div align="right">
    <?php
	$moeda = 'R$ ';
	$Valor_Total = $produto1 + $produto2 + $produto3 + $produto4 + $produto5; echo number_format($Valor_Total, 2, ",", "."); ?>
  </div>
</div>
<div id="apDiv17"><font color="#000000"><?php echo $row_DetailRS1['Icms']; ?></font></div>
<div id="apDiv40"><?php echo $row_DetailRS1['Natureza']; ?></div>
<div id="apDiv41"><?php echo $row_DetailRS1['Cfop']; ?></div>
<div id="apDiv42"><?php echo $row_DetailRS1['Data_Saida']; ?></div>
<div id="apDiv43"><?php echo $row_DetailRS1['Insc_Est_Sub_Trib']; ?></div>
<div id="apDiv44"><?php echo $row_DetailRS1['Estado']; ?></div>
<div id="apDiv45">
  <div align="center"><?php echo $Quant = $row_DetailRS1['Quant']; ?></div>
</div>
<div id="apDiv46">
  <div align="center"><?php echo $Quant = $row_DetailRS1['Quant']; ?></div>
</div>
<div id="apDiv47">
  <div align="center"><?php echo $Quant = $row_DetailRS1['Quant']; ?></div>
</div>
<div id="apDiv48">
  <div align="center"><?php echo $Quant = $row_DetailRS1['Quant']; ?>
  </div>
  <div align="center"></div>
</div>
<div id="apDiv49">
  <div align="center"><?php echo $Quant = $row_DetailRS1['Quant']; ?></div>
</div>
<div id="apDiv50"><?php echo $row_DetailRS1['Hora_Saida']; ?></div>
<div id="apDiv51">
  <div align="left"><?php echo $row_DetailRS1['Cod_Nota']; ?></div>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="apDiv37"><font color="#000000"><?php echo $row_DetailRS1['Data_Emissao']; ?></font></div>
<div id="apDiv3">
  <div align="left"><font color="#000000"><?php echo $row_DetailRS1['saida']; ?></font><?php echo $row_DetailRS1['saida']; ?></div>
</div>
<div id="apDiv33">
  <div align="left"><font color="#000000"><?php echo $row_DetailRS1['entrada']; ?></font></div>
</div>
<div id="apDiv"><?php echo $row_DetailRS1['Cliente']; ?></div>
<div id="apDiv5"><?php echo $row_DetailRS1['Cnpj']; ?></div>
<div id="apDiv6"><?php echo $row_DetailRS1['fone_com']; ?> /<span class="verdana"></span> <?php echo $row_DetailRS1['fone_res']; ?> /<span class="verdana"></span> <?php echo $row_DetailRS1['celular']; ?></div>
<script type="text/javascript">
self.print ();
  </script>
<div align="center"></div></body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
