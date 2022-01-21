<?php require_once('Connections/data.php'); ?>
<?php
// Load the common classes
require_once('includes/common/KT_common.php');

// Load the tNG classes
require_once('includes/tng/tNG.inc.php');

// Load the KT_back class
require_once('includes/nxt/KT_back.php');

// Make a transaction dispatcher instance
$tNGs = new tNG_dispatcher("");

// Make unified connection variable
$conn_data = new KT_connection($data, $database_data);

// Start trigger
$formValidation = new tNG_FormValidation();
$formValidation->addField("email", false, "text", "email", "", "", "Digite um e-mail válido.");
$formValidation->addField("cep", false, "text", "zip_generic", "", "", "Digite um CEP válido.");
$formValidation->addField("cep2", false, "text", "zip_generic", "", "", "Digite um CEP válido.");
$formValidation->addField("cep3", false, "text", "zip_generic", "", "", "Digite um CEP válido.");
$tNGs->prepareValidation($formValidation);
// End trigger

// Make an insert transaction instance
//$ins_cliente = new tNG_multipleInsert($conn_data);
$tNGs->addTransaction($ins_cliente);
// Register triggers
//$ins_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Insert1");
//$ins_cliente->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
//$ins_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
//$ins_cliente->setTable("cliente");
$ins_cliente->addColumn("nome", "STRING_TYPE", "POST", "nome");
$ins_cliente->addColumn("fantasia", "STRING_TYPE", "POST", "fantasia");
$ins_cliente->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$ins_cliente->addColumn("grupo", "STRING_TYPE", "POST", "grupo");
$ins_cliente->addColumn("rota", "STRING_TYPE", "POST", "rota");
$ins_cliente->addColumn("tipocliente", "STRING_TYPE", "POST", "tipocliente");
$ins_cliente->addColumn("grupocliente", "STRING_TYPE", "POST", "grupocliente");
$ins_cliente->addColumn("proprietario", "STRING_TYPE", "POST", "proprietario");
$ins_cliente->addColumn("cpf", "STRING_TYPE", "POST", "cpf");
$ins_cliente->addColumn("rg", "STRING_TYPE", "POST", "rg");
$ins_cliente->addColumn("tipo_pessoa", "STRING_TYPE", "POST", "tipo_pessoa");
$ins_cliente->addColumn("insc_estadual", "STRING_TYPE", "POST", "insc_estadual");
$ins_cliente->addColumn("insc_municipal", "STRING_TYPE", "POST", "insc_municipal");
$ins_cliente->addColumn("email", "STRING_TYPE", "POST", "email");
$ins_cliente->addColumn("fone_com", "STRING_TYPE", "POST", "fone_com");
$ins_cliente->addColumn("fone_res", "STRING_TYPE", "POST", "fone_res");
$ins_cliente->addColumn("celular", "STRING_TYPE", "POST", "celular");
$ins_cliente->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$ins_cliente->addColumn("endereco2", "STRING_TYPE", "POST", "endereco2");
$ins_cliente->addColumn("endereco3", "STRING_TYPE", "POST", "endereco3");
$ins_cliente->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$ins_cliente->addColumn("bairro2", "STRING_TYPE", "POST", "bairro2");
$ins_cliente->addColumn("bairro3", "STRING_TYPE", "POST", "bairro3");
$ins_cliente->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$ins_cliente->addColumn("estado", "STRING_TYPE", "POST", "estado");
$ins_cliente->addColumn("cep", "STRING_TYPE", "POST", "cep");
$ins_cliente->addColumn("vendedor", "STRING_TYPE", "POST", "vendedor");
$ins_cliente->addColumn("porcentagem", "STRING_TYPE", "POST", "porcentagem");
$ins_cliente->addColumn("link_mapa", "STRING_TYPE", "POST", "link_mapa");
$ins_cliente->addColumn("obs", "STRING_TYPE", "POST", "obs");
$ins_cliente->addColumn("site", "STRING_TYPE", "POST", "site");
$ins_cliente->addColumn("sexo", "STRING_TYPE", "POST", "sexo");
$ins_cliente->addColumn("dn", "STRING_TYPE", "POST", "dn");
$ins_cliente->addColumn("banco", "STRING_TYPE", "POST", "banco");
$ins_cliente->addColumn("banco2", "STRING_TYPE", "POST", "banco2");
$ins_cliente->addColumn("banco3", "STRING_TYPE", "POST", "banco3");
$ins_cliente->addColumn("conta", "STRING_TYPE", "POST", "conta");
$ins_cliente->addColumn("conta2", "STRING_TYPE", "POST", "conta2");
$ins_cliente->addColumn("conta3", "STRING_TYPE", "POST", "conta3");
$ins_cliente->addColumn("estadocivil", "STRING_TYPE", "POST", "estadocivil");
$ins_cliente->addColumn("data_cadastro", "STRING_TYPE", "POST", "data_cadastro");
$ins_cliente->addColumn("cep2", "STRING_TYPE", "POST", "cep2");
$ins_cliente->addColumn("cep3", "STRING_TYPE", "POST", "cep3");
$ins_cliente->addColumn("nome_razao", "STRING_TYPE", "POST", "nome_razao");
$ins_cliente->addColumn("nome_fisica", "STRING_TYPE", "POST", "nome_fisica");
$ins_cliente->setPrimaryKey("codigo", "NUMERIC_TYPE");

