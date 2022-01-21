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
?>
<?php
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
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "menu.php";
  $MM_redirectLoginFailed = "menux.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_data, $data);
  
  $LoginRS__query=sprintf("SELECT login, senha FROM funcionario WHERE login=%s AND senha=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $data) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<form ACTION="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1">
  <table width="490px" border="0" align="center" cellpadding="0" cellspacing=" 0">
    <tr>
      <td><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
          <tr>
            <td><div align="left"><b>SYSESTOQUE ::: BACALHAU 172<br />
              Menu Principal</b></div></td>
            <td><div align="right"><span class="style3">Desenvolvido por:</span><br />
                    <img src="Imagens/Wg2Net.png" alt="WG2Net - Desenvolvendo Soluções" width="85" height="40" border="0" longdesc="http://www.wg2net.com.br" /><br />
            </div></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td valign="top"><div align="center"><span class="style1"><br />
        Usuario não encontrado.<br />
        Tente novamente ou entre em contato com o administrador.</span><br />
              <br />
              <br />
              <table border="0" cellspacing="2" cellpadding="2" class="texto" align="center">
                <tr>
                  <td align="right"><b>Usuário:</b></td>
                  <td>&nbsp;
                    <input type="text" name="textfield" />
                  </td>
                </tr>
                <tr>
                  <td align="right"><b>Senha:</b></td>
                  <td>&nbsp;
                    <input type="password" name="textfield2" />
                  </td>
                </tr>
                <tr align="center">
                  <td colspan="2"><div align="center">
                    <input type="submit" name="Submit" value="Acessar" />
                      <br />
                  </div></td>
                </tr>
              </table>
              <p><img src="Imagens/loco_bacalhau.JPG" width="294" height="287" /></p>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
