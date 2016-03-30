 $('#form').validate({
        rules: {
            nome: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            senha: {
                required: true
            },
            confirma: {
                required: true,
                equalTo: "#senha"
            }
        },
        messages: {
            nome: {
                required: "O campo nome é obrigatório.",
                minlength: "O campo nome deve conter no mínimo 5 caracteres."
            },
            email: {
                required: "O campo email é obrigatório.",
                email: "O campo email deve conter um email válido."
            },
            senha: {
                required: "O campo senha é obrigatório."
            },
            confirma: {
                required: "O campo confirmação de senha é obrigatório.",
                equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
            }
        }

    });