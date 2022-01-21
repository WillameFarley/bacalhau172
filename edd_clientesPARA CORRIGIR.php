<?php require_once('Connections/data.php'); ?>
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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE cliente SET nome=%s, nome_razao=%s, fantasia=%s, cpf=%s, email=%s, fone_com=%s, fone_res=%s, celular=%s, endereco=%s, endereco2=%s, endereco3=%s, bairro=%s, bairro2=%s, bairro3=%s, cidade=%s, estado=%s, link_mapa=%s, cep=%s, cep2=%s, cep3=%s, dn=%s, vendedor=%s, data_cadastro=%s, porcentagem=%s",
                       GetSQLValueString($_POST['nome'], "text"),
					   GetSQLValueString($_POST['nome_razao'], "text"),
					   GetSQLValueString($_POST['fantasia'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['fone_com'], "text"),
                       GetSQLValueString($_POST['fone_res'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
					   GetSQLValueString($_POST['endereco2'], "text"),
					   GetSQLValueString($_POST['endereco3'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
					   GetSQLValueString($_POST['bairro2'], "text"),
					   GetSQLValueString($_POST['bairro3'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['link_mapa'], "text"),
					   GetSQLValueString($_POST['cep'], "text"),
					   GetSQLValueString($_POST['cep2'], "text"),
					   GetSQLValueString($_POST['cep3'], "text"),
					   GetSQLValueString($_POST['dn'], "text"),
					   GetSQLValueString($_POST['vendedor'], "text"),
					   GetSQLValueString($_POST['data_cadastro'], "text"),
					   GetSQLValueString($_POST['porcentagem'], "text"),
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

$currentPage = $_SERVER["PHP_SELF"];

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 1;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM cliente";
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
      } } } else if (test.charAt(1000) == 'R') errors += '- '+nm+' é um campo obrigatório.\n'; }
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
<style type="text/css">
<!--
.style1 {color: #FF0000}
#apDiv1 {
	position:absolute;
	left:156px;
	top:58px;
	width:272px;
	height:17px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:170px;
	top:102px;
	width:216px;
	height:31px;
	z-index:2;
}
-->
</style>
</head>

<body>
<div id="apDiv1">
  <div align="right"><strong><strong>Codigo: <span class="style1"><?php echo $row_Recordset1['codigo']; ?></span></strong></strong></div>
</div>
<div id="apDiv2"><strong>Data de Nascimento:<br />
        <input name="dn" type="text" class="select" id="dn" value="<?php echo htmlentities($row_Recordset1['dn'], ENT_COMPAT, 'utf-8'); ?>" size="18" maxlength="15" />
</strong></div>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail');return document.MM_returnValue">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="30"><div align="center" class="style3 style27"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td width="354"><span class="style7 style13 style13"><b>SYSESTOQUE ::: BACALHAU 172</b></span><span class="style7 style13 style13"><b><br />
            <b><b><a href="fechar.php"> Fechar Janela</a></b></b></b></span></td>
      <td width="123"><table border="0">
        <tr>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, 0, $queryString_Recordset1); ?>"><img src="Imagens/First.gif" border="0" /></a>
            <?php } // Show if not first page ?>          </td>
          <td><?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"><img src="Imagens/Previous.gif" border="0" /></a>
            <?php } // Show if not first page ?>          </td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>"><img src="Imagens/Next.gif" border="0" /></a>
            <?php } // Show if not last page ?>          </td>
          <td><?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
              <a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, $totalPages_Recordset1, $queryString_Recordset1); ?>"><img src="Imagens/Last.gif" border="0" /></a>
            <?php } // Show if not last page ?>          </td>
        </tr>
      </table></td>
      <td width="122"><strong>Vendedor:<br />
        <input name="cpf2" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['vendedor'], ENT_COMPAT, 'utf-8'); ?>" size="18" maxlength="15" />
      </strong></td>
      <td width="51"><strong>%:<br />
        <input name="cpf3" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['porcentagem'], ENT_COMPAT, 'utf-8'); ?>" size="5" maxlength="5" />
      </strong></td>
      <td width="273"><strong>Data de Cadastro:<br />
          <input name="data_cadastro" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['data_cadastro'], ENT_COMPAT, 'utf-8'); ?>" size="18" maxlength="15" />
      </strong></td>
    </tr>
  </table>
  <table width="910" border="0" cellpadding="2" cellspacing="2" >
    <tr>
      <td width="263" class="verdana"><strong>Nome Pessoa Física:<br />
          <input name="nome" type="text" class="select" id="nome" onKeyUp="muda(this)" value="<?php echo htmlentities($row_Recordset1['nome'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="80"/><br />
      CPF 
        / CNPJ:<br />
        <input name="cpf" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['cpf'], ENT_COMPAT, 'utf-8'); ?>" size="18" maxlength="15" />
      </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220" colspan="2" class="verdana"><strong>Razão Social:<br />
          <input name="nome_razao" type="text" class="select" id="nome_razao" onkeyup="muda(this)" value="<?php echo htmlentities($row_Recordset1['nome_razao'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="80"/><br />
