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
$query_rsVerificador = sprintf("SELECT * FROM cliente WHERE cpf = %s", GetSQLValueString($colname_rsVerificador, "text"));
$rsVerificador = mysql_query($query_rsVerificador, $data) or die(mysql_error());
$row_rsVerificador = mysql_fetch_assoc($rsVerificador);
$totalRows_rsVerificador = mysql_num_rows($rsVerificador);
mysql_free_result($rsVerificador);

    if ($totalRows_rsVerificador == 0) { // Show if recordset empty 
 $insertSQL = sprintf("INSERT INTO cliente (codigo, nome, fantasia, categoria, grupo, rota, tipocliente, grupocliente, cpf, nome_razao, insc_municipal, email, fone_com, fone_res, celular, endereco, numero1, complemento1, referencia1, endereco2, endereco3, bairro, bairro2, bairro3, cidade, estado, cep, cep2, cep3, vendedor, porcentagem, link_mapa, insc_estadual) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
		GetSQLValueString($_POST['codigo'], "int"),
		GetSQLValueString($_POST['nome'], "text"),
		GetSQLValueString($_POST['nome'], "text"),
		GetSQLValueString($_POST['categoria'], "text"),
		GetSQLValueString($_POST['grupo'], "text"),
		GetSQLValueString($_POST['rota'],"text"),
		GetSQLValueString($_POST['tipocliente'], "text"),
		GetSQLValueString($_POST['grupocliente'], "text"),
		GetSQLValueString($_POST['cpf'], "text"),
		GetSQLValueString($_POST['nome_razao'], "text"),
		GetSQLValueString($_POST['insc_municipal'], "text"),
		GetSQLValueString($_POST['email'], "text"),
		GetSQLValueString($_POST['fone_com'], "text"),
		GetSQLValueString($_POST['fone_res'], "text"),
		GetSQLValueString($_POST['celular'], "text"),
		GetSQLValueString($_POST['endereco'], "text"),
		GetSQLValueString($_POST['numero1'], "text"),
		GetSQLValueString($_POST['complemento1'], "text"),
		GetSQLValueString($_POST['referencia1'], "text"),
		GetSQLValueString($_POST['endereco2'], "text"),
		GetSQLValueString($_POST['endereco3'], "text"),
		GetSQLValueString($_POST['bairro'], "text"),
		GetSQLValueString($_POST['bairro2'], "text"),
		GetSQLValueString($_POST['bairro3'], "text"),
		GetSQLValueString($_POST['cidade'], "text"),
		GetSQLValueString($_POST['estado'], "text"),
		GetSQLValueString($_POST['cep'], "text"),
		GetSQLValueString($_POST['cep2'], "text"),
		GetSQLValueString($_POST['cep3'], "text"),
		GetSQLValueString($_POST['vendedor'], "text"),
		GetSQLValueString($_POST['porcentagem'], "text"),
		GetSQLValueString($_POST['link_mapa'], "text"),
		GetSQLValueString($_POST['insc_estadual'], "text"));


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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' deve conter um endere?o valido.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' ? um campo obrigat?rio.\n'; }
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
.style3 {color: #FF0000; font-weight: bold; }
.style4 {font-size: 16px;
	color: #FF0000;
	font-family: "Comic Sans MS";
}
.style6 {font-size: 1.2em}
-->
</style>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail');return document.MM_returnValue">
  <table width="100%" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="38"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
      <td width="400"><span class="style7 style13 style13"><b><strong><b><span class="style4">CADASTRO DE CLIENTES PESSOA F?SICA</span></b></strong><br />
            <b><b><a href="center1.php" target="palco">Fechar Janela</a></b></b></b></span></td>
      <td width="360"><ul class="nav">
          <li><a href="add_clientes_jur.php" target="palco" class="style6">CLIQUE AQUI PARA CADASTRAR PESSOA JUR?DICA</a></li>
      </ul></td>
      <td width="130">&nbsp;</td>
    </tr>
  </table>
  <table width="872" border="0" cellpadding="2" cellspacing="2" class="verdana" >
    <input type="hidden" name="codigo" />
    <tr>
      <td colspan="2"><font color="#666666"><b>Nome:</b><br />
            <input name="nome" type="text" class="select" id="nome" size="45" maxlength="80" />
      </font></td>
      <td width="7">&nbsp;</td>
<td colspan="2"><b><font color="#666666"><b>CPF:</b><br />
              <b>
              <input type="text" name="cpf" class="select" onkeypress="formatar(this, '###.###.###-##')"maxlength="14" size="18" />
            </b></font></b></td>
<td width="66" valign="top"><font color="#666666"><b><br />
              </b></font></td>
  <td width="252" valign="top"><b><font color="#666666"><b>Vendedor:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;%</b><br />
            <b>
            <input name="vendedor" type="text" class="select" id="vendedor" maxlength="20" size="14" />
            &nbsp;&nbsp;&nbsp;
            <input name="porcentagem" type="text" class="select" id="porcentagem" maxlength="2" size="1" />
            </b></font>&nbsp;&nbsp;</font></td>
    </tr>
    <tr>
      <td colspan="2" rowspan="2"><font color="#666666"><b>Endere&ccedil;o 1:</b><br />
<b>
            <input name="endereco" type="text" class="select" id="endereco" size="45" maxlength="100" />
            <br />
          Complemento 1:</b><br />
        <b>
        <input name="complemento1" type="text" class="select" id="complemento1" size="45" maxlength="100" />
        </b></font></td>
      <td width="7" rowspan="4">&nbsp;</td>
      <td width="70" valign="top"><font color="#666666"><b>N&uacute;mero:</b><br />
        <b>
        <input name="numero1" type="text" class="select" id="numero1"  size="10" maxlength="30"/>
        </b><br />
      </font></td>
      <td width="143" valign="top"><font color="#666666"><b>
        Bairro 1:<br />
        <input name="bairro" type="text" class="select" id="bairro"  size="18" maxlength="30"/>
      </b></font></td>
      <td width="66" rowspan="2" valign="top"><font color="#666666"><b> Cep. 1:<br />
        <input name="cep" type="text" class="select" id="cep" onkeypress="formatar(this, '#####-###')" size="10" maxlength="9"/>
      </b></font></td>
      <td width="252" valign="top"><font color="#666666"><b>Fone 
Comercial:</b><br />
<b>
<input type="text" name="fone_com" class="select" maxlength="36" size="20" />
</b><b></b></font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><font color="#666666"><b>Ponto de Refer&ecirc;ncia:</b><br />
          <b>
          <input name="referencia1" type="text" class="select" id="referencia1"  size="30" maxlength="50"/>
      </b></font></td>
      <td width="252" valign="top"><font color="#666666"><b>Fone 
Resid:</b><br />
<b>
<input type="text" name="fone_res" class="select" maxlength="36" size="20" />
</b><b></b></font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><font color="#666666"><b>Endere&ccedil;o 2:</b><br />
            <b>
            <input name="endereco2" type="text" class="select" id="endereco2" size="45" maxlength="100" />
          </b></font></td>
      <td colspan="2"><font color="#666666"><b>Bairro 2:</b><br />
          <b>
          <input type="text" name="bairro2" class="select" maxlength="30" size="35" />
          </b></font></td>
      <td width="66" valign="top"><font color="#666666"><b> Cep. 2:<br />
        <input name="cep2" type="text" class="select" id="cep2" onkeypress="formatar(this, '#####-###')" size="10" maxlength="9"/>
      </b></font></td>
      <td width="252" valign="top"><font color="#666666"><b>Celular:<br />
            <input type="text" name="celular" class="select" maxlength="36" size="20" />
      </b></font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><font color="#666666"><b>Endere&ccedil;o 3:</b><br />
            <b>
            <input name="endereco3" type="text" class="select" id="endereco3" size="45" maxlength="100" />
          </b></font></td>
      <td colspan="2"><font color="#666666"><b>Bairro 3:</b><br />
          <b>
          <input type="text" name="bairro3" class="select" maxlength="30" size="35" />
          </b></font></td>
      <td width="66" valign="top"><font color="#666666"><b> Cep. 3:<br />
        <input name="cep3" type="text" class="select" id="cep3" onkeypress="formatar(this, '#####-###')" size="10" maxlength="9"/>
      </b></font></td>
<td width="252" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><font color="#666666"><b>Cidade:</b><br />
            <b>
            <input name="cidade" type="text" class="select"  value="RIO DE JANEIRO" size="35" maxlength="30"/>
          </b><br />
      </font></td>
      <td width="7" rowspan="2">&nbsp;</td>
<td colspan="2" rowspan="2"><b><font color="#666666"><b>Tipo de Cliente:<br />
              <font color="#666666"><b>
              <select name="tipocliente" id="tipocliente">
                <option selected="selected">*</option>
                <option>**</option>
                <option>***</option>
                <option>Alinea 11</option>
                <option>Buffet</option>
                <option>MSN</option>
                <option>N?o Vender</option>
                <option>S? Compra em Promo??o</option>
              </select>
              <br />
Grupo de Cliente:<br />
<font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b>
<select spry:sort="$tipo_cliente" name="tipo_cliente" id="tipo_cliente">
  <option> </option>
  <option>Vivo</option>
  <option>Jornal O GLOBO</option>
  <option>GLOBOSAT</option>
  <option>Ag?ncia O GLOBO</option>
  <option>Prefeitura</option>
  <option>2? CRE</option>
  <option>PUC</option>
  <option>CNC</option>
  <option>INCA</option>
  <option>Petrobras</option>
  <option>IBGE</option>
  <option>SERPRO</option>
  <option>FINEP</option>
  <option>PREVI</option>
  <option>OI</option>
  <option>UNISYS</option>
  <option>BNDES</option>
  <option>Instituto Goethe</option>
  <option>Est?cio de S?</option>
  <option>PROEN</option>
  <option>OAB</option>
  <option>Ita? Personalit?</option>
  <option>Technical Books</option>
  <option>Bradesco Seguros</option>
  <option>LIGHT</option>
  <option>H. Stern</option>
  <option>Loja Paquet?</option>
  <option>Procuradoria</option>
  <option>CESGRANRIO</option>
  <option>C?mara Municipal do RJ</option>
  <option>Correios</option>
  <option>Cart?rio 9o Of?cio</option>
  <option>Renoma</option>
  <option>Aboli??o Ve?culos</option>
  <option>Avanti Ve?culos Fiat</option>
  <option>Julio Bogoricin</option>
  <option>CCAA</option>
  <option>Jornal O Dia</option>
  <option>Bozano</option>
  <option>Brilhauto Fiat</option>
  <option>COMLURB</option>
  <option>DETRAN</option>
  <option>Furnas</option>
</select>
</b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></td>
      <td colspan="2" rowspan="2" valign="top"><font color="#666666"><b>E-Mail:</b><br />
        <b>
          <input name="email" type="text" class="select" id="email" size="20" maxlength="50" />
      </b> </font></td>
    </tr>
    <tr>
      <td width="156"><font color="#666666"><b>Estado:</b><br />
          <select name="estado" size="1" class="select">
            <option value="RJ" selected="selected">RJ</option>
            <option value="AC">AC</option>
            <option value="AL">AL</option>
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
            <option value="MG">MG</option>
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
            <option value="SP">SP</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
          </select>
      </font></td>
      <td width="134"><font color="#666666"><br />
      </font></td>
    </tr>
    <tr>
      <td colspan="7"><table width="100%" border="0" cellspacing="0" cellpadding="0" class="verdana">
          <tr>
            <td><font color="#666666"><b>Link do Mapa:
                  <input name="link_mapa" type="text" class="select" id="link_mapa" size="110" maxlength="1000"/>
            </b></font></td>
          </tr>
      </table>        <font color="#666666">
        </font></td>
    </tr>
    <tr>
      <td colspan="2" valign="top">&nbsp;</td>
      <td width="7">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="7" height="35" align="center"><div align="right"> 
          <input type="submit" name="Submit" id="button" value="Efetuar Cadastro" />
          <input type="reset" name="button2" id="button2" value="Limpar Campos" />
      </div></td>
    </tr>
    <tr>
      <td colspan="7" height="35" align="center"><?php  if ($totalRows_rsVerificador > 0) { // Show if recordset not empty ?>
            <span class="style3">Este cadastro n?o p?de ser realizado, pois o mesmo j? se encontra cadastrado em nosso sistema!</span>
      <?php } // Show if recordset not empty ?></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</body>
</html>

