const URL_CADASTRO = "http://localhost/serverphp/ATIVIDADE7_AJAX_MATHEUS_OLIVEIRA/Server/comunidade/webservice.php"
function Ajax(metodo,url,dados,funcao){
    let req  = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            let resposta = JSON.parse(req.responseText);
            console.log(resposta)            
            funcao(resposta)
        }
    }
    req.open(metodo,url,true);
    req.send(dados);
}