Nome de Fantasia:<br />
<input name="fantasia" type="text" class="select" id="fantasia" onkeyup="muda(this)" value="<?php echo htmlentities($row_Recordset1['fantasia'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="80"/>
      </strong></td>
    </tr>
    <tr>
      <td width="263" class="verdana"><strong>Endere&ccedil;o 1:<br />
            
        <input name="endereco" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['endereco'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="100" onKeyUp="muda(this)"/><br />
        Endere&ccedil;o 2:<br />
        <input name="endereco2" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['endereco2'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="100" onkeyup="muda(this)"/><br />
        Endere&ccedil;o 3:<br />
        <input name="endereco3" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['endereco3'], ENT_COMPAT, 'utf-8'); ?>" size="50" maxlength="100" onkeyup="muda(this)"/>
        </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220" class="verdana"><strong>Bairro 1:<br />
            
        <input name="bairro" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['bairro'], ENT_COMPAT, 'utf-8'); ?>" size="35" maxlength="30" onKeyUp="muda(this)"/><br />
      Bairro 2:<br />
      <input name="bairro2" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['bairro2'], ENT_COMPAT, 'utf-8'); ?>" size="35" maxlength="30" onkeyup="muda(this)"/><br />
      Bairro 3:<br />
      <input name="bairro3" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['bairro3'], ENT_COMPAT, 'utf-8'); ?>" size="35" maxlength="30" onkeyup="muda(this)"/>
