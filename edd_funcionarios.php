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

$currentPage = $_SERVER["PHP_SELF"];

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE funcionario SET nome=%s, apelido=%s, cargo=%s, setor=%s, cpf=%s, rg=%s, ctps=%s, data_nasc=%s, estado_civil=%s, numero_filhos=%s, tipo_sanguineo=%s, email=%s, fone_com=%s, fone_res=%s, celular=%s, escolaridade=%s, situacao=%s, ano=%s, endereco=%s, bairro=%s, cidade=%s, estado=%s, cep=%s, login=%s, senha=%s, nivel=%s WHERE codigo=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['apelido'], "text"),
                       GetSQLValueString($_POST['cargo'], "text"),
                       GetSQLValueString($_POST['setor'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['ctps'], "text"),
                       GetSQLValueString($_POST['data_nasc'], "text"),
                       GetSQLValueString($_POST['estado_civil'], "text"),
                       GetSQLValueString($_POST['filhos'], "text"),
                       GetSQLValueString($_POST['sangue'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['foneC'], "text"),
                       GetSQLValueString($_POST['foneR'], "text"),
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
                       GetSQLValueString($_POST['nivel'], "text"),
                       GetSQLValueString($_POST['codigo'], "int"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($updateSQL, $data) or die(mysql_error());

  $updateGoTo = "fechar.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM funcionario";
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script language="JavaScript">
<!--
function muda(qual)
{
uCase = qual.value.toUpperCase();
qual.value = uCase;
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
//-->
</script>
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

</script>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail','login','','R','senha','','R');return document.MM_returnValue">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="30"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td width="201"><strong><b>SYSESTOQUE ::: BACALHAU 172</b><br />
          <b><b><a href="center1.php" target="palco">Fechar Janela</a></b></b></strong></td>
      <td width="475"><table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="Imagens/First.gif" border="0" /></a>
              <?php } // Show if not first page ?>
          </td>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Imagens/Previous.gif" border="0" /></a>
              <?php } // Show if not first page ?>
          </td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Imagens/Next.gif" border="0" /></a>
              <?php } // Show if not last page ?>
          </td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Imagens/Last.gif" border="0" /></a>
              <?php } // Show if not last page ?>
          </td>
        </tr>
      </table></td>
    </tr>
  </table>
  <table border="0" cellspacing="2" cellpadding="2" >
  <tr>
    <td width="263" colspan="2" class="verdana"><strong>Nome:</strong><br />        <input name="nome" type="text" class="select" id="nome" onKeyUp="muda(this)" value="<?php echo $row_Recordset1['nome']; ?>" size="50" maxlength="80"/>      </td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Nome 
        pelo qual gosta de ser chamado:</strong><br />        <input name="apelido" type="text" class="select" value="<?php echo $row_Recordset1['apelido']; ?>" size="40" maxlength="80" onKeyUp="muda(this)"/>      </td>
  </tr>
  <tr>
    <td width="263" colspan="2" class="verdana"><strong>Cargo:</strong><br />        <input name="cargo" type="text" class="select" value="<?php echo $row_Recordset1['cargo']; ?>" size="45" maxlength="80" onKeyUp="muda(this)"/>      </td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Setor:</strong><br />        <input name="setor" type="text" class="select" value="<?php echo $row_Recordset1['setor']; ?>" size="40" maxlength="80" onKeyUp="muda(this)"/>      </td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="47%" class="verdana"><strong>CPF:</strong><br />
              <input name="cpf" type="text" class="select" onblur="return submit_page(this);" value="<?php echo $row_Recordset1['cpf']; ?>" size="18" maxlength="11" />          </td>
            <td width="53%" class="verdana"><strong>RG:</strong><br />
              <input name="rg" type="text" class="select" value="<?php echo $row_Recordset1['rg']; ?>" size="18" maxlength="30" />            </td>
          </tr>
    </table></td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>CTPS:</strong><br />
        <input name="ctps" type="text" class="select" value="<?php echo $row_Recordset1['ctps']; ?>" size="30" maxlength="30" />      </td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="verdana"><strong>Data 
          de Nascimento:</strong><br />
          <input name="data_nasc" type="text" class="select" value="<?php echo $row_Recordset1['data_nasc']; ?>" size="15" maxlength="10" />          </td>
            <td class="verdana"><strong>Tipo 
                Sangu&iacute;neo:</strong><br />
              <input name="sangue" type="text" class="select" value="<?php echo $row_Recordset1['tipo_sanguineo']; ?>" size="15" maxlength="15" />            </td>
          </tr>
    </table></td>
      <td width="30">&nbsp;</td>
      <td width="220"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana"><strong>Estado 
            Civil:</strong><br />
            
            <select name="estado_civil" class="select">
              <option value="SOLTEIRO(a)">Solteiro(a)</option>
              <option value="CASADO(a)">Casado(a)</option>
              <option value="VIÚVO(a)">Viúvo(a)</option>
              <option value="SEPARADO(a)">Separado(a)</option>
            </select>            </td>
            <td class="verdana"><strong>N&uacute;mero 
                de filhos:</strong><br />
              <input name="filhos" type="text" class="select" value="<?php echo $row_Recordset1['numero_filhos']; ?>" size="15" maxlength="10" />            </td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2" class="verdana"><strong>Endere&ccedil;o:</strong><br />
        <input name="endereco" type="text" class="select" value="<?php echo $row_Recordset1['endereco']; ?>" size="50" maxlength="100" onKeyUp="muda(this)"/>      </td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Bairro:</strong><br />
        <input name="bairro" type="text" class="select" value="<?php echo $row_Recordset1['bairro']; ?>" size="35" maxlength="30" onKeyUp="muda(this)"/>      </td>
  </tr>
  <tr>
    <td width="263" colspan="2" class="verdana"><strong>Cidade:</strong><br />
        <input type="text" name="cidade" class="select" maxlength="30" size="35" value="<?php echo $row_Recordset1['cidade']; ?>" onKeyUp="muda(this)"/>      </td>
      <td width="30">&nbsp;</td>
      <td width="220"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana"><strong>Estado:</strong><br />
              <select name="estado" size="1" class="select">
                <option value="RJ" <?php if (!(strcmp("RJ", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Rio de Janeiro</option>
                <option value="AC" <?php if (!(strcmp("AC", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Acre</option>
                <option value="AL" <?php if (!(strcmp("AL", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Alagoas</option>
                <option value="AP" <?php if (!(strcmp("AP", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Amap&aacute;</option>
                <option value="AM" <?php if (!(strcmp("AM", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Amazonas</option>
                <option value="BA" <?php if (!(strcmp("BA", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Bahia</option>
                <option value="CE" <?php if (!(strcmp("CE", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Cear&aacute;</option>
                <option value="DF" <?php if (!(strcmp("DF", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Distrito Federal</option>
                <option value="ES" <?php if (!(strcmp("ES", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Esp&iacute;rito Santo</option>
                <option value="GO" <?php if (!(strcmp("GO", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Goi&aacute;s</option>
                <option value="MA" <?php if (!(strcmp("MA", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Maranh&atilde;o</option>
                <option value="MT" <?php if (!(strcmp("MT", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Mato Grosso</option>
                <option value="MS" <?php if (!(strcmp("MS", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if (!(strcmp("MG", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Minas Gerais</option>
                <option value="PA" <?php if (!(strcmp("PA", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Par&aacute;</option>
                <option value="PB" <?php if (!(strcmp("PB", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Para&iacute;ba</option>
                <option value="PR" <?php if (!(strcmp("PR", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Paran&aacute;</option>
                <option value="PE" <?php if (!(strcmp("PE", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Pernambuco</option>
                <option value="PI" <?php if (!(strcmp("PI", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Piau&iacute;</option>
                <option value="RN" <?php if (!(strcmp("RN", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Rio Grande do Norte</option>
                <option value="RS" <?php if (!(strcmp("RS", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Rio Grande do Sul</option>
                <option value="RO" <?php if (!(strcmp("RO", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Rond&ocirc;nia</option>
                <option value="RR" <?php if (!(strcmp("RR", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Roraima</option>
                <option value="SC" <?php if (!(strcmp("SC", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Santa Catarina</option>
                <option value="SP" <?php if (!(strcmp("SP", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>S&atilde;o Paulo</option>
                <option value="SE" <?php if (!(strcmp("SE", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Sergipe</option>
                <option value="TO" <?php if (!(strcmp("TO", $row_Recordset1['estado']))) {echo "selected=\"selected\"";} ?>>Tocantins</option>
              </select>            </td>
            <td class="verdana"><strong>Cep.:</strong><br />
              <input name="cep" type="text" class="select" value="<?php echo $row_Recordset1['cep']; ?>" size="15" maxlength="9" OnKeyPress="formatar(this, '#####-###')"/>            </td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="verdana"><strong>Fone 
          Comercial:</strong><br />
          <input name="foneC" type="text" class="select" value="<?php echo $row_Recordset1['fone_com']; ?>" size="15" maxlength="13" />          </td>
            <td class="verdana"><strong>Fone 
                Residencial:</strong><br />
              <input name="foneR" type="text" class="select" value="<?php echo $row_Recordset1['fone_res']; ?>" size="15" maxlength="13" />            </td>
          </tr>
    </table></td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Celular:</strong><br />
        <input name="celular" type="text" class="select" value="<?php echo $row_Recordset1['celular']; ?>" size="15" maxlength="13" />      </td>
  </tr>
  <tr>
    <td colspan="4"><strong>Escolaridade:</strong><br />        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana">
            <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"1º Grau"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="1º Grau" />
            1&ordm; Grau</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"2º Grau"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="2º Grau" />
              2&ordm; Grau</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"3º Grau"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="3º Grau" />
              3&ordm; Grau</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"Pós Graduado"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="Pós Graduado" />
              P&oacute;s Graduado</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"Mestrado"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="Mestrado" />
              Mestrado</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"Doutorado"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="Doutorado" />
              Doutorado</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['escolaridade'],"Pós Doutorado"))) {echo "checked=\"checked\"";} ?> type="radio" name="escolaridade" value="Pós Doutorado" />
              P&oacute;s Doutorado</td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td width="263" colspan="2">Situa&ccedil;&atilde;o:<br />        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana">
            <input <?php if (!(strcmp($row_Recordset1['situacao'],"Completo"))) {echo "checked=\"checked\"";} ?> type="radio" name="situacao" value="Completo" />
            Completo</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['situacao'],"Incompleto"))) {echo "checked=\"checked\"";} ?> type="radio" name="situacao" value="Incompleto" />
              Incompleto</td>
            <td class="verdana">
              <input <?php if (!(strcmp($row_Recordset1['situacao'],"Cursando"))) {echo "checked=\"checked\"";} ?> type="radio" name="situacao" value="Cursando" />
              Cursando</td>
          </tr>
      </table></td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Qual 
      Ano:</strong><br />        <input name="ano" type="text" class="select" value="<?php echo $row_Recordset1['ano']; ?>" size="10" maxlength="5" />       </td>
  </tr>
  <tr>
    <td width="263" colspan="2" valign="top" class="verdana"><strong>E-Mail:</strong><br />
      <input name="email" type="text" class="select" id="email" value="<?php echo $row_Recordset1['email']; ?>" size="40" maxlength="50" /></td>
      <td width="30" rowspan="3">&nbsp;</td>
      <td width="220" rowspan="3"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana"><strong>Login:</strong><br />
              <input name="login" type="text" class="select" id="login" value="<?php echo $row_Recordset1['login']; ?>" size="15" maxlength="15" />            </td>
            <td class="verdana"><strong>Senha:</strong><br />
              <input name="senha" type="password" class="select" id="senha" value="<?php echo $row_Recordset1['senha']; ?>" size="15" maxlength="15" />            </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" class="verdana"><strong>Nível:</strong><br /></td>
  </tr>
  <tr>
    <td valign="top" class="verdana"><label>
      <input <?php if (!(strcmp($row_Recordset1['nivel'],"2"))) {echo "checked=\"checked\"";} ?> name="nivel" type="radio" id="nivel_0" value="2" />
      <strong> Operador</strong></label></td>
    <td valign="top" class="verdana"><input <?php if (!(strcmp($row_Recordset1['nivel'],"1"))) {echo "checked=\"checked\"";} ?> type="radio" name="nivel" value="1" id="nivel_1" />
      <strong>Administrador</strong></td>
  </tr>
  <tr>
    <td height="35" colspan="4" align="center"><div align="right">
      <span class="style50 ">
        <input type="submit" name="button2" id="button2" value="Editar Registro" />
      </span></div></td>
  </tr>
  </table>
  
  <input type="hidden" name="MM_update" value="form1" />
  <input name="codigo" type="hidden" id="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
