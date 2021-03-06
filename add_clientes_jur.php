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
if (isset($_POST['nome_razao'])) {
  $colname_rsVerificador = $_POST['nome_razao'];
}
mysql_select_db($database_data, $data);
$query_rsVerificador = sprintf("SELECT * FROM cliente WHERE cpf = %s", GetSQLValueString($colname_rsVerificador, "text"));
$rsVerificador = mysql_query($query_rsVerificador, $data) or die(mysql_error());
$row_rsVerificador = mysql_fetch_assoc($rsVerificador);
$totalRows_rsVerificador = mysql_num_rows($rsVerificador);
mysql_free_result($rsVerificador);

    if ($totalRows_rsVerificador == 0) { // Show if recordset empty 
 $insertSQL = sprintf("INSERT INTO cliente (codigo, nome_razao, tipocliente, grupocliente, cpf, dn, nome, insc_municipal, email, fone_com, fone_res, celular, endereco, numero1, complemento1, referencia1, endereco2, endereco3, bairro, bairro2, bairro3, cidade, estado, cep, cep2, cep3, vendedor, porcentagem, link_mapa, data_cadastro, insc_estadual) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, NOW(), %s)",
		GetSQLValueString($_POST['codigo'], "int"),
		GetSQLValueString($_POST['nome_razao'], "text"),
//		GetSQLValueString($_POST['fantasia'], "text"),
//		GetSQLValueString($_POST['categoria'], "text"),
//		GetSQLValueString($_POST['grupo'], "text"),
//		GetSQLValueString($_POST['rota'],"text"),
		GetSQLValueString($_POST['tipocliente'], "text"),
		GetSQLValueString($_POST['grupocliente'], "text"),
		GetSQLValueString($_POST['cpf'], "text"),
		GetSQLValueString($_POST['dn'], "date"),		
		GetSQLValueString($_POST['nome'], "text"),
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
//		GetSQLValueString($_POST['insc_estadual'], "text"));
		
	
  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "center1.php";
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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
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
.style1 {color: #FF0000}
.style2 {
	color: #666666;
	font-weight: bold;
}
.style3 {font-size: 16px;
	color: #FF0000;
	font-family: "Comic Sans MS";
}
-->
</style>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1" onsubmit="MM_validateForm('nome','','R','email','','NisEmail');return document.MM_returnValue">
  <table width="860" border="0" cellpadding="0" cellspacing=" 0">
    <tr>
      <td width="37"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
  <td width="399"><span class="style7 style13 style13"><b><strong><b><span class="style3">CADASTRO DE CLIENTES PESSOA JUR?DICA</span></b></strong><br />
            <b><b><a href="center1.php" target="palco">Fechar Janela</a></b></b></b></span></td>
      <td width="334"><ul class="nav">
          <li><a href="add_clientes.php" target="palco"><strong>CLIQUE AQUI PARA CADASTRAR PESSOA F?SICA</strong></a></li>
        </ul></td>
    </tr>
  </table>
  <table width="860" border="0" cellpadding="2" cellspacing="2" class="verdana" >
    <input type="hidden" name="codigo" />
    <tr>
      <td width="275" rowspan="2" valign="top"><font color="#666666"><b>Raz?o Social:</b><br />
            <input name="nome_razao" type="text" class="select" id="nome_razao" size="45" maxlength="80" />
        <br />
        <b>Nome de Fantasia:</b><br />
            <input name="nome" type="text" class="select" id="nome" size="45" maxlength="80" />
            <br />
      <b>Propriet?rio:</b><br />
            <input name="proprietario" type="text" class="select" id="proprietario" size="45" maxlength="80" />
      </font></td>
      <td width="1" rowspan="2">&nbsp;</td>
<td width="154" valign="top"><b><font color="#666666"><b>CNPJ:</b><br />
              <b>
              <input name="cpf" type="text" class="select" id="cpf" onkeypress="formatar(this, '##.###.###/####-##')"size="18" maxlength="18" />
              <label></label>
              <br />
              <font color="#666666"><b>Inscri??o Estadual:</b><br />
              <b><font color="#666666"><b><font color="#666666"><b>
              <input name="insc_estadual" type="text" class="select" id="insc_estadual" size="18" maxlength="18" />
              </b></font></b></font></b></font><br />
              <font color="#666666"><b>Inscri??o Municipal:</b><br />
              <b>
              <input name="insc_municipal" type="text" class="select" id="insc_municipal" size="18" maxlength="18" />
      </b></font></b></font></b></td>
      <td width="180" valign="top"><b><font color="#666666"><b>Tipo de Cliente:<br />
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
        <font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b><font color="#666666"><b>
        <select spry:sort="$tipo_cliente" name="grupocliente" id="grupocliente">
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
        <br />
        <font color="#666666"><b><font color="#666666"><b>Data de Funda&ccedil;&atilde;o:</b><br />
        <b>
        <input name="dn" type="date" class="select" id="dn" size="14" maxlength="10" />
        </b></font></b></font>        </b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></font></b></td>
      <td width="218" valign="top"><label><span class="style2">Vendedor:</span><br />
          <b><font color="#666666"><b>
          <input name="vendedor" type="text" class="select" id="vendedor" "size="20" maxlength="30" />
          </b></font></b><br />
          <span class="style2">Porcentagem:</span><br />
          <b><font color="#666666"><b><font color="#666666"><b>
          <input name="porcentagem" type="text" class="select" id="porcentagem" size="5" maxlength="5" />
          </b></font></b></font></b><br />
          <font color="#666666"><b>E-Mail:</b><br />
          <b>
          <input name="email" type="text" class="select" id="email" size="20" maxlength="50" />
          </b></font><br />
      </label></td>
    </tr>
    <tr></tr>
    <tr>
      <td valign="top"><font color="#666666"><b>Endere&ccedil;o 1:</b><br />
        <b>
<input name="endereco" type="text" class="select" id="endereco" size="45" maxlength="100" />        
Complemento:</b><br />
        <b>
        <input name="complemento1" type="text" class="select" id="complemento1" size="45" maxlength="100" />
        </b></font></td>
      <td width="1" rowspan="3" valign="top">&nbsp;</td>
  <td valign="top"><font color="#666666"><b> N&uacute;mero:</b><br />
      <b>
      <input name="numero1" type="text" class="select" id="numero1" size="25" maxlength="30" />
      </b><b><br />
      Bairro 1:</b><br />
            <b>
            <input type="text" name="bairro" class="select" maxlength="30" size="25" />
          </b></font></td>
      <td valign="top"><font color="#666666"><b>Cep. 1:</b><br />
          <b>
          <input name="cep" type="text" class="select" id="cep" onkeypress="formatar(this, '#####-###')" size="15" maxlength="9"/>
          <br />
          Ponto de Refer&ecirc;ncia:</b><br />
        <b>
        <input name="referencia1" type="text" class="select" id="referencia1" size="25" maxlength="100" />
        </b><b>          </b></font></td>
      <td width="218" valign="top"><font color="#666666"><b>Fone 
  Comercial:</b><br />
  <input name="fone_com" type="text" class="select" id="fone_com" size="20" maxlength="36" />
  <span id="sprytextfield1"><span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Somente N&uacute;meros.</span></span></font></td>
    </tr>
    <tr>
      <td valign="top"><font color="#666666"><b>Endere&ccedil;o 2:</b><br />
          <b>
          <input name="endereco2" type="text" class="select" id="endereco2" size="45" maxlength="100" />
          </b></font></td>
      <td valign="top"><font color="#666666"><b>Bairro 2:</b><br />
          <b>
          <input type="text" name="bairro2" class="select" maxlength="30" size="25" />
      </b></font></td>
      <td valign="top"><font color="#666666"><b>Cep. 2:</b><br />
          <b>
          <input name="cep2" type="text" class="select" id="cep2" onkeypress="formatar(this, '#####-###')" size="10" maxlength="9"/>
          </b></font></td>
      <td width="218" valign="top"><font color="#666666"><b> Fone 
  Resid:</b><br />
              <b>
              <input name="fone_res" type="text" class="select" id="fone_res" size="20" maxlength="36" />
              </b><b></b></font></td>
    </tr>
    <tr>
      <td valign="top"><font color="#666666"><b>Endere&ccedil;o 3:</b><br />
          <b>
          <input name="endereco3" type="text" class="select" id="endereco3" size="45" maxlength="100" />
          </b></font></td>
      <td valign="top"><font color="#666666"><b>Bairro 3:</b><br />
          <b>
          <input type="text" name="bairro3" class="select" maxlength="30" size="25" />
      </b></font></td>
      <td valign="top"><font color="#666666"><b>Cep. 3:</b><br />
          <b>
          <input name="cep3" type="text" class="select" id="cep3" onkeypress="formatar(this, '#####-###')" size="10" maxlength="9"/>
          </b></font></td>
      <td width="218" valign="top"><font color="#666666"><b>Celular:<br />
        <input type="text" name="celular" class="select" maxlength="36" size="20" />
      </b></font></td>
    </tr>
    <tr>
      <td><font color="#666666"><b>Cidade:</b><br />
            <b>
            <input name="cidade" type="text" class="select"  value="Rio de Janeiro" size="35" maxlength="30"/>
          </b><br />
      </font></td>
      <td width="1">&nbsp;</td>
<td valign="top"><font color="#666666"><b><font color="#666666"><b>Estado:</b><br />
              <select name="estado" size="1" class="select" id="estado">
                <option value="RJ" selected="selected">RJ</option>
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
      </font></b></font></td>
      <td valign="top">&nbsp;</td>
      <td valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5"><font color="#666666"><b>Link do Mapa:</b><br />
          <b>
          <textarea name="link_mapa" id="link_mapa" cols="70" rows="5"></textarea>
          <label></label>
          </b> </font></td>
    </tr>
    <tr>
      <td valign="top">&nbsp;</td>
      <td width="1">&nbsp;</td>
      <td colspan="3" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" height="35" align="center"><input type="submit" name="Submit" id="button" value="Efetuar Cadastro" />
        <input type="reset" name="button2" id="button2" value="Limpar Campos" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
  <br />
  <?php if ($totalRows_rsVerificador > 1) 
  { // Show if recordset not empty 
  ?>
  <span class="style1">Este cadastro n&atilde;o p&ocirc;de ser realizado, pois o mesmo j&aacute; se encontra cadastrado em nosso sistema!</span>
  <?php } // Show if recordset not empty
  ?>
</form>
<p><br />
</p>
<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "integer");
//-->
</script>
</body>
</html>

