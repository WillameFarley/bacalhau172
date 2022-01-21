<?php require_once('Connections/data.php'); ?><?php require_once('Connections/data.php'); ?><?php
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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_data, $data);
$query_DetailRS1 = sprintf("SELECT * FROM cliente WHERE codigo = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $data) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #FF0000}
.style4 {color: #000000}
-->
</style>
</head>

<body>
<table width="920" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="30"><div align="center" class="style48 style68"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
    <td width="274"><strong><b>SYSESTOQUE ::: BACALHAU 172</b><br />
        <b><b><a href="fechar1.php">Fechar Janela</a></b></b></strong></td>
    <td><span class="verdana"><strong>Vendedor: <br />
    </strong><?php echo $row_DetailRS1['vendedor']; ?></span></td>
    <td><strong><strong>Data do Cadastro: <span class="style4"><br />
              <?php echo date('d/m/Y', strtotime($row_DetailRS1['data_cadastro']));
?></span></strong></strong><span class="style4"></span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="3"><table width="90%" border="0" cellpadding="2" cellspacing="2" >
      <tr>
        <td width="283" class="verdana"><strong>Nome: <br />
          </strong><?php echo $row_DetailRS1['nome']; ?><strong><br />
          </strong></td>
          <td width="109" class="verdana"><strong><strong>C&oacute;digo:<br />
          </strong><span class="style3"><?php echo $row_DetailRS1['codigo']; ?></span></strong></td>
          <td width="47">&nbsp;</td>
          <td class="verdana"><strong>CPF 
            / CNPJ: <br />
            </strong><?php echo $row_DetailRS1['cpf']; ?><strong><br />
            </strong></td>
          <td class="verdana"><strong><strong>Data de Nasc.:<br />
          </strong></strong><span class="style4"><?php echo date('d/m/Y', strtotime($row_DetailRS1['dn']));
?></span></td>
      </tr>
      <tr>
        <td colspan="2" class="verdana"><strong>Endere&ccedil;o: <br />
          </strong><?php echo $row_DetailRS1['endereco']; ?>, <?php echo $row_DetailRS1['numero1']; ?> - <?php echo $row_DetailRS1['complemento1']; ?> - <?php echo $row_DetailRS1['referencia1']; ?><br />
          <strong>Endere&ccedil;o 2: <br />
          </strong><?php echo $row_DetailRS1['endereco2']; ?><br />
          <strong>Endere&ccedil;o 3: <br />
          </strong><?php echo $row_DetailRS1['endereco3']; ?>          </td>
          <td width="47">&nbsp;</td>
          <td width="164" class="verdana"><strong>Bairro: </strong><br />
              <?php echo $row_DetailRS1['bairro']; ?><br />
              <strong>Bairro 2: </strong><br />
              <?php echo $row_DetailRS1['bairro2']; ?><br />
			<strong>Bairro 3: </strong><br />
              <?php echo $row_DetailRS1['bairro3']; ?>            </td>
          <td width="166" class="verdana"><strong>Cep. 1:<br />
          </strong><?php echo $row_DetailRS1['cep']; ?><BR />
          <strong>Cep. 2:<br />
          </strong><?php echo $row_DetailRS1['cep2']; ?><BR />
          <strong>Cep. 3:<br />
          </strong><?php echo $row_DetailRS1['cep3']; ?></td>
      </tr>
      <tr>
        <td class="verdana"><strong>Cidade: <br />
          </strong><?php echo $row_DetailRS1['cidade']; ?><strong><br />
          </strong></td>
          <td class="verdana"><strong>Estado:<br />
          </strong><?php echo $row_DetailRS1['estado']; ?></td>
          <td width="47">&nbsp;</td>
          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td class="verdana"><br />                </td>
                <td class="verdana"><br />                </td>
              </tr>
          </table></td>
      </tr>
      <tr>
        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="32%" class="verdana"><strong>Fone 
              Comercial:</strong><br />
              <?php echo $row_DetailRS1['fone_com']; ?><br />                </td>
                <td width="34%" class="verdana"><strong>Fone 
                    Residencial:</strong><br />
                  <?php echo $row_DetailRS1['fone_res']; ?><br />                </td>
                <td width="34%" class="verdana"><strong>Celular:<br />
                </strong><?php echo $row_DetailRS1['celular']; ?><strong></strong></td>
          </tr>
        </table></td>
          <td width="47">&nbsp;</td>
          <td colspan="2" class="verdana"><strong><br />
            </strong></td>
      </tr>
      <tr>
        <td height="30" colspan="2" valign="top" class="verdana"><strong>E-Mail: <br />
          </strong><?php echo $row_DetailRS1['email']; ?><strong><br />
          </strong></td>
          <td width="47">&nbsp;</td>
          <td colspan="2" class="verdana">&nbsp;</td>
      </tr>
      <tr>
        <td height="35" colspan="5" align="center" class="verdana">
          <div align="left"><strong>Mapa: <br />
            </strong><?php echo $row_DetailRS1['link_mapa']; ?><strong></strong>
            <script type="text/javascript">
self.print ();
          </script>
          </div></td>
      </tr>
      <input type="hidden" name="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
    </table></td>
  </tr>
</table>



</body>
</html>

<?php
mysql_free_result($DetailRS1);
?>
