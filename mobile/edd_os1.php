<?php require_once('Connections/data.php'); ?><?php require_once('Connections/data.php'); ?>
<?php require_once('Connections/data.php'); ?>
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
  $updateSQL = sprintf("UPDATE ordemservico SET Funcionario=%s, Data_Agenda=%s, Hora_Agenda=%s, DiagnosticoTecnico=%s, Solucao=%s, Previsaoentrega=%s, Dataentrega=%s, Recebido=%s, Arquivo=%s, valor=%s WHERE Cod_Equipamento=%s",
                       GetSQLValueString($_POST['Funcionario'], "text"),
                       GetSQLValueString($_POST['Data_Agenda'], "text"),
                       GetSQLValueString($_POST['Hora_Agenda'], "text"),
                       GetSQLValueString($_POST['DiagnosticoTecnico'], "text"),
                       GetSQLValueString($_POST['Solucao'], "text"),
                       GetSQLValueString($_POST['Previsaoentrega'], "text"),
                       GetSQLValueString($_POST['Dataentrega'], "text"),
                       GetSQLValueString($_POST['Recebido'], "text"),
                       GetSQLValueString($_POST['Arquivo'], "text"),
                       GetSQLValueString($_POST['valor'], "text"),
                       GetSQLValueString($_POST['Cod_Equipamento'], "int"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($updateSQL, $data) or die(mysql_error());

  $updateGoTo = "confirma_print2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
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
$query_DetailRS1 = sprintf("SELECT * FROM ordemservico WHERE Cod_Equipamento = %s", GetSQLValueString($colname_DetailRS1, "int"));
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</head>

<body>
<table width="100%" border="0" cellpadding="0" cellspacing=" 0">
  <tr>
    <td width="15"><div align="center"><img src="Imagens/cadeado.gif" alt="" width="30" height="30" /></div></td>
    <td><strong><b>SYSESTOQUE ::: BACALHAU 172</b><br />
        <b><b><a href="fechar.php">Fechar Janela</a></b></b></strong></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><table border="0" cellspacing="3" cellpadding="0" class="verdana" width="498" >
      <form action="<?php echo $editFormAction;?>" method="POST" name="form1" id="form1">
        <tr>
          <td valign="top" height="40" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="200" valign="top"><b>T&eacute;cnico:<br />
                          <input name="Funcionario" type="text" id="Funcionario" value="<?php echo $_SESSION['MM_Username']; ?>" />
                          <br />
              </b></td>
              <td valign="top"><b>Cliente:<br />
              </b>              <?php echo $row_DetailRS1['Cliente']; ?><br /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
            <tr>
              <td width="23%"><b>Equipamento:<br />
              </b><?php echo $row_DetailRS1['Equipamento']; ?><br /></td>
              <td width="56%"><b>Marca:</b><br />
                <?php echo $row_DetailRS1['Marca']; ?><br /></td>
              <td width="21%"><b>Garantia:<br />
                  </b><?php echo $row_DetailRS1['Garantia']; ?><b><br />
                  </b></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><b>Modelo:</b><br />
            <?php echo $row_DetailRS1['Modelo']; ?><br />          
            <br /></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="28%"><p><b>N. 
                Patrimonio:<br />
              </b><?php echo $row_DetailRS1['Patrimonio']; ?><b><br />
                </b></p></td>
              <td width="29%"><b>N. 
                Serie:<br />
                </b><?php echo $row_DetailRS1['Serie']; ?><b><br />
                </b></td>
<td width="43%"><b>Setor:<br />
    </b><?php echo $row_DetailRS1['Setor']; ?><b><br />
    </b></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="17%"><b>Data 
                Entrada:</b><br />
                <?php echo $row_DetailRS1['Data_Entrada']; ?><br /></td>
              <td width="24%"><p><b>Hora 
                Entrada:<br />
                </b><?php echo $row_DetailRS1['Hora_Entrada']; ?><b><br />
                </b></p></td>
              <td width="45%"><b>Previs&atilde;o 
                do Diagn&oacute;stico T&eacute;cnico: <br />
                                      <input name="Data_Agenda" type="text" class="select" id="Data_Agenda" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
              </b></td>
              <td width="14%"><b>Hora: <br />
                          <input name="Hora_Agenda" type="text" class="select" id="Hora_Agenda" size="5" maxlength="5" OnKeyPress="formatar(this, '##:##')"/>
              </b></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
            <tr>
              <td><b>Diagn&oacute;stico 
                do Cliente:</b><br />
                <?php echo $row_DetailRS1['Problemacliente']; ?><br />
                <br /><br /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td colspan="2"><b>Diagn&oacute;stico 
            do T&eacute;cnico:</b><br />
                          <b>
                          <textarea name="DiagnosticoTecnico" class="select" cols="85" rows="1" onKeyUp="muda(this)"></textarea>
                          </b></td>
        </tr>
        <tr>
          <td colspan="2"><b>Solu&ccedil;&atilde;o:</b><br />
                  <b>
                  <textarea name="Solucao" cols="85" rows="1" class="select" id="Solucao" onKeyUp="muda(this)"></textarea>
                  </b></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="29%"><p><b>Previs&atilde;o 
                de Entrega: <br />
                <input type="text" name="Previsaoentrega" class="select" size="10" maxlength="10" onkeypress="formatar(this, '##/##/####')" />
              </b></p></td>
              <td width="20%"><b>Data 
                Entrega : <br />
                                      <input name="Dataentrega" type="text" class="select"  value="" size="10" maxlength="10" onkeypress="formatar(this, '##/##/####')"/>
              </b></td>
              <td width="51%"><b>Recebido 
                por:<br />
                                      <input name="Recebido" type="text" class="select" id="Recebido" size="41" maxlength="150" onKeyUp="muda(this)"/>
              </b></td>
            </tr>
          </table></td>
        </tr>
        <tr align="right">
          <td height="35" width="228"><div align="left"><b>Valor: 
            R$
                <input name="valor" type="text" class="fm" id="valor" size="20" onkeypress=reais(this,event) onkeydown=backspace(this,event) />
          </b> </div></td>
          <td height="35" width="295">&nbsp;</td>
        </tr>
        <tr align="right">
          <td height="35" colspan="2"><input name="Arquivo" type="hidden" id="Arquivo" value="s" />
            <input name="Cod_Equipamento" type="hidden" id="Cod_Equipamento" value="<?php echo $row_DetailRS1['Cod_Equipamento']; ?>" />
            <input type="submit" name="button" id="button" value=" Efetuar Cadastror" />
            <input type="reset" name="button2" id="button2" value="Limpar Cadastro" /></td>
        </tr>
        <input type="hidden" name="MM_update" value="form1" />
      </form>
    </table>
    
      </td>
  </tr>
</table>




</body>
</html>
<?php
mysql_free_result($DetailRS1);

mysql_free_result($DetailRS2);
?>
