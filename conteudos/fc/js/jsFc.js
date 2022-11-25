function validaform()
    {
    dados = document.formul;
    //valida nome
        if (dados.nome.value.length<9 ||dados.nome.value.length>9 && dados.nome.value.indexOf(" ")==-1)
        {
        alert ("O campo do "+dados.nome.name+" deve conter o nome completo, incluindo o sobrenome com espaços entre eles."); 
        dados.nome.focus();
        return false;
        }  
        
    if (dados.email.value=="" || dados.email.value.indexOf("@")==-1 || dados.email.value.indexOf(".com")==-1)
        {
        alert("O campo "+dados.email.name +" deve ser preenchido corretamente!");
        dados.email.focus();
        return false;
        }
    
    if(dados.mensagem.value=="")
    {
    alert ("O campo "+dados.mensagem.name + " deve ser preenchido!");
    dados.mensagem.focus();
    return false;
    }
    else
    {
    alert ("Agradecemos o seu contato e retornaremos com um email assim que possível");
    }  
    }