// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// name.js
//
// written and released to the public domain by drow <drow@bin.sh>
// http://creativecommons.org/publicdomain/zero/1.0/

function load_name_list(){
	var e = document.getElementById("lista_nomes");
	var itemSelecionado = e.options[e.selectedIndex].text;
	var nome = nomes[itemSelecionado];
	console.log(nome);
	var nomes = name_set[nome];
	return nomes;
}

names = [];

src_names = load_name_list();

function trim(str) {
    return str.replace(/^\s+|\s+$/g,"");
}
for(var i=0; i<src_names.length; i++){
    names[i] = trim(src_names[i]);
}


var name_set = {
    main: names
},
    chain_cache = {};

function more_names() {
    var b = document.getElementById("output"),
        a = parseInt(b.rows);
    if (a < 1) a = 1;
    a = name_list("main", a);
    b.value = a.join("\n")
}
function generate_name(b) {
    if (b = markov_chain(b)) return markov_name(b);
    return ""
}
function name_list(b, a) {
    var c = [],
        d;
    for (d = 0; d < a; d++) c.push(generate_name(b));
    return c
}
function markov_chain(b) {
    var a;
    if (a = chain_cache[b]) return a;
    else if (a = name_set[b]) if (a = construct_chain(a)) return chain_cache[b] = a;
    return false
}

function construct_chain(b) {
    var a = {},
        c;
    for (c = 0; c < b.length; c++) {
        var d = b[c].split(/\s+/);
        a = incr_chain(a, "parts", d.length);
        var f;
        for (f = 0; f < d.length; f++) {
            var e = d[f];
            a = incr_chain(a, "name_len", e.length);
            var g = e.substr(0, 1);
            a = incr_chain(a, "initial", g);
            e = e.substr(1);
            for (var h = g; e.length > 0;) {
                g = e.substr(0, 1);
                a = incr_chain(a, h, g);
                e = e.substr(1);
                h = g
            }
        }
    }
    return scale_chain(a)
}
function incr_chain(b, a, c) {
    if (b[a]) if (b[a][c]) b[a][c]++;
    else b[a][c] = 1;
    else {
        b[a] = {};
        b[a][c] = 1
    }
    return b
}

function scale_chain(b) {
    var a = {},
        c;
    for (c in b) {
        a[c] = 0;
        var d;
        for (d in b[c]) {
            var f = b[c][d];
            f = Math.floor(Math.pow(f, 1.3));
            b[c][d] = f;
            a[c] += f
        }
    }
    b.table_len = a;
    return b
}
function markov_name(b) {
    var a = select_link(b, "parts"),
        c = [],
        d;
    for (d = 0; d < a; d++) {
        var f = select_link(b, "name_len"),
            e = select_link(b, "initial"),
            g = e;
        for (e = e; g.length < f;) {
            e = select_link(b, e);
            g += e;
            e = e
        }
        c.push(g)
    }
    return c.join(" ")
}

function select_link(b, a) {
    var c = b.table_len[a];
    c = Math.floor(Math.random() * c);
    var d = 0;
    for (token in b[a]) {
        d += b[a][token];
        if (c < d) return token
    }
    return "-"
}
more_names();