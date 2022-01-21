<?php require_once('Connections/data.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the required classes
require_once('includes/tfi/TFI.php');
require_once('includes/tso/TSO.php');
require_once('includes/nav/NAV.php');

// Make unified connection variable
$conn_data = new KT_connection($data, $database_data);

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

// Filter
$tfi_listcliente2 = new TFI_TableFilter($conn_data, "tfi_listcliente2");
$tfi_listcliente2->addColumn("cliente.nome", "STRING_TYPE", "nome", "%");
$tfi_listcliente2->addColumn("cliente.fantasia", "STRING_TYPE", "fantasia", "%");
$tfi_listcliente2->addColumn("cliente.categoria", "STRING_TYPE", "categoria", "%");
$tfi_listcliente2->addColumn("cliente.grupo", "STRING_TYPE", "grupo", "%");
$tfi_listcliente2->addColumn("cliente.rota", "STRING_TYPE", "rota", "%");
$tfi_listcliente2->addColumn("cliente.tipocliente", "STRING_TYPE", "tipocliente", "%");
$tfi_listcliente2->addColumn("cliente.grupocliente", "STRING_TYPE", "grupocliente", "%");
$tfi_listcliente2->addColumn("cliente.proprietario", "STRING_TYPE", "proprietario", "%");
$tfi_listcliente2->addColumn("cliente.cpf", "STRING_TYPE", "cpf", "%");
$tfi_listcliente2->addColumn("cliente.rg", "STRING_TYPE", "rg", "%");
$tfi_listcliente2->addColumn("cliente.tipo_pessoa", "STRING_TYPE", "tipo_pessoa", "%");
$tfi_listcliente2->addColumn("cliente.insc_estadual", "STRING_TYPE", "insc_estadual", "%");
$tfi_listcliente2->addColumn("cliente.insc_municipal", "STRING_TYPE", "insc_municipal", "%");
$tfi_listcliente2->addColumn("cliente.email", "STRING_TYPE", "email", "%");
$tfi_listcliente2->addColumn("cliente.fone_com", "STRING_TYPE", "fone_com", "%");
$tfi_listcliente2->addColumn("cliente.fone_res", "STRING_TYPE", "fone_res", "%");
$tfi_listcliente2->addColumn("cliente.celular", "STRING_TYPE", "celular", "%");
$tfi_listcliente2->addColumn("cliente.endereco", "STRING_TYPE", "endereco", "%");
$tfi_listcliente2->addColumn("cliente.endereco2", "STRING_TYPE", "endereco2", "%");
$tfi_listcliente2->addColumn("cliente.endereco3", "STRING_TYPE", "endereco3", "%");
$tfi_listcliente2->addColumn("cliente.bairro", "STRING_TYPE", "bairro", "%");
$tfi_listcliente2->addColumn("cliente.bairro2", "STRING_TYPE", "bairro2", "%");
$tfi_listcliente2->addColumn("cliente.bairro3", "STRING_TYPE", "bairro3", "%");
$tfi_listcliente2->addColumn("cliente.cidade", "STRING_TYPE", "cidade", "%");
$tfi_listcliente2->addColumn("cliente.estado", "STRING_TYPE", "estado", "%");
$tfi_listcliente2->addColumn("cliente.cep", "STRING_TYPE", "cep", "%");
$tfi_listcliente2->addColumn("cliente.vendedor", "STRING_TYPE", "vendedor", "%");
$tfi_listcliente2->addColumn("cliente.porcentagem", "STRING_TYPE", "porcentagem", "%");
$tfi_listcliente2->addColumn("cliente.link_mapa", "STRING_TYPE", "link_mapa", "%");
$tfi_listcliente2->addColumn("cliente.obs", "STRING_TYPE", "obs", "%");
$tfi_listcliente2->addColumn("cliente.site", "STRING_TYPE", "site", "%");
$tfi_listcliente2->addColumn("cliente.sexo", "STRING_TYPE", "sexo", "%");
$tfi_listcliente2->addColumn("cliente.dn", "STRING_TYPE", "dn", "%");
$tfi_listcliente2->addColumn("cliente.banco", "STRING_TYPE", "banco", "%");
$tfi_listcliente2->addColumn("cliente.banco2", "STRING_TYPE", "banco2", "%");
$tfi_listcliente2->addColumn("cliente.banco3", "STRING_TYPE", "banco3", "%");
$tfi_listcliente2->addColumn("cliente.conta", "STRING_TYPE", "conta", "%");
$tfi_listcliente2->addColumn("cliente.conta2", "STRING_TYPE", "conta2", "%");
$tfi_listcliente2->addColumn("cliente.conta3", "STRING_TYPE", "conta3", "%");
$tfi_listcliente2->addColumn("cliente.estadocivil", "STRING_TYPE", "estadocivil", "%");
$tfi_listcliente2->addColumn("cliente.data_cadastro", "STRING_TYPE", "data_cadastro", "%");
$tfi_listcliente2->addColumn("cliente.cep2", "STRING_TYPE", "cep2", "%");
$tfi_listcliente2->addColumn("cliente.cep3", "STRING_TYPE", "cep3", "%");
$tfi_listcliente2->addColumn("cliente.nome_razao", "STRING_TYPE", "nome_razao", "%");
$tfi_listcliente2->Execute();

// Sorter
$tso_listcliente2 = new TSO_TableSorter("rscliente1", "tso_listcliente2");
$tso_listcliente2->addColumn("cliente.nome");
$tso_listcliente2->addColumn("cliente.fantasia");
$tso_listcliente2->addColumn("cliente.categoria");
$tso_listcliente2->addColumn("cliente.grupo");
$tso_listcliente2->addColumn("cliente.rota");
$tso_listcliente2->addColumn("cliente.tipocliente");
$tso_listcliente2->addColumn("cliente.grupocliente");
$tso_listcliente2->addColumn("cliente.proprietario");
$tso_listcliente2->addColumn("cliente.cpf");
$tso_listcliente2->addColumn("cliente.rg");
$tso_listcliente2->addColumn("cliente.tipo_pessoa");
$tso_listcliente2->addColumn("cliente.insc_estadual");
$tso_listcliente2->addColumn("cliente.insc_municipal");
$tso_listcliente2->addColumn("cliente.email");
$tso_listcliente2->addColumn("cliente.fone_com");
$tso_listcliente2->addColumn("cliente.fone_res");
$tso_listcliente2->addColumn("cliente.celular");
$tso_listcliente2->addColumn("cliente.endereco");
$tso_listcliente2->addColumn("cliente.endereco2");
$tso_listcliente2->addColumn("cliente.endereco3");
$tso_listcliente2->addColumn("cliente.bairro");
$tso_listcliente2->addColumn("cliente.bairro2");
$tso_listcliente2->addColumn("cliente.bairro3");
$tso_listcliente2->addColumn("cliente.cidade");
$tso_listcliente2->addColumn("cliente.estado");
$tso_listcliente2->addColumn("cliente.cep");
$tso_listcliente2->addColumn("cliente.vendedor");
$tso_listcliente2->addColumn("cliente.porcentagem");
$tso_listcliente2->addColumn("cliente.link_mapa");
$tso_listcliente2->addColumn("cliente.obs");
$tso_listcliente2->addColumn("cliente.site");
$tso_listcliente2->addColumn("cliente.sexo");
$tso_listcliente2->addColumn("cliente.dn");
$tso_listcliente2->addColumn("cliente.banco");
$tso_listcliente2->addColumn("cliente.banco2");
$tso_listcliente2->addColumn("cliente.banco3");
$tso_listcliente2->addColumn("cliente.conta");
$tso_listcliente2->addColumn("cliente.conta2");
$tso_listcliente2->addColumn("cliente.conta3");
$tso_listcliente2->addColumn("cliente.estadocivil");
$tso_listcliente2->addColumn("cliente.data_cadastro");
$tso_listcliente2->addColumn("cliente.cep2");
$tso_listcliente2->addColumn("cliente.cep3");
$tso_listcliente2->addColumn("cliente.nome_razao");
$tso_listcliente2->setDefault("cliente.fantasia");
$tso_listcliente2->Execute();

// Navigation
$nav_listcliente2 = new NAV_Regular("nav_listcliente2", "rscliente1", "", $_SERVER['PHP_SELF'], 100);

//NeXTenesio3 Special List Recordset
$maxRows_rscliente1 = $_SESSION['max_rows_nav_listcliente2'];
$pageNum_rscliente1 = 0;
if (isset($_GET['pageNum_rscliente1'])) {
  $pageNum_rscliente1 = $_GET['pageNum_rscliente1'];
}
$startRow_rscliente1 = $pageNum_rscliente1 * $maxRows_rscliente1;

// Defining List Recordset variable
$NXTFilter_rscliente1 = "1=1";
if (isset($_SESSION['filter_tfi_listcliente2'])) {
  $NXTFilter_rscliente1 = $_SESSION['filter_tfi_listcliente2'];
}
// Defining List Recordset variable
$NXTSort_rscliente1 = "cliente.fantasia";
if (isset($_SESSION['sorter_tso_listcliente2'])) {
  $NXTSort_rscliente1 = $_SESSION['sorter_tso_listcliente2'];
}
mysql_select_db($database_data, $data);

$query_rscliente1 = "SELECT cliente.nome, cliente.fantasia, cliente.categoria, cliente.grupo, cliente.rota, cliente.tipocliente, cliente.grupocliente, cliente.proprietario, cliente.cpf, cliente.rg, cliente.tipo_pessoa, cliente.insc_estadual, cliente.insc_municipal, cliente.email, cliente.fone_com, cliente.fone_res, cliente.celular, cliente.endereco, cliente.endereco2, cliente.endereco3, cliente.bairro, cliente.bairro2, cliente.bairro3, cliente.cidade, cliente.estado, cliente.cep, cliente.vendedor, cliente.porcentagem, cliente.link_mapa, cliente.obs, cliente.site, cliente.sexo, cliente.dn, cliente.banco, cliente.banco2, cliente.banco3, cliente.conta, cliente.conta2, cliente.conta3, cliente.estadocivil, cliente.data_cadastro, cliente.cep2, cliente.cep3, cliente.nome_razao, cliente.codigo FROM cliente WHERE {$NXTFilter_rscliente1} ORDER BY {$NXTSort_rscliente1}";
$query_limit_rscliente1 = sprintf("%s LIMIT %d, %d", $query_rscliente1, $startRow_rscliente1, $maxRows_rscliente1);
$rscliente1 = mysql_query($query_limit_rscliente1, $data) or die(mysql_error());
$row_rscliente1 = mysql_fetch_assoc($rscliente1);

if (isset($_GET['totalRows_rscliente1'])) {
  $totalRows_rscliente1 = $_GET['totalRows_rscliente1'];
} else {
  $all_rscliente1 = mysql_query($query_rscliente1);
  $totalRows_rscliente1 = mysql_num_rows($all_rscliente1);
}
$totalPages_rscliente1 = ceil($totalRows_rscliente1/$maxRows_rscliente1)-1;
//End NeXTenesio3 Special List Recordset

$nav_listcliente2->checkBoundries();
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/list.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/list.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_LIST_SETTINGS = {
  duplicate_buttons: true,
  duplicate_navigation: true,
  row_effects: true,
  show_as_buttons: true,
  record_counter: true
}
</script>
<style type="text/css">
  /* Dynamic List row settings */
  .KT_col_nome {width:1785px; overflow:hidden;}
  .KT_col_fantasia {width:1785px; overflow:hidden;}
  .KT_col_categoria {width:140px; overflow:hidden;}
  .KT_col_grupo {width:140px; overflow:hidden;}
  .KT_col_rota {width:140px; overflow:hidden;}
  .KT_col_tipocliente {width:140px; overflow:hidden;}
  .KT_col_grupocliente {width:140px; overflow:hidden;}
  .KT_col_proprietario {width:350px; overflow:hidden;}
  .KT_col_cpf {width:140px; overflow:hidden;}
  .KT_col_rg {width:140px; overflow:hidden;}
  .KT_col_tipo_pessoa {width:140px; overflow:hidden;}
  .KT_col_insc_estadual {width:140px; overflow:hidden;}
  .KT_col_insc_municipal {width:140px; overflow:hidden;}
  .KT_col_email {width:350px; overflow:hidden;}
  .KT_col_fone_com {width:140px; overflow:hidden;}
  .KT_col_fone_res {width:140px; overflow:hidden;}
  .KT_col_celular {width:140px; overflow:hidden;}
  .KT_col_endereco {width:1785px; overflow:hidden;}
  .KT_col_endereco2 {width:1785px; overflow:hidden;}
  .KT_col_endereco3 {width:1785px; overflow:hidden;}
  .KT_col_bairro {width:350px; overflow:hidden;}
  .KT_col_bairro2 {width:350px; overflow:hidden;}
  .KT_col_bairro3 {width:350px; overflow:hidden;}
  .KT_col_cidade {width:140px; overflow:hidden;}
  .KT_col_estado {width:140px; overflow:hidden;}
  .KT_col_cep {width:140px; overflow:hidden;}
  .KT_col_vendedor {width:140px; overflow:hidden;}
  .KT_col_porcentagem {width:140px; overflow:hidden;}
  .KT_col_link_mapa {width:140px; overflow:hidden;}
  .KT_col_obs {width:140px; overflow:hidden;}
  .KT_col_site {width:140px; overflow:hidden;}
  .KT_col_sexo {width:140px; overflow:hidden;}
  .KT_col_dn {width:140px; overflow:hidden;}
  .KT_col_banco {width:140px; overflow:hidden;}
  .KT_col_banco2 {width:140px; overflow:hidden;}
  .KT_col_banco3 {width:140px; overflow:hidden;}
  .KT_col_conta {width:140px; overflow:hidden;}
  .KT_col_conta2 {width:140px; overflow:hidden;}
  .KT_col_conta3 {width:140px; overflow:hidden;}
  .KT_col_estadocivil {width:140px; overflow:hidden;}
  .KT_col_data_cadastro {width:140px; overflow:hidden;}
  .KT_col_cep2 {width:63px; overflow:hidden;}
  .KT_col_cep3 {width:63px; overflow:hidden;}
  .KT_col_nome_razao {width:1785px; overflow:hidden;}
</style>
</head>

<body>
<div class="KT_tng" id="listcliente2">
  <h1> Cliente
    <?php
  $nav_listcliente2->Prepare();
  require("includes/nav/NAV_Text_Statistics.inc.php");
?>
  </h1>
  <div class="KT_tnglist">
    <form action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>" method="post" id="form1">
      <div class="KT_options"> <a href="<?php echo $nav_listcliente2->getShowAllLink(); ?>"><?php echo NXT_getResource("Show"); ?>
            <?php 
  // Show IF Conditional region1
  if (@$_GET['show_all_nav_listcliente2'] == 1) {
?>
              <?php echo $_SESSION['default_max_rows_nav_listcliente2']; ?>
              <?php 
  // else Conditional region1
  } else { ?>
              <?php echo NXT_getResource("all"); ?>
              <?php } 
  // endif Conditional region1
?>
            <?php echo NXT_getResource("records"); ?></a> &nbsp;
        &nbsp;
                <?php 
  // Show IF Conditional region2
  if (@$_SESSION['has_filter_tfi_listcliente2'] == 1) {
?>
                  <a href="<?php echo $tfi_listcliente2->getResetFilterLink(); ?>"><?php echo NXT_getResource("Reset filter"); ?></a>
                  <?php 
  // else Conditional region2
  } else { ?>
                  <a href="<?php echo $tfi_listcliente2->getShowFilterLink(); ?>"><?php echo NXT_getResource("Show filter"); ?></a>
                  <?php } 
  // endif Conditional region2
?>
      </div>
      <table cellpadding="2" cellspacing="0" class="KT_tngtable">
        <thead>
          <tr class="KT_row_order">
            <th> <input type="checkbox" name="KT_selAll" id="KT_selAll"/>
            </th>
            <th id="nome" class="KT_sorter KT_col_nome <?php echo $tso_listcliente2->getSortIcon('cliente.nome'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.nome'); ?>">Nome</a> </th>
            <th id="fantasia" class="KT_sorter KT_col_fantasia <?php echo $tso_listcliente2->getSortIcon('cliente.fantasia'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.fantasia'); ?>">Fantasia</a> </th>
            <th id="categoria" class="KT_sorter KT_col_categoria <?php echo $tso_listcliente2->getSortIcon('cliente.categoria'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.categoria'); ?>">Categoria</a> </th>
            <th id="grupo" class="KT_sorter KT_col_grupo <?php echo $tso_listcliente2->getSortIcon('cliente.grupo'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.grupo'); ?>">Grupo</a> </th>
            <th id="rota" class="KT_sorter KT_col_rota <?php echo $tso_listcliente2->getSortIcon('cliente.rota'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.rota'); ?>">Rota</a> </th>
            <th id="tipocliente" class="KT_sorter KT_col_tipocliente <?php echo $tso_listcliente2->getSortIcon('cliente.tipocliente'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.tipocliente'); ?>">Tipocliente</a> </th>
            <th id="grupocliente" class="KT_sorter KT_col_grupocliente <?php echo $tso_listcliente2->getSortIcon('cliente.grupocliente'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.grupocliente'); ?>">Grupocliente</a> </th>
            <th id="proprietario" class="KT_sorter KT_col_proprietario <?php echo $tso_listcliente2->getSortIcon('cliente.proprietario'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.proprietario'); ?>">Proprietario</a> </th>
            <th id="cpf" class="KT_sorter KT_col_cpf <?php echo $tso_listcliente2->getSortIcon('cliente.cpf'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.cpf'); ?>">Cpf</a> </th>
            <th id="rg" class="KT_sorter KT_col_rg <?php echo $tso_listcliente2->getSortIcon('cliente.rg'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.rg'); ?>">Rg</a> </th>
            <th id="tipo_pessoa" class="KT_sorter KT_col_tipo_pessoa <?php echo $tso_listcliente2->getSortIcon('cliente.tipo_pessoa'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.tipo_pessoa'); ?>">Tipo_pessoa</a> </th>
            <th id="insc_estadual" class="KT_sorter KT_col_insc_estadual <?php echo $tso_listcliente2->getSortIcon('cliente.insc_estadual'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.insc_estadual'); ?>">Insc_estadual</a> </th>
            <th id="insc_municipal" class="KT_sorter KT_col_insc_municipal <?php echo $tso_listcliente2->getSortIcon('cliente.insc_municipal'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.insc_municipal'); ?>">Insc_municipal</a> </th>
            <th id="email" class="KT_sorter KT_col_email <?php echo $tso_listcliente2->getSortIcon('cliente.email'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.email'); ?>">Email</a> </th>
            <th id="fone_com" class="KT_sorter KT_col_fone_com <?php echo $tso_listcliente2->getSortIcon('cliente.fone_com'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.fone_com'); ?>">Fone</a> </th>
            <th id="fone_res" class="KT_sorter KT_col_fone_res <?php echo $tso_listcliente2->getSortIcon('cliente.fone_res'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.fone_res'); ?>">Fone</a> </th>
            <th id="celular" class="KT_sorter KT_col_celular <?php echo $tso_listcliente2->getSortIcon('cliente.celular'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.celular'); ?>">Celular</a> </th>
            <th id="endereco" class="KT_sorter KT_col_endereco <?php echo $tso_listcliente2->getSortIcon('cliente.endereco'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.endereco'); ?>">Endereco</a> </th>
            <th id="endereco2" class="KT_sorter KT_col_endereco2 <?php echo $tso_listcliente2->getSortIcon('cliente.endereco2'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.endereco2'); ?>">Endereco2</a> </th>
            <th id="endereco3" class="KT_sorter KT_col_endereco3 <?php echo $tso_listcliente2->getSortIcon('cliente.endereco3'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.endereco3'); ?>">Endereco3</a> </th>
            <th id="bairro" class="KT_sorter KT_col_bairro <?php echo $tso_listcliente2->getSortIcon('cliente.bairro'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.bairro'); ?>">Bairro</a> </th>
            <th id="bairro2" class="KT_sorter KT_col_bairro2 <?php echo $tso_listcliente2->getSortIcon('cliente.bairro2'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.bairro2'); ?>">Bairro2</a> </th>
            <th id="bairro3" class="KT_sorter KT_col_bairro3 <?php echo $tso_listcliente2->getSortIcon('cliente.bairro3'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.bairro3'); ?>">Bairro3</a> </th>
            <th id="cidade" class="KT_sorter KT_col_cidade <?php echo $tso_listcliente2->getSortIcon('cliente.cidade'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.cidade'); ?>">Cidade</a> </th>
            <th id="estado" class="KT_sorter KT_col_estado <?php echo $tso_listcliente2->getSortIcon('cliente.estado'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.estado'); ?>">Estado</a> </th>
            <th id="cep" class="KT_sorter KT_col_cep <?php echo $tso_listcliente2->getSortIcon('cliente.cep'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.cep'); ?>">Cep</a> </th>
            <th id="vendedor" class="KT_sorter KT_col_vendedor <?php echo $tso_listcliente2->getSortIcon('cliente.vendedor'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.vendedor'); ?>">Vendedor</a> </th>
            <th id="porcentagem" class="KT_sorter KT_col_porcentagem <?php echo $tso_listcliente2->getSortIcon('cliente.porcentagem'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.porcentagem'); ?>">Porcentagem</a> </th>
            <th id="link_mapa" class="KT_sorter KT_col_link_mapa <?php echo $tso_listcliente2->getSortIcon('cliente.link_mapa'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.link_mapa'); ?>">Link_mapa</a> </th>
            <th id="obs" class="KT_sorter KT_col_obs <?php echo $tso_listcliente2->getSortIcon('cliente.obs'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.obs'); ?>">Obs</a> </th>
            <th id="site" class="KT_sorter KT_col_site <?php echo $tso_listcliente2->getSortIcon('cliente.site'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.site'); ?>">Site</a> </th>
            <th id="sexo" class="KT_sorter KT_col_sexo <?php echo $tso_listcliente2->getSortIcon('cliente.sexo'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.sexo'); ?>">Sexo</a> </th>
            <th id="dn" class="KT_sorter KT_col_dn <?php echo $tso_listcliente2->getSortIcon('cliente.dn'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.dn'); ?>">Dn</a> </th>
            <th id="banco" class="KT_sorter KT_col_banco <?php echo $tso_listcliente2->getSortIcon('cliente.banco'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.banco'); ?>">Banco</a> </th>
            <th id="banco2" class="KT_sorter KT_col_banco2 <?php echo $tso_listcliente2->getSortIcon('cliente.banco2'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.banco2'); ?>">Banco2</a> </th>
            <th id="banco3" class="KT_sorter KT_col_banco3 <?php echo $tso_listcliente2->getSortIcon('cliente.banco3'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.banco3'); ?>">Banco3</a> </th>
            <th id="conta" class="KT_sorter KT_col_conta <?php echo $tso_listcliente2->getSortIcon('cliente.conta'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.conta'); ?>">Conta</a> </th>
            <th id="conta2" class="KT_sorter KT_col_conta2 <?php echo $tso_listcliente2->getSortIcon('cliente.conta2'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.conta2'); ?>">Conta2</a> </th>
            <th id="conta3" class="KT_sorter KT_col_conta3 <?php echo $tso_listcliente2->getSortIcon('cliente.conta3'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.conta3'); ?>">Conta3</a> </th>
            <th id="estadocivil" class="KT_sorter KT_col_estadocivil <?php echo $tso_listcliente2->getSortIcon('cliente.estadocivil'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.estadocivil'); ?>">Estadocivil</a> </th>
            <th id="data_cadastro" class="KT_sorter KT_col_data_cadastro <?php echo $tso_listcliente2->getSortIcon('cliente.data_cadastro'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.data_cadastro'); ?>">Data_cadastro</a> </th>
            <th id="cep2" class="KT_sorter KT_col_cep2 <?php echo $tso_listcliente2->getSortIcon('cliente.cep2'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.cep2'); ?>">Cep2</a> </th>
            <th id="cep3" class="KT_sorter KT_col_cep3 <?php echo $tso_listcliente2->getSortIcon('cliente.cep3'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.cep3'); ?>">Cep3</a> </th>
            <th id="nome_razao" class="KT_sorter KT_col_nome_razao <?php echo $tso_listcliente2->getSortIcon('cliente.nome_razao'); ?>"> <a href="<?php echo $tso_listcliente2->getSortLink('cliente.nome_razao'); ?>">Nome_razao</a> </th>
            <th>&nbsp;</th>
          </tr>
          <?php 
  // Show IF Conditional region3
  if (@$_SESSION['has_filter_tfi_listcliente2'] == 1) {
?>
            <tr class="KT_row_filter">
              <td>&nbsp;</td>
              <td><input type="text" name="tfi_listcliente2_nome" id="tfi_listcliente2_nome" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_nome']); ?>" size="255" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_fantasia" id="tfi_listcliente2_fantasia" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_fantasia']); ?>" size="255" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_categoria" id="tfi_listcliente2_categoria" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_categoria']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_grupo" id="tfi_listcliente2_grupo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_grupo']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_rota" id="tfi_listcliente2_rota" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_rota']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_tipocliente" id="tfi_listcliente2_tipocliente" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_tipocliente']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_grupocliente" id="tfi_listcliente2_grupocliente" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_grupocliente']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_proprietario" id="tfi_listcliente2_proprietario" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_proprietario']); ?>" size="50" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_cpf" id="tfi_listcliente2_cpf" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_cpf']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_rg" id="tfi_listcliente2_rg" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_rg']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_tipo_pessoa" id="tfi_listcliente2_tipo_pessoa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_tipo_pessoa']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_insc_estadual" id="tfi_listcliente2_insc_estadual" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_insc_estadual']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_insc_municipal" id="tfi_listcliente2_insc_municipal" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_insc_municipal']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_email" id="tfi_listcliente2_email" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_email']); ?>" size="50" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_fone_com" id="tfi_listcliente2_fone_com" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_fone_com']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_fone_res" id="tfi_listcliente2_fone_res" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_fone_res']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_celular" id="tfi_listcliente2_celular" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_celular']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_endereco" id="tfi_listcliente2_endereco" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_endereco']); ?>" size="255" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_endereco2" id="tfi_listcliente2_endereco2" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_endereco2']); ?>" size="255" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_endereco3" id="tfi_listcliente2_endereco3" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_endereco3']); ?>" size="255" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_bairro" id="tfi_listcliente2_bairro" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_bairro']); ?>" size="50" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_bairro2" id="tfi_listcliente2_bairro2" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_bairro2']); ?>" size="50" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_bairro3" id="tfi_listcliente2_bairro3" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_bairro3']); ?>" size="50" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_cidade" id="tfi_listcliente2_cidade" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_cidade']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_estado" id="tfi_listcliente2_estado" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_estado']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_cep" id="tfi_listcliente2_cep" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_cep']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_vendedor" id="tfi_listcliente2_vendedor" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_vendedor']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_porcentagem" id="tfi_listcliente2_porcentagem" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_porcentagem']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_link_mapa" id="tfi_listcliente2_link_mapa" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_link_mapa']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listcliente2_obs" id="tfi_listcliente2_obs" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_obs']); ?>" size="20" maxlength="100" /></td>
              <td><input type="text" name="tfi_listcliente2_site" id="tfi_listcliente2_site" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_site']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_sexo" id="tfi_listcliente2_sexo" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_sexo']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_dn" id="tfi_listcliente2_dn" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_dn']); ?>" size="20" maxlength="20" /></td>
              <td><input type="text" name="tfi_listcliente2_banco" id="tfi_listcliente2_banco" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_banco']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_banco2" id="tfi_listcliente2_banco2" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_banco2']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_banco3" id="tfi_listcliente2_banco3" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_banco3']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_conta" id="tfi_listcliente2_conta" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_conta']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_conta2" id="tfi_listcliente2_conta2" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_conta2']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_conta3" id="tfi_listcliente2_conta3" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_conta3']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_estadocivil" id="tfi_listcliente2_estadocivil" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_estadocivil']); ?>" size="20" maxlength="255" /></td>
              <td><input type="text" name="tfi_listcliente2_data_cadastro" id="tfi_listcliente2_data_cadastro" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_data_cadastro']); ?>" size="20" maxlength="20" /></td>
              <td><input type="text" name="tfi_listcliente2_cep2" id="tfi_listcliente2_cep2" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_cep2']); ?>" size="9" maxlength="9" /></td>
              <td><input type="text" name="tfi_listcliente2_cep3" id="tfi_listcliente2_cep3" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_cep3']); ?>" size="9" maxlength="9" /></td>
              <td><input type="text" name="tfi_listcliente2_nome_razao" id="tfi_listcliente2_nome_razao" value="<?php echo KT_escapeAttribute(@$_SESSION['tfi_listcliente2_nome_razao']); ?>" size="255" maxlength="20" /></td>
              <td><input type="submit" name="tfi_listcliente2" value="<?php echo NXT_getResource("Filter"); ?>" /></td>
            </tr>
            <?php } 
  // endif Conditional region3
