    // Recuperando o valor da variável $msg da URL
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg');

    // Verificando se a mensagem está presente e exibindo-a em um alerta
    if (msg) {
        alert(msg);
    }
