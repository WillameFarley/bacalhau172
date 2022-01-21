<?php require_once('Connections/data.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "1";
$MM_donotCheckaccess = "false";

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
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "restrito.php";
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

$currentPage = $_SERVER["PHP_SELF"];

if ((isset($_GET['codigo'])) && ($_GET['codigo'] != "")) {
  $deleteSQL = sprintf("DELETE FROM cliente WHERE codigo=%s",
                       GetSQLValueString($_GET['codigo'], "int"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($deleteSQL, $data) or die(mysql_error());

  $deleteGoTo = "fechar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM cliente ORDER BY codigo ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $data) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false && 
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form id="form1" name="form1" method="get" action="exx_clientes.php">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="15"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td><span class="style7 style13 style13"><b>SYSESTOQUE ::: BACALHAU 172<br />
            <b><b><a href="fechar.php"> Fechar Janela</a></b></b></b></span></td>
    </tr>
  </table>
  <table border="0" cellspacing="2" cellpadding="2" >
    <tr>
      <td width="263"><strong>Nome: <br />
            <?php echo $row_Recordset1['nome']; ?><br />
          </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220"><strong>CPF 
        / CNPJ: <br />
        </strong><?php echo $row_Recordset1['cpf']; ?><strong><br />
          </strong></td>
    </tr>
    <tr>
      <td width="263"><strong>Endere&ccedil;o: <br />
            </strong><?php echo $row_Recordset1['endereco']; ?><strong><br />
                  </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220"><p><strong>Bairro: </strong><br />
        <?php echo $row_Recordset1['bairro']; ?><br />
          </p></td>
    </tr>
    <tr>
      <td width="263"><strong>Cidade: <br />
        </strong><?php echo $row_Recordset1['cidade']; ?><strong><br />
          </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Estado: </strong><?php echo $row_Recordset1['estado']; ?><br />              </td>
    <td><strong>Cep.: </strong><?php echo $row_Recordset1['cep']; ?><br />          </td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td width="263"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><strong>Fone 
            Comercial:</strong><br />
            <?php echo $row_Recordset1['fone_com']; ?><br />              </td>
            <td><strong>Fone 
                  Residencial:</strong><br />
              <?php echo $row_Recordset1['fone_res']; ?><br />              </td>
          </tr>
      </table></td>
      <td width="30">&nbsp;</td>
      <td width="220"><strong>Celular:  </strong><?php echo $row_Recordset1['celular']; ?><strong><br />
                </strong></td>
    </tr>
    <tr>
      <td width="263" valign="top"><strong>E-Mail: <br />
        </strong><?php echo $row_Recordset1['email']; ?><strong><br />
          </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220"><strong>Codigo: <?php echo $row_Recordset1['codigo']; ?></strong></td>
    </tr>
    <tr>
      <td height="35" colspan="3" align="center"><div align="right">
        
          <input type="submit" name="button" id="button" value="Excluir Cadastro" />
      </div></td>
    </tr>
    <input type="hidden" name="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
  </table>
    
  <table border="0">
    <tr>
      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="Imagens/First.gif" border="0" /></a>
      <?php } // Show if not first page ?>      </td>
      <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Imagens/Previous.gif" border="0" /></a>
      <?php } // Show if not first page ?>      </td>
      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Imagens/Next.gif" border="0" /></a>
      <?php } // Show if not last page ?>      </td>
      <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Imagens/Last.gif" border="0" /></a>
      <?php } // Show if not last page ?>      </td>
    </tr>
  </table>
  </form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
