const enderecoIMG = "https://mattoliveira.rf.gd/Server/img/doador/"
// const tbody = document.querySelector("table tbody")

//Formulário de cadastro
var formsDoador = document.getElementById("formsDoador")
cadastro = function(){
    formsDoador.addEventListener("submit", function(e){
        e.preventDefault()
        let dados = new FormData(formsDoador)
        dados.append("tipo", "cadastrar")
        Ajax("POST", URL_DOADOR, dados, cadastrar)
    })
}
formsDoador && cadastro() //verificando se existe o elemento para executar a função
//Executando função cadastrar
cadastrar = function(response){
    alert(response.aviso)
    if(response.status == 1){
        window.open('login.html', '_top')
    }
}

//Formulário de login
var formsLogin = document.getElementById("formsLogin")
login = function(){
    formsLogin.addEventListener("submit", (e) => {
        e.preventDefault()
        let dados = new FormData(formsLogin)
        dados.append("tipo", "logar")
        Ajax("POST", URL_DOADOR, dados, confirmLogin)
    })
}
formsLogin && login() //verificando se existe o elemento para executar a função

confirmLogin = function(response){
    alert(response.aviso)
    if(response.status === 1){
        redirection(response)
    }
}

redirection = function(response){
    if(response.status === 1){
        window.open('home.html', '_top')
    }
}

certificarLogin((response) => {
    redirection(response)
})

//Preview da foto de perfil
var inputImg = document.getElementById("file")
var previewImg = document.getElementById("previewImg")
previewFoto = function(){
    inputImg.addEventListener("change", (e) => {
        const [file] = inputImg.files
        if(file){
            previewImg.src = URL.createObjectURL(file)
        }
    })
}
inputImg && previewFoto()

var btnReset = document.getElementById("btn-reset")
defaultImg = function(){
    btnReset.addEventListener("click", () => {
        previewImg.src = "http://localhost/aula/ATIVIDADE6_AJAX-MATHEUS_OLIVEIRA/App/img/user.png"
    })
}
btnReset && defaultImg() //verificando se existe o elemento na pág, caso for verdadeiro, execute a função