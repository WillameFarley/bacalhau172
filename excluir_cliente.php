<?php require_once('Connections/data.php'); ?>
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

if ((isset($_GET['codigo'])) && ($_GET['codigo'] != "")) {
  $deleteSQL = sprintf("DELETE FROM cliente WHERE codigo=%s",
                       GetSQLValueString($_GET['codigo'], "int"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($deleteSQL, $data) or die(mysql_error());

  $deleteGoTo = "busca_cliente_excluir.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rsExcluir = "-1";
if (isset($_GET['codigo'])) {
  $colname_rsExcluir = $_GET['codigo'];
}
mysql_select_db($database_data, $data);
$query_rsExcluir = sprintf("SELECT * FROM cliente WHERE codigo = %s", GetSQLValueString($colname_rsExcluir, "int"));
$rsExcluir = mysql_query($query_rsExcluir, $data) or die(mysql_error());
$row_rsExcluir = mysql_fetch_assoc($rsExcluir);
$totalRows_rsExcluir = mysql_num_rows($rsExcluir);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
</head>

<body>
</body>
</html>
<form method="post" action="" id="deletarCliente">
<p>Você deseja realmente excluir o cliente?</p>
<input type="submit" value="Sim" />
<input type="hidden" nome="codigo" value="<?php echo $_GET['codigo'];?>"/>
<input type="submit" value="Não" />


</form>


<?php
mysql_free_result($rsExcluir);
?>
