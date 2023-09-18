function validaform() {
    var dados = document.formu;

    // Validação do campo de e-mail
    var email = dados.email.value;
    if (email === "" || email.indexOf("@") === -1 || email.indexOf(".com") === -1) {
        alert("Por favor, preencha o campo de e-mail corretamente, ele é obrigatório!");
        dados.email.focus();
        return false;
    }
    
    // Se todas as validações passaram, você pode enviar o formulário
    alert("Cadastro realizado com sucesso!");
    return true;
}
