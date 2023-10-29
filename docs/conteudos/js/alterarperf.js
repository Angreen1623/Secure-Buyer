function validaAlteracao() {
    var formDados = document.formul;
    
    // Obter valores dos campos relevantes
    var email = formDados.email.value;
    var novaSenha = formDados.nova_senha.value;
    var confirmaSenha = formDados.confirmar_senha.value;

    var emailField = formDados.email;
    var senhaField = formDados.nova_senha;
    var confirmaSenhaField = formDados.confirmar_senha;
    var errorDiv = document.getElementById('errorDiv');
    
    // Limpar estilos de erro anteriores e mensagens
    emailField.classList.remove("error-border");
    senhaField.classList.remove("error-border");
    confirmaSenhaField.classList.remove("error-border");
    errorDiv.textContent = "";
    
    // Validar o e-mail
    if (email === "" || email.indexOf(".com") === -1 || email.indexOf("@") === -1) {
        emailField.classList.add("error-border");
        errorDiv.textContent = "Por favor, preencha o campo de e-mail corretamente, ele é obrigatório!";
        emailField.focus();
        return false;
    }
    
    // Verificar se as senhas coincidem, caso a senha tenha sido preenchida
    if (novaSenha !== "" && novaSenha !== confirmaSenha) {
        senhaField.classList.add("error-border");
        confirmaSenhaField.classList.add("error-border");
        errorDiv.textContent = "As senhas não coincidem.";
        senhaField.focus();
        return false;
    }

    return true;
}