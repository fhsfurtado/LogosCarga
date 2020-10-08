// controle dos botões. efetua o controle de ida e volta no formulário.
// controle dos botões da index.php
$('#formularioCarga').on("click", function() {
    window.location.href = "src\\formulario.php";
});
// tela 01
//botão voltar
$('#back').on("click", function() {
    window.location.href= "index.php";
});
//botão ir
$('#next').on("click", function() {
    $("#dadosCliente").fadeOut(250);
    $("#dadosImovel").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 02
$('#back01').on("click", function() {
    $("#dadosImovel").fadeOut(250);
    $("#dadosCliente").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next01').on("click", function() {
    $("#dadosImovel").fadeOut(250);
    $("#dadosSolicitante").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 03
$('#back02').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosImovel").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next02').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosSolicitacao").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 04
$('#back03').on("click", function() {
    $("#dadosSolicitacao").fadeOut(250);
    $("#dadosSolicitante").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next03').on("click", function() {
    $("#dadosSolicitacao").fadeOut(250);
    $("#dadosCaracteristicas").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 05
$('#back04').on("click", function() {
    $("#dadosCaracteristicas").fadeOut(250);
    $("#dadosSolicitacao").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next04').on("click", function() {
    $("#dadosCaracteristicas").fadeOut(250);
    $("#dadosRelCarga").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 06
$('#back05').on("click", function() {
    $("#dadosRelCarga").fadeOut(250);
    $("#dadosCaracteristicas").fadeIn(260);
    window.scrollTo(0,0);
});
$('#next05').on("click", function() {
    $("#dadosRelCarga").fadeOut(250);
    $("#dadosAssinatura").fadeIn(260);
    window.scrollTo(0,0);
});
//tela 07 - assinatura
$('#back06').on("click", function() {
    $("#dadosAssinatura").fadeOut(250);
    $("#dadosRelCarga").fadeIn(260);
    window.scrollTo(0,0);
});
// fim controle dos botões
// as funções abaixo não permitirão que o usuário prossiga no formulário enquanto não completar os dados obrigatórios
//tela 1
$(document).on('keyup', '.form input', function(){
    var val01 = $('#inputNome').val();
    var val02 = $('#inputCPFCNPJ').val();
    var val03 = $('#inputRG').val();
    var val04 = $('#inputEndereco').val();
    var val05 = $('#inputComplemento').val();
    var val06 = $('#inputBairro').val();
    var val07 = $('#inputMunicipio').val();
    var val08 = $('#inputCEP').val();
    var val09 = $('#inputEmail').val();
    var val10 = $('#inputCelular').val();
    if(val01 != "" || val02 != "" || val03 != "" || val04 != "" || val05 != "" || val06 != "" || val07 != "" || val08 != "" || val09 != "" || val10 != ""){
        $('#next').setAttribute('disabled','disabled');
    }else{
        $('#next').removeAttribute('disabled');
    }
});

/* Existe a possibilidade de o solicitante do serviço e o cliente serem distintos. (?)
Se forem o mesmo, não preenche os dados. Se forem distintos, mostra o formulário para preenchimento*/
$('input[name="radioSolicIsCliente"]').change(function () {
    if ($('input[name="radioSolicIsCliente"]:checked').val() === "nao") {
        $('#mesmoCliente').fadeIn(260);
    }
    if ($('input[name="radioSolicIsCliente"]:checked').val() === "sim") {
        $('#mesmoCliente').fadeOut(250);
    }
});
// a div de informações extras do poste tipo coluna inicia oculta. Explicação no próximo comment
$('#extraPosteColuna').hide();
/* para os postes do tipo Subterrâneo e Coluna existem informações extras exigidas pelo cliente.
O Subterrâneo exibe a informação do tamanho do duto em milímetros. A de Coluna exige o nº da ART/RRT Civil.
Com a função abaixo, mostro somente quando uma das opções está marcada com sua respectiva informação. */
$('input[name="radioTipoPoste"]').change(function () {
    if ($('input[name="radioTipoPoste"]:checked').val() === "Subterrâneo") {
        // A #extraPosteSubterraneo é uma div com as informações extras do poste de tipo Subterrâneo.
        $('#extraPosteSubterraneo').show();
    } else{
        $('#extraPosteSubterraneo').hide();
    }
    if ($('input[name="radioTipoPoste"]:checked').val() === "Coluna") {
        // A #extraPosteColuna é uma div com as informações extras do poste de tipo Coluna.
        $('#extraPosteColuna').show();
    } else{
        $('#extraPosteColuna').hide();
    }
});
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
document.getElementById('next05').setAttribute('disabled','disabled');
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
// função de validação dos inputs do formulário
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Seleciona o formulário que vai ter os inputs validados
        var forms = document.getElementsByClassName('needs-validation');
        // Trabalha sobre eles e impede o submit enquanto não for tudo preenchido
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
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
function mCPFCNPJ(v){

    //Remove tudo o que não é dígito
    v=v.replace(/\D/g,"");
    if (v.length > 12) { //CNPJ
        //Coloca ponto entre o segundo e o terceiro dígitos
        v=v.replace(/^(\d{2})(\d)/,"$1.$2");

        //Coloca ponto entre o quinto e o sexto dígitos
        v=v.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3");

        //Coloca uma barra entre o oitavo e o nono dígitos
        v=v.replace(/\.(\d{3})(\d)/,".$1/$2");

        //Coloca um hífen depois do bloco de quatro dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2");
    } else { //CPF
        //Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2");

        //Coloca um ponto entre o terceiro e o quarto dígitos
        //de novo (para o segundo bloco de números)
        v=v.replace(/(\d{3})(\d)/,"$1.$2");

        //Coloca um hífen entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2");
    }
    return v;
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
    } else {
        var dataURL = signaturePad.toDataURL();
        $("#imageCheck").val(dataURL);
        $("#gravaRel").submit();
    }
});

cancelButton.addEventListener('click', function(event) {
    signaturePad.clear();
});