<?php require_once('Connections/data.php'); ?>
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
  $insertSQL = sprintf("INSERT INTO nota (Cod_Nota, saida, entrada, num_nota, Data_Emissao, Data_Saida, Hora_Saida, Natureza, Cfop, Insc_Est_Sub_Trib, Cliente, Cnpj, Endereco, Bairro, Cep, Municipio, Fone, Estado, Insc_Est, Cod_Prod, Desc_Prod, Unidade, Quant, Vl_Unit, Vl_Total, Icms, Base_Icms, Vl_Icms, Base_Calc_Icms, Vl_Icms_Subst, Vl_Total_Produtos, Vl_Frete, Vl_Seguro, Outras_Despesas, ipi, Vl_Total_Nota, Nome_Transp, Frete_Conta, Placa_Veiculo, Cnpj_Transp, Endereco_Transp, Munic_Transp, uf_Transp, Quant_Transp, Especie, Numero, Peso_Bruto, Peso_Liquido, Equipamento, Modelo, Marca, Patrimonio, Serie, Setor, Garantia, Problemacliente, Data_Agenda, Hora_Agenda, DiagnosticoTecnico, Solucao, Previsaoentrega, Dataentrega, Recebido, Arquivo, valor) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Cod_Nota'], "int"),
                       GetSQLValueString($_POST['saida'], "text"),
                       GetSQLValueString($_POST['entrada'], "text"),
                       GetSQLValueString($_POST['num_nota'], "text"),
                       GetSQLValueString($_POST['Data_Emissao'], "text"),
                       GetSQLValueString($_POST['Data_Saida'], "text"),
                       GetSQLValueString($_POST['Hora_Saida'], "text"),
                       GetSQLValueString($_POST['Natureza'], "text"),
                       GetSQLValueString($_POST['Cfop'], "text"),
                       GetSQLValueString($_POST['Insc_Est_Sub_Trib'], "text"),
                       GetSQLValueString($_POST['Cliente'], "text"),
                       GetSQLValueString($_POST['Cnpj'], "text"),
                       GetSQLValueString($_POST['Endereco'], "text"),
                       GetSQLValueString($_POST['Bairro'], "text"),
                       GetSQLValueString($_POST['Cep'], "text"),
                       GetSQLValueString($_POST['Municipio'], "text"),
                       GetSQLValueString($_POST['Fone'], "text"),
                       GetSQLValueString($_POST['Estado'], "text"),
                       GetSQLValueString($_POST['Insc_Est'], "text"),
                       GetSQLValueString($_POST['Cod_Prod'], "text"),
                       GetSQLValueString($_POST['Desc_Prod'], "text"),
                       GetSQLValueString($_POST['Unidade'], "text"),
                       GetSQLValueString($_POST['Quant'], "text"),
                       GetSQLValueString($_POST['Vl_Unit'], "text"),
                       GetSQLValueString($_POST['Vl_Total'], "text"),
                       GetSQLValueString($_POST['Icms'], "text"),
                       GetSQLValueString($_POST['Base_Icms'], "text"),
                       GetSQLValueString($_POST['Vl_Icms'], "text"),
                       GetSQLValueString($_POST['Base_Calc_Icms'], "text"),
                       GetSQLValueString($_POST['Vl_Icms_Subst'], "text"),
                       GetSQLValueString($_POST['Vl_Total_Produtos'], "text"),
                       GetSQLValueString($_POST['Vl_Frete'], "text"),
                       GetSQLValueString($_POST['Vl_Seguro'], "text"),
                       GetSQLValueString($_POST['Outras_Despesas'], "text"),
                       GetSQLValueString($_POST['ipi'], "text"),
                       GetSQLValueString($_POST['Vl_Total_Nota'], "text"),
                       GetSQLValueString($_POST['Nome_Transp'], "text"),
                       GetSQLValueString($_POST['Frete_Conta'], "text"),
                       GetSQLValueString($_POST['Placa_Veiculo'], "text"),
                       GetSQLValueString($_POST['Cnpj_Transp'], "text"),
                       GetSQLValueString($_POST['Endereco_Transp'], "text"),
                       GetSQLValueString($_POST['Munic_Transp'], "text"),
                       GetSQLValueString($_POST['uf_Transp'], "text"),
                       GetSQLValueString($_POST['Quant_Transp'], "text"),
                       GetSQLValueString($_POST['Especie'], "text"),
                       GetSQLValueString($_POST['Numero'], "text"),
                       GetSQLValueString($_POST['Peso_Bruto'], "text"),
                       GetSQLValueString($_POST['Peso_Liquido'], "text"),
                       GetSQLValueString($_POST['Equipamento'], "text"),
                       GetSQLValueString($_POST['Modelo'], "text"),
                       GetSQLValueString($_POST['Marca'], "text"),
                       GetSQLValueString($_POST['Patrimonio'], "text"),
                       GetSQLValueString($_POST['Serie'], "text"),
                       GetSQLValueString($_POST['Setor'], "text"),
                       GetSQLValueString($_POST['Garantia'], "text"),
                       GetSQLValueString($_POST['Problemacliente'], "text"),
                       GetSQLValueString($_POST['Data_Agenda'], "text"),
                       GetSQLValueString($_POST['Hora_Agenda'], "text"),
                       GetSQLValueString($_POST['DiagnosticoTecnico'], "text"),
                       GetSQLValueString($_POST['Solucao'], "text"),
                       GetSQLValueString($_POST['Previsaoentrega'], "text"),
                       GetSQLValueString($_POST['Dataentrega'], "text"),
                       GetSQLValueString($_POST['Recebido'], "text"),
                       GetSQLValueString($_POST['Arquivo'], "text"),
                       GetSQLValueString($_POST['valor'], "text"));

  mysql_select_db($database_data, $data);
  $Result1 = mysql_query($insertSQL, $data) or die(mysql_error());

  $insertGoTo = "confirma_print_nota2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_data, $data);
