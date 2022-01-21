<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" lang="pt-PT" />
<title></title>
</head>
<!-- a seguir coloquei uma função para formatar os campos das datas //-->
<script language="JavaScript">
<!--
function FormataDados (param, mascara)
{
  vr = param.value;
  vm = mascara;
  vr = stripChars( vr, "/-.,() " );
  vm = stripChars( vm, "/-.,()" );
  tam = vr.length;
  if (tam > vm.length) {
    vr = vr.substring(0, vm.length);
    tam = vr.length;
  }
  temp = "";
  for (i = mascara.length; i >= 0; i--) {
    if (mascara.substring(i, i+1) != " ") {
      temp += mascara.substring(i, i+1);
    }
    else {
      if (tam > 0) {
        temp += vr.substring(tam-1, tam);
        tam--;
      }
      else {
        temp += " ";
      }
    }
  }
  result = "";
  for (i = mascara.length; i >= 0; i--) {
    result += temp.substring(i, i+1);
  }
  param.value = result;
  return true;
}


function testa (checkOK , checkStr) {
  var test = true;
  var decPoints = 0;
  var allNum = "";
  for (i = 0;  i < checkStr.length;  i++) {
    ch = checkStr.charAt(i);
    for (j = 0;  j < checkOK.length;  j++)
      if (ch == checkOK.charAt(j))
        break;
      if (j == checkOK.length) {
        test = false;
        break;
    }
    allNum += ch;
  }
  return(test);
}


function VoltaMask(param,paramExemplo,paramTroca) {
  if (param.value == paramExemplo) {
    param.value = paramTroca;
  }
  else if (param.value == paramTroca) {
    param.value = paramExemplo;
  }
  return true;
}


function stripChars (InString, StripThis)  {
  OutString="";
  for (Count=0; Count < InString.length; Count++)  {
    TempChar=InString.substring (Count, Count+1);
    pertencente = false;
    for (i = 0; i < StripThis.length; i++) {
      if (TempChar == StripThis.substring(i, i+1)) {
        pertencente = true;
        break;
      }
    }
    if (!pertencente)
      OutString=OutString+TempChar;
  }
  return (OutString);
}

function Valida(frm) {                                                              
  frm.submit();
  return true;
}

self.focus();
//-->
</script>
<body>
<form method="post" action="gerar.php" onsubmit="return Valida(this);">

<label>Nome do relat&oacute;rio<br />
<input name="arquivo" type="text" class="right_contact_textbox" id="arquivo" size="15" style="width:79px;font-size: 11px; font-family: Arial"/>
<br />
<br />
Data de In&iacute;cio<br />
<input name="datainicio" type="text" class="right_contact_textbox" maxlength="11" id="datainicio" onblur="VoltaMask(this,'  /  /    ','dd/mm/aaaa');" onkeyup="FormataDados(this,  '  /  /    ')" onfocus="VoltaMask(this,'  /  /    ','dd/mm/aaaa');" size="15" value="dd/mm/aaaa" style="width:79px;font-size: 11px; font-family: Arial"/>
<br />
<br />
Data Final<br />
<input name="datafinal" type="text" class="right_contact_textbox" maxlength="11" id="datafinal"onblur="VoltaMask(this,'  /  /    ','dd/mm/aaaa');" onkeyup="FormataDados(this,  '  /  /    ')" onfocus="VoltaMask(this,'  /  /    ','dd/mm/aaaa');" size="15"  value="dd/mm/aaaa" style="width:79px;font-size: 11px; font-family: Arial" />
</label>
        </div>
        <div class="right_contactbox"></div>
        <div class="right_contactbox"></div> 
        <div class="right_contactbox">
          <p>
            <input name="btn_enviar" type="submit" class="button" id="btn_enviar" value="Gerar Relat&oacute;rio" />
          </p>
        </div>
     
      </div> </form>
</body>
</html>