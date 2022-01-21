<?php require_once('Connections/data.php'); ?><?php require_once('Connections/data.php'); ?><?php
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO novanota (Funcionario, Data_Entrada, Hora_Entrada, Cliente, cpf, insc_estadual, Equipamento, Prazo_Pgto, Marca, Patrimonio, data_emissao, Prod1, Prod2, Prod3, Prod4, Prod5, Quant1, Quant2, Quant3, Quant4, Quant5, Valor1, Valor2, Valor3, Valor4, Valor5, Problemacliente) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Funcionario'], "text"),
                       GetSQLValueString($_POST['Data_Entrada'], "text"),
                       GetSQLValueString($_POST['Hora_Entrada'], "text"),
                       GetSQLValueString($_POST['Cliente'], "text"),
					   GetSQLValueString($_POST['cpf'], "text"),
					   GetSQLValueString($_POST['insc_estadual'], "text"),
                       GetSQLValueString($_POST['Equipamento'], "text"),
                       GetSQLValueString($_POST['Prazo_Pgto'], "text"),
                       GetSQLValueString($_POST['Marca'], "text"),
                       GetSQLValueString($_POST['Patrimonio'], "text"),
                       GetSQLValueString($_POST['data_emissao'], "text"),
//                       GetSQLValueString($_POST['insc_estadual'], "text"),
//                       GetSQLValueString($_POST['serie'], "text"),
//                       GetSQLValueString($_POST['setor'], "text"),
//                       GetSQLValueString($_POST['Garantia'], "text"),
                       GetSQLValueString($_POST['Prod1'], "text"),
                       GetSQLValueString($_POST['Prod2'], "text"),
                       GetSQLValueString($_POST['Prod3'], "text"),
                       GetSQLValueString($_POST['Prod4'], "text"),
                       GetSQLValueString($_POST['Prod5'], "text"),
                       GetSQLValueString($_POST['Quant1'], "text"),
                       GetSQLValueString($_POST['Quant2'], "text"),
                       GetSQLValueString($_POST['Quant3'], "text"),
                       GetSQLValueString($_POST['Quant4'], "text"),
                       GetSQLValueString($_POST['Quant5'], "text"),
                       GetSQLValueString($_POST['Valor1'], "text"),					   
                       GetSQLValueString($_POST['Valor2'], "text"),					   
                       GetSQLValueString($_POST['Valor3'], "text"),					   
                       GetSQLValueString($_POST['Valor4'], "text"),					   
                       GetSQLValueString($_POST['Valor5'], "text"),					   					   
                       GetSQLValueString($_POST['Problemacliente'], "text"));



  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "confirma_print_notafiscal.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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

$maxRows_DetailRS1 = 10;
$pageNum_DetailRS1 = 0;
if (isset($_GET['pageNum_DetailRS1'])) {
  $pageNum_DetailRS1 = $_GET['pageNum_DetailRS1'];
}
$startRow_DetailRS1 = $pageNum_DetailRS1 * $maxRows_DetailRS1;

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_data, $data);
$query_DetailRS1 = sprintf("SELECT * FROM cliente WHERE codigo = %s", GetSQLValueString($colname_DetailRS1, "int"));
$query_limit_DetailRS1 = sprintf("%s LIMIT %d, %d", $query_DetailRS1, $startRow_DetailRS1, $maxRows_DetailRS1);
$DetailRS1 = mysql_query($query_limit_DetailRS1, $data) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);

if (isset($_GET['totalRows_DetailRS1'])) {
  $totalRows_DetailRS1 = $_GET['totalRows_DetailRS1'];
} else {
  $all_DetailRS1 = mysql_query($query_DetailRS1);
  $totalRows_DetailRS1 = mysql_num_rows($all_DetailRS1);
}
$totalPages_DetailRS1 = ceil($totalRows_DetailRS1/$maxRows_DetailRS1)-1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<SCRIPT type=text/javascript>
documentall = document.all;
/*
* função para formatação de valores monetários retirada de
* http://jonasgalvez.com/br/blog/2003-08/egocentrismo
*/

