<?php
if($senha == $confirmSenha){
    if($_FILES["foto"]["error"] == 0){
        $nomeImg = uniqid().".jpg";
        if(converterImagem($_FILES["foto"],"../img/doador/$nomeImg",70,300,300)){
            $senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO doador VALUES(0,:n,:e,:s,:f)";
            $insert = $con->prepare($sql);
            $insert->bindParam(":n",$nome);     
            $insert->bindParam(":e", $email);
            $insert->bindParam(":s", $senha);
            $insert->bindParam(":f",$nomeImg);
            $insert->execute();
            retornar(1, 'Cadastro realizado com sucesso :)');
        } else{
            retornar(0, 'ERRO - Tipo de imagem inválida');
        }
    } else{
        retornar(0, 'ERRO - Escolha uma imagem');
    }
} else{
    retornar(0, "ERRO - Campos 'Senha' e 'Confirmar Senha' devem ser iguais");
}