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
  $updateSQL = sprintf("UPDATE cliente SET nome=%s, fantasia=%s, categoria=%s, grupo=%s, rota=%s, tipocliente=%s, grupocliente=%s, proprietario=%s, cpf=%s, rg=%s, tipo_pessoa=%s, insc_estadual=%s, insc_municipal=%s, email=%s, fone_com=%s, fone_res=%s, celular=%s, endereco=%s, endereco2=%s, endereco3=%s, bairro=%s, bairro2=%s, bairro3=%s, cidade=%s, estado=%s, cep=%s, vendedor=%s, porcentagem=%s, link_mapa=%s, obs=%s, site=%s, sexo=%s, dn=%s, banco=%s, banco2=%s, banco3=%s, conta=%s, conta2=%s, conta3=%s, estadocivil=%s, data_cadastro=%s, cep2=%s, cep3=%s WHERE codigo=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['fantasia'], "text"),
                       GetSQLValueString($_POST['categoria'], "text"),
                       GetSQLValueString($_POST['grupo'], "text"),
                       GetSQLValueString($_POST['rota'], "text"),
                       GetSQLValueString($_POST['tipocliente'], "text"),
                       GetSQLValueString($_POST['grupocliente'], "text"),
                       GetSQLValueString($_POST['proprietario'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['tipo_pessoa'], "text"),
                       GetSQLValueString($_POST['insc_estadual'], "text"),
                       GetSQLValueString($_POST['insc_municipal'], "text"),
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
                       GetSQLValueString($_POST['cep'], "text"),
                       GetSQLValueString($_POST['vendedor'], "text"),
                       GetSQLValueString($_POST['porcentagem'], "text"),
					   GetSQLValueString($_POST['link_mapa'], "text"),
					   GetSQLValueString($_POST['obs'], "text"),
					   GetSQLValueString($_POST['site'], "text"),
					   GetSQLValueString($_POST['sexo'], "text"),
					   GetSQLValueString($_POST['dn'], "text"),
					   GetSQLValueString($_POST['banco'], "text"),
					   GetSQLValueString($_POST['banco2'], "text"),
					   GetSQLValueString($_POST['banco3'], "text"),
					   GetSQLValueString($_POST['conta'], "text"),
					   GetSQLValueString($_POST['conta2'], "text"),
					   GetSQLValueString($_POST['conta3'], "text"),
					   GetSQLValueString($_POST['estadocivil'], "text"),
					   GetSQLValueString($_POST['data_cadastro'], "text"),
					   GetSQLValueString($_POST['cep2'], "text"),
					   GetSQLValueString($_POST['cep3'], "text"));


  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "fechar.php";
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

mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM cliente";
$Recordset1 = mysql_query($query_Recordset1, $data) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
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
.style1 {	font-size: 16px;
	color: #FF0000;
	font-family: "Comic Sans MS";
}
.style2 {color: #FF0000}
-->
</style></head>

<body>
<table width="929" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="11"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></td>
    <td width="945"><b><span class="style1">EDITAR CLIENTE</span><br />
        <b><b><a href="submenu1.php" target="center"> Fechar Janela</a></b></b></b></td>
  </tr>
  <tr>
    <td colspan="2">
      <table border="0" cellspacing="3" cellpadding="0" class="verdana" width="928" >
      <form action="<?php echo $editFormAction; ?>" method="POST" name="form1" id="form1">
        <tr>
          <td width="100%"><table width="922" border="0" cellpadding="2" cellspacing="2" >
            <tr>
              <td width="303" class="verdana"><strong>Nome:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Codigo: <span class="style2"><?php echo $row_DetailRS1['codigo']; ?></span><br />
                <input name="cliente" type="text" id="cliente" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['nome']; ?>" size="50"/>
              </strong></td>
              <td width="30">&nbsp;</td>
              <td width="210" class="verdana"><strong>CPF:<br />
                <input name="cpf" type="text" id="cliente2" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['cpf']; ?>" size="25"/>
              </strong></td>
              <td width="228" rowspan="4" class="verdana">&nbsp;</td>
            </tr>
            <tr>
              <td width="303" class="verdana"><strong>Endere&ccedil;o 1:<br />
                <input name="endereco" type="text" id="endereco1" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['endereco']; ?>" size="50"/>
              </strong></td>
              <td width="30" rowspan="3">&nbsp;</td>
              <td width="210" class="verdana"><strong>Bairro 1:<br />
                <input name="bairro" type="text" id="cliente3" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['bairro']; ?>" size="40"/>
              </strong></td>
            </tr>
            <tr>
              <td class="verdana"><strong>Endere&ccedil;o 2:<br />
                <input name="endereco2" type="text" id="endereco2" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['endereco2']; ?>" size="50"/>
              </strong></td>
              <td width="210" class="verdana"><strong>Bairro 2:<br />
                <input name="bairro2" type="text" id="cliente4" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['bairro2']; ?>" size="40"/>
              </strong></td>
            </tr>
            <tr>
              <td class="verdana"><strong>Endere&ccedil;o 3:<br />
                <input name="endereco3" type="text" id="endereco3" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['endereco3']; ?>" size="50"/>
              </strong></td>
              <td width="210" class="verdana"><strong>Bairro 3:<br />
                <input name="bairro3" type="text" id="cliente5" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['bairro3']; ?>" size="40"/>
              </strong></td>
            </tr>
            <tr>
              <td width="303" class="verdana"><strong>Cidade:<br />
                    <input name="cidade" type="text" id="cliente6" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['cidade']; ?>" size="40"/>
              </strong></td>
              <td width="30">&nbsp;</td>
              <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="40%" class="verdana"><strong>Estado:</strong><br />
                      <strong>
                      <input name="estado" type="text" id="estado" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['estado']; ?>" size="25"/>
                      </strong></td>
                    <td width="60%" class="verdana"><strong>Cep.:</strong><br />
                      <strong>
                      <input name="cep" type="text" id="cep" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['cep']; ?>" size="25"/>
                      </strong></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td width="303"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td class="verdana"><strong>Fone 
                      Comercial:</strong><br />
                      <strong>
                      <input name="fone_com" type="text" id="fone_com" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['fone_com']; ?>" size="25"/>
                      </strong></td>
                    <td class="verdana"><strong>Fone 
                      Residencial:</strong><br />
                      <strong>
                      <input name="fone_res" type="text" id="fone_res" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['fone_res']; ?>" size="25"/>
                      </strong></td>
                  </tr>
              </table></td>
              <td width="30">&nbsp;</td>
              <td colspan="2" class="verdana"><strong>Celular:<br />
                <input name="celular" type="text" id="celular" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['celular']; ?>" size="25"/>
              </strong></td>
            </tr>
            <tr>
              <td width="303" valign="top" class="verdana"><strong>E-Mail:<br />
                <input name="email" type="text" id="email" onkeyup="muda(this)" value="<?php echo $row_DetailRS1['email']; ?>" size="50"/>
              </strong></td>
              <td width="30">&nbsp;</td>
              <td colspan="2" class="verdana"><strong>Mapa:
                <label><strong>
                  <br />
                  <textarea name="mapa_link" id="mapa_link" value="<?php echo $row_DetailRS1['link_mapa']; ?>" cols="25" rows="4"></textarea>
                  </strong></label>
              </strong></td>
            </tr>
            <tr>
              <td height="35" colspan="4" align="center"><div align="right"> <span class="style49">
                  <input type="submit" name="button" id="button" value="Alterar Registro" />
              </span></div></td>
            </tr>
            <input type="hidden" name="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
          </table>          </td>
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

mysql_free_result($Recordset1);
?>
