certificarLogin((response) => {
    if(response.status === 0){
        window.open("login.html", "_top")
    }
})

btnLogout = document.getElementById("btnLogout")
btnLogout.addEventListener("click", () => {
    let dados = new FormData()
    dados.append("tipo", "deslogar")
    Ajax("POST", URL_DOADOR, dados, deslogar)
})

deslogar = function(response){
    if(response.status === 1){
        window.open("login.html", "_top")
    }
}