?>
        </thead>
        <tbody>
          <?php if ($totalRows_rscliente1 == 0) { // Show if recordset empty ?>
            <tr>
              <td colspan="46"><?php echo NXT_getResource("The table is empty or the filter you've selected is too restrictive."); ?></td>
            </tr>
            <?php } // Show if recordset empty ?>
          <?php if ($totalRows_rscliente1 > 0) { // Show if recordset not empty ?>
            <?php do { ?>
              <tr class="<?php echo @$cnt1++%2==0 ? "" : "KT_even"; ?>">
                <td><input type="checkbox" name="kt_pk_cliente" class="id_checkbox" value="<?php echo $row_rscliente1['codigo']; ?>" />
                    <input type="hidden" name="codigo" class="id_field" value="<?php echo $row_rscliente1['codigo']; ?>" />
                </td>
                <td><div class="KT_col_nome"><?php echo KT_FormatForList($row_rscliente1['nome'], 255); ?></div></td>
                <td><div class="KT_col_fantasia"><?php echo KT_FormatForList($row_rscliente1['fantasia'], 255); ?></div></td>
                <td><div class="KT_col_categoria"><?php echo KT_FormatForList($row_rscliente1['categoria'], 20); ?></div></td>
                <td><div class="KT_col_grupo"><?php echo KT_FormatForList($row_rscliente1['grupo'], 20); ?></div></td>
                <td><div class="KT_col_rota"><?php echo KT_FormatForList($row_rscliente1['rota'], 20); ?></div></td>
                <td><div class="KT_col_tipocliente"><?php echo KT_FormatForList($row_rscliente1['tipocliente'], 20); ?></div></td>
                <td><div class="KT_col_grupocliente"><?php echo KT_FormatForList($row_rscliente1['grupocliente'], 20); ?></div></td>
                <td><div class="KT_col_proprietario"><?php echo KT_FormatForList($row_rscliente1['proprietario'], 50); ?></div></td>
                <td><div class="KT_col_cpf"><?php echo KT_FormatForList($row_rscliente1['cpf'], 20); ?></div></td>
                <td><div class="KT_col_rg"><?php echo KT_FormatForList($row_rscliente1['rg'], 20); ?></div></td>
                <td><div class="KT_col_tipo_pessoa"><?php echo KT_FormatForList($row_rscliente1['tipo_pessoa'], 20); ?></div></td>
                <td><div class="KT_col_insc_estadual"><?php echo KT_FormatForList($row_rscliente1['insc_estadual'], 20); ?></div></td>
                <td><div class="KT_col_insc_municipal"><?php echo KT_FormatForList($row_rscliente1['insc_municipal'], 20); ?></div></td>
                <td><div class="KT_col_email"><?php echo KT_FormatForList($row_rscliente1['email'], 50); ?></div></td>
                <td><div class="KT_col_fone_com"><?php echo KT_FormatForList($row_rscliente1['fone_com'], 20); ?></div></td>
                <td><div class="KT_col_fone_res"><?php echo KT_FormatForList($row_rscliente1['fone_res'], 20); ?></div></td>
                <td><div class="KT_col_celular"><?php echo KT_FormatForList($row_rscliente1['celular'], 20); ?></div></td>
                <td><div class="KT_col_endereco"><?php echo KT_FormatForList($row_rscliente1['endereco'], 255); ?></div></td>
                <td><div class="KT_col_endereco2"><?php echo KT_FormatForList($row_rscliente1['endereco2'], 255); ?></div></td>
                <td><div class="KT_col_endereco3"><?php echo KT_FormatForList($row_rscliente1['endereco3'], 255); ?></div></td>
                <td><div class="KT_col_bairro"><?php echo KT_FormatForList($row_rscliente1['bairro'], 50); ?></div></td>
                <td><div class="KT_col_bairro2"><?php echo KT_FormatForList($row_rscliente1['bairro2'], 50); ?></div></td>
                <td><div class="KT_col_bairro3"><?php echo KT_FormatForList($row_rscliente1['bairro3'], 50); ?></div></td>
                <td><div class="KT_col_cidade"><?php echo KT_FormatForList($row_rscliente1['cidade'], 20); ?></div></td>
                <td><div class="KT_col_estado"><?php echo KT_FormatForList($row_rscliente1['estado'], 20); ?></div></td>
                <td><div class="KT_col_cep"><?php echo KT_FormatForList($row_rscliente1['cep'], 20); ?></div></td>
                <td><div class="KT_col_vendedor"><?php echo KT_FormatForList($row_rscliente1['vendedor'], 20); ?></div></td>
                <td><div class="KT_col_porcentagem"><?php echo KT_FormatForList($row_rscliente1['porcentagem'], 20); ?></div></td>
                <td><div class="KT_col_link_mapa"><?php echo KT_FormatForList($row_rscliente1['link_mapa'], 20); ?></div></td>
                <td><div class="KT_col_obs"><?php echo KT_FormatForList($row_rscliente1['obs'], 20); ?></div></td>
                <td><div class="KT_col_site"><?php echo KT_FormatForList($row_rscliente1['site'], 20); ?></div></td>
                <td><div class="KT_col_sexo"><?php echo KT_FormatForList($row_rscliente1['sexo'], 20); ?></div></td>
                <td><div class="KT_col_dn"><?php echo KT_FormatForList($row_rscliente1['dn'], 20); ?></div></td>
                <td><div class="KT_col_banco"><?php echo KT_FormatForList($row_rscliente1['banco'], 20); ?></div></td>
                <td><div class="KT_col_banco2"><?php echo KT_FormatForList($row_rscliente1['banco2'], 20); ?></div></td>
                <td><div class="KT_col_banco3"><?php echo KT_FormatForList($row_rscliente1['banco3'], 20); ?></div></td>
                <td><div class="KT_col_conta"><?php echo KT_FormatForList($row_rscliente1['conta'], 20); ?></div></td>
                <td><div class="KT_col_conta2"><?php echo KT_FormatForList($row_rscliente1['conta2'], 20); ?></div></td>
                <td><div class="KT_col_conta3"><?php echo KT_FormatForList($row_rscliente1['conta3'], 20); ?></div></td>
                <td><div class="KT_col_estadocivil"><?php echo KT_FormatForList($row_rscliente1['estadocivil'], 20); ?></div></td>
                <td><div class="KT_col_data_cadastro"><?php echo KT_FormatForList($row_rscliente1['data_cadastro'], 20); ?></div></td>
                <td><div class="KT_col_cep2"><?php echo KT_FormatForList($row_rscliente1['cep2'], 9); ?></div></td>
                <td><div class="KT_col_cep3"><?php echo KT_FormatForList($row_rscliente1['cep3'], 9); ?></div></td>
                <td><div class="KT_col_nome_razao"><?php echo KT_FormatForList($row_rscliente1['nome_razao'], 255); ?></div></td>
                <td><a class="KT_edit_link" href="alterarExcluir.php?codigo=<?php echo $row_rscliente1['codigo']; ?>&amp;KT_back=1"><?php echo NXT_getResource("edit_one"); ?></a> <a class="KT_delete_link" href="#delete"><?php echo NXT_getResource("delete_one"); ?></a> </td>
              </tr>
              <?php } while ($row_rscliente1 = mysql_fetch_assoc($rscliente1)); ?>
            <?php } // Show if recordset not empty ?>
        </tbody>
      </table>
      <div class="KT_bottomnav">
        <div>
          <?php
            $nav_listcliente2->Prepare();
            require("includes/nav/NAV_Text_Navigation.inc.php");
          ?>
        </div>
      </div>
      <div class="KT_bottombuttons">
        <div class="KT_operations"> <a class="KT_edit_op_link" href="#" onclick="nxt_list_edit_link_form(this); return false;"><?php echo NXT_getResource("edit_all"); ?></a> <a class="KT_delete_op_link" href="#" onclick="nxt_list_delete_link_form(this); return false;"><?php echo NXT_getResource("delete_all"); ?></a> </div>
        <span>&nbsp;</span>
        <select name="no_new" id="no_new">
          <option value="1">1</option>
          <option value="3">3</option>
          <option value="6">6</option>
        </select>
        <a class="KT_additem_op_link" href="edd-clientes.php?KT_back=1" onclick="return nxt_list_additem(this)"><?php echo NXT_getResource("add new"); ?></a> </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rscliente1);
?>