</strong></td>
      <td width="109" class="verdana"><strong>Cep. 1:</strong><br />
        <input name="cep" type="text" class="select" id="cep" onkeypress="formatar(this, '#####-###')" value="<?php echo htmlentities($row_Recordset1['cep'], ENT_COMPAT, 'utf-8'); ?>" size="15" maxlength="9"/>
        <br />
      <strong>Cep. 2:</strong><br />
      <input name="cep2" type="text" class="select" id="cep2" onkeypress="formatar(this, '#####-###')" value="<?php echo htmlentities($row_Recordset1['cep2'], ENT_COMPAT, 'utf-8'); ?>" size="15" maxlength="9"/>
      <br />
      <strong>Cep. 3:</strong><br />
      <input name="cep3" type="text" class="select" id="cep3" onkeypress="formatar(this, '#####-###')" value="<?php echo htmlentities($row_Recordset1['cep3'], ENT_COMPAT, 'utf-8'); ?>" size="15" maxlength="9"/></td>
    </tr>
    <tr>
      <td width="263" class="verdana"><strong>Cidade:<br />
            
        <input name="cidade" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['cidade'], ENT_COMPAT, 'utf-8'); ?>" size="35" maxlength="30" onKeyUp="muda(this)"/>
        </strong></td>
      <td width="30">&nbsp;</td>
      <td width="220" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="verdana"><strong>Estado:</strong><br />
              <select name="estado" size="1" class="select">
                <option value="RJ" <?php if (!(strcmp("RJ", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Rio de Janeiro</option>
                <option value="AC" <?php if (!(strcmp("AC", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Acre</option>
                <option value="AL" <?php if (!(strcmp("AL", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Alagoas</option>
                <option value="AP" <?php if (!(strcmp("AP", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Amap&aacute;</option>
                <option value="AM" <?php if (!(strcmp("AM", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Amazonas</option>
                <option value="BA" <?php if (!(strcmp("BA", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Bahia</option>
                <option value="CE" <?php if (!(strcmp("CE", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Cear&aacute;</option>
                <option value="DF" <?php if (!(strcmp("DF", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Distrito Federal</option>
                <option value="ES" <?php if (!(strcmp("ES", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Esp&iacute;rito Santo</option>
                <option value="GO" <?php if (!(strcmp("GO", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Goi&aacute;s</option>
                <option value="MA" <?php if (!(strcmp("MA", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Maranh&atilde;o</option>
                <option value="MT" <?php if (!(strcmp("MT", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Mato Grosso</option>
                <option value="MS" <?php if (!(strcmp("MS", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Mato Grosso do Sul</option>
                <option value="MG" <?php if (!(strcmp("MG", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Minas Gerais</option>
                <option value="PA" <?php if (!(strcmp("PA", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Par&aacute;</option>
                <option value="PB" <?php if (!(strcmp("PB", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Para&iacute;ba</option>
                <option value="PR" <?php if (!(strcmp("PR", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Paran&aacute;</option>
                <option value="PE" <?php if (!(strcmp("PE", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Pernambuco</option>
                <option value="PI" <?php if (!(strcmp("PI", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Piau&iacute;</option>
                <option value="RN" <?php if (!(strcmp("RN", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Rio Grande do Norte</option>
                <option value="RS" <?php if (!(strcmp("RS", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Rio Grande do Sul</option>
                <option value="RO" <?php if (!(strcmp("RO", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Rond&ocirc;nia</option>
                <option value="RR" <?php if (!(strcmp("RR", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Roraima</option>
                <option value="SC" <?php if (!(strcmp("SC", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Santa Catarina</option>
                <option value="SP" <?php if (!(strcmp("SP", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>S&atilde;o Paulo</option>
                <option value="SE" <?php if (!(strcmp("SE", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Sergipe</option>
                <option value="TO" <?php if (!(strcmp("TO", htmlentities($row_Recordset1['estado'], ENT_COMPAT, 'utf-8')))) {echo "selected=\"selected\"";} ?>>Tocantins</option>
              </select>            </td>
            <td class="verdana"><br /></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td width="263"><table width="331" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="120" class="verdana"><strong>Fone 
            Comercial:</strong><br />
            
            <input name="foneC" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['fone_com'], ENT_COMPAT, 'utf-8'); ?>" size="15" maxlength="13" />            </td>
            <td width="120" class="verdana"><strong>Fone 
                  Residencial:</strong><br />
                  
              <input name="foneR" type="text" class="select" value="<?php echo $row_Recordset1['fone_res']; ?>" size="15" maxlength="13" />              </td>
            <td width="120" class="verdana"><strong>Celular:<br />
                <input name="celular" type="text" class="select" value="<?php echo htmlentities($row_Recordset1['celular'], ENT_COMPAT, 'utf-8'); ?>" size="15" maxlength="13" />
            </strong></td>
        </tr>
      </table></td>
      <td width="30">&nbsp;</td>
      <td width="220" colspan="2" rowspan="2" valign="top" class="verdana"><strong>Endereço de Mapa:<br />
          <textarea value="<?php echo htmlentities($row_Recordset1['link_mapa'], ENT_COMPAT, 'utf-8'); ?>" name="link_mapa" id="link_mapa" cols="55" rows="4"></textarea>
      </strong></td>
    </tr>
    <tr>
      <td width="263" valign="top" class="verdana"><strong>E-Mail:<br />
            
        <input name="email" type="text" class="select" id="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, 'utf-8'); ?>" size="40" maxlength="50" />
        </strong></td>
      <td width="30">&nbsp;</td>
    </tr>
    <tr>
      <td height="35" colspan="4" align="center"><span class="style49">
        <input type="submit" name="button" id="button" value="Alterar Registro" />
      </span></td>
    </tr>
    <input type="hidden" name="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
  </table>
  <span class="style5"><strong>
<input type="hidden" name="MM_update" value="<?php echo $row_Recordset1['']; ?>" />
    </strong>
    <input type="hidden" name="MM_update" value="form1" />
    </span>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);

?>