function formatamoney(c) {
    var t = this; if(c == undefined) c = 2;
    var p, d = (t=t.split("."))[1].substr(0, c);
    for(p = (t=t[0]).length; (p-=3) >= 1;) {
	        t = t.substr(0,p) + "." + t.substr(p);
    }
    return t+"."+d+Array(c+1-d.length).join(0);
}

String.prototype.formatCurrency=formatamoney

function demaskvalue(valor, currency){
/*
* Se currency é false, retorna o valor sem apenas com os números. Se é true, os dois últimos caracteres são considerados as
* casas decimais
*/
var val2 = '';
var strCheck = '0123456789';
var len = valor.length;
	if (len== 0){
		return 0.00;
	}

	if (currency ==true){
		/* Elimina os zeros à esquerda
		* a variável  <i> passa a ser a localização do primeiro caractere após os zeros e
		* val2 contém os caracteres (descontando os zeros à esquerda)
		*/

		for(var i = 0; i < len; i++)
			if ((valor.charAt(i) != '0') && (valor.charAt(i) != ',')) break;

		for(; i < len; i++){
			if (strCheck.indexOf(valor.charAt(i))!=-1) val2+= valor.charAt(i);
		}

		if(val2.length==0) return "0.00";
		if (val2.length==1)return "0.0" + val2;
		if (val2.length==2)return "0." + val2;

		var parte1 = val2.substring(0,val2.length-2);
		var parte2 = val2.substring(val2.length-2);
		var returnvalue = parte1 + "." + parte2;
		return returnvalue;

	}
	else{
			/* currency é false: retornamos os valores COM os zeros à esquerda,
			* sem considerar os últimos 2 algarismos como casas decimais
			*/
			val3 ="";
			for(var k=0; k < len; k++){
				if (strCheck.indexOf(valor.charAt(k))!=-1) val3+= valor.charAt(k);
			}
	return val3;
	}
}

function reais(obj,event){

var whichCode = (window.Event) ? event.which : event.keyCode;
/*
Executa a formatação após o backspace nos navegadores !document.all
*/
if (whichCode == 8 && !documentall) {
/*
Previne a ação padrão nos navegadores
*/
	if (event.preventDefault){ //standart browsers
			event.preventDefault();
		}else{ // internet explorer
			event.returnValue = false;
	}
	var valor = obj.value;
	var x = valor.substring(0,valor.length-1);
	obj.value= demaskvalue(x,true).formatCurrency();
	return false;
}
/*
Executa o Formata Reais e faz o format currency novamente após o backspace
*/
FormataReais(obj,'.',',',event);
} // end reais


function backspace(obj,event){
/*
Essa função basicamente altera o  backspace nos input com máscara reais para os navegadores IE e opera.
O IE não detecta o keycode 8 no evento keypress, por isso, tratamos no keydown.
Como o opera suporta o infame document.all, tratamos dele na mesma parte do código.
*/

var whichCode = (window.Event) ? event.which : event.keyCode;
if (whichCode == 8 && documentall) {
	var valor = obj.value;
	var x = valor.substring(0,valor.length-1);
	var y = demaskvalue(x,true).formatCurrency();

	obj.value =""; //necessário para o opera
	obj.value += y;

	if (event.preventDefault){ //standart browsers
			event.preventDefault();
		}else{ // internet explorer
			event.returnValue = false;
	}
	return false;

	}// end if
}// end backspace

