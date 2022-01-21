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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {	font-size: 16px;
	color: #FF0000;
	font-family: "Comic Sans MS";
}
-->
</style>
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="15"><div align="center" class="style13 style13"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
    <td class="style7 style13 style13"><p><b><span class="style1">NOVA NOTA FISCAL</span><br />
      SYSESTOQUE ::: BACALHAU 172<br />
        <b><b><a href="fechar.php"> Fechar Janela</a></b></b></b></p></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form id="form1" name="form1" method="get" action="addnota_cliente1.php">
      <table width="551" border="0">
        <tr>
          <td width="241" class="style7 style13 style13"><div align="right">Localizar Cliente pelo Nome de Fantasia:</div></td>
            <td width="300"><div align="right">
              <span class="style7 style13 style13">
                <input name="nome" type="text" id="nome" size="50" />
              </span></div></td>
          </tr>
        <tr>
          <td colspan="2">
            <div align="center"><span class="style7 style13 style13">
              <input type="submit" name="button" id="button" value="Buscar" />
            </span></div></td>
          </tr>
        </table>
    </form></td>
  </tr>
</table>
</body>
</html>