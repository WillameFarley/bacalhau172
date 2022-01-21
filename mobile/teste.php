<?php // phpinfo(); exit(); ?>

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
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['textfield'])) {
  $loginUsername=$_POST['textfield'];
  $password=$_POST['textfield2'];
  $MM_fldUserAuthorization = "nivel";
  $MM_redirectLoginSuccess = "menu.php";
  $MM_redirectLoginFailed = "menux.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_data, $data);
  	
  $LoginRS__query=sprintf("SELECT login, senha, nivel FROM funcionario WHERE login=%s AND senha=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $data) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'nivel');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bacalhau 172</title>
<link href="boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/stylehome.css" rel="stylesheet" type="text/css">
<style type="text/css">
.style2 {font-size: 9px}
.style3 {font-size: 1px}
</style>
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="respond.min.js"></script>
</head>
<body>
<div class="gridContainer clearfix">
  <div id="LayoutDiv1">
    <table width="100%" border="0" cellspacing=" 0" cellpadding="0">
      <tr>
        <td width="15">&nbsp;</td>
        <td><table width="70%" border="0" align="center" cellpadding="0" cellspacing=" 0">
          <tr>
            <td><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
              <tr>
                <td width="15">&nbsp;</td>
                <td><p align="center"><img src="Imagens/loco_bacalhau.jpg" alt="" width="221" height="215" /></p></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td valign="top"><div align="center">Acesso 
              Restrito<br />
              Digite seu 
              usuário e senha<br>
              e clique no bot&atilde;o 
              acessar
              <br />
              <form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1">
              <table border="0" cellspacing="2" cellpadding="2" class="texto" align="center">
                <tr>
                  <td align="right"><b>Usuário:</b></td>
                  <td>&nbsp;
                    <input name="textfield" type="text" size="5" /></td>
                </tr>
                <tr>
                  <td align="right"><b>Senha:</b></td>
                  <td>&nbsp;
                    <input name="textfield2" type="password" size="5" /></td>
                </tr>
                <tr align="center">
                  <td colspan="2"><div align="center">
                    <input type="submit" name="Submit" value="Acessar" />
                    <br />
                  </div></td>
                </tr>
              </table>
              </form>
            </div></td>
          </tr>
          <tr>
            <td valign="top"><div align="center"><span class="style3 style2">Desenvolvido por:</span><br />
              <img src="Imagens/Wg2Net.png" alt="WG2Net - Desenvolvendo Soluções" width="85" height="40" border="0" longdesc="http://www.wg2net.com.br" /><br />
              </div></td>
          </tr>
        </table>          <p align="center">&nbsp;</p></td>
      </tr>
    </table>
  
  </div>
</div>
</body>
</html>