// Make an update transaction instance
$upd_cliente = new tNG_multipleUpdate($conn_data);
$tNGs->addTransaction($upd_cliente);
// Register triggers
$upd_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Update1");
$upd_cliente->registerTrigger("BEFORE", "Trigger_Default_FormValidation", 10, $formValidation);
$upd_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$upd_cliente->setTable("cliente");
$upd_cliente->addColumn("nome", "STRING_TYPE", "POST", "nome");
$upd_cliente->addColumn("fantasia", "STRING_TYPE", "POST", "fantasia");
$upd_cliente->addColumn("categoria", "STRING_TYPE", "POST", "categoria");
$upd_cliente->addColumn("grupo", "STRING_TYPE", "POST", "grupo");
$upd_cliente->addColumn("rota", "STRING_TYPE", "POST", "rota");
$upd_cliente->addColumn("tipocliente", "STRING_TYPE", "POST", "tipocliente");
$upd_cliente->addColumn("grupocliente", "STRING_TYPE", "POST", "grupocliente");
$upd_cliente->addColumn("proprietario", "STRING_TYPE", "POST", "proprietario");
$upd_cliente->addColumn("cpf", "STRING_TYPE", "POST", "cpf");
$upd_cliente->addColumn("rg", "STRING_TYPE", "POST", "rg");
$upd_cliente->addColumn("tipo_pessoa", "STRING_TYPE", "POST", "tipo_pessoa");
$upd_cliente->addColumn("insc_estadual", "STRING_TYPE", "POST", "insc_estadual");
$upd_cliente->addColumn("insc_municipal", "STRING_TYPE", "POST", "insc_municipal");
$upd_cliente->addColumn("email", "STRING_TYPE", "POST", "email");
$upd_cliente->addColumn("fone_com", "STRING_TYPE", "POST", "fone_com");
$upd_cliente->addColumn("fone_res", "STRING_TYPE", "POST", "fone_res");
$upd_cliente->addColumn("celular", "STRING_TYPE", "POST", "celular");
$upd_cliente->addColumn("endereco", "STRING_TYPE", "POST", "endereco");
$upd_cliente->addColumn("endereco2", "STRING_TYPE", "POST", "endereco2");
$upd_cliente->addColumn("endereco3", "STRING_TYPE", "POST", "endereco3");
$upd_cliente->addColumn("bairro", "STRING_TYPE", "POST", "bairro");
$upd_cliente->addColumn("bairro2", "STRING_TYPE", "POST", "bairro2");
$upd_cliente->addColumn("bairro3", "STRING_TYPE", "POST", "bairro3");
$upd_cliente->addColumn("cidade", "STRING_TYPE", "POST", "cidade");
$upd_cliente->addColumn("estado", "STRING_TYPE", "POST", "estado");
$upd_cliente->addColumn("cep", "STRING_TYPE", "POST", "cep");
$upd_cliente->addColumn("vendedor", "STRING_TYPE", "POST", "vendedor");
$upd_cliente->addColumn("porcentagem", "STRING_TYPE", "POST", "porcentagem");
$upd_cliente->addColumn("link_mapa", "STRING_TYPE", "POST", "link_mapa");
$upd_cliente->addColumn("obs", "STRING_TYPE", "POST", "obs");
$upd_cliente->addColumn("site", "STRING_TYPE", "POST", "site");
$upd_cliente->addColumn("sexo", "STRING_TYPE", "POST", "sexo");
$upd_cliente->addColumn("dn", "STRING_TYPE", "POST", "dn");
$upd_cliente->addColumn("banco", "STRING_TYPE", "POST", "banco");
$upd_cliente->addColumn("banco2", "STRING_TYPE", "POST", "banco2");
$upd_cliente->addColumn("banco3", "STRING_TYPE", "POST", "banco3");
$upd_cliente->addColumn("conta", "STRING_TYPE", "POST", "conta");
$upd_cliente->addColumn("conta2", "STRING_TYPE", "POST", "conta2");
$upd_cliente->addColumn("conta3", "STRING_TYPE", "POST", "conta3");
$upd_cliente->addColumn("estadocivil", "STRING_TYPE", "POST", "estadocivil");
$upd_cliente->addColumn("data_cadastro", "STRING_TYPE", "POST", "data_cadastro");
$upd_cliente->addColumn("cep2", "STRING_TYPE", "POST", "cep2");
$upd_cliente->addColumn("cep3", "STRING_TYPE", "POST", "cep3");
$upd_cliente->addColumn("nome_razao", "STRING_TYPE", "POST", "nome_razao");
$upd_cliente->addColumn("nome_fisica", "STRING_TYPE", "POST", "nome_fisica");
$upd_cliente->setPrimaryKey("codigo", "NUMERIC_TYPE", "GET", "codigo");

