var tbody = document.querySelector("table tbody");
var forms_alterar = document.getElementById("forms-alterar");
var forms_comunidade = document.getElementById("forms-comunidade");
var forms_alterar = document.getElementById("forms-alterar");

forms_comunidade.addEventListener("submit", function(e){  
    e.preventDefault()
    let dados = new FormData(forms_comunidade);     
    dados.append("tipo","cadastrar");
    Ajax("POST",URL_CADASTRO,dados,cadastrar);   
})

forms_alterar.addEventListener("submit",function(e){
    e.preventDefault()
    let dados = new FormData(forms_alterar);
    dados.append("tipo","alterar");    
    Ajax("POST",URL_CADASTRO,dados,cadastrar);
})

listagem = function(){
    let dados = new FormData();
    dados.append("tipo", "listar");
    Ajax("POST",URL_CADASTRO,dados,listar); 
}

exclusao = function(idcomunidade){
    if(confirm("Deseja realmente excluir esta comunidade?")){
        let dados = new FormData();
        dados.append("tipo", "excluir");
        dados.append("idcomunidade", idcomunidade);
        Ajax("POST",URL_CADASTRO,dados,excluir);
    }
}

excluir = function(retorno){
    alert(retorno.aviso);
    if(retorno.status == 1){
        listagem();
    }
}

listar = function(retorno){
    tbody.innerHTML = "";
    if(retorno.status == 1){
        retorno.lista.forEach(comunidade => {
            tbody.innerHTML += `
                <tr>
                    <td>${comunidade.idcomunidade}</td>
                    <td>${comunidade.nome}</td>
                    <td class="opcoes">
                        <a href='javascript:exclusao(${comunidade.idcomunidade})' id="btnDel" class="waves-effect waves-light btn red"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        <a href="#forms-alterar" id='btn-alterar' class="btn modal-trigger waves-effect waves-light yellow" onclick="getDados(${comunidade.idcomunidade})"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    </td>                
                </tr>
            `;
        });
    }
}

getDados = function(idcomunidade){
    let dados = new FormData();
    dados.append("tipo","pegarDados");
    dados.append("idcomunidade", idcomunidade);    
    Ajax("POST",URL_CADASTRO,dados,preencherForms);
}

preencherForms = function(retorno){
    if(retorno.status == 1){        
        forms_alterar["idcomunidade"].value = retorno.dados.idcomunidade;
        forms_alterar["nome"].value = retorno.dados.nome;
    } else{        
        alert(retorno.aviso);
    }
    M.updateTextFields();
}

cadastrar = function(resposta){
    if(resposta.status == 1){
        alert(resposta.aviso);
        listagem();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var options = {}
    var instances = M.Modal.init(elems, options);
})
listagem()