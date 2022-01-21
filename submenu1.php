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
body,td,th {
	font-size: 0.9em;
}
-->
</style>
<style type="text/css">
ul.nav { 
	margin:0; 
	padding:0;
	}
	
ul.nav li {
	list-style:none;	
	display:inline;
	}
ul.nav li a {
	float:left;
	}
</style>
<style type="text/css">
ul.nav { 
	margin:0; 
	padding:0;
	}
	
ul.nav li {
	list-style:none;	
	display:inline;
	}
ul.nav li a {
	float:left;
	border:1px solid #f00;
	width:7.0em;
	font:0.68em  Verdana, Arial, Helvetica, 
	sans-serif;
	background:#f1f1f1;
	color:#333;
	text-align:center;
	padding:0  0.2em 0.2em  0;
	text-decoration:none;
	}
</style>
<style type="text/css">
ul.nav { 
	margin:0; 
	padding:0;
	}
	
ul.nav li {
	list-style:none;	
	display:inline;
	}
ul.nav li a {
	float:left;
	border:1px solid #f00;
	width:7.0em;
	font:0.68em  Verdana, Arial, Helvetica, 
	sans-serif;
	background:#f1f1f1;
	color:#333;
	text-align:center;
	padding:0  0.2em 0.2em  0;
	text-decoration:none;
	}
	ul.nav a:hover{
	background:#999;
	color:#fff;
	border-color:#00f;
	}
</style>
<style type="text/css">
	body {
	background:#ddd;
	margin:50px;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #DFFFFF;
	}
ul.nav { 
	margin:0; 
	padding:0;
	}
	
ul.nav li {
	list-style:none;	
	display:inline;
	}
ul.nav li a {
	float:left;
	border-top:0.1em solid #fff;
	border-right:0.1em solid #909090;
	border-bottom:0.1em solid #909090;
	border-left:0.1em solid #fff;
	width:7.0em;
	font:0.68em  Verdana, Arial, Helvetica, 
	sans-serif;
	background:#f1f1f1;
	color:#333;
	text-align:center;
	padding:0  0.2em 0.2em  0;
	text-decoration:none;
	}
ul.nav a:hover{
	background:#999;
	color:#fff;
	border-color:#000 #fafafa #fafafa #000;
	}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
}
</style>

</head>

<body>
<table width="1006" height="460" border="0" align="center">
  <tr>
    <td width="1004" height="0" bgcolor="#000000">
    <div align="center"><span class="style2">CADASTRO DE PEDIDOS</span></div></td>
  </tr>
  <tr>
    <td>
    <ul class="nav">
<li><a href="addos_cliente.php" target="palco">Novo<br />
  Pedido</a></li>
<li><a href="busca_os.php" target="palco">Localizar<br />
  Pedidos</a></li>
<li><a href="visualiza_os.php" target="palco">Vizualizar<br />
  Pedidos</a></li>
<li><a href="visualizaos_arquivo.php" target="center">Vizualizar<br />
  Arquivo </a></li>
<li><a href="center.php" target="center">Fechar<br />
  Pedido</a></li>
</ul></td>
  </tr>
  <tr>
    <td align="center" valign="top"><iframe name="palco" align="top" src="center1.php" frameborder="0" scrolling="auto" width="956" height="404"></iframe>
    </td>
  </tr>
</table>
</body>
</html>