// Make an instance of the transaction object
$del_cliente = new tNG_multipleDelete($conn_data);
$tNGs->addTransaction($del_cliente);
// Register triggers
$del_cliente->registerTrigger("STARTER", "Trigger_Default_Starter", 1, "POST", "KT_Delete1");
$del_cliente->registerTrigger("END", "Trigger_Default_Redirect", 99, "includes/nxt/back.php");
// Add columns
$del_cliente->setTable("cliente");
$del_cliente->setPrimaryKey("codigo", "NUMERIC_TYPE", "GET", "codigo");

// Execute all the registered transactions
$tNGs->executeTransactions();

// Get the transaction recordset
$rscliente = $tNGs->getRecordset("cliente");
$row_rscliente = mysql_fetch_assoc($rscliente);
$totalRows_rscliente = mysql_num_rows($rscliente);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="includes/skins/mxkollection3.css" rel="stylesheet" type="text/css" media="all" />
<script src="includes/common/js/base.js" type="text/javascript"></script>
<script src="includes/common/js/utility.js" type="text/javascript"></script>
<script src="includes/skins/style.js" type="text/javascript"></script>
<?php echo $tNGs->displayValidationRules();?>
<script src="includes/nxt/scripts/form.js" type="text/javascript"></script>
<script src="includes/nxt/scripts/form.js.php" type="text/javascript"></script>
<script type="text/javascript">
$NXT_FORM_SETTINGS = {
  duplicate_buttons: true,
  show_as_grid: true,
  merge_down_value: true
}
</script>
</head>

<body>
<?php
	echo $tNGs->getErrorMsg();
?>
<div class="KT_tng">
  <h1>
    <?php 
