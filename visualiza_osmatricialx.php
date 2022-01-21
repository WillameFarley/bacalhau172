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
    <td colspan="2"><span class="style9">Dados do Pedido</span></td>
    <td width="32%"><strong>Pedido nº: <?php echo $row_DetailRS1['Cod_Equipamento']; ?></strong></td>
  </tr>
  <tr>
    <td width="41%"><font color="#000000">VENDEDOR: <strong><?php echo $row_DetailRS1['Funcionario']; ?></strong></font></td>
    <td width="27%">DATA: <strong><?php echo $row_DetailRS1['Data_Entrada']; ?></strong></td>
    <td>HORA 
    DA ENTREGA:<?php echo $row_DetailRS1['Hora_Entrada']; ?></td>
  </tr>
  <tr>
    <td>CLIENTE: <strong><?php echo $row_DetailRS1['Cliente']; ?></strong></td>
    <td>CNPJ/CPF: <?php echo $row_DetailRS1['cpf']; ?></td>
    <td>E-MAIL: <?php echo $row_DetailRS1['email']; ?></td>
  </tr>
  <tr>
    <td>ENDEREÇO: <strong><?php echo $row_DetailRS1['endereco']; ?></strong></td>
    <td>BAIRRO: <?php echo $row_DetailRS1['bairro']; ?></td>
    <td>CIDADE: <?php echo $row_DetailRS1['cidade']; ?></td>
  </tr>
  <tr>
    <td>ESTADO: <?php echo $row_DetailRS1['estado']; ?></td>
    <td>CEP: <?php echo $row_DetailRS1['cep']; ?></td>
    <td>TELEFONES: <?php echo $row_DetailRS1['fone_com']; ?> / <?php echo $row_DetailRS1['fone_res']; ?> / <?php echo $row_DetailRS1['celular']; ?></td>
  </tr>
  <tr>
    <td>PRODUTO: <?php echo $row_DetailRS1['Equipamento']; ?></td>
    <td>QUANTIDADE: <?php echo $row_DetailRS1['Garantia']; ?></td>
    <td>QUEM RECEBE: <?php echo $row_DetailRS1['Patrimonio']; ?></td>
  </tr>
  <tr>
    <td colspan="2">OBSERVAÇÕES: <?php echo $row_DetailRS1['Problemacliente']; ?></td>
    <td>GARANTIA: <?php echo $row_DetailRS1['Garantia']; ?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;
    <p><br />
      ASSINATURA DO ATENDENTE&nbsp;&nbsp;&nbsp;</p>
    <p>&nbsp;</p></td>
    <td><p align="right">ASSINATURA DO CLIENTE</p>    </td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
