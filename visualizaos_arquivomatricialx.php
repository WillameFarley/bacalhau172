<?php require_once('Connections/data.php'); ?><?php
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
?><?php
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style9 {
	font-size: 1.5em;
	font-weight: bold;
}
-->
</style>
</head>
 <script type="text/javascript">
self.print ();
  </script>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2"><span class="style9">seus dados</span></td>
    <td colspan="2">OS: <?php echo $row_DetailRS1['Cod_Equipamento']; ?></td>
  </tr>
  <tr>
    <td width="34%"><font color="#000000">T&Eacute;CNICO 
    RESPONS&Aacute;VEL <?php echo $row_DetailRS1['Funcionario']; ?></font></td>
    <td width="38%">DATA 
    ENTRADA <?php echo $row_DetailRS1['Data_Entrada']; ?></td>
    <td colspan="2">HORA 
    ENTRADA <?php echo $row_DetailRS1['Hora_Entrada']; ?></td>
  </tr>
  <tr>
    <td>RAZÃO SOCIAL/NOME: <?php echo $row_DetailRS1['Cliente']; ?></td>
    <td>CGC/CPF: <?php echo $row_DetailRS1['cpf']; ?></td>
    <td colspan="2">E-MAIL: <?php echo $row_DetailRS1['email']; ?></td>
  </tr>
  <tr>
    <td>ENDEREÇO: <?php echo $row_DetailRS1['endereco']; ?></td>
    <td>BAIRRO: <?php echo $row_DetailRS1['bairro']; ?></td>
    <td colspan="2">CIDADE: <?php echo $row_DetailRS1['cidade']; ?></td>
  </tr>
  <tr>
    <td>ESTADO: <?php echo $row_DetailRS1['estado']; ?></td>
    <td>CEP: <?php echo $row_DetailRS1['cep']; ?></td>
    <td colspan="2">TELEFONES: <?php echo $row_DetailRS1['fone_com']; ?>/<?php echo $row_DetailRS1['fone_res']; ?>/<?php echo $row_DetailRS1['celular']; ?></td>
  </tr>
  <tr>
    <td>EQUIPAMENTO: <?php echo $row_DetailRS1['Equipamento']; ?></td>
    <td>MARCA: <?php echo $row_DetailRS1['Marca']; ?></td>
    <td colspan="2">MODELO: <?php echo $row_DetailRS1['Modelo']; ?> </td>
  </tr>
  <tr>
    <td>Nº PATRIMONIO: <?php echo $row_DetailRS1['Patrimonio']; ?></td>
    <td>Nº SÉRIE: <?php echo $row_DetailRS1['Serie']; ?></td>
    <td colspan="2">SETOR: <?php echo $row_DetailRS1['Setor']; ?></td>
  </tr>
  <tr>
    <td colspan="2">DIAGNÓSTICO DO CLIENTE: <?php echo $row_DetailRS1['Problemacliente']; ?></td>
    <td colspan="2">GARANTIA: <?php echo $row_DetailRS1['Garantia']; ?></td>
  </tr>
  <tr>
    <td>PREVISÃO DO DIAGNÓSTICO: <?php echo $row_DetailRS1['Data_Agenda']; ?></td>
    <td colspan="3">HORA DO DIAGNÓSTICO: <?php echo $row_DetailRS1['Hora_Agenda']; ?></td>
  </tr>
  <tr>
    <td colspan="3">PREVISÃO DE ENTREGA: <?php echo $row_DetailRS1['Previsaoentrega']; ?></td>
    <td>DATA DE ENTREGA: <?php echo $row_DetailRS1['Dataentrega']; ?></td>
  </tr>
  <tr>
    <td colspan="2">DIAGNÓSTICO DO TÉCNICO: <?php echo $row_DetailRS1['DiagnosticoTecnico']; ?></td>
    <td colspan="2"><p>&nbsp;</p>    </td>
  </tr>
  <tr>
    <td>SOLUÇÃO: <?php echo $row_DetailRS1['Solucao']; ?></td>
    <td>RECEBIDO POR: <?php echo $row_DetailRS1['Recebido']; ?></td>
    <td colspan="2">VALOR: <?php echo $row_DetailRS1['valor']; ?></td>
  </tr>
  <tr>
    <td colspan="2"><p>&nbsp;</p>
      <p>ASSINATURA DO TÉCNICO&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;</p></td>
    <td colspan="2"><p align="right">ASSINATURA DO CLIENTE</p>
    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
