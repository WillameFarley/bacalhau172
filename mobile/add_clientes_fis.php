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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
$colname_rsVerificador = "-1";
if (isset($_POST['nome'])) {
  $colname_rsVerificador = $_POST['nome'];
}
mysql_select_db($database_data, $data);
$query_rsVerificador = sprintf("SELECT * FROM cliente WHERE nome = %s", GetSQLValueString($colname_rsVerificador, "text"));
$rsVerificador = mysql_query($query_rsVerificador, $data) or die(mysql_error());
$row_rsVerificador = mysql_fetch_assoc($rsVerificador);
$totalRows_rsVerificador = mysql_num_rows($rsVerificador);
mysql_free_result($rsVerificador);

    if ($totalRows_rsVerificador == 0) { // Show if recordset empty 
 $insertSQL = sprintf("INSERT INTO cliente (codigo, nome, cpf, email, celular, endereco, bairro, cidade, estado, cep) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['codigo'], "int"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['cep'], "text"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "fechar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}  // Show if recordset empty 

?>
<?php } // Show if recordset empty ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script>
function formatar(src, mask)
{
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
        src.value += texto.substring(0,1);
  }
}
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' deve conter um endereço valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' é um campo obrigatório.\n'; }
    } if (errors) alert('Os Seguintes erros foram encontrados:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
</script>
<script language="JavaScript">
<!--
function muda(qual)
{
uCase = qual.value.toUpperCase();
qual.value = uCase;
}
-->
</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail');return document.MM_returnValue">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="15"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td><span class="style7 style13 style13"><b>CADASTRO DE CLIENTES<br />
            <b><b><a href="center1.php" target="palco">Fechar Janela</a></b></b></b></span></td>
    </tr>
  </table>
  <table border="0" cellspacing="2" cellpadding="2" class="verdana" >
    <input type="hidden" name="codigo" />
    <tr>
      <td colspan="2"><font color="#666666"><b>Nome:</b><br />
            <input name="nome" type="text" class="select" id="nome" size="50" maxlength="80" onKeyUp="muda(this)"/>
      </font></td>
      <td width="30">&nbsp;</td>
      <td width="220"><b><font color="#666666"><b>CPF 
        / CNPJ:</b><br />
              <b>
              <input type="text" name="cpf" class="select" maxlength="15" size="18" />
            </b></font></b></td>
    </tr>
    <tr>
      <td colspan="2"><font color="#666666"><b>Endere&ccedil;o:</b><br />
            <b>
            <input name="endereco" type="text" class="select" id="endereco" size="50" maxlength="100" onKeyUp="muda(this)"/>
          </b></font></td>
      <td width="30">&nbsp;</td>
      <td width="220"><font color="#666666"><b>Bairro:</b><br />
            <b>
            <input type="text" name="bairro" class="select" maxlength="30" size="35" onKeyUp="muda(this)"/>
          </b></font></td>
    </tr>
    <tr>
      <td colspan="2"><font color="#666666"><b>Cidade:</b><br />
            <b>
            <input name="cidade" type="text" class="select" onKeyUp="muda(this)" value="CABO FRIO" size="35" maxlength="30"/>
          </b><br />
      </font></td>
      <td width="30" rowspan="2">&nbsp;</td>
      <td width="220" rowspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td width="154"><font color="#666666"><b>Estado:</b><br />
          <select name="estado" size="1" class="select">
            <option value="RJ">Rio de Janeiro</option>
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amap&aacute;</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Cear&aacute;</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Esp&iacute;rito Santo</option>
            <option value="GO">Goi&aacute;s</option>
            <option value="MA">Maranh&atilde;o</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Par&aacute;</option>
            <option value="PB">Para&iacute;ba</option>
            <option value="PR">Paran&aacute;</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piau&iacute;</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rond&ocirc;nia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">S&atilde;o Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
      </font></td>
      <td width="140"><font color="#666666"><b>Cep.:</b><br />
          <b>
          <input type="text" name="cep" class="select" maxlength="9" size="15" onkeypress="formatar(this, '#####-###')"/>
          </b></font></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
          <tr>
            <td><font color="#666666"><b>Fone 
              Comercial:</b><br />
                        <b>
                        <input type="text" name="foneC" class="select" maxlength="36" size="35" />
                        <br />
                        Fone 
              Resid:</b><br />
              <b>
              <input type="text" name="foneR" class="select" maxlength="36" size="35" />
              </b><b><br />
              Celular:<br />
              <input type="text" name="celular" class="select" maxlength="36" size="35" />
<br />
              </b></font></td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
      <td width="30">&nbsp;</td>
      <td width="220"><font color="#666666"><br />
      </font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><font color="#666666"><b>E-Mail:</b><br />
            <b>
            <input name="email" type="text" class="select" id="email" size="40" maxlength="50" />
          </b> </font></td>
      <td width="30">&nbsp;</td>
      <td width="220">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" height="35" align="center"><div align="right"> 
          <input type="submit" name="Submit" id="button" value="Efetuar Cadastro" />
          <input type="reset" name="button2" id="button2" value="Limpar Campos" />
      </div></td>
    </tr>
    <tr>
      <td colspan="4" height="35" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" height="35" align="center">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" height="35" align="center">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>
  <?php if ($totalRows_rsVerificador > 0) { // Show if recordset not empty ?>
   <span class="style1">Este cadastro não pôde ser realizado, pois o mesmo já se encontra cadastrado em nosso sistema!</span>
     <?php } // Show if recordset not empty ?>
  <br />
</p>
</body>
</html>

