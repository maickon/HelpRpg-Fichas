var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

$(function() {
    var availableTags = [
    //classes
      "Bárbaro",
      "Barbaro",
      "Paladino",
      "Samurai",
      "Bardo",
      "Clérigo",
      "Ranger",
      "Mago",
      "Feiticeiro",
      "Necromante",
      "Espião",
      "Monge",
      "Assassino",
      "Guerreiro",
      "Druida",
      "Arcanista",
    //raças
      "Humano",
      "Humana",
      "Bugbear",
      "Orc",
      "Elfo",
      "Elfa",
      "Meia-elfa",
      "Meio-elfo",
      "Centauro",
      "Anão",
      "Anã",
      "Halfling",
      "Dríade",
      "Meio-",
      "Demônio",
      "Anjo",
      "Fada",
      "Meio-dragão",
      "Meio-anjo",
      "Meio-demônio",
    //tipos de personagem
      "personagem jogador",
      "Personagem monstro",
      "personagem do mestre",
      "Npc",
      "Pj",
    //sistemas
      "Dungeons and Dragons",
      "D&D",
      "Ded",
      "Dungeons and Dragons 3.0",
      "D&D 3.0",
      "Ded 3.0",
      "Dungeons and Dragons 4.0",
      "D&D 4.0",
      "Ded 4.0",
      "Dungeons and Dragons 5.0",
      "D&D 5.0",
      "Ded 5,0",
      "Daemon",
      "3d&t",
      "Savage Worlds",
      "7º Mar",
      "Abismo RPG",
      "Alchemia RPG",
      "Animes",
      "Aventuras Fantásticas",
      "Blood & Honor",
      "Chamado de Cthulhu",
      "Dungeon World",
      "Dust Devils",
      "Este Corpo Mortal",
      "Fiasco",
      "Final Fantasy RPG",
      "Forgotten Realms",
      "Guerra dos Tronos RPG",
      "GURPS",
      "gurps",
      "Mutantes & Malfeitores",
      "O Senhor dos Anéis",
      "O Um Anel",
      "Old Dragon",
      "Pathfinder",
      "Reinos de Ferro",
      "RPG Quest",
      "Savage Worlds",
      "Scion Hero",
      "Shotgun Diaries",
      "Shadowrun",
      "Sistema d20",
      "Space Dragon",
      "Star Wars",
      "Storyteller RPG",
      "Tagmar",
      "Terra Devastada",
      "Tormenta",
      "World of Warcraft",
      "Yggdrasill RPG"
    ];
    
    $( "#search" ).autocomplete({
      max:20,
      minLength:1,
      source: availableTags
    });

    $( "#search_result" ).autocomplete({
      max:20,
      minLength:1,
      source: availableTags
    });
  });

  $(document).ready(function() {
    $('#search_resulted').DataTable({
      "oLanguage": {
        "sLengthMenu": "Mostrar _MENU_ registros por página", "sZeroRecords": "Nenhum registro encontrado na base de dados do Help Rpg! Faça um cadastro e contribua com um com suas idéias.",
        "sInfo": "Mostrando _START_ / _END_ de _TOTAL_ registro(s)", 
        "sInfoEmpty": "Mostrando 0 / 0 de 0 registros", 
        "sInfoFiltered": "(filtrado de _MAX_ registros)", 
        "sSearch": "Pesquisa interna: ", 
        "oPaginate": { 
          "sFirst": "Início", 
          "sPrevious": "Anterior", 
          "sNext": "Próximo", 
          "sLast": "Último" 
      }},
    })
  } );