function FormataReais(fld, milSep, decSep, e) {
var sep = 0;
var key = '';
var i = j = 0;
var len = len2 = 0;
var strCheck = '0123456789';
var aux = aux2 = '';
var whichCode = (window.Event) ? e.which : e.keyCode;

//if (whichCode == 8 ) return true; //backspace - estamos tratando disso em outra função no keydown
if (whichCode == 0 ) return true;
if (whichCode == 9 ) return true; //tecla tab
if (whichCode == 13) return true; //tecla enter
if (whichCode == 16) return true; //shift internet explorer
if (whichCode == 17) return true; //control no internet explorer
if (whichCode == 27 ) return true; //tecla esc
if (whichCode == 34 ) return true; //tecla end
if (whichCode == 35 ) return true;//tecla end
if (whichCode == 36 ) return true; //tecla home

/*
O trecho abaixo previne a ação padrão nos navegadores. Não estamos inserindo o caractere normalmente, mas via script
*/

if (e.preventDefault){ //standart browsers
		e.preventDefault()
	}else{ // internet explorer
		e.returnValue = false
}

var key = String.fromCharCode(whichCode);  // Valor para o código da Chave
if (strCheck.indexOf(key) == -1) return false;  // Chave inválida

/*
Concatenamos ao value o keycode de key, se esse for um número
*/
fld.value += key;

var len = fld.value.length;
var bodeaux = demaskvalue(fld.value,true).formatCurrency();
fld.value=bodeaux;

/*
Essa parte da função tão somente move o cursor para o final no opera. Atualmente não existe como movê-lo no konqueror.
*/
  if (fld.createTextRange) {
    var range = fld.createTextRange();
    range.collapse(false);
    range.select();
  }
  else if (fld.setSelectionRange) {
    fld.focus();
    var length = fld.value.length;
    fld.setSelectionRange(length, length);
  }
  return false;

}
</SCRIPT>
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
body,td,th {
	font-size: 12px;
}
body {
	margin-left: 5px;
	margin-bottom: 5px;
	margin-top: 5px;
	margin-right: 5px;
}
.style1 {
	font-size: 16px;
	color: #FF0000;
	font-family: Calibri;
}
-->
</style></head>

<body>
<table width="933" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="31"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></td>
<td width="940"><b><span class="style1">NOVA NOTA FISCAL</span><br />
        <b><b><a href="submenu1.php" target="center"> Fechar Janela</a></b></b></b></td>
  </tr>
  <tr>
    <td colspan="2">
      <table border="0" cellspacing="3" cellpadding="0" class="verdana" width="931" >
      <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
        <tr>
          <td width="100%" height="40" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="14%" align="left" valign="top"><strong>Tipo de Nota Fiscal:<br />
                    <b>Entrada:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sa&iacute;da:<br />
                    </b><b>
                    <input name="saida" type="text" class="select" id="saida" size="1" maxlength="1" />
                    </b></strong><b><strong><b>&nbsp;&nbsp;&nbsp;&nbsp;</b></strong>
                    <strong><b>&nbsp;&nbsp;&nbsp;<strong><b>&nbsp;</b></strong><strong><b>&nbsp;</b></strong></b></strong>
                    <input name="Patrimonio" type="text" class="select" id="Patrimonio" size="1" maxlength="5" />
                    </b><strong><br />
                  </strong></td>
              <td width="14%" align="left" valign="top"><b>Natureza<br />
                da Opera&ccedil;&atilde;o:</b><br />
                <b>
                <input name="Equipamento" type="text" value="Venda" class="select" id="Equipamento" size="16" maxlength="10" />
                </b><b><br />
                  </b></td>
              <td width="9%" align="left" valign="top"><b><br />
                CFOP:</b><br />
                <b>
                  <input name="Prazo_Pgto" type="text" value="5201" class="select" id="Prazo_Pgto" size="8" maxlength="10" />
                  </b><br />
                </p></td>
              <td width="22%" align="left" valign="top"><b>Insc. Estadual do<br />
                Subst Tribut&aacute;rio: <br />
                <input name="Marca" type="text" class="select" id="Marca" size="28" maxlength="20" />
              </b><br /></td>
              <td width="13%" align="left" valign="top"><b>Data da</b><br />
                <b>Entrega:<br />
                  </b><b>
                    <input name="data_emissao" type="text" class="select" id="data_emissao" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
                  </b><b><br />
                    </b></td>
              <td width="13%" align="left" valign="top"><b>Hora 
                da<br />
