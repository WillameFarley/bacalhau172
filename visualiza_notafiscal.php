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
$query_DetailRS1 = sprintf("SELECT * FROM novanota INNER JOIN  cliente ON novanota.Cliente = nome_razao WHERE Cod_Equipamento = %s", GetSQLValueString($colname_DetailRS1, "int"));
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
	left:1096px;
	top:0px;
	width:117px;
	height:15px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:789px;
	top:7px;
	width:87px;
	height:15px;
	z-index:2;
}
#apDiv3 {
	position:absolute;
	left:708px;
	top:7px;
	width:57px;
	height:15px;
	z-index:3;
}
#apDiv4 {
	position:absolute;
	left:1px;
	top:108px;
	width:324px;
	height:15px;
	z-index:4;
}
#apDiv5 {
	position:absolute;
	left:1053px;
	top:132px;
	width:115px;
	height:15px;
	z-index:5;
}
#apDiv6 {
	position:absolute;
	left:468px;
	top:157px;
	width:211px;
	height:15px;
	z-index:6;
}
#apDiv7 {
	position:absolute;
	left:706px;
	top:107px;
	width:129px;
	height:15px;
	z-index:7;
}
#apDiv8 {
	position:absolute;
	left:1px;
	top:133px;
	width:319px;
	height:15px;
	z-index:8;
}
#apDiv9 {
	position:absolute;
	left:739px;
	top:157px;
	width:188px;
	height:15px;
	z-index:9;
}
#apDiv10 {
	position:absolute;
	left:588px;
	top:133px;
	width:144px;
	height:15px;
	z-index:10;
}
#apDiv11 {
	position:absolute;
	left:860px;
	top:133px;
	width:68px;
	height:14px;
	z-index:11;
}
#apDiv12 {
	position:absolute;
	left:571px;
	top:327px;
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
	left:1px;
	top:327px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv15 {
	position:absolute;
	left:995px;
	top:223px;
	width:75px;
	height:13px;
	z-index:12;
}
#apDiv16 {
	position:absolute;
	left:123px;
	top:223px;
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
	left:1px;
	top:258px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv19 {
	position:absolute;
	left:66px;
	top:327px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv20 {
	position:absolute;
	left:471px;
	top:258px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv21 {
	position:absolute;
	left:937px;
	top:224px;
	width:30px;
	height:13px;
	z-index:12;
}
#apDiv22 {
	position:absolute;
	left:66px;
	top:258px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv23 {
	position:absolute;
	left:571px;
	top:260px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv24 {
	position:absolute;
	left:471px;
	top:304px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv25 {
	position:absolute;
	left:1px;
	top:281px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv26 {
	position:absolute;
	left:1px;
	top:304px;
	width:40px;
	height:13px;
	z-index:12;
}
#apDiv27 {
	position:absolute;
	left:66px;
	top:304px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv28 {
	position:absolute;
	left:66px;
	top:281px;
	width:353px;
	height:13px;
	z-index:12;
}
#apDiv29 {
	position:absolute;
	left:471px;
	top:327px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv30 {
	position:absolute;
	left:471px;
	top:281px;
	width:76.8px;
	height:13px;
	z-index:12;
}
#apDiv31 {
	position:absolute;
	left:571px;
	top:281px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv32 {
	position:absolute;
	left:571px;
	top:304px;
	width:90px;
	height:13px;
	z-index:12;
}
#apDiv33 {
	position:absolute;
	left:952px;
	top:779px;
	width:75px;
	height:15px;
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
	left:1104px;
	top:223px;
	width:75px;
	height:13px;
	z-index:12;
}
.style1 {
	font-size: 1.2em;
	font-weight: bold;
}
#apDiv37 {
	position:absolute;
	left:1px;
	top:68px;
	width:233px;
	height:15px;
	z-index:17;
}
#apDiv38 {
	position:absolute;
	left:367px;
	top:68px;
	width:58px;
	height:15px;
	z-index:18;
}
#apDiv39 {
	position:absolute;
	left:424px;
	top:68px;
	width:114px;
	height:15px;
	z-index:19;
}
#apDiv40 {
	position:absolute;
	left:1053px;
	top:106px;
	width:78px;
	height:15px;
	z-index:20;
}
#apDiv41 {
	position:absolute;
	left:1px;
	top:157px;
	width:179px;
	height:15px;
	z-index:21;
}
#apDiv42 {
	position:absolute;
	left:1053px;
	top:156px;
	width:73px;
	height:16px;
	z-index:22;
}
#apDiv43 {
	position:absolute;
	left:1px;
	top:223px;
	width:53px;
	height:15px;
	z-index:23;
}
#apDiv44 {
	position:absolute;
	left:1016px;
	top:1048px;
	width:142px;
	height:15px;
	z-index:24;
}
#apDiv45 {
	position:absolute;
	left:952px;
	top:806px;
	width:75px;
	height:15px;
	z-index:25;
}
#apDiv46 {
	position:absolute;
	left:657px;
	top:157px;
	width:86px;
	height:15px;
	z-index:26;
}
-->
</style>
</head>
<body>
<div id="apDiv7"><?php echo $row_DetailRS1['cpf']; ?></div>
<div id="apDiv8"><?php echo $row_DetailRS1['endereco']; ?></div>
<div id="apDiv9"><?php echo $row_DetailRS1['insc_estadual']; ?></div>
<div id="apDiv10"><?php echo $row_DetailRS1['bairro']; ?></div>
<div id="apDiv11"><?php echo $row_DetailRS1['cep']; ?></div>
<div id="apDiv21">
  <div align="left"><?php echo $quant1 = $row_DetailRS1['Quant1']; ?></div>
