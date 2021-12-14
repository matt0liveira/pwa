const URL_DOADOR = "http://localhost/serverphp/ATIVIDADE7_AJAX_MATHEUS_OLIVEIRA/Server/doador/webservice.php"
function Ajax(method,url,dados,func){
    let req  = new XMLHttpRequest();
    req.onreadystatechange = function(){
        if(req.readyState == 4 && req.status == 200){
            let response = JSON.parse(req.responseText)
            func(response)
        }
    }
    req.open(method,url,true)
    req.send(dados)
}

function certificarLogin(returnLogin){
    let dados = new FormData()
    dados.append("tipo", "verificar")
    Ajax("POST", URL_DOADOR, dados, returnLogin)
}