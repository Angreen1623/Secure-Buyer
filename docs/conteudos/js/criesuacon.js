function validar() {
    var formDados = document.formu;

    // Obter valores relevantes
    var email = formDados.email.value;
    var senha = formDados.senha.value;
    var confsenha = formDados.confirmarsenha.value;

    //criar variaveis para cada campo e posteriormente associa-los a mesnagem de erro
    var campoemail = formDados.email;
    var camposenha = formDados.senha;
    var campoConfirmaSenha = formDados.confirmarsenha;
    var errorDiv = document.getElementById('errorDiv');

  
    // Limpar estilos de erro anteriores e mensagens
    campoemail.classList.remove("error-border");
    camposenha.classList.remove("error-border");
    campoConfirmaSenha.classList.remove("error-border");
    errorDiv.textContent = "";

    //validar o  email
    if (email === "" || email.indexOf(".com") === -1 || email.indexOf("@") === -1) {
        campoemail.classList.add("error-border");
        errorDiv.textContent = "Por favor, preencha o campo de e-mail corretamente, ele é obrigatório!";
        campoemail.focus();
        return false;
    }

    // Verificar se as senhas coincidem, caso a senha tenha sido preenchida
    if (senha !== "" && senha !== confsenha) {
        camposenha.classList.add("error-border");
        campoConfirmaSenha.classList.add("error-border");
        errorDiv.textContent = "As senhas não coincidem.";
        camposenha.focus();
        return false;
    }

    return true;
    
}
    function blockletras(keypress)
    {//bloqueia numeros

        if ((keypress >= 65 && keypress <= 90) || (keypress >= 97 && keypress <= 122) || (keypress == 32))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
