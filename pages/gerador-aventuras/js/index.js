/*
    Gerador de aventuras
    Criado por Maickon Rangel
    2016
*/

var speed  = 50;
var time    = 3000;

 function rand(n1,n2){
    return Math.floor((Math.random() * n2) + n1);
}


function rand_objective(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var objective, objective_option;
        switch(type){
            case 1: objective = objective1;
                        objective_option = objective1_option;
            break;

            case 2: objective = objective2;
                        objective_option = objective2_option;
            break;

            case 3: objective = objective3;
                        objective_option = objective3_option;
            break;

            case 4: objective = objective4;
                        objective_option = objective4_option;
            break;

            case 5: objective = objective5;
                        objective_option = objective5_option;
            break;

            case 6: objective = objective6;
                        objective_option = objective6_option;
            break;
        }

        //var sentence_size = beginning_of_sentences.length;
        //var sentence_chosen = beginning_of_sentences[rand(0, sentence_size)];

        var size = objective.length;
        var option_size = objective_option.length;

        var chosen_goal = objective[rand(0, (size))];
        var option_chosen_goal = objective_option[rand(0, (option_size))];

        var input = document.getElementById("objetivo");

        input.value =  chosen_goal +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_locations(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var locations, locations_option;
        switch(type){
            case 1: locations = locations1;
                    locations_option = locations1_option;
            break;

            case 2: locations = locations2;
                    locations_option = locations2_option;
            break;

            case 3: locations = locations3;
                    locations_option = locations3_option;
            break;

            case 4: locations = locations4;
                    locations_option = locations4_option;
            break;

            case 5: locations = locations5;
                    locations_option = locations5_option;
            break;

            case 6: locations = locations6;
                    locations_option = locations6_option;
            break;
        }

        var option_size = locations_option.length;
        var option_chosen_goal = locations_option[rand(0, (option_size))];

        var input = document.getElementById("local");

        input.value = locations +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_antagonists(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var antagonists, antagonists_option;
        switch(type){
            case 1: antagonists = antagonists1;
                    antagonists_option = antagonists1_option;
            break;

            case 2: antagonists = antagonists2;
                    antagonists_option = antagonists2_option;
            break;

            case 3: antagonists = antagonists3;
                    antagonists_option = antagonists3_option;
            break;

            case 4: antagonists = antagonists4;
                    antagonists_option = antagonists4_option;
            break;

            case 5: antagonists = antagonists5;
                    antagonists_option = antagonists5_option;
            break;

            case 6: antagonists = antagonists6;
                    antagonists_option = antagonists6_option;
            break;
        }

        var option_size = antagonists_option.length;
        var option_chosen_goal = antagonists_option[rand(0, (option_size))];

        var input = document.getElementById("antagonistas");

        input.value = antagonists +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_supporting(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var supporting, supporting_option;
        switch(type){
            case 1: supporting = supporting1;
                    supporting_option = supporting1_option;
            break;

            case 2: supporting = supporting2;
                    supporting_option = supporting2_option;
            break;

            case 3: supporting = supporting3;
                    supporting_option = supporting3_option;
            break;

            case 4: supporting = supporting4;
                    supporting_option = supporting4_option;
            break;

            case 5: supporting = supporting5;
                    supporting_option = supporting5_option;
            break;

            case 6: supporting = supporting6;
                    supporting_option = supporting6_option;
            break;
        }

        var option_size = supporting_option.length;
        var option_chosen_goal = supporting_option[rand(0, (option_size))];

        var input = document.getElementById("coadjuvantes");

        input.value = supporting +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_complication(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var complication, complication_option;
        switch(type){
            case 1: complication = complication1;
                    complication_option = complication1_option;
            break;

            case 2: complication = complication2;
                    complication_option = complication2_option;
            break;

            case 3: complication = complication3;
                    complication_option = complication3_option;
            break;

            case 4: complication = complication4;
                    complication_option = complication4_option;
            break;

            case 5: complication = complication5;
                    complication_option = complication5_option;
            break;

            case 6: complication = complication6;
                    complication_option = complication6_option;
            break;
        }

        var option_size = complication_option.length;
        var option_chosen_goal = complication_option[rand(0, (option_size))];

        var input = document.getElementById("complicacao");

        input.value = complication +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function rand_reward(){
    var intervalo = window.setInterval(function(){
        var type = rand(1,6);
        var reward, reward_option;
        switch(type){
            case 1: reward = reward1;
                    reward_option = reward1_option;
            break;

            case 2: reward = reward2;
                    reward_option = reward2_option;
            break;

            case 3: reward = reward3;
                    reward_option = reward3_option;
            break;

            case 4: reward = reward4;
                    reward_option = reward4_option;
            break;

            case 5: reward = reward5;
                    reward_option = reward5_option;
            break;

            case 6: reward = reward6;
                    reward_option = reward6_option;
            break;
        }

        var option_size = reward_option.length;
        var option_chosen_goal = reward_option[rand(0, (option_size))];

        var input = document.getElementById("recompensa");

        input.value = reward +" "+ option_chosen_goal;

    }, speed);

     window.setTimeout(function() {
        clearInterval(intervalo);
    }, time);
}

function load(){
   rand_objective();
   rand_locations();
   rand_antagonists();
   rand_supporting();
   rand_complication();
   rand_reward();
}