<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body,td,th {
	font-size: 0.9em;
}
body {
	margin-left: 7px;
	margin-bottom: 0px;
	margin-top: 0px;
	margin-right: 0px;
}
.style3 {font-size: 9px}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #FF0000;
}
a:active {
	text-decoration: none;
	color: #000000;
}
-->
</style></head>

<body>
<table width="600" height="110" border="0" align="center">
  <tr>
    <td height="32" colspan="3"><div align="left"><b>SYSESTOQUE ::: BACALHAU 172<br /> 
    Menu Principal</b></div></td>
    <td><div align="right"><span class="style3">Desenvolvido por:</span><br />
      <a href="sobre.php" target="center"><img src="Imagens/Wg2Net.png" alt="WG2Net - Desenvolvendo Soluções" width="85" height="40" border="0" longdesc="http://www.wg2net.com.br" /><br />
    </div></td>
  </tr>
  <tr align="center" valign="middle">
    <td width="150" height="120" valign="middle"><a href="submenu2.php" target="center"><img src="Imagens/cad_clientes.jpg" alt="" width="50" height="55" border="0" /></a><br />
      <a href="submenu2.php" target="center">Cadastro de<br />
Clientes</a></td>
    <td width="150"><img src="Imagens/pedidos.jpg" alt="" width="50" height="50" border="0" /><br />
      Cadastrar<br />
      Novos
    Pedidos</td>
<td width="150"><a href="submenu3.php" target="center"><img src="Imagens/funcionarios.png" alt="" width="50" height="50" border="0" /></a><br />
  <a href="submenu3.php" target="center">Cadastro de Funcion&aacute;rios</a></td>
<td width="100"><a href="<?php echo $logoutAction ?>"><img src="Imagens/sair.png" alt="" width="50" height="50" border="0" /></a><br />
        <a href="<?php echo $logoutAction ?>">Finalizar<br />
    SysEstoque</a></td>
  </tr>
</table>
<div align="center">
<iframe name="center" align="top" src="center.php" frameborder="0" scrolling="auto" width="1010" height="465"></iframe></div>
</body>
</html>