<?php require_once('Connections/data.php'); ?>
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

mysql_select_db($database_data, $data);
$query_Recordset2 = "SELECT * FROM nota";
$Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);

mysql_select_db($database_data, $data);
$query_Recordset2 = "SELECT * FROM notafiscal";
$Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<style type="text/css">
<!--
#apDiv1 {
	position:absolute;
	left:450px;
	top:91px;
	width:129px;
	height:15px;
	z-index:1;
}
#apDiv41 {
	position:absolute;
	left:240px;
	top:55px;
	width:58px;
	height:15px;
	z-index:18;
}
#apDiv2 {
	position:absolute;
	left:679px;
	top:-1px;
	width:117px;
	height:14px;
	z-index:19;
}
#apDiv3 {
	position:absolute;
	left:445px;
	top:0px;
	width:57px;
	height:15px;
	z-index:20;
}
#apDiv4 {
	position:absolute;
	left:543px;
	top:0px;
	width:87px;
	height:15px;
	z-index:21;
}
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 0.7em;
}
#apDiv5 {
	position:absolute;
	left:297px;
	top:55px;
	width:114px;
	height:15px;
	z-index:22;
}
#apDiv6 {
	position:absolute;
	width:233px;
	height:15px;
	z-index:23;
	left: 0px;
	top: 55px;
}
#apDiv7 {
	position:absolute;
	left:0px;
	top:91px;
	width:324px;
	height:15px;
	z-index:24;
}
#apDiv8 {
	position:absolute;
	left:0px;
	top:139px;
	width:179px;
	height:15px;
	z-index:25;
}
#apDiv9 {
	position:absolute;
	left:640px;
	top:91px;
	width:118px;
	height:15px;
	z-index:26;
}
#apDiv10 {
	position:absolute;
	left:640px;
	top:115px;
	width:115px;
	height:15px;
	z-index:27;
}
#apDiv11 {
	position:absolute;
	left:0px;
	top:115px;
	width:319px;
	height:15px;
	z-index:28;
}
#apDiv12 {
	position:absolute;
	left:369px;
	top:115px;
	width:144px;
	height:15px;
	z-index:29;
}
#apDiv13 {
	position:absolute;
	left:544px;
	top:115px;
	width:86px;
	height:15px;
	z-index:30;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 0.7em;
}
#apDiv14 {
	position:absolute;
	left:415px;
	top:139px;
	width:28px;
	height:15px;
	z-index:31;
}
#apDiv15 {
	position:absolute;
	left:450px;
	top:91px;
	width:124px;
	height:15px;
	z-index:32;
}
#apDiv16 {
	position:absolute;
	left:450px;
	top:139px;
	width:188px;
	height:15px;
	z-index:33;
}
#apDiv17 {
	position:absolute;
	left:0px;
	top:210px;
	width:53px;
	height:15px;
	z-index:34;
}
#apDiv18 {
	position:absolute;
	left:570px;
	top:210px;
	width:30px;
	height:15px;
	z-index:35;
}
#apDiv19 {
	position:absolute;
	left:249px;
	top:139px;
	width:211px;
	height:15px;
	z-index:36;
}
#apDiv20 {
	position:absolute;
	left:640px;
	top:142px;
	width:73px;
	height:15px;
	z-index:37;
}
#apDiv21 {
	position:absolute;
	left:95px;
	top:210px;
	width:353px;
	height:15px;
	z-index:38;
}
#apDiv22 {
	position:absolute;
	left:583px;
	top:210px;
	width:75px;
	height:15px;
	z-index:39;
}
#apDiv23 {
	position:absolute;
	left:655px;
	top:764px;
	width:75px;
	height:15px;
	z-index:40;
}
#apDiv24 {
	position:absolute;
	left:679px;
	top:1042px;
	width:142px;
	height:15px;
	z-index:41;
}
.style5 {font-family: "Times New Roman", Times, serif; font-size: 0.7em; }
.style6 {font-family: Arial, Helvetica, sans-serif}
.style7 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1em;
	font-weight: bold;
}
#apDiv25 {
	position:absolute;
	left:655px;
	top:791px;
	width:75px;
	height:15px;
	z-index:42;
}
#apDiv26 {
	position:absolute;
	left:655px;
	top:210px;
	width:75px;
	height:16px;
	z-index:43;
}
#apDiv27 {
	position:absolute;
	left:0px;
	top:240px;
	width:53px;
	height:15px;
	z-index:44;
}
#apDiv28 {
	position:absolute;
	left:95px;
	top:240px;
	width:353px;
	height:15px;
	z-index:45;
}
#apDiv29 {
	position:absolute;
	left:570px;
	top:240px;
	width:112px;
	height:15px;
	z-index:46;
}
#apDiv30 {
	position:absolute;
	left:583px;
	top:240px;
	width:75px;
	height:15px;
	z-index:47;
}
#apDiv31 {
	position:absolute;
	left:655px;
	top:240px;
	width:75px;
	height:15px;
	z-index:48;
}
-->
</style>
</head>

