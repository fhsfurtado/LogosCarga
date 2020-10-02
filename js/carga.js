// controle dos botões
// tela 01
//botão voltar
$('#back').on("click", function() {
    window.location.href= "index.php";
});
//botão ir
$('#next').on("click", function() {
    $("#dadosCliente").fadeOut(250);
    $("#dadosImovel").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 02
$('#back01').on("click", function() {
    $("#dadosImovel").fadeOut(250);
    $("#dadosCliente").fadeIn(250);
    window.scrollTo(0,0);
});
$('#next01').on("click", function() {
    $("#dadosImovel").fadeOut(250);
    $("#dadosSolicitante").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 03
$('#back02').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosImovel").fadeIn(250);
    window.scrollTo(0,0);
});
$('#next02').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosSolicitacao").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 04
$('#back03').on("click", function() {
    $("#dadosSolicitacao").fadeOut(250);
    $("#dadosSolicitante").fadeIn(250);
    window.scrollTo(0,0);
});
$('#next03').on("click", function() {
    $("#dadosSolicitacao").fadeOut(250);
    $("#dadosCaracteristicas").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 05
$('#back04').on("click", function() {
    $("#dadosCaracteristicas").fadeOut(250);
    $("#dadosSolicitacao").fadeIn(250);
    window.scrollTo(0,0);
});
$('#next04').on("click", function() {
    $("#dadosCaracteristicas").fadeOut(250);
    $("#dadosCaracteristicas").fadeIn(250);
    window.scrollTo(0,0);
});
// fim controle dos botões
$('input[name="radioSolicIsCliente"]').change(function () {
    if ($('input[name="radioSolicIsCliente"]:checked').val() === "nao") {
        $('#mesmoCliente').fadeIn(250);
    }
    if ($('input[name="radioSolicIsCliente"]:checked').val() === "sim") {
        $('#mesmoCliente').fadeOut(250);
    }
});
$('#extraPosteColuna').hide();
$('input[name="radioTipoPoste"]').change(function () {
    if ($('input[name="radioTipoPoste"]:checked').val() === "Subterrâneo") {
        $('#extraPosteSubterraneo').show();
    } else{
        $('#extraPosteSubterraneo').hide();
    }
    if ($('input[name="radioTipoPoste"]:checked').val() === "Coluna") {
        $('#extraPosteColuna').show();
    } else{
        $('#extraPosteColuna').hide();
    }
});
// controle dos botões da index.php
$('#formularioCarga').on("click", function() {
    window.location.href = "formulario.php";
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
})();
