// controle dos botões. efetua o controle de ida e volta no formulário.
// controle dos botões da index.php
$('#formularioCarga').on("click", function() {
    window.location.href = "src\\formulario.php";
});
$('#novaLigacaoPF').on("click", function() {
    window.location.href = "express\\novaLigacaoPF.php";
});
$('#novaLigacaoPJ').on("click", function() {
    window.location.href = "express\\novaLigacaoPJ.php";
});
// tela 01 - dadosCliente
//botão voltar
$('#back').on("click", function() {
    window.location.href= "express.php";
});
//botão ir
$('#next').hide();
var elements = document.getElementsByClassName("p01");
for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener("keydown", function() {
    if(document.getElementById('tipoAtendimento').value == 'cpf'){
        if(document.getElementById('inputNome').value == '' || document.getElementById('inputCPF').value == '' || document.getElementById('inputCEP').value == '' || document.getElementById('inputEndereco').value == '' || document.getElementById('inputComplemento').value == '' || document.getElementById('inputBairro').value == '' || document.getElementById('inputMunicipio').value == '' || document.getElementById('inputEmail').value == '' || document.getElementById('inputCelular').value == '')
        {
            document.getElementById('next').style.display='none';
        } else {
            document.getElementById('next').style.display='inline';
        }
    }
    if(document.getElementById('tipoAtendimento').value == 'cnpj'){
        if(document.getElementById('inputNome').value == '' || document.getElementById('inputCNPJ').value == '' || document.getElementById('inputCEP').value == '' || document.getElementById('inputEndereco').value == '' || document.getElementById('inputComplemento').value == '' || document.getElementById('inputBairro').value == '' || document.getElementById('inputMunicipio').value == '' || document.getElementById('inputEmail').value == '' || document.getElementById('inputCelular').value == '')
        {
            document.getElementById('next').style.display='none';
        } else {
            document.getElementById('next').style.display='inline';
        }
    }
  });
}
$('#next').on("click", function() {
    $("#dadosCliente").fadeOut(250);
    $("#dadosInfo").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 02 - dadosInfo
$('#back01').on("click", function() {
    $("#dadosInfo").fadeOut(250);
    $("#dadosCliente").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next01').on("click", function() {
    $("#dadosInfo").fadeOut(250);
    $("#dadosRelCarga").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 03
$('#back02').on("click", function() {
    $("#dadosRelCarga").fadeOut(250);
    $("#dadosInfo").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next02').on("click", function() {
    $("#dadosRelCarga").fadeOut(250);
    $("#dadosAssinatura").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 04
$('#back03').on("click", function() {
    $("#dadosAssinatura").fadeOut(250);
    $("#dadosRelCarga").fadeIn(260);
    window.scrollTo(0,0);
});
$('#save').on("click", function() {
    $('#formNovaLigacao').submit(function () {
        var vazios = $("input[type=email]").filter(function() {
            return !this.value;
        }).get();
        if (vazios.length) {
            $(vazios).addClass('vazio');
            window.scrollTo(0,0);
            alert("Todos os campos devem ser preenchidos.");
            return false;
        } else{
            return true;
        }
    });
});
// fim controle dos botões
/* há duas labels: uma de Watts e uma de BTUs. Somente ar condicionado é medido em BTUs.
Então, ao iniciar, escondo a de BTUs e só a mostro quando o equipamento selecionado for ArCon*/
$('#labelPotenciaAr').hide();
$('#selEquipamento').change(function () {
    if ($('#selEquipamento').val() === "Ar Condicionado") {
        $('#labelPotenciaEquip').hide();
        $('#labelPotenciaAr').show();
    } else{
        $('#labelPotenciaEquip').show();
        $('#labelPotenciaAr').hide();
    }
});
$('.address-field').hide();
$("#pesquisarCEP").click(function(){
    if($('#inputCEP').val() != ''){
        $.ajax({
            url: 'https://viacep.com.br/ws/'+$('#inputCEP').val().replace(/[^\w\-]+/g, '')+'/json/unicode/',
            dataType: 'json',
            success: function(resposta){
                $('.address-field').show();
                $("#inputEndereco").val(resposta.logradouro);
                $("#inputComplemento").val(resposta.complemento);
                $("#inputBairro").val(resposta.bairro);
                $("#inputMunicipio").val(resposta.localidade);
                //$("#uf").val(resposta.uf);
                $("#inputComplemento").focus();
            }
        });
    } else{
        alert('Por favor, nos informe o seu CEP!');
    }
});
$('#data-hora').change(function(){
    var input = document.getElementsByClassName('p01');
    for( var i=0; i<=(input.length-1); i++ ){
        console.log(input[i].value);
		if( input[i].value == ''){
            document.getElementById('next').hide();
        } else{
            $('#next').show();
        }
	}
  });
//adicionar equipamentos à lista listEquipamentos
var qtdEquip = 0;
function addEquip() {
    //capturando a div listEquipamentos, onde serão mostrados os equipamentos adicionados à lista
    var divAtual  = document.querySelector('#listEquipamentos');
    // cria uma div virtual com os dados presentes atualmente na div, para não perder oq já foi adicionado
    var divTemp = divAtual.innerHTML;
    //criando um novo card com os dados repassados pelo cliente sobre o tipo de equipamento e potencia
    var divNova = '<div name="cardPorta'+qtdEquip+'" id="cardPorta'+qtdEquip+'" class="card form-group" style="width: 12rem;"><input type="text" name="dataNomeEquip'+qtdEquip+'" id="dataNomeEquip'+qtdEquip+'" class="form-control" value="'+ $('#selEquipamento option:selected').text() +'" disabled><input type="hidden" name="hiddenDataNomeEquip'+qtdEquip+'" id="hiddenDataNomeEquip'+qtdEquip+'" class="form-control" value="'+ document.getElementById('selEquipamento').value +'"><input type="text" name="inputPotencia'+qtdEquip+'" id="inputPotencia'+qtdEquip+'" class="form-control" value="'+ document.getElementById('inputPotenciaEquipamento').value +'" disabled><input type="hidden" name="hiddeninputPotencia'+qtdEquip+'" id="hiddeninputPotencia'+qtdEquip+'" class="form-control" value="'+ document.getElementById('inputPotenciaEquipamento').value +'"><a class="btn btn-outline-danger" onclick="removeLinha(this)"><i class="fas fa-trash"></i></a></div>';
    // iteração para contar quantos equips foram adicionados e também p/ diferenciar a id dos cards acima
    qtdEquip++;
    // a div virtual recebe os dados da nova div e ela mesma (com os dados atuais) e os une
    divTemp = divNova + divTemp;
    //repassa à visão o conteúdo atualizado
    divAtual.innerHTML = divTemp;
    //"limpando" os valores para que o cliente possa refazer o processo de adição
    document.getElementById('selEquipamento').value = 'Lâmpada Compacta/Fria';
    document.getElementById('inputPotenciaEquipamento').value = '';
    $('#labelPotenciaEquip').show();
    $('#labelPotenciaAr').hide();
    //esse input oculto "hidden" carregará pro formulário a quantidade de equipamentos que foram adicionados
    document.getElementById('qtdeEquipAdd').value = qtdEquip;
    //escondendo a label que informa, de início, que ainda não tem equipamentos adicionados.
    $('#semEquip').hide();
}
function removeLinha(item) {
    // caqueado loko mano
    item.parentNode.outerHTML = '';
    //decrementa os cards contados
    qtdEquip--;
    //repassa ao input oculto a qtde atual
    document.getElementById('qtdeEquipAdd').value = qtdEquip;
    //se o valor é zero, então não tem mais cards. Exibe essa informação ao usuário e o impede de prosseguir
    if(document.getElementById('qtdeEquipAdd').value == 0){
        $('#semEquip').show();
        $('next05').setAttribute('disabled');
    }
}
// a priori os campos improtantes estão vazios, então aqui eu os desabilito pra forçar o usuário a preencher
document.getElementById('addEquip').removeAttribute("onclick");
/*enquanto o valor do input da potência estiver vazio, removo o atributo do botão Adicionar, para evitar valor
vazio no card. Se não tem valor, vai "sujar" o formulário*/
$('#inputPotenciaEquipamento').change(function () {
    if($('#inputPotenciaEquipamento').value == '') {
        //aqui removo o atributo de onclick do botão {na verdade, a tag <a class="btn">}
        document.getElementById('addEquip').removeAttribute('onclick');
    }else{
        // ao repassar algum valor,aí sim poderá adicionar.
        document.getElementById('addEquip').setAttribute("onclick","addEquip()");
    }
});
// máscaras
function SoNumeros(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    //var regex = /^[0-9.,]+$/;
    var regex = /^[0-9.]+$/;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
  }
function fMasc(objeto,mascara) {
    obj=objeto;
    masc=mascara;
    setTimeout("fMascEx()",1);
}
function fMascEx() {
    obj.value=masc(obj.value);
}
function mTel(tel) {
    tel=tel.replace(/\D/g,"");
    tel=tel.replace(/^(\d)/,"($1");
    tel=tel.replace(/(.{3})(\d)/,"$1)$2");
    if(tel.length == 9) {
        tel=tel.replace(/(.{1})$/,"-$1");
    } else if (tel.length == 10) {
        tel=tel.replace(/(.{2})$/,"-$1");
    } else if (tel.length == 11) {
        tel=tel.replace(/(.{3})$/,"-$1");
    } else if (tel.length == 12) {
        tel=tel.replace(/(.{4})$/,"-$1");
    } else if (tel.length > 12) {
        tel=tel.replace(/(.{4})$/,"-$1");
    }
    return tel;
}
function mCNPJ(cnpj){
    cnpj=cnpj.replace(/\D/g,"")
    cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
    cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
    cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
    cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
    return cnpj;
}
function mCPF(cpf){
    cpf=cpf.replace(/\D/g,"")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
    cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
    return cpf;
}
function mCEP(cep){
    cep=cep.replace(/\D/g,"");
    cep=cep.replace(/^(\d{2})(\d)/,"$1.$2");
    cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2");
    return cep;
}
// evento de assinatura em tela usando dedo, mouse ou caneta touch
function download(dataURL, filename) {
    if (navigator.userAgent.indexOf("Safari") > -1 && navigator.userAgent.indexOf("Chrome") === -1) {
        window.open(dataURL);
    } else {
        var blob = dataURLToBlob(dataURL);
        var url = window.URL.createObjectURL(blob);

        var a = document.createElement("a");
        a.style = "display: none";
        a.href = url;
        a.download = filename;

        document.body.appendChild(a);
        a.click();

        window.URL.revokeObjectURL(url);
    }
}

function dataURLToBlob(dataURL) {
    var parts = dataURL.split(';base64,');
    var contentType = parts[0].split(":")[1];
    var raw = window.atob(parts[1]);
    var rawLength = raw.length;
    var uInt8Array = new Uint8Array(rawLength);

    for (var i = 0; i < rawLength; ++i) {
        uInt8Array[i] = raw.charCodeAt(i);
    }
    return new Blob([uInt8Array], { type: contentType });
}

var signaturePad = new SignaturePad(document.getElementById('signature-pad'),{
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)'
});

var saveButton = document.getElementById('save');
var cancelButton = document.getElementById('clearCanvasSimple');

saveButton.addEventListener("click", function(event) {
    if (signaturePad.isEmpty()) {
        alert("Para finalizar, é necessário assinar!");
        return false;
    } else {
        var dataURL = signaturePad.toDataURL();
        $("#imageCheck").val(dataURL);
        $("#formNovaLigacao").submit();
    }
});

cancelButton.addEventListener('click', function(event) {
    signaturePad.clear();
});

//data e hora - JS
const zeroFill = n => {
    return ('0' + n).slice(-2);
}

// Cria intervalo
const interval = setInterval(() => {
    // Pega o horário atual
    const now = new Date();

    // Formata a data conforme dd/mm/aaaa hh:ii:ss
    const dataHora = zeroFill(now.getUTCDate()) + '/' + zeroFill((now.getMonth() + 1)) + '/' + now.getFullYear() + ' ' + zeroFill(now.getHours()) + ':' + zeroFill(now.getMinutes()) + ':' + zeroFill(now.getSeconds());

    // Exibe na tela usando a div#data-hora
    document.getElementById('data-hora').value = dataHora;
}, 1000);
//service worker
if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register('/carga/sw.js')
      .then(function () {
        console.log('service worker registered');
      })
      .catch(function () {
        console.warn('service worker failed');
      });
  }