<body>
<div class="style1" id="apDiv1"><?php echo $row_Recordset2['cpf']; ?></div>
<div class="style7" id="apDiv2"><?php echo $row_Recordset2['Cod_Equipamento']; ?></div>
<div class="style1" id="apDiv3"><?php echo $row_Recordset2['saida']; ?></div>
<div class="style1" id="apDiv4"><?php echo $row_Recordset2['entrada']; ?></div>
<div class="style1" id="apDiv5"><?php echo $row_Recordset2['insc_substituto']; ?></div>
<div class="style1" id="apDiv7"><?php echo $row_Recordset2['Cliente']; ?></div>
<div class="style1" id="apDiv8"><?php echo $row_Recordset2['Municipio']; ?></div>
<div class="style1" id="apDiv9"><?php echo $row_Recordset2['data_emissao']; ?></div>
<div class="style1" id="apDiv10"><?php echo $row_Recordset2['data_saida']; ?></div>
<div class="style1" id="apDiv11"><?php echo $row_Recordset2['Endereco']; ?></div>
<div class="style1" id="apDiv12"><?php echo $row_Recordset2['Bairro']; ?></div>
<div class="style1" id="apDiv13"><?php echo $row_Recordset2['cep']; ?></div>
<div class="style5 style6" id="apDiv14"><?php echo $row_Recordset2['Estado']; ?></div>
<div class="style2" id="apDiv16"><?php echo $row_Recordset2['inscricao']; ?><br />
</div>
<div class="style2" id="apDiv17"><?php echo $row_Recordset2['Unidade']; ?></div>
<div class="style2" id="apDiv18"><?php echo $row_Recordset2['Quant1']; ?></div>
<div class="style2" id="apDiv19"><?php echo $row_Recordset2['Fone']; ?></div>
<div class="style2" id="apDiv20"><?php echo $row_Recordset2['hora_saida']; ?></div>
<div class="style2" id="apDiv21"><?php echo $row_Recordset2['Prod1']; ?></div>
<div class="style6" id="apDiv22">
  <div align="right" class="style2"><?php echo $row_Recordset2['Valor1']; ?></div>
</div>
<div class="style6" id="apDiv23">
  <div align="right" class="style2"><?php echo $row_Recordset2['Vl_Total_Produtos']; ?></div>
</div>
<div class="style7" id="apDiv24"><?php echo $row_Recordset2['Cod_Equipamento']; ?></span></div>
<div class="style6" id="apDiv25">
  <div align="right" class="style2"><?php echo $row_Recordset2['Vl_Total_Nota']; ?></div>
</div>
<div class="style2" id="apDiv26">
  <div align="right"><?php echo $row_Recordset2['Vl_Total']; ?></div>
</div>
<p class="style1">&nbsp;</p>
<p class="style1"></p>
<div class="style1" id="apDiv41"><?php echo $row_Recordset2['cfop']; ?></div>
<p class="style1">&nbsp;</p>
<div class="style2" id="apDiv6"><?php echo $row_Recordset2['natureza']; ?></div>
</body>
</html>
<?php
mysql_free_result($Recordset2);

mysql_free_result($Recordset2);
?>
