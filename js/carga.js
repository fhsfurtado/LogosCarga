// controle dos botões
// tela 01
//botão ir
$('#next').on("click", function() {
    $("#dadosCliente").fadeOut(250);
    $("#dadosSolicitante").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 02
//botão voltar
$('#back01').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosCliente").fadeIn(250);
    window.scrollTo(0,0);
});
$('#next01').on("click", function() {
    $("#dadosSolicitante").fadeOut(250);
    $("#dadosSolicitacao").fadeIn(250);
    window.scrollTo(0,0);
});
//tela 03
$('#back02').on("click", function() {
    $("#dadosSolicitacao").fadeOut(250);
    $("#dadosSolicitante").fadeIn(250);
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
