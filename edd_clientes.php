<?php require_once('Connections/data.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

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
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
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
  $updateSQL = sprintf("UPDATE cliente SET nome=%s, nome_razao=%s, nome=%s, proprietario=%s, cpf=%s, tipo_pessoa=%s, rg=%s, dn=%s, email=%s, fone_com=%s, fone_res=%s, celular=%s, endereco=%s, numero1=%s, complemento1=%s, bairro=%s, cidade=%s, estado=%s, cep=%s, endereco2=%s, bairro2=%s, cep2=%s, endereco3=%s, bairro3=%s, cep3=%s, vendedor=%s, categoria=%s, grupo=%s, rota=%s, tipocliente=%s, grupocliente=%s, insc_municipal=%s, insc_estadual=%s, site=%s, sexo=%s, banco=%s, banco2=%s, banco3=%s, conta=%s, conta2=%s, conta3=%s, estadocivil=%s, link_mapa=%s, referencia1=%s, porcentagem=%s, obs=%s WHERE codigo=%s",
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['nome_razao'], "text"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['proprietario'], "text"),
                       GetSQLValueString($_POST['cpf'], "text"),
                       GetSQLValueString($_POST['tipo_pessoa'], "text"),
                       GetSQLValueString($_POST['rg'], "text"),
                       GetSQLValueString($_POST['dn'], "date"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['fone_com'], "text"),
                       GetSQLValueString($_POST['fone_res'], "text"),
                       GetSQLValueString($_POST['celular'], "text"),
                       GetSQLValueString($_POST['endereco'], "text"),
                       GetSQLValueString($_POST['numero1'], "text"),
                       GetSQLValueString($_POST['complemento1'], "text"),
                       GetSQLValueString($_POST['bairro'], "text"),
                       GetSQLValueString($_POST['cidade'], "text"),
                       GetSQLValueString($_POST['estado'], "text"),
                       GetSQLValueString($_POST['cep'], "text"),
                       GetSQLValueString($_POST['endereco2'], "text"),
                       GetSQLValueString($_POST['bairro2'], "text"),
                       GetSQLValueString($_POST['cep2'], "text"),
                       GetSQLValueString($_POST['endereco3'], "text"),
                       GetSQLValueString($_POST['bairro3'], "text"),
                       GetSQLValueString($_POST['cep3'], "text"),
                       GetSQLValueString($_POST['vendedor'], "text"),
//                       GetSQLValueString($_POST['data_cadastro'], "date"),
                       GetSQLValueString($_POST['categoria'], "text"),
                       GetSQLValueString($_POST['grupo'], "text"),
                       GetSQLValueString($_POST['rota'], "text"),
                       GetSQLValueString($_POST['tipocliente'], "text"),
                       GetSQLValueString($_POST['grupocliente'], "text"),
//                       GetSQLValueString($_POST['nome_fantasia'], "text"),
                       GetSQLValueString($_POST['insc_municipal'], "text"),
                       GetSQLValueString($_POST['insc_estadual'], "text"),
                       GetSQLValueString($_POST['site'], "text"),
                       GetSQLValueString($_POST['sexo'], "text"),
                       GetSQLValueString($_POST['banco'], "text"),
                       GetSQLValueString($_POST['banco2'], "text"),
                       GetSQLValueString($_POST['banco3'], "text"),
                       GetSQLValueString($_POST['conta'], "text"),
                       GetSQLValueString($_POST['conta2'], "text"),
                       GetSQLValueString($_POST['conta3'], "text"),
                       GetSQLValueString($_POST['estadocivil'], "text"),
                       GetSQLValueString($_POST['link_mapa'], "text"),
                       GetSQLValueString($_POST['referencia1'], "text"),
                       GetSQLValueString($_POST['porcentagem'], "int"),
                       GetSQLValueString($_POST['obs'], "text"),
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

$colname_Recordset1 = "-1";
if (isset($_GET['codigo'])) {
  $colname_Recordset1 = $_GET['codigo'];
}
mysql_select_db($database_data, $data);
$query_Recordset1 = sprintf("SELECT * FROM cliente WHERE codigo = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $data) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="ALTERAR DADOS" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome:</td>
      <td><input type="text" name="nome" value="<?php echo htmlentities($row_Recordset1['nome'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Razão Social:</td>
      <td><input type="text" name="nome_razao" value="<?php echo htmlentities($row_Recordset1['nome_razao'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nome de Fantasia:</td>
      <td><input type="text" name="nome" value="<?php echo htmlentities($row_Recordset1['nome'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Proprietário:</td>
      <td><input type="text" name="proprietario" value="<?php echo htmlentities($row_Recordset1['proprietario'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">CPF/CNPJ:</td>
      <td><input type="text" name="cpf" value="<?php echo htmlentities($row_Recordset1['cpf'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo Pessoa:</td>
      <td><input type="text" name="tipo_pessoa" value="<?php echo htmlentities($row_Recordset1['tipo_pessoa'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">RG:</td>
      <td><input type="text" name="rg" value="<?php echo htmlentities($row_Recordset1['rg'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Data de Nascimento:</td>
      <td><input type="text" name="dn" value="<?php echo htmlentities($row_Recordset1['dn'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">E-mail:</td>
      <td><input type="text" name="email" value="<?php echo htmlentities($row_Recordset1['email'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fone Comercial:</td>
      <td><input type="text" name="fone_com" value="<?php echo htmlentities($row_Recordset1['fone_com'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fone Residencial:</td>
      <td><input type="text" name="fone_res" value="<?php echo htmlentities($row_Recordset1['fone_res'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Celular:</td>
      <td><input type="text" name="celular" value="<?php echo htmlentities($row_Recordset1['celular'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endereço:</td>
      <td><input type="text" name="endereco" value="<?php echo htmlentities($row_Recordset1['endereco'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Número:</td>
      <td><input type="text" name="numero1" value="<?php echo htmlentities($row_Recordset1['numero1'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Complemento:</td>
      <td><input type="text" name="complemento1" value="<?php echo htmlentities($row_Recordset1['complemento1'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bairro:</td>
      <td><input type="text" name="bairro" value="<?php echo htmlentities($row_Recordset1['bairro'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cidade:</td>
      <td><input type="text" name="cidade" value="<?php echo htmlentities($row_Recordset1['cidade'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estado:</td>
      <td><input type="text" name="estado" value="<?php echo htmlentities($row_Recordset1['estado'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cep:</td>
      <td><input type="text" name="cep" value="<?php echo htmlentities($row_Recordset1['cep'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endereço 02:</td>
      <td><input type="text" name="endereco2" value="<?php echo htmlentities($row_Recordset1['endereco2'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bairro 02:</td>
      <td><input type="text" name="bairro2" value="<?php echo htmlentities($row_Recordset1['bairro2'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cep 02:</td>
      <td><input type="text" name="cep2" value="<?php echo htmlentities($row_Recordset1['cep2'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Endereço 03:</td>
      <td><input type="text" name="endereco3" value="<?php echo htmlentities($row_Recordset1['endereco3'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Bairro 03:</td>
      <td><input type="text" name="bairro3" value="<?php echo htmlentities($row_Recordset1['bairro3'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cep 03:</td>
      <td><input type="text" name="cep3" value="<?php echo htmlentities($row_Recordset1['cep3'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Vendedor:</td>
      <td><input type="text" name="vendedor" value="<?php echo htmlentities($row_Recordset1['vendedor'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Categoria:</td>
      <td><input type="text" name="categoria" value="<?php echo htmlentities($row_Recordset1['categoria'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Grupo:</td>
      <td><input type="text" name="grupo" value="<?php echo htmlentities($row_Recordset1['grupo'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Rota:</td>
      <td><input type="text" name="rota" value="<?php echo htmlentities($row_Recordset1['rota'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tipo Cliente:</td>
      <td><input type="text" name="tipocliente" value="<?php echo htmlentities($row_Recordset1['tipocliente'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Grupo Cliente:</td>
      <td><input type="text" name="grupocliente" value="<?php echo htmlentities($row_Recordset1['grupocliente'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Inscrição Municipal:</td>
      <td><input type="text" name="insc_municipal" value="<?php echo htmlentities($row_Recordset1['insc_municipal'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Inscrição Estadual:</td>
      <td><input type="text" name="insc_estadual" value="<?php echo htmlentities($row_Recordset1['insc_estadual'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Site:</td>
      <td><input type="text" name="site" value="<?php echo htmlentities($row_Recordset1['site'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Sexo:</td>
      <td><input type="text" name="sexo" value="<?php echo htmlentities($row_Recordset1['sexo'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Banco 01:</td>
      <td><input type="text" name="banco" value="<?php echo htmlentities($row_Recordset1['banco'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Banco 02:</td>
      <td><input type="text" name="banco2" value="<?php echo htmlentities($row_Recordset1['banco2'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Banco 03:</td>
      <td><input type="text" name="banco3" value="<?php echo htmlentities($row_Recordset1['banco3'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Conta 01:</td>
      <td><input type="text" name="conta" value="<?php echo htmlentities($row_Recordset1['conta'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Conta 02:</td>
      <td><input type="text" name="conta2" value="<?php echo htmlentities($row_Recordset1['conta2'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Conta 03:</td>
      <td><input type="text" name="conta3" value="<?php echo htmlentities($row_Recordset1['conta3'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Estado Civil:</td>
      <td><input type="text" name="estadocivil" value="<?php echo htmlentities($row_Recordset1['estadocivil'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Link do Mapa:</td>
      <td><input type="text" name="link_mapa" value="<?php echo htmlentities($row_Recordset1['link_mapa'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Referencia 01:</td>
      <td><input type="text" name="referencia1" value="<?php echo htmlentities($row_Recordset1['referencia1'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Porcentagem:</td>
      <td><input type="text" name="porcentagem" value="<?php echo htmlentities($row_Recordset1['porcentagem'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Observação:</td>
      <td><input type="text" name="obs" value="<?php echo htmlentities($row_Recordset1['obs'], ENT_COMPAT, ''); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="ALTERAR DADOS" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="codigo" value="<?php echo $row_Recordset1['codigo']; ?>" />
</form>
<p>&nbsp;</p>
<form name="editar"> 

</form>
</body>
<?php
mysql_free_result($Recordset1);
?>
