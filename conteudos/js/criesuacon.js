function criesuacon() {
    var dados = document.formu;

    // Validação do campo de nome
    var nome = dados.nome.value.trim();
    if (nome === "") {
        alert("O campo Nome é obrigatório.");
        dados.nome.focus();
        return false;
    }

    // Validação do campo de sobrenome
    var sobrenome = dados.sobrenome.value.trim();
    if (sobrenome === "") {
        alert("O campo Sobrenome é obrigatório.");
        dados.sobrenome.focus();
        return false;
    }

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
