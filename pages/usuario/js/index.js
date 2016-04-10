$(document).ready( function() {
  $("#form_user, #form_user_edit").validate({
    // Define as regras
    rules:{
      nome:{
        // campoNome será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 3
      },
      login:{
        // campologin será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 3
      },
      email:{
        // campoEmail será obrigatório (required) e precisará ser um e-mail válido (email)
        required: true, email: true
      },
      senha:{
        // campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 8
      },
      confirma:{
        // campoMensagem será obrigatório (required) e terá tamanho mínimo (minLength)
        required: true, minlength: 8, equalTo: "#senha"
      },
      facebook_link:{
        // campo URL terá que ser uma url valida
        url: true
      },
      twitter_link:{
        // campo URL terá que ser uma url valida
        url: true
      },
      gplus_link:{
        // campo URL terá que ser uma url valida
        url: true
      },
      pagina_social:{
        // campo URL terá que ser uma url valida
        url: true
      },
      site_pessoal:{
        // campo URL terá que ser uma url valida
        url: true
      }
    },
    // Define as mensagens de erro para cada regra
    messages:{
      nome:{
        required: "Digite o seu nome",
        minLength: "O seu nome deve conter, no mínimo, 3 caracteres"
      },
      login:{
        required: "Digite o seu nick (Apelido)",
        minLength: "O seu nick deve conter, no mínimo, 3 caracteres"
      },
      email:{
        required: "Digite o seu e-mail para contato",
        email: "Digite um e-mail válido"
      },
      senha:{
        required: "Digite a sua senha",
        minLength: "A sua senha deve conter, no mínimo, 8 caracteres"
      },
      confirma:{
        required: "Confirme a sua senha",
        minLength: "A sua senha deve conter, no mínimo, 8 caracteres",
        equalTo: "As senhas devem ser iguais"
      },
      facebook_link:{
        url: "URL inválida"
      },
      twitter_link:{
        url: "URL inválida"
      },
      gplus_link:{
        url: "URL inválida"
      },
      pagina_social:{
        url: "URL inválida"
      },
      site_pessoal:{
        url: "URL inválida"
      }
    }
  });
});