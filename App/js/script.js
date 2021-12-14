var btnAbrirM = document.getElementById("btn-abrirM");
var btnFechar = document.getElementById("btn-fechar");
var forms_comunidade = document.getElementById("forms-comunidade");
var backOverlay = document.getElementById("back-overlay");

btnAbrirM.addEventListener("click", function(){     
    backOverlay.classList.remove("hidden");
    forms_comunidade.classList.remove("hidden");
})

btnFechar.addEventListener("click", function(){
    backOverlay.classList.add("hidden");
    forms_comunidade.classList.add("hidden");
})