$query_Recordset1 = "SELECT * FROM nota";
$Recordset1 = mysql_query($query_Recordset1, $data) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

mysql_select_db($database_data, $data);
$query_DetailRS1 = "SELECT * FROM cliente";
$DetailRS1 = mysql_query($query_DetailRS1, $data) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table border="0" cellspacing="3" cellpadding="0" class="verdana" width="935" >
    <tr>
      <td width="100%" height="40" valign="top"><table width="98%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="191" valign="top"><b>Vendedor:<br />
                  <input name="Funcionario" type="text" id="Funcionario" value="<?php echo $_SESSION['MM_Username']; ?>" />
                  <br />
            </b></td>
            <td width="324" valign="top"><b>Cliente:</b><br />
                <span class="style14"><?php echo $row_DetailRS1['nome']; ?></span> </td>
            <td width="134" valign="top"><b class="style9">CPF/CNPJ:</b><br />
                <span class="style14"><?php echo $row_DetailRS1['cpf']; ?></span></td>
            <td width="322" valign="top"><b class="content">E-mail:</b><br />
                <span class="style14"><?php echo $row_DetailRS1['email']; ?></span></td>
          </tr>
        </table>
          <table width="98%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="348"><span class="first"><strong>Endere&ccedil;o:</strong></span><br />
                  <span class="style14"> <?php echo $row_DetailRS1['endereco']; ?><br />
                  <?php echo $row_DetailRS1['endereco2']; ?><br />
                  <?php echo $row_DetailRS1['endereco3']; ?></span></td>
              <td width="227"><b>Bairro:</b><br />
                  <span class="style14"> <?php echo $row_DetailRS1['bairro']; ?><br />
                  <?php echo $row_DetailRS1['bairro2']; ?><br />
                  <?php echo $row_DetailRS1['bairro3']; ?></span> </td>
              <td width="393" valign="top"><span class="style9 style7"><strong>Telefones:</strong><b><br />
              </b></span><span class="style13 style7 style15"><?php echo $row_DetailRS1['fone_com']; ?></span><strong> /</strong><span class="style14"> <?php echo $row_DetailRS1['fone_res']; ?></span> <strong>/</strong><span class="style13 style7 style15"> <?php echo $row_DetailRS1['celular']; ?></span></td>
            </tr>
        </table></td>
    </tr>
    <tr>
      <td><table width="98%" border="0" cellspacing=" 0" cellpadding="0">
          <tr>
            <td width="28%"><b>Produto:</b><br />
                <b>
                <select name="Prod1" class="select" id="Prod1">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
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
            <td width="11%"><b>Quantidade:<br />
              </b><b>
              <input name="Quant1" type="text" class="select" id="Quant1" size="5" maxlength="10" />
            </b><br /></td>
            <td width="12%"><b>Valor:</b><br />
                <b>
                <input name="Valor1" type="text" class="select" id="Valor1" size="10" maxlength="10" />
              </b></td>
            <td width="49%" rowspan="5" valign="top"><b>Observações Diversas:</b><br />
                <b>
                <textarea name="obs" cols="50" rows="7" class="select" id="obs" onkeyup="muda(this)"></textarea>
              </b></td>
          </tr>
          <tr>
            <td><b>Produto:</b><br />
                <b>
                <select name="Prod2" class="select" id="Prod2">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
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
          <tr>
            <td><b>Produto:</b><br />
                <b>
                <select name="Prod4" class="select" id="Prod4">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
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
                  <input name="Quant4" type="text" class="select" id="Quant4" size="5" maxlength="10" />
            </b><br /></td>
            <td><b>Valor:</b><br />
                <b>
                <input name="Valor4" type="text" class="select" id="Valor4" size="10" maxlength="10" />
              </b></td>
          </tr>
          <tr>
            <td><b>Produto:</b><br />
                <b>
                <select name="Prod5" class="select" id="Prod5">
                  <option> </option>
                  <option value="Bolão de 50 g ">Bol&atilde;o de 50 g </option>
                  <option value="Bolão de 50 g saco branco">Bol&atilde;o de 50 g saco branco</option>
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
                  <input name="Quant5" type="text" class="select" id="Quant5" size="5" maxlength="10" />
            </b><br /></td>
            <td><b>Valor:</b><br />
                <b>
                <input name="Valor5" type="text" class="select" id="Valor5" size="10" maxlength="10" />
              </b></td>
          </tr>
      </table></td>
    </tr>
    <tr>
      <td><table width="98%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%" valign="top"><b>Data 
              Entrada:</b><br />
                            <b>
                            <input name="Data_Entrada" type="text" class="select" id="Data_Entrada" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
                          </b></td>
            <td width="13%" valign="top"><b>Hora 
              do Pedido: <br />
                            <input name="Hr_Entrada" type="text" class="select" id="Hr_Entrada" onkeypress="formatar(this, '##:##')" size="5" maxlength="5" />
            </b></td>
            <td width="17%" valign="top"><b>Quem recebe o pedido:</b><br />
                <b>
                <input name="Patrimonio2" type="text" class="select" id="Patrimonio" size="20" maxlength="10" />
                </b>
              </p>
            </td>
            <td width="16%" valign="top"><b>Data 
              da Entrega:</b><br />
                            <b>
                            <input name="Data_Entrega" type="text" class="select" id="Data_Entrega" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
                          </b></td>
            <td width="15%" valign="top"><b>Hora 
              da Entrega: <br />
                            <input name="Hora_Entrega" type="text" class="select" id="Hora_Entrega" onkeypress="formatar(this, '##:##')" size="5" maxlength="5" />
            </b></td>
            <td width="14%" valign="top"><b>Data 
              da Cobran&ccedil;a:</b><br />
                            <b>
                            <input name="Hora_Entrada" type="text" class="select" id="Hora_Entrada" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
                          </b></td>
            <td width="15%" colspan="2" valign="top"><b>Prazo de Pgto:</b><br />
                <b>
                <input name="Prazo_Pgto" type="text" class="select" id="Prazo_Pgto" onkeypress="formatar(this, '##/##/####')" size="10" maxlength="10" />
              </b></td>
          </tr>
          <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td valign="top">&nbsp;</td>
            <td colspan="2" valign="top"><input type="submit" name="button3" id="button3" value=" Efetuar Pedido" />
                <input type="reset" name="button3" id="button4" value="Limpar" /></td>
            <td colspan="3" valign="top">&nbsp;</td>
          </tr>
      </table></td>
    </tr>
    <input type="hidden" name="MM_insert2" value="form1" />
  </table>
  <p>&nbsp;</p>
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cod_Nota:</td>
      <td><input type="text" name="Cod_Nota" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Saida:</td>
      <td><input type="text" name="saida" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Entrada:</td>
      <td><input type="text" name="entrada" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Num_nota:</td>
      <td><input type="text" name="num_nota" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data_Emissao:</td>
      <td><input type="text" name="Data_Emissao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data_Saida:</td>
      <td><input type="text" name="Data_Saida" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hora_Saida:</td>
      <td><input type="text" name="Hora_Saida" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Natureza:</td>
      <td><input type="text" name="Natureza" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cfop:</td>
      <td><input type="text" name="Cfop" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Insc_Est_Sub_Trib:</td>
      <td><input type="text" name="Insc_Est_Sub_Trib" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cliente:</td>
      <td><input type="text" name="Cliente" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cnpj:</td>
      <td><input type="text" name="Cnpj" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endereco:</td>
      <td><input type="text" name="Endereco" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bairro:</td>
      <td><input type="text" name="Bairro" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cep:</td>
      <td><input type="text" name="Cep" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Municipio:</td>
      <td><input type="text" name="Municipio" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fone:</td>
      <td><input type="text" name="Fone" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estado:</td>
      <td><input type="text" name="Estado" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Insc_Est:</td>
      <td><input type="text" name="Insc_Est" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cod_Prod:</td>
      <td><input type="text" name="Cod_Prod" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Desc_Prod:</td>
      <td><input type="text" name="Desc_Prod" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Unidade:</td>
      <td><input type="text" name="Unidade" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Quant:</td>
      <td><input type="text" name="Quant" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Unit:</td>
      <td><input type="text" name="Vl_Unit" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Total:</td>
      <td><input type="text" name="Vl_Total" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Icms:</td>
      <td><input type="text" name="Icms" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Base_Icms:</td>
      <td><input type="text" name="Base_Icms" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Icms:</td>
      <td><input type="text" name="Vl_Icms" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Base_Calc_Icms:</td>
      <td><input type="text" name="Base_Calc_Icms" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Icms_Subst:</td>
      <td><input type="text" name="Vl_Icms_Subst" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Total_Produtos:</td>
      <td><input type="text" name="Vl_Total_Produtos" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Frete:</td>
      <td><input type="text" name="Vl_Frete" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Seguro:</td>
      <td><input type="text" name="Vl_Seguro" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Outras_Despesas:</td>
      <td><input type="text" name="Outras_Despesas" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Ipi:</td>
      <td><input type="text" name="ipi" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vl_Total_Nota:</td>
      <td><input type="text" name="Vl_Total_Nota" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome_Transp:</td>
      <td><input type="text" name="Nome_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Frete_Conta:</td>
      <td><input type="text" name="Frete_Conta" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Placa_Veiculo:</td>
      <td><input type="text" name="Placa_Veiculo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cnpj_Transp:</td>
      <td><input type="text" name="Cnpj_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endereco_Transp:</td>
      <td><input type="text" name="Endereco_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Munic_Transp:</td>
      <td><input type="text" name="Munic_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Uf_Transp:</td>
      <td><input type="text" name="uf_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Quant_Transp:</td>
      <td><input type="text" name="Quant_Transp" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Especie:</td>
      <td><input type="text" name="Especie" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Numero:</td>
      <td><input type="text" name="Numero" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Peso_Bruto:</td>
      <td><input type="text" name="Peso_Bruto" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Peso_Liquido:</td>
      <td><input type="text" name="Peso_Liquido" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Equipamento:</td>
      <td><input type="text" name="Equipamento" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Modelo:</td>
      <td><input type="text" name="Modelo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Marca:</td>
      <td><input type="text" name="Marca" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Patrimonio:</td>
      <td><input type="text" name="Patrimonio" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Serie:</td>
      <td><input type="text" name="Serie" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Setor:</td>
      <td><input type="text" name="Setor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Garantia:</td>
      <td><input type="text" name="Garantia" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Problemacliente:</td>
      <td><input type="text" name="Problemacliente" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data_Agenda:</td>
      <td><input type="text" name="Data_Agenda" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Hora_Agenda:</td>
      <td><input type="text" name="Hora_Agenda" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">DiagnosticoTecnico:</td>
      <td><input type="text" name="DiagnosticoTecnico" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Solucao:</td>
      <td><input type="text" name="Solucao" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Previsaoentrega:</td>
      <td><input type="text" name="Previsaoentrega" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Dataentrega:</td>
      <td><input type="text" name="Dataentrega" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Recebido:</td>
      <td><input type="text" name="Recebido" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Arquivo:</td>
      <td><input type="text" name="Arquivo" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Valor:</td>
      <td><input type="text" name="valor" value="" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="Insert record" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p>&nbsp;</p>
</body>

</html>
<?php
mysql_free_result($DetailRS1);
?>