Emiss&atilde;o:</b><b>
<br />
<input name="Hora_Entrada" type="text" class="select" id="Hora_Entrada" onkeypress="formatar(this, '##:##')" size="5" maxlength="5" />
</b></td>
              <td width="15%" align="left" valign="top"><b>Data da<br />
                Sa&iacute;da/Entr: <br />
                <input name="Data_Entrada" type="text" class="select" id="Data_Entrada" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
              </b></td>
            </tr>
          </table>
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td width="447" valign="top"><b>Cliente:</b><br />
                <input name="Cliente" type="text" readonly="readonly" id="Cliente" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['nome_razao']; ?>" size="50"/></td>
              <td width="156" valign="top"><b class="style9">CPF/CNPJ:</b><br />
                <span class="style14"><b><b><b><b>
                <input name="cpf" type="text" readonly="readonly" class="select" id="cpf" value="<?php echo $row_DetailRS1['cpf']; ?>" size="17" />
                </b></b></b></b></span></td>
              <td width="322" valign="top"><span class="style9 style7"><strong>Inscri&ccedil;&atilde;o Estadual:</strong><b><br />
              </b></span><span class="style13 style7 style15"><b><b>
              <input name="insc_estadual" type="text" readonly="readonly" class="select" id="insc_estadual" value="<?php echo $row_DetailRS1['insc_estadual']; ?>" size="16" maxlength="10" />
              </b></b></span></td>
            </tr>
          </table>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="348"><span class="first"><strong>Endere&ccedil;o:</strong></span><br />
                    <span class="style14"> <?php echo $row_DetailRS1['endereco']; ?><br />
                    <br />
                    </span></td>
                <td width="227"><b>Bairro:</b><br />
                    <span class="style14"> <?php echo $row_DetailRS1['bairro']; ?><br />
                    <br />
                  </span> </td>
                <td width="196" valign="top"><b class="content">Cidade / Estado:</b><br />
                <span class="style14"><?php echo $row_DetailRS1['cidade']; ?> / <?php echo $row_DetailRS1['estado']; ?></span></td>
                <td width="197" valign="top"><span class="style9 style7"><strong>Telefones:</strong><b><br />
                </b></span><span class="style13 style7 style15"><?php echo $row_DetailRS1['fone_com']; ?></span><strong> /</strong><span class="style14"> <?php echo $row_DetailRS1['fone_res']; ?></span> <strong>/</strong><span class="style13 style7 style15"> <?php echo $row_DetailRS1['celular']; ?></span></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
            <tr>
              <td width="28%"><b>Produto:</b><br />
                        <b>
                        <select name="Prod1" class="select" id="Prod1">
                          <option value="Bolinhos de Bacalhau">Bolinhos de Bacalhau</option>
                          <option value="Bol&atilde;o de 50 g ">Bol&atilde;o de 50 g </option>
                          <option value="Bol&atilde;o de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
                          <option value="Charutos de 25 g">Charutos de 25 g</option>
                          <option value="Charutos de 15 g">Charutos de 15 g</option>
                          <option value="Charutos de 75 g">Charutos de 75 g</option>
                          <option value="Coquetel 12,5 g">Coquetel 12,5 g</option>
                          <option value="Coquetel 12,5 g saco branco">Coquetel 12,5 g saco branco</option>
                          <option value="Coquetel 12,5 g a v&aacute;cuo">Coquetel 12,5 g a v&aacute;cuo</option>
                          <option value="Coquetel 12,5 g  c/ 50 un golosita">Coquetel 12,5 g c/ 50 un golosita</option>
                          <option value="Coquetel 18 g c/ 25 un golosita">Coquetel 18 g c/ 25 un golosita</option>
                          <option value="Coquetel 20 g">Coquetel 20 g</option>
                          <option value="Comum 25 g">Comum 25 g</option>
                          <option value="Comum 25 g saco branco ">Comum 25 g saco branco </option>
                          <option value="Comum 30 g">Comum 30 g</option>
                          <option value="Comum 30 g saco branco">Comum 30 g saco branco</option>
                          <option value="Comum 25 g p&ccedil;s com 5">Comum 25 g p&ccedil;s com 5</option>
                          <option value="Comum 25 g p&ccedil;s com 6">Comum 25 g p&ccedil;s com 6</option>
                          <option value="Comum 25 g p&ccedil;s com 8">Comum 25 g p&ccedil;s com 8</option>
                          <option value="Comum 30 g p&ccedil;s com 8">Comum 30 g p&ccedil;s com 8</option>
                          <option value="Comum 25 g p&ccedil;s com 10">Comum 25 g p&ccedil;s com 10</option>
                          <option value="Comum 25 g p&ccedil;s com 12">Comum 25 g p&ccedil;s com 12</option>
                          <option value="Comum 25 g p&ccedil;s com 10 a v&aacute;cuo ">Comum 25 g p&ccedil;s com 10 a v&aacute;cuo</option>
                          <option value="Comum 25 g p&ccedil;s com 12 a v&aacute;cuo">Comum 25 g p&ccedil;s com 12 a v&aacute;cuo</option>
                          <option value="Comum 25 g p&ccedil;s com 15 a v&aacute;cuo">Comum 25 g p&ccedil;s com 15 a v&aacute;cuo</option>
                          <option value="Massa fresca">Massa fresca</option>
                        </select>
                        </b></td>
              <td width="11%"><b>Quantidade:<br />
              </b><b>
              <input name="Quant1" type="text" class="select" id="Quant1" size="5" maxlength="10" />
              </b><br /></td>
              <td width="12%"><b>Valor:</b><br />
                <b>
                <input name="Valor1" type="text" class="select" id="Valor1" size="10" maxlength="10" />
                </b></td>
              <td width="49%" rowspan="3" valign="top"><b>Observações Diversas:</b><br />
                <b>
                <textarea name="Problemacliente" cols="60" rows="7" class="select" id="Problemacliente" onkeyup="muda(this)"></textarea>
                </b></td>
            </tr>
            <tr>
              <td><b>Produto:</b><br />
                <b>
                <select name="Prod2" class="select" id="Prod2">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
                  <option value="Bolinhos de Bacalhau">Bolinhos de Bacalhau</option>
                  <option value="Charutos de 25 g">Charutos de 25 g</option>
                  <option value="Charutos de 15 g">Charutos de 15 g</option>
                  <option value="Charutos de 75 g">Charutos de 75 g</option>
                  <option value="Coquetel 12,5 g">Coquetel 12,5 g</option>
                  <option value="Coquetel 12,5 g saco branco">Coquetel 12,5 g saco branco</option>
                  <option value="Coquetel 12,5 g a vácuo">Coquetel 12,5 g a v&aacute;cuo</option>
                  <option value="Coquetel 12,5 g  c/ 50 un golosita">Coquetel 12,5 g c/ 50 un golosita</option>
                  <option value="Coquetel 18 g c/ 25 un golosita">Coquetel 18 g c/ 25 un golosita</option>
                  <option value="Coquetel 20 g">Coquetel 20 g</option>
                  <option value="Comum 25 g">Comum 25 g</option>
                  <option value="Comum 25 g saco branco ">Comum 25 g saco branco </option>
                  <option value="Comum 30 g">Comum 30 g</option>
                  <option value="Comum 30 g saco branco">Comum 30 g saco branco</option>
                  <option value="Comum 25 g pçs com 5">Comum 25 g p&ccedil;s com 5</option>
                  <option value="Comum 25 g pçs com 6">Comum 25 g p&ccedil;s com 6</option>
                  <option value="Comum 25 g pçs com 8">Comum 25 g p&ccedil;s com 8</option>
                  <option value="Comum 30 g pçs com 8">Comum 30 g p&ccedil;s com 8</option>
                  <option value="Comum 25 g pçs com 10">Comum 25 g p&ccedil;s com 10</option>
                  <option value="Comum 25 g pçs com 12">Comum 25 g p&ccedil;s com 12</option>
                  <option value="Comum 25 g pçs com 10 a vácuo ">Comum 25 g p&ccedil;s com 10 a v&aacute;cuo</option>
                  <option value="Comum 25 g pçs com 12 a vácuo">Comum 25 g p&ccedil;s com 12 a v&aacute;cuo</option>
                  <option value="Comum 25 g pçs com 15 a vácuo">Comum 25 g p&ccedil;s com 15 a v&aacute;cuo</option>
                  <option value="Massa fresca">Massa fresca</option>
                </select>
                </b></td>
              <td><b>Quantidade:<br />
                <input name="Quant2" type="text" class="select" id="Quant2" size="5" maxlength="10" />
              </b><br /></td>
              <td><b>Valor:</b><br />
                  <b>
                  <input name="Valor2" type="text" class="select" id="Valor2" size="10" maxlength="10" />
                </b></td>
              </tr>
            <tr>
              <td><b>Produto:</b><br />
                <b>
                <select name="Prod3" class="select" id="Prod3">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
                  <option value="Bolinhos de Bacalhau">Bolinhos de Bacalhau</option>
                  <option value="Charutos de 25 g">Charutos de 25 g</option>
                  <option value="Charutos de 15 g">Charutos de 15 g</option>
                  <option value="Charutos de 75 g">Charutos de 75 g</option>
                  <option value="Coquetel 12,5 g">Coquetel 12,5 g</option>
                  <option value="Coquetel 12,5 g saco branco">Coquetel 12,5 g saco branco</option>
                  <option value="Coquetel 12,5 g a vácuo">Coquetel 12,5 g a v&aacute;cuo</option>
                  <option value="Coquetel 12,5 g  c/ 50 un golosita">Coquetel 12,5 g c/ 50 un golosita</option>
                  <option value="Coquetel 18 g c/ 25 un golosita">Coquetel 18 g c/ 25 un golosita</option>
                  <option value="Coquetel 20 g">Coquetel 20 g</option>
                  <option value="Comum 25 g">Comum 25 g</option>
                  <option value="Comum 25 g saco branco ">Comum 25 g saco branco </option>
                  <option value="Comum 30 g">Comum 30 g</option>
                  <option value="Comum 30 g saco branco">Comum 30 g saco branco</option>
                  <option value="Comum 25 g pçs com 5">Comum 25 g p&ccedil;s com 5</option>
                  <option value="Comum 25 g pçs com 6">Comum 25 g p&ccedil;s com 6</option>
                  <option value="Comum 25 g pçs com 8">Comum 25 g p&ccedil;s com 8</option>
                  <option value="Comum 30 g pçs com 8">Comum 30 g p&ccedil;s com 8</option>
                  <option value="Comum 25 g pçs com 10">Comum 25 g p&ccedil;s com 10</option>
                  <option value="Comum 25 g pçs com 12">Comum 25 g p&ccedil;s com 12</option>
                  <option value="Comum 25 g pçs com 10 a vácuo ">Comum 25 g p&ccedil;s com 10 a v&aacute;cuo</option>
                  <option value="Comum 25 g pçs com 12 a vácuo">Comum 25 g p&ccedil;s com 12 a v&aacute;cuo</option>
                  <option value="Comum 25 g pçs com 15 a vácuo">Comum 25 g p&ccedil;s com 15 a v&aacute;cuo</option>
                  <option value="Massa fresca">Massa fresca</option>
                </select>
                </b></td>
              <td><b>Quantidade:<br />
                <input name="Quant3" type="text" class="select" id="Quant3" size="5" maxlength="10" />
              </b><br /></td>
              <td><b>Valor:</b><br />
                  <b>
                  <input name="Valor3" type="text" class="select" id="Valor3" size="10" maxlength="10" />
                </b></td>
              </tr>
            
          </table></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="10%" valign="top">&nbsp;</td>
              <td width="11%" valign="top">&nbsp;</td>
              <td valign="top"><div align="center">
                <input type="submit" name="button3" id="button3" value="EMITIR NOTA FISCAL" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="reset" name="button3" id="button4" value="LIMPAR" />
              </div></td>
              <td width="12%" valign="top">&nbsp;</td>
              <td width="3%" valign="top">&nbsp;</td>
              <td width="19%" valign="top">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
        <input type="hidden" name="MM_insert" value="form1" />
      </form>
    </table></td>
  </tr>
</table>



<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
