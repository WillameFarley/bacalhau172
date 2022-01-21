<?php require_once('Connections/data.php'); ?>
<?php require_once('Connections/data.php'); ?>
<?php
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

$colname_DetailRS1 = "-1";
if (isset($_GET['recordID'])) {
  $colname_DetailRS1 = $_GET['recordID'];
}
mysql_select_db($database_data, $data);
$query_DetailRS1 = sprintf("SELECT * FROM ordemservico INNER JOIN  cliente ON ordemservico.Cliente = nome WHERE Cod_Equipamento = %s", GetSQLValueString($colname_DetailRS1, "int"));
$DetailRS1 = mysql_query($query_DetailRS1, $data) or die(mysql_error());
$row_DetailRS1 = mysql_fetch_assoc($DetailRS1);
$totalRows_DetailRS1 = mysql_num_rows($DetailRS1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SYSESTOQUE ::: BACALHAU 172</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<p><script type="text/javascript">
self.print ();
  </script>
<table width="100%" border="1" align="center" cellpadding="4" cellspacing=" 0" bordercolor="#000000">
  <tr>
    <td><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
      <tr bgcolor="#FFFFCC">
        <td width="151">&nbsp;</td>
        <td align="center" bgcolor="#FFFFCC"><p><b>RECIBO DE ENTREGA - No. <?php echo $row_DetailRS1['Cod_Equipamento']; ?><br />
          </b>seus dados</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing=" 0" cellpadding="0">
      <tr>
        <td width="276"><b><font color="#000000">T&Eacute;CNICO 
          RESPONS&Aacute;VEL</font></b><font color="#000000"><?php echo $row_DetailRS1['Funcionario']; ?></font> <font color="#000000"><br />
                      </font></td>
        <td width="176"><b>DATA 
          ENTRADA </b><?php echo $row_DetailRS1['Data_Entrada']; ?><b><br />
            </b></td>
        <td width="176" valign="top"><b>HORA 
          ENTRADA </b><?php echo $row_DetailRS1['Hora_Entrada']; ?><b><br />
            </b></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="left">
      <table width="100%" border="0" cellspacing=" 0" cellpadding="0">
        <tr>
          <td><div align="center"><b>DADOS 
            DO CLIENTE</b></div></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
            <tr>
              <td width="450"><b>Raz&atilde;o 
                Social/Nome :</b> <?php echo $row_DetailRS1['Cliente']; ?><br />
              </td>
              <td><b>CGC/CPF:</b> <?php echo $row_DetailRS1['cpf']; ?><br /></td>
            </tr>
          </table>
            <b>Endere&ccedil;o:</b> <span class="verdana"></span><span class="verdana"></span><?php echo $row_DetailRS1['endereco']; ?><br />
            <table width="100%" border="0" cellspacing="2" cellpadding="0">
                  <tr>
                    <td width="189"><strong>Bairro:</strong> <?php echo $row_DetailRS1['bairro']; ?></td>
                    <td width="146"><strong>Cidade:</strong> <?php echo $row_DetailRS1['cidade']; ?></td>
                    <td width="143"><b><strong>Estado: </strong></b><?php echo $row_DetailRS1['estado']; ?></td>
                    <td width="140"><strong>CEP:</strong> <?php echo $row_DetailRS1['cep']; ?><br /></td>
                </tr>
                  <tr>
                    <td colspan="3"><b>Telefones: </b> <span class="verdana"></span><?php echo $row_DetailRS1['fone_com']; ?>/<span class="verdana"></span> <?php echo $row_DetailRS1['fone_res']; ?>/<span class="verdana"></span> <?php echo $row_DetailRS1['celular']; ?></td>
                    <td><b>E-mail: </b><span class="verdana"></span> <?php echo $row_DetailRS1['email']; ?></td>
                  </tr>
              </table></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="2" cellpadding="0">
      <tr>
        <td colspan="2"><div align="center"><b>DADOS 
          DO EQUIPAMENTO</b></div></td>
      </tr>
      <tr>
        <td width="300" valign="top"><b> Equipamento:
        </b><?php echo $row_DetailRS1['Equipamento']; ?><b><br />
          </b></td>
        <td width="322" valign="top"><b>Marca:
             </b><?php echo $row_DetailRS1['Marca']; ?><b><br />
                  </b></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><b>Modelo: </b><?php echo $row_DetailRS1['Modelo']; ?><b><br />
            </b></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="25%"><b>N. 
              Patrimonio:<br />
              </b><?php echo $row_DetailRS1['Patrimonio']; ?><b><br />
              <br />
                </b></td>
            <td width="24%"><b>N. 
              S&eacute;rie:<br />
              </b><?php echo $row_DetailRS1['Serie']; ?><b><br />
              <br />
                </b></td>
            <td width="25%"><b>Setor:<br />
                </b><?php echo $row_DetailRS1['Setor']; ?><b><br />
                <br />
                    </b></td>
            <td width="26%"><b>Garantia:<br />
                </b><?php echo $row_DetailRS1['Garantia']; ?><b><br />
                            </b></td>
          </tr>
          <tr>
            <td><strong>Previsão do Diagnostico:</strong><br />
              <?php echo $row_DetailRS1['Data_Agenda']; ?></td>
            <td><strong>Hora do Diagnóstico:<br />
            </strong><?php echo $row_DetailRS1['Hora_Agenda']; ?></td>
            <td><strong>Previsão de Entrega:<br />
            </strong><?php echo $row_DetailRS1['Previsaoentrega']; ?></td>
            <td><strong>Data de Entrega:<br />
            </strong><?php echo $row_DetailRS1['Dataentrega']; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><p><b>Diagn&oacute;stico 
          do Cliente: 
          </b><?php echo $row_DetailRS1['Problemacliente']; ?></p>          </td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><p><strong>Diagnóstico do Técnico: </strong><?php echo $row_DetailRS1['DiagnosticoTecnico']; ?></p>          </td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><p><strong>Solução: </strong><?php echo $row_DetailRS1['Solucao']; ?></p>          </td>
      </tr>
      <tr>
        <td valign="top"><strong>Recebido por:</strong> <?php echo $row_DetailRS1['Recebido']; ?></td>
        <td valign="top"><strong>Valor:</strong> <span class="style3"><?php echo $row_DetailRS1['valor']; ?></span></td>
      </tr>
      <tr>
        <td valign="top">&nbsp;&nbsp;&nbsp;______________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
              <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura 
                do T&eacute;cnico</b>&nbsp;</td>
        <td valign="top"><div align="right">_____________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br />
                  <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assinatura 
                    do Cliente</b>&nbsp;<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></div></td>
      </tr>
      <tr>
        <td colspan="2" valign="top"><font face="Verdana, Arial, Helvetica, sans-serif">* 
              Equipamento testado e aprovado pelo cliente na entrega do Equipamento.<br />
          * O Cliente verificou o n&uacute;mero de patrimonio e de s&eacute;rie.</font></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td><div align="center"><b>seus dados</b></div></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($DetailRS1);
?>
