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
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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

$maxRows_Recordset2 = 15;
$pageNum_Recordset2 = 0;

if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['fantasia'])) {
  $colname_Recordset2 = $_GET['fantasia'];
}
mysql_select_db($database_data, $data);
$query_Recordset2 = sprintf("SELECT * FROM cliente WHERE fantasia LIKE %s", GetSQLValueString("%" . $colname_Recordset2 . "%", "text"));
$Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = "-1";
if (isset($_GET['fantasia'])) {
  $totalRows_Recordset2 = $_GET['fantasia'];
}
$colname_Recordset2 = "-1";

mysql_select_db($database_data, $data);
$query_Recordset2 = "SELECT * FROM cliente WHERE fantasia LIKE '%' ORDER BY nome ASC";
$Recordset2 = mysql_query($query_Recordset2, $data) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="63"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
    <td width="92"><strong><b>SYSESTOQUE ::: BACALHAU 172</b><br />
        <b><b><a href="fechar.php">Fechar Janela</a></b></b></strong></td>
    <td width="303"><table border="0">
      <tr>
        <td><img src="Imagens/First.gif" border="0" /></td>
        <td><img src="Imagens/Previous.gif" border="0" /></td>
        <td><img src="Imagens/Next.gif" border="0" /></td>
        <td><img src="Imagens/Last.gif" border="0" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><strong><br />
    <br />
    <a href="excluir_cliente.php?codigo=<?php echo $row_Recordset2['codigo']; ?>"></a></strong></td>
    <td colspan="2"><table width="100%" height="56" border="0">
        <tr bgcolor="#FFFFCC">
          <td height="18" align="center"><strong>C&Oacute;DIGO</strong></td>
          <td align="center"><strong>CLIENTE</strong></td>
          <td align="center"><strong>RAZ&Atilde;O SOCIAL</strong></td>
          <td align="center"><strong>NOME DE FANTASIA</strong></td>
          <td align="center"><strong>CPF / CNPJ</strong></td>
          <td colspan="2" align="center"><strong>A&Ccedil;&Atilde;O</strong></td>
        </tr>
        <tr>
          <td height="24"><a href="cliente_visualizax.php?recordID=
		      <?php echo $row_Recordset2['codigo']; ?>" class="style18"> <?php echo $row_Recordset2['codigo']; ?></a></td>
          <td><?php echo $row_Recordset2['nome']; ?></td>
          <td><?php echo $row_Recordset2['nome_razao']; ?></td>
          <td><?php echo $row_Recordset2['fantasia']; ?></td>
          <td><?php echo $row_Recordset2['cpf']; ?></td>
          <td><strong><a href="excluir_cliente.php?codigo=<?php echo $row_Recordset2['codigo']; ?>">EXCLUIR</a></strong></td>
          <td><strong>EDITAR</strong></td>
        </tr>
    </table>    </td>
  </tr>
</table>
</p>
<a href="busca_cliente_nome.php" class="style19">Fazer nova busca</a>
</body>
</html>
<?php
mysql_free_result($Recordset2);

?>