<div align="left"></div></div>
<div id="apDiv18">
  <div align="left"></div>
</div>
<div id="apDiv25">
  <div align="left"></div>
</div>
<div id="apDiv26">
  <div align="left"></div>
</div>
<div id="apDiv14">
  <div align="left"></div>
</div>
<div id="apDiv15">
  <div align="right"><?php echo $Vlr1 = number_format($row_DetailRS1['Valor1'], 2, ",", "."); ?></div>
</div>
<div id="apDiv20">
  <div align="right"></div>
</div>
<div id="apDiv30">
  <div align="right"></div>
</div>
<div id="apDiv24">
  <div align="right"></div>
</div>
<div id="apDiv29">
  <div align="right"></div>
</div>


<div id="apDiv36">
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
<div id="apDiv23">
  <div align="right"></div>
</div>
<div id="apDiv31">
  <div align="right"></div>
</div>
<div id="apDiv32">
  <div align="right"></div>
</div>
<div id="apDiv12">
  <div align="right"></div>
</div>

<div id="apDiv16"><?php echo $prod1 = $row_DetailRS1['Prod1']; ?></div>
<div id="apDiv22"></div>
<div id="apDiv28"></div>
<div id="apDiv27"></div>
<div id="apDiv19"></div>

<div id="apDiv33">
  <div align="right"><strong>
    <?php 
	$moeda = 'R$ ';
	$Valor_Total = $produto1; echo number_format($Valor_Total, 2, ",", "."); ?>
  </strong></div>

</div>
<div id="apDiv37"><?php echo $row_DetailRS1['Equipamento']; ?></div>
<div id="apDiv38"><?php echo $row_DetailRS1['Prazo_Pgto']; ?></div>
<div id="apDiv39"><?php echo $row_DetailRS1['Marca']; ?></div>
<div id="apDiv40"><?php echo $row_DetailRS1['data_emissao']; ?></div>
<div id="apDiv41"><?php echo $row_DetailRS1['cidade']; ?></div>
<div id="apDiv42"><?php echo $row_DetailRS1['Hora_Entrada']; ?></div>
<div id="apDiv43"><?php echo $row_DetailRS1['ordem']; ?></div>
<div id="apDiv44"><span class="style1"><?php echo $row_DetailRS1['Cod_Equipamento']; ?></span></div>
<div id="apDiv45">
  <div align="right"><strong>
    <?php 
	$moeda = 'R$ ';
	$Valor_Total = $produto1; echo number_format($Valor_Total, 2, ",", "."); ?>
  </strong></div>
</div>
<div id="apDiv46"><?php echo $row_DetailRS1['estado']; ?></div>
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
<div class="style1" id="apDiv1"><?php echo $row_DetailRS1['Cod_Equipamento']; ?></div>
<div id="apDiv2">
  <div align="left"><font color="#000000"><?php echo $row_DetailRS1['entrada']; ?></font></div>
</div>
<div id="apDiv3"><font color="#000000"><?php echo $row_DetailRS1['Patrimonio']; ?></font></div>
<div id="apDiv4"><?php echo $row_DetailRS1['Cliente']; ?></div>
<div id="apDiv5"><?php echo $row_DetailRS1['Data_Entrada']; ?></div>
<div id="apDiv6"><?php echo $row_DetailRS1['fone_com']; ?><span class="verdana"></span></div>
<script type="text/javascript">
self.print ();
  </script>
<div align="center"></div>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
