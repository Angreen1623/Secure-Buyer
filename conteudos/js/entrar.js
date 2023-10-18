function validaform() {
    // Obter referências para elementos relevantes
    var dados = document.formul;
    var email = dados.input_email.value;
    var emailField = dados.input_email;
    var errorMessage = emailField.nextElementSibling;

    // Remover estilos de erro anteriores (se existirem)
    emailField.classList.remove("error-border");
    if (errorMessage && errorMessage.classList.contains("error-text")) {
        errorMessage.remove();
    }

    // Validar o campo de e-mail
    if (email === "" || email.indexOf(".com") === -1 || email.indexOf("@") === -1) {
        // Adicionar estilo de erro ao campo de e-mail
        emailField.classList.add("error-border");
        var errorDiv = document.createElement('div');
        errorDiv.classList.add("error-text");
        errorDiv.textContent = "Por favor, preencha o campo de e-mail corretamente, ele é obrigatório!";
        emailField.insertAdjacentElement('afterend', errorDiv);

        // Focar no campo de e-mail para que o usuário possa corrigir o erro
        emailField.focus();
        return false;
    }

    return true;
}

/**
 * Listener para verificar quando o conteúdo foi carregado.
 */
document.addEventListener("DOMContentLoaded", function() {
    // Adicionar ouvinte de evento ao campo de e-mail para limpar erros enquanto o usuário digita
    document.formul.input_email.addEventListener('input', function() {
        var emailField = document.formul.input_email;
        var errorMessage = emailField.nextElementSibling;

        // Remover estilos e mensagens de erro
        emailField.classList.remove("error-border");
        if (errorMessage && errorMessage.classList.contains("error-text")) {
            errorMessage.remove();
        }
    });
});

/**
 * Ouvintes de evento para campos de e-mail e senha.
 * Limpará erros ao digitar em qualquer um dos campos.
 */
document.formul.input_email.addEventListener('input', clearLoginError);
document.formul.senha.addEventListener('input', clearLoginError);

/**
 * Função para limpar erros do campo de e-mail e senha.
 */
function clearLoginError() {
    var loginErrorDiv = document.getElementById('loginError');
    var emailField = document.formul.input_email;
    var passwordField = document.formul.senha;

    // Limpar a mensagem de erro e remover as bordas vermelhas dos campos
    loginErrorDiv.textContent = '';
    emailField.classList.remove("error-border");
    passwordField.classList.remove("error-border");
}