// Show IF Conditional region1 
if (@$_GET['codigo'] == "") {
?>
      <?php echo NXT_getResource("Insert_FH"); ?>
      <?php 
// else Conditional region1
} else { ?>
      <?php echo NXT_getResource("Update_FH"); ?>
      <?php } 
// endif Conditional region1
?>
    Cliente </h1>
  <div class="KT_tngform">
    <form method="post" id="form1" action="<?php echo KT_escapeAttribute(KT_getFullUri()); ?>">
      <?php $cnt1 = 0; ?>
      <?php do { ?>
        <?php $cnt1++; ?>
        <?php 
// Show IF Conditional region1 
if (@$totalRows_rscliente > 1) {
?>
          <h2><?php echo NXT_getResource("Record_FH"); ?> <?php echo $cnt1; ?></h2>
          <?php } 
// endif Conditional region1
?>
        <table cellpadding="2" cellspacing="0" class="KT_tngtable">
          <tr>
            <td class="KT_th"><label for="nome_<?php echo $cnt1; ?>">Nome:</label></td>
            <td><input type="text" name="nome_<?php echo $cnt1; ?>" id="nome_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['nome']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("nome");?> <?php echo $tNGs->displayFieldError("cliente", "nome", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fantasia_<?php echo $cnt1; ?>">Fantasia:</label></td>
            <td><input type="text" name="fantasia_<?php echo $cnt1; ?>" id="fantasia_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['fantasia']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("fantasia");?> <?php echo $tNGs->displayFieldError("cliente", "fantasia", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="categoria_<?php echo $cnt1; ?>">Categoria:</label></td>
            <td><input type="text" name="categoria_<?php echo $cnt1; ?>" id="categoria_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['categoria']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("categoria");?> <?php echo $tNGs->displayFieldError("cliente", "categoria", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="grupo_<?php echo $cnt1; ?>">Grupo:</label></td>
            <td><input type="text" name="grupo_<?php echo $cnt1; ?>" id="grupo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['grupo']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("grupo");?> <?php echo $tNGs->displayFieldError("cliente", "grupo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="rota_<?php echo $cnt1; ?>">Rota:</label></td>
            <td><input type="text" name="rota_<?php echo $cnt1; ?>" id="rota_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['rota']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("rota");?> <?php echo $tNGs->displayFieldError("cliente", "rota", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="tipocliente_<?php echo $cnt1; ?>">Tipocliente:</label></td>
            <td><input type="text" name="tipocliente_<?php echo $cnt1; ?>" id="tipocliente_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['tipocliente']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("tipocliente");?> <?php echo $tNGs->displayFieldError("cliente", "tipocliente", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="grupocliente_<?php echo $cnt1; ?>">Grupocliente:</label></td>
            <td><input type="text" name="grupocliente_<?php echo $cnt1; ?>" id="grupocliente_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['grupocliente']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("grupocliente");?> <?php echo $tNGs->displayFieldError("cliente", "grupocliente", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="proprietario_<?php echo $cnt1; ?>">Proprietario:</label></td>
            <td><input type="text" name="proprietario_<?php echo $cnt1; ?>" id="proprietario_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['proprietario']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("proprietario");?> <?php echo $tNGs->displayFieldError("cliente", "proprietario", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cpf_<?php echo $cnt1; ?>">Cpf:</label></td>
            <td><input type="text" name="cpf_<?php echo $cnt1; ?>" id="cpf_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cpf']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("cpf");?> <?php echo $tNGs->displayFieldError("cliente", "cpf", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="rg_<?php echo $cnt1; ?>">Rg:</label></td>
            <td><input type="text" name="rg_<?php echo $cnt1; ?>" id="rg_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['rg']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("rg");?> <?php echo $tNGs->displayFieldError("cliente", "rg", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="tipo_pessoa_<?php echo $cnt1; ?>">Tipo_pessoa:</label></td>
            <td><input type="text" name="tipo_pessoa_<?php echo $cnt1; ?>" id="tipo_pessoa_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['tipo_pessoa']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("tipo_pessoa");?> <?php echo $tNGs->displayFieldError("cliente", "tipo_pessoa", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="insc_estadual_<?php echo $cnt1; ?>">Insc_estadual:</label></td>
            <td><input type="text" name="insc_estadual_<?php echo $cnt1; ?>" id="insc_estadual_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['insc_estadual']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("insc_estadual");?> <?php echo $tNGs->displayFieldError("cliente", "insc_estadual", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="insc_municipal_<?php echo $cnt1; ?>">Insc_municipal:</label></td>
            <td><input type="text" name="insc_municipal_<?php echo $cnt1; ?>" id="insc_municipal_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['insc_municipal']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("insc_municipal");?> <?php echo $tNGs->displayFieldError("cliente", "insc_municipal", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="email_<?php echo $cnt1; ?>">Email:</label></td>
            <td><input type="text" name="email_<?php echo $cnt1; ?>" id="email_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['email']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("email");?> <?php echo $tNGs->displayFieldError("cliente", "email", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fone_com_<?php echo $cnt1; ?>">Fone:</label></td>
            <td><input type="text" name="fone_com_<?php echo $cnt1; ?>" id="fone_com_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['fone_com']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("fone_com");?> <?php echo $tNGs->displayFieldError("cliente", "fone_com", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="fone_res_<?php echo $cnt1; ?>">Fone:</label></td>
            <td><input type="text" name="fone_res_<?php echo $cnt1; ?>" id="fone_res_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['fone_res']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("fone_res");?> <?php echo $tNGs->displayFieldError("cliente", "fone_res", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="celular_<?php echo $cnt1; ?>">Celular:</label></td>
            <td><input type="text" name="celular_<?php echo $cnt1; ?>" id="celular_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['celular']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("celular");?> <?php echo $tNGs->displayFieldError("cliente", "celular", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="endereco_<?php echo $cnt1; ?>">Endereco:</label></td>
            <td><input type="text" name="endereco_<?php echo $cnt1; ?>" id="endereco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['endereco']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("endereco");?> <?php echo $tNGs->displayFieldError("cliente", "endereco", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="endereco2_<?php echo $cnt1; ?>">Endereco2:</label></td>
            <td><input type="text" name="endereco2_<?php echo $cnt1; ?>" id="endereco2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['endereco2']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("endereco2");?> <?php echo $tNGs->displayFieldError("cliente", "endereco2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="endereco3_<?php echo $cnt1; ?>">Endereco3:</label></td>
            <td><input type="text" name="endereco3_<?php echo $cnt1; ?>" id="endereco3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['endereco3']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("endereco3");?> <?php echo $tNGs->displayFieldError("cliente", "endereco3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="bairro_<?php echo $cnt1; ?>">Bairro:</label></td>
            <td><input type="text" name="bairro_<?php echo $cnt1; ?>" id="bairro_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['bairro']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("bairro");?> <?php echo $tNGs->displayFieldError("cliente", "bairro", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="bairro2_<?php echo $cnt1; ?>">Bairro2:</label></td>
            <td><input type="text" name="bairro2_<?php echo $cnt1; ?>" id="bairro2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['bairro2']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("bairro2");?> <?php echo $tNGs->displayFieldError("cliente", "bairro2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="bairro3_<?php echo $cnt1; ?>">Bairro3:</label></td>
            <td><input type="text" name="bairro3_<?php echo $cnt1; ?>" id="bairro3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['bairro3']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("bairro3");?> <?php echo $tNGs->displayFieldError("cliente", "bairro3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cidade_<?php echo $cnt1; ?>">Cidade:</label></td>
            <td><input type="text" name="cidade_<?php echo $cnt1; ?>" id="cidade_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cidade']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("cidade");?> <?php echo $tNGs->displayFieldError("cliente", "cidade", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="estado_<?php echo $cnt1; ?>">Estado:</label></td>
            <td><input type="text" name="estado_<?php echo $cnt1; ?>" id="estado_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['estado']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("estado");?> <?php echo $tNGs->displayFieldError("cliente", "estado", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cep_<?php echo $cnt1; ?>">Cep:</label></td>
            <td><input type="text" name="cep_<?php echo $cnt1; ?>" id="cep_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cep']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("cep");?> <?php echo $tNGs->displayFieldError("cliente", "cep", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="vendedor_<?php echo $cnt1; ?>">Vendedor:</label></td>
            <td><input type="text" name="vendedor_<?php echo $cnt1; ?>" id="vendedor_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['vendedor']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("vendedor");?> <?php echo $tNGs->displayFieldError("cliente", "vendedor", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="porcentagem_<?php echo $cnt1; ?>">Porcentagem:</label></td>
            <td><input type="text" name="porcentagem_<?php echo $cnt1; ?>" id="porcentagem_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['porcentagem']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("porcentagem");?> <?php echo $tNGs->displayFieldError("cliente", "porcentagem", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="link_mapa_<?php echo $cnt1; ?>">Link_mapa:</label></td>
            <td><input type="text" name="link_mapa_<?php echo $cnt1; ?>" id="link_mapa_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['link_mapa']); ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("link_mapa");?> <?php echo $tNGs->displayFieldError("cliente", "link_mapa", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="obs_<?php echo $cnt1; ?>">Obs:</label></td>
            <td><input type="text" name="obs_<?php echo $cnt1; ?>" id="obs_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['obs']); ?>" size="32" />
                <?php echo $tNGs->displayFieldHint("obs");?> <?php echo $tNGs->displayFieldError("cliente", "obs", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="site_<?php echo $cnt1; ?>">Site:</label></td>
            <td><input type="text" name="site_<?php echo $cnt1; ?>" id="site_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['site']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("site");?> <?php echo $tNGs->displayFieldError("cliente", "site", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="sexo_<?php echo $cnt1; ?>">Sexo:</label></td>
            <td><input type="text" name="sexo_<?php echo $cnt1; ?>" id="sexo_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['sexo']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("sexo");?> <?php echo $tNGs->displayFieldError("cliente", "sexo", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="dn_<?php echo $cnt1; ?>">Dn:</label></td>
            <td><input type="text" name="dn_<?php echo $cnt1; ?>" id="dn_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['dn']); ?>" size="20" maxlength="20" />
                <?php echo $tNGs->displayFieldHint("dn");?> <?php echo $tNGs->displayFieldError("cliente", "dn", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="banco_<?php echo $cnt1; ?>">Banco:</label></td>
            <td><input type="text" name="banco_<?php echo $cnt1; ?>" id="banco_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['banco']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("banco");?> <?php echo $tNGs->displayFieldError("cliente", "banco", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="banco2_<?php echo $cnt1; ?>">Banco2:</label></td>
            <td><input type="text" name="banco2_<?php echo $cnt1; ?>" id="banco2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['banco2']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("banco2");?> <?php echo $tNGs->displayFieldError("cliente", "banco2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="banco3_<?php echo $cnt1; ?>">Banco3:</label></td>
            <td><input type="text" name="banco3_<?php echo $cnt1; ?>" id="banco3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['banco3']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("banco3");?> <?php echo $tNGs->displayFieldError("cliente", "banco3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="conta_<?php echo $cnt1; ?>">Conta:</label></td>
            <td><input type="text" name="conta_<?php echo $cnt1; ?>" id="conta_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['conta']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("conta");?> <?php echo $tNGs->displayFieldError("cliente", "conta", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="conta2_<?php echo $cnt1; ?>">Conta2:</label></td>
            <td><input type="text" name="conta2_<?php echo $cnt1; ?>" id="conta2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['conta2']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("conta2");?> <?php echo $tNGs->displayFieldError("cliente", "conta2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="conta3_<?php echo $cnt1; ?>">Conta3:</label></td>
            <td><input type="text" name="conta3_<?php echo $cnt1; ?>" id="conta3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['conta3']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("conta3");?> <?php echo $tNGs->displayFieldError("cliente", "conta3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="estadocivil_<?php echo $cnt1; ?>">Estadocivil:</label></td>
            <td><input type="text" name="estadocivil_<?php echo $cnt1; ?>" id="estadocivil_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['estadocivil']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("estadocivil");?> <?php echo $tNGs->displayFieldError("cliente", "estadocivil", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="data_cadastro_<?php echo $cnt1; ?>">Data_cadastro:</label></td>
            <td><input type="text" name="data_cadastro_<?php echo $cnt1; ?>" id="data_cadastro_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['data_cadastro']); ?>" size="20" maxlength="20" />
                <?php echo $tNGs->displayFieldHint("data_cadastro");?> <?php echo $tNGs->displayFieldError("cliente", "data_cadastro", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cep2_<?php echo $cnt1; ?>">Cep2:</label></td>
            <td><input type="text" name="cep2_<?php echo $cnt1; ?>" id="cep2_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cep2']); ?>" size="9" maxlength="9" />
                <?php echo $tNGs->displayFieldHint("cep2");?> <?php echo $tNGs->displayFieldError("cliente", "cep2", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="cep3_<?php echo $cnt1; ?>">Cep3:</label></td>
            <td><input type="text" name="cep3_<?php echo $cnt1; ?>" id="cep3_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['cep3']); ?>" size="9" maxlength="9" />
                <?php echo $tNGs->displayFieldHint("cep3");?> <?php echo $tNGs->displayFieldError("cliente", "cep3", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="nome_razao_<?php echo $cnt1; ?>">Nome_razao:</label></td>
            <td><input type="text" name="nome_razao_<?php echo $cnt1; ?>" id="nome_razao_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['nome_razao']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("nome_razao");?> <?php echo $tNGs->displayFieldError("cliente", "nome_razao", $cnt1); ?> </td>
          </tr>
          <tr>
            <td class="KT_th"><label for="nome_fisica_<?php echo $cnt1; ?>">Nome_fisica:</label></td>
            <td><input type="text" name="nome_fisica_<?php echo $cnt1; ?>" id="nome_fisica_<?php echo $cnt1; ?>" value="<?php echo KT_escapeAttribute($row_rscliente['nome_fisica']); ?>" size="32" maxlength="255" />
                <?php echo $tNGs->displayFieldHint("nome_fisica");?> <?php echo $tNGs->displayFieldError("cliente", "nome_fisica", $cnt1); ?> </td>
          </tr>
        </table>
        <input type="hidden" name="kt_pk_cliente_<?php echo $cnt1; ?>" class="id_field" value="<?php echo KT_escapeAttribute($row_rscliente['kt_pk_cliente']); ?>" />
        <?php } while ($row_rscliente = mysql_fetch_assoc($rscliente)); ?>
      <div class="KT_bottombuttons">
        <div>
          <?php 
      // Show IF Conditional region1
      if (@$_GET['codigo'] == "") {
      ?>
            <input type="submit" name="KT_Insert1" id="KT_Insert1" value="<?php echo NXT_getResource("Insert_FB"); ?>" />
            <?php 
      // else Conditional region1
      } else { ?>
            <div class="KT_operations">
              <input type="submit" name="KT_Insert1" value="<?php echo NXT_getResource("Insert as new_FB"); ?>" onclick="nxt_form_insertasnew(this, 'codigo')" />
            </div>
            <input type="submit" name="KT_Update1" value="<?php echo NXT_getResource("Update_FB"); ?>" />
            <input type="submit" name="KT_Delete1" value="<?php echo NXT_getResource("Delete_FB"); ?>" onclick="return confirm('<?php echo NXT_getResource("Are you sure?"); ?>');" />
            <?php }
      // endif Conditional region1
      ?>
          <input type="button" name="KT_Cancel1" value="<?php echo NXT_getResource("Cancel_FB"); ?>" onclick="return UNI_navigateCancel(event, 'includes/nxt/back.php')" />
        </div>
      </div>
    </form>
  </div>
  <br class="clearfixplain" />
</div>
<p>&nbsp;</p>
</body>
</html>
