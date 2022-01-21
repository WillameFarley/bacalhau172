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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO funcionario (nome, apelido, cargo, setor, cpf, rg, ctps, data_nasc, estado_civil, email, celular, escolaridade, situacao, ano, endereco, bairro, cidade, estado, cep, login, senha, nivel) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['apelido'], "text"),
                       GetSQLValueString($_POST['cargo'], "text"),
                       GetSQLValueString($_POST['setor'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['ctps'], "text"),
                       GetSQLValueString($_POST['data_nasc'], "text"),
                       GetSQLValueString($_POST['estado_civil'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['escolaridade'], "text"),
                       GetSQLValueString($_POST['situacao'], "text"),
                       GetSQLValueString($_POST['ano'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['cep'], "text"),
                       GetSQLValueString($_POST['login'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['nivel'], "text"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "fechar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
.style1 {font-weight: bold}
-->
</style>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail','login','','R','senha','','R');return document.MM_returnValue">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="15"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td><b>SYSESTOQUE ::: BACALHAU 172<br />
          <b><b><a href="center1.php" target="palco">Fechar Janela</a></b></b></b></td>
    </tr>
  </table>
  <table border="0" cellspacing="2" cellpadding="2" class="verdana" >
  <tr>
    <td width="263" colspan="2"><b>Nome:</b>
      <input name="nome" type="text" class="select" id="nome" size="50" maxlength="80" onKeyUp="muda(this)"/>
      <br /></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>Nome 
      pelo qual gosta de ser chamado:<br />
              <input type="text" name="apelido" class="select" maxlength="80" size="40" onKeyUp="muda(this)"/>
    </b></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><b>Cargo:<br />
            <input type="text" name="cargo" class="select" maxlength="80" size="45" onKeyUp="muda(this)"/>
    </b></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>Setor:<br />
            <input type="text" name="setor" class="select" maxlength="80" size="40" onKeyUp="muda(this)"/>
    </b></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td width="47%"><b>CPF:</b><br />
                <b>
                <input type="text" name="cpf" class="select" maxlength="11" size="18" onblur="return submit_page(this);" />
                </b></td>
        <td width="53%"><b>RG:</b><br />
                <b>
                <input type="text" name="rg" class="select" maxlength="30" size="18" />
                </b></td>
      </tr>
    </table></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>CTPS:</b><br />
          <b>
          <input type="text" name="ctps" class="select" maxlength="30" size="30" />
          </b></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td><b>Data 
          de Nascimento:</b><br />
                        <b>
                        <input type="text" name="data_nasc" class="select" maxlength="10" size="15" OnKeyPress="formatar(this, '##/##/####')"/>
                        </b></td>
        <td><b>Tipo 
          Sangu&iacute;neo:</b><br />
                        <b>
                        <input type="text" name="sangue" class="select" maxlength="15" size="15" onKeyUp="muda(this)"/>
                        </b></td>
      </tr>
    </table></td>
    <td width="30">&nbsp;</td>
    <td width="220"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td><b>Estado 
          Civil:</b><br />
                        <b>
                        <select name="estado_civil" class="select">
                          <option value="Solteiro(a)">Solteiro(a)</option>
                          <option value="Casado(a)">Casado(a)</option>
                          <option value="Viúvo(a)">Vi&uacute;vo(a)</option>
                          <option value="Separado(a)">Separado(a)</option>
                        </select>
                        </b></td>
        <td><b>N&uacute;mero 
          de filhos:</b><br />
                        <b>
                        <input name="filhos" type="text" class="select" value="0" size="15" maxlength="10" />
                        </b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><b>Endere&ccedil;o:</b><br />
          <b>
          <input type="text" name="endereco" class="select" maxlength="100" size="50" onKeyUp="muda(this)"/>
          </b></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>Bairro:</b><br />
          <b>
          <input type="text" name="bairro" class="select" maxlength="30" size="35" onKeyUp="muda(this)"/>
          </b></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><b>Cidade:</b><br />
          <b>
          <input type="text" name="cidade" class="select" maxlength="30" size="35" value="CABO FRIO" onKeyUp="muda(this)"/>
          </b> </td>
    <td width="30">&nbsp;</td>
    <td width="220"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td><b>Estado:</b><br />
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
                </select>        </td>
        <td><b>Cep.:</b><br />
                <b>
                <input type="text" name="cep" class="select" maxlength="9" size="15" OnKeyPress="formatar(this, '#####-###')"/>
                </b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td><b>Fone 
          Comercial:</b><br />
                        <b>
                        <input type="text" name="foneC" class="select" maxlength="13" size="15" />
                        </b></td>
        <td><b>Fone 
          Residencial:</b><br />
                        <b>
                        <input type="text" name="foneR" class="select" maxlength="13" size="15" />
                        </b></td>
      </tr>
    </table></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>Celular:</b><br />
          <b>
          <input type="text" name="celular" class="select" maxlength="13" size="15" />
          </b></td>
  </tr>
  <tr>
    <td colspan="4"><b>Escolaridade:</b><br />
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
          <tr>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="1º Grau" />
              1&ordm; Grau</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="2º Grau" />
              2&ordm; Grau</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="3º Grau" />
              3&ordm; Grau</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="Pós Graduado" />
            </strong> <strong>P&oacute;s Graduado</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="Mestrado" />
              Mestrado</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="Doutorado" />
              Doutorado</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="escolaridade" value="Pós Doutorado" />
              P&oacute;s Doutorado</strong></td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><b>Situa&ccedil;&atilde;o:<br />
      </b> 
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
          <tr>
            <td class="tahoma"><strong>
              <input type="radio" name="situacao" value="Completo" />
              Completo</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="situacao" value="Incompleto" />
              Incompleto</strong></td>
            <td class="tahoma"><strong>
              <input type="radio" name="situacao" value="Cursando" />
              Cursando</strong></td>
          </tr>
      </table></td>
    <td width="30">&nbsp;</td>
    <td width="220"><b>Qual 
      Ano:<br />
              <input type="text" name="ano" class="select" maxlength="5" size="10" />
     </b></td>
  </tr>
  <tr>
    <td width="263" colspan="2" valign="top"><b>E-Mail:</b><br />
          <b>
          <input name="email" type="text" class="select" id="email" size="40" maxlength="50" />
          </b> </td>
    <td width="30" rowspan="3">&nbsp;</td>
    <td width="220" rowspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
      <tr>
        <td><b>Login:</b><br />
                <b>
                <input name="login" type="text" class="select" id="login" size="15" maxlength="15" />
                </b></td>
        <td><b>Senha:</b><br />
                <b>
                <input name="senha" type="password" class="select" id="senha" size="15" maxlength="15" />
                </b></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><strong>Nível:</strong></td>
    </tr>
  <tr>
    <td valign="top"><p>
      <label>
        <input name="nivel" type="radio" id="nivel_0" value="2" checked="checked" />
        <strong>        Operador</strong></label>
      <br />
      <label></label>
</p></td>
    <td valign="top"><label>
      <input type="radio" name="nivel" value="1" id="nivel_1" />
      <strong>Administrador</strong></label></td>
  </tr>
  <tr>
    <td colspan="4" height="35" align="center"><div align="right">
      <input type="submit" name="submit" id="submit" value="Efetuar Cadastro" />
      <input type="reset" name="Reset" id="button" value="Limpar Formulario" />
    </div></td>
  </tr>
  </table>
  <p>&nbsp;</p>
    <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>
</html>
