// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// world.js // version 1.0
//
// written by drow <drow@bin.sh>
// http://creativecommons.org/licenses/by-nc/3.0/
var wc = {
    projection: {
        square: {
            title: "Projeção Quadrado"
        },
        mercator: {
            title: "Projeção Mercator"
        },
        transmerc: {
            title: "Projeção Transversal"
        },
        icosahedral: {
            title: "Projeção Icosahedral"
        },
        mollweide: {
            title: "Projeção em elipse"
        },
        sinusoidal: {
            title: "Projeção sinusoidal"
        }
    },
    palette: palette
};

function init_form() {
    $("seed").observe("change", seed_reaction);
    $("new_seed").observe("click", new_seed);
    $H(wc).keys().each(function (a) {
        $H(wc[a]).keys().each(function (b) {
            var c = wc[a][b].title;
            $(a).insert(create_option(b, c))
        });
        $(a).observe("change", new_world)
    });
    $("pct_water").observe("change", pct_water_reaction);
    $("pct_ice").observe("change", pct_ice_reaction);
    $("height").observe("change", height_reaction);
    $("iter").observe("change", iter_reaction);
    $("rotate").observe("change", rotate_reaction);
    $H(default_query).keys().each(function (a) {
        $(a).setValue(default_query[a])
    });
    new_world()
}
function create_option(a, b) {
    return new_option({
        value: a
    }).update(b)
}
function new_option(a) {
    return build_tag("option", a)
}
function build_tag(a, b) {
    return new Element(a, b)
}
function new_seed() {
    $("seed").setValue(random(2147483647));
    seed_reaction()
}
function seed_reaction() {
    new_world()
}
function pct_water_reaction() {
    check_int("pct_water", 0, 100);
    new_world()
}
function pct_ice_reaction() {
    check_int("pct_ice", 0, 100);
    new_world()
}

function height_reaction() {
    check_int("height", 100, max_height);
    new_world()
}
function iter_reaction() {
    check_int("iter", 1E3, max_iter);
    new_world()
}
function rotate_reaction() {
    check_int("rotate", 0, 360);
    new_world()
}
function check_int(a, b, c) {
    var e = $(a).intValue();
    return check_number(a, e, b, c)
}
function check_number(a, b, c, e) {
    if (b < c) b = c;
    if (e && b > e) b = e;
    $(a).setValue(b);
    return b
}

function new_world() {
    var a = world_query(),
        b = a.timing;
    a = create_world(a);
    b = mark_dt(b, "create");
    image_world(a);
    b = mark_dt(b, "image");
    $("dt").update(close_dt(b))
}

function world_query() {
    return {
        seed: init_seed($("seed").intValue()),
        algorithm: "voss_a7",
        iter: $("iter").intValue(),
        hack_theta: true,
        erode: true,
        pct_water: $("pct_water").intValue(),
        pct_ice: $("pct_ice").intValue(),
        height: $("height").intValue(),
        rotate: $("rotate").intValue() % 360,
        projection: $("projection").getValue(),
        palette: $("palette").getValue(),
        timing: init_dt()
    }
}
function init_dt() {
    return {
        marks: [],
        t0: Date.now(),
        t: Date.now()
    }
}

function mark_dt(a, b) {
    a.marks.push(b + " " + (Date.now() - a.t) / 1E3);
    a.t = Date.now();
    return a
}
function close_dt(a) {
    a.marks.push("total " + (Date.now() - a.t0) / 1E3);
    return a.marks.join("; ")
}
function create_world(a) {
    a = init_world(a);
    if (a.algorithm == "voss") a = voss(a);
    else if (a.algorithm == "voss_x3") a = loop_voss(3, "x", a);
    else if (a.algorithm == "voss_a7") a = loop_voss(7, "a", a);
    if (a.erode) a = erode(a);
    a = flood(a);
    return a = freeze(a)
}

function init_world(a) {
    if (a.projection == "mercator" || a.projection == "transmerc") {
        a.rows = a.height * 2;
        a.cols = a.rows * 2
    } else if (a.projection == "icosahedral") {
        a.rows = a.height;
        a.cols = Math.floor(a.rows * 1.9245008973)
    } else {
        a.rows = a.height;
        a.cols = a.rows * 2
    }
    a.map_len = a.rows * a.cols;
    a.rl1 = a.rows - 1;
    a.rd2 = Math.floor(a.rows / 2);
    a.rdp = Math.floor(a.rows / Math.PI);
    a.cd2 = Math.floor(a.cols / 2);
    a.cdp = Math.floor(a.cols / Math.PI);
    a.rpx = Math.floor(a.cols * (a.rotate / 360));
    var b;
    if (b = palette[a.palette]) {
        a.palette = load_palette(b);
        if (set = b.set) $H(set).keys().each(function (c) {
            a[c] = set[c]
        })
    } else a.palette = load_palette(palette.mogensen);
    return a
}
Element.addMethods(["INPUT", "SELECT"], {
    intValue: function (a) {
        return parseInt($(a).getValue(), 10)
    },
    floatValue: function (a) {
        return parseFloat($(a).getValue())
    }
});

function load_palette(a) {
    var b = {
        n_sea: 50,
        n_land: 100,
        cmap: []
    };
    b.n_terrain = b.n_sea + b.n_land;
    b.n_ice = b.n_land + 1;
    b.sea_idx = 1;
    b.land_idx = b.sea_idx + b.n_sea;
    b.ice_idx = b.land_idx + b.n_land;
    b = sea_cmap(b, a.sea);
    b = land_cmap(b, a.land);
    return b = ice_cmap(b)
}
function sea_cmap(a, b) {
    var c = b.length - 1,
        e;
    for (e = a.sea_idx; e < a.land_idx; e++) {
        var d = (e - a.sea_idx) / a.n_sea * c,
            f = Math.floor(d),
            g = f + 1;
        a.cmap[e] = inter_color(b[f], b[g], d - f)
    }
    return a
}

function land_cmap(a, b) {
    var c = b.length - 1,
        e;
    for (e = a.land_idx; e < a.ice_idx; e++) {
        var d = (e - a.land_idx) / a.n_land * c,
            f = Math.floor(d),
            g = f + 1;
        a.cmap[e] = inter_color(b[f], b[g], d - f)
    }
    return a
}
function ice_cmap(a) {
    var b = a.ice_idx + a.n_ice,
        c = [255, 255, 255],
        e = [175, 175, 175],
        d;
    for (d = a.ice_idx; d < b; d++) {
        var f = (d - a.ice_idx) / (a.n_ice - 1);
        a.cmap[d] = inter_color(c, e, f)
    }
    return a
}

function inter_color(a, b, c) {
    var e = Math.floor(a[0] + (b[0] - a[0]) * c),
        d = Math.floor(a[1] + (b[1] - a[1]) * c);
    a = Math.floor(a[2] + (b[2] - a[2]) * c);
    return fmt_color(e, d, a)
}
function voss(a) {
    a.map = new_map(a, 0);
    var b = build_siphi(a.cols),
        c;
    for (c = 0; c < a.iter; c++) a = fault(a, b);
    a = aggregate(a);
    return a = normal_map(a)
}
function new_map(a, b) {
    var c = [],
        e;
    for (e = 0; e < a.rows; e++) {
        c[e] = [];
        var d;
        for (d = 0; d < a.cols; d++) c[e][d] = b
    }
    return c
}
function build_siphi(a) {
    var b = [],
        c;
    for (c = 0; c < a; c++) b[c] = Math.sin(c / a * 2 * Math.PI);
    return b
}

function fault(a, b) {
    var c = (rand_x(1) - 0.5) * Math.PI,
        e = rand_x(1) - 0.5,
        d = e * Math.PI;
    e = Math.floor(a.cd2 - a.cols * e);
    c = Math.tan(Math.acos(Math.cos(c) * Math.cos(d)));
    if (isNaN(c)) return a;
    var f, g;
    d = random(100) < 50 ? 1 : -1;
    if (a.hack_theta) {
        f = rand_x(0.5) + 0.5;
        g = Math.floor(rand_x((1 - f) * a.rl1)) + 1
    }
    var h;
    for (h = 0; h < a.cols; h++) {
        var i = (e - h + a.cols) % a.cols;
        i = b[i] * c;
        i = Math.floor(Math.atan(i) * a.rdp);
        if (!isNaN(i)) {
            i = i + a.rd2;
            if (a.hack_theta) i = Math.floor(i * f) + g;
            a.map[i][h] += d
        }
    }
    return a
}

function rand_x(a) {
    return random(32767) / 32767 * a
}
function aggregate(a) {
    var b;
    for (b = 1; b < a.rows; b++) {
        var c;
        for (c = 0; c < a.cols; c++) a.map[b][c] += a.map[b - 1][c]
    }
    return a
}
function normal_map(a) {
    var b = 2147483647,
        c;
    for (c = 0; c < a.rows; c++) {
        var e;
        for (e = 0; e < a.cols; e++) if (a.map[c][e] < b) b = a.map[c][e]
    }
    for (c = 0; c < a.rows; c++) for (e = 0; e < a.cols; e++) a.map[c][e] -= b - 1;
    return a
}

function loop_voss(a, b, c) {
    var e = new_map(c, 1),
        d = c.iter;
    c.iter = Math.floor(d / a);
    var f;
    for (f = 0; f < a; f++) {
        c = voss(c);
        if (b == "x") e = compile_x(e, c);
        else if (b == "a") e = compile_a(e, c);
        c.map = false
    }
    c.iter = d;
    c.map = e;
    return c
}
function compile_a(a, b) {
    var c;
    for (c = 0; c < b.rows; c++) {
        var e;
        for (e = 0; e < b.cols; e++) {
            a[c][e] += b.map[c][e];
            a[c][e] /= 2
        }
    }
    return a
}
function compile_x(a, b) {
    var c;
    for (c = 0; c < b.rows; c++) {
        var e;
        for (e = 0; e < b.cols; e++) a[c][e] *= b.map[c][e]
    }
    return a
}

function erode(a) {
    var b = new_map(a, 0),
        c;
    for (c = 0; c < a.rows; c++) {
        var e;
        for (e = 0; e < a.cols; e++) b[c][e] = sum_area(a, c, e) / 9
    }
    a.map = b;
    return normal_map(a)
}
function sum_area(a, b, c) {
    return get_z(a, b - 1, c - 1) + get_z(a, b, c - 1) + get_z(a, b + 1, c - 1) + get_z(a, b - 1, c) + get_z(a, b, c) + get_z(a, b + 1, c) + get_z(a, b - 1, c + 1) + get_z(a, b, c + 1) + get_z(a, b + 1, c + 1)
}
function get_z(a, b, c) {
    if (b >= 0 && b < a.rows && c >= 0 && c < a.cols) return a.map[b][c];
    else {
        b = map_idx(a, b, c);
        return a.map[b.row][b.col]
    }
}

function set_z(a, b, c, e) {
    if (b >= 0 && b < a.rows && c >= 0 && c < a.cols) a.map[b][c] = e;
    else {
        b = map_idx(a, b, c);
        a.map[b.row][b.col] = e
    }
}
function map_idx(a, b, c) {
    for (; b < 0;) b += a.rows * 2;
    if (b >= a.rows * 2) b %= a.rows * 2;
    if (b >= a.rows) {
        b = a.rows * 2 - (b + 1);
        c += Math.floor(a.cols / 2)
    }
    for (; c < 0;) c += a.cols;
    if (c >= a.cols) c %= a.cols;
    return {
        row: b,
        col: c
    }
}

function flood(a) {
    var b = a.palette,
        c = 2147483647,
        e = 0,
        d;
    for (d = 0; d < a.rows; d++) {
        var f;
        for (f = 0; f < a.cols; f++) {
            if (a.map[d][f] < c) c = a.map[d][f];
            if (a.map[d][f] > e) e = a.map[d][f]
        }
    }
    var g = b.n_terrain,
        h = e - c;
    h = (g - 1) / h;
    var i = [];
    for (d = 0; d < g; d++) i[d] = 0;
    for (d = 1; d < a.rows; d++) for (f = 0; f < a.cols; f++) {
        var k = Math.floor((a.map[d][f] - c) * h);
        i[k]++
    }
    d = a.pct_water / 100;
    k = Math.floor(a.map_len * d);
    f = 0;
    var j;
    for (d = 0; d < g; d++) {
        f += i[d];
        if (f > k) {
            j = d;
            break
        }
    }
    g = Math.floor(j / h) + c;
    j = b.n_sea / (g - c + 1);
    e = b.n_land / (e - g + 1);
    for (d = 0; d < a.rows; d++) for (f = 0; f < a.cols; f++) if (a.map[d][f] < g) {
        h = a.map[d][f] - c;
        a.map[d][f] = Math.floor(h * j) + b.sea_idx
    } else {
        h = a.map[d][f] - g;
        a.map[d][f] = Math.floor(h * e) + b.land_idx
    }
    return a
}

function freeze(a) {
    var b = a.palette;
    if (a.pct_ice > 0) {
        var c = a.pct_ice / 100;
        c = Math.floor(a.map_len * c / 2);
        var e = 0,
            d;
        for (d = 0; d < a.rows; d++) {
            var f;
            for (f = 0; f < a.cols; f++) {
                if (a.map[d][f] < b.ice_idx) {
                    var g = a.map[d][f];
                    e += ice_over(a, d, f, g, 0)
                }
                if (e > c) break
            }
            if (e > c) break
        }
        e = 0;
        for (d = a.rl1; d > 0; d--) {
            for (f = 0; f < a.cols; f++) {
                if (a.map[d][f] < b.ice_idx) {
                    g = a.map[d][f];
                    e += ice_over(a, d, f, g, 0)
                }
                if (e > c) break
            }
            if (e > c) break
        }
    }
    return a
}

function ice_over(a, b, c, e, d) {
    var f = a.palette,
        g = get_z(a, b, c),
        h = 0;
    if (g == e) {
        if (g >= f.land_idx) {
            f = g - f.land_idx + f.ice_idx + 1;
            set_z(a, b, c, f)
        } else set_z(a, b, c, f.ice_idx);
        h++;
        if (d++ < a.height / 6) {
            h += ice_over(a, b, c - 1, e, d);
            h += ice_over(a, b, c + 1, e, d);
            if (b > 1) h += ice_over(a, b - 1, c, e, d);
            if (b < a.rl1) h += ice_over(a, b + 1, c, e, d)
        }
    }
    return h
}
var phi_x = [],
    edge_c = [],
    xlate_r = [],
    xlate_c = [];

function image_world(a) {
    var b = scale_world(a),
        c = new_image(b.width, b.height);
    cache_pixels(true);
    if (a.projection == "mercator") image_mercator(a, b, c);
    else if (a.projection == "transmerc") image_transmerc(a, b, c);
    else if (a.projection == "icosahedral") image_icosahedral(a, b, c);
    else if (a.projection == "mollweide") image_mollweide(a, b, c);
    else a.projection == "sinusoidal" ? image_sinusoidal(a, b, c) : image_square(a, b, c);
    dump_pixels(c)
}

function new_image(a, b) {
    var c = $("map");
    c.width = a;
    c.height = b;
    c = c.getContext("2d");
    fill_rect(c, 0, 0, a, b, "#ffffff");
    return c
}

function scale_world(a) {
    var b = {};
    if (a.projection == "mercator" || a.projection == "transmerc") {
        b.height = a.height;
        b.width = Math.floor(a.height * (Math.PI / 2))
    } else if (a.projection == "icosahedral") {
        b.height = a.height;
        b.width = Math.floor(a.height * 2.116950987);
        b.col_w = b.width / 11;
        b.row_h = b.height / 3
    } else {
        b.height = a.rows;
        b.width = a.cols
    }
    if (a.projection == "mollweide" || a.projection == "sinusoidal") b.wd2 = Math.floor(b.width / 2);
    return b
}

function image_square(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.width; d++) {
        var f;
        for (f = 0; f < b.height; f++) {
            var g = normal_z(a, f, d);
            g > 0 && set_pixel(c, d, f, e[g])
        }
    }
}

function image_mercator(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.width; d++) xlate_c[d] = Math.floor(d / b.width * a.cols);
    var f;
    for (f = 0; f < b.height; f++) {
        d = (0.5 - f / b.height) * Math.PI;
        d = Math.atan(Math.sinh(d));
        xlate_r[f] = Math.floor((0.5 - d / Math.PI) * a.rows)
    }
    for (d = 0; d < b.width; d++) for (f = 0; f < b.height; f++) {
        var g = mercator_z(a, b, d, f);
        g > 0 && set_pixel(c, d, f, e[g])
    }
}
function mercator_z(a, b, c, e) {
    return normal_z(a, xlate_r[e], xlate_c[c])
}

function image_transmerc(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.width; d++) {
        var f;
        for (f = 0; f < b.height; f++) {
            var g = transmerc_z(a, b, d, f);
            g > 0 && set_pixel(c, d, f, e[g])
        }
    }
}
function transmerc_z(a, b, c, e) {
    c = c / b.width * 2 * Math.PI;
    e = (e / b.height - 0.5) * 4;
    b = Math.atan(Math.sinh(e) / Math.cos(c));
    var d = Math.PI / 2;
    if (c > d && c <= 3 * d) b += Math.PI;
    c = Math.asin(Math.sin(c) / Math.cosh(e));
    c = Math.floor((0.5 - c / Math.PI) * a.rows);
    b = Math.floor(b / (2 * Math.PI) * a.cols);
    return normal_z(a, c, b)
}

function image_icosahedral(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.width; d++) {
        var f;
        for (f = 0; f < b.height; f++) {
            var g = icosahedral_z(a, b, d, f);
            g > 0 && set_pixel(c, d, f, e[g])
        }
    }
}

function icosahedral_z(a, b, c, e) {
    var d = Math.floor(c / b.col_w),
        f = Math.floor(e / b.row_h);
    c = Math.floor(c - d * b.col_w);
    var g = Math.floor(e - f * b.row_h);
    g = Math.floor(g * 0.5773502692);
    var h = -1;
    if ((f + d) % 2 == 0) c = Math.floor(b.col_w - c);
    if (f == 0) {
        if (d < 10) if (c < g) h = Math.floor(c / g * b.col_w)
    } else if (f == 1) if (d == 0) {
        if (c > g) h = c
    } else if (d < 10) h = c;
    else {
        if (d == 10) if (c < g) h = c
    } else if (f == 2) if (d > 0) if (c > g) {
        c = Math.floor(b.col_w - c);
        g = Math.floor(b.col_w - g);
        h = Math.floor(c / g * b.col_w);
        h = Math.floor(b.col_w - h)
    }
    if (h > -1) {
        if ((f + d) % 2 == 0) h = Math.floor(b.col_w - h);
        h += Math.floor(d * b.col_w);
        return normal_z(a, e, h)
    } else return 0
}
function image_mollweide(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.height; d++) {
        phi_x[d] = Math.sqrt(Math.sin(d / b.height * Math.PI));
        edge_c[d] = Math.floor(b.wd2 * phi_x[d]);
        var f = (0.5 - d / b.height) * 2.8284271247;
        f = Math.asin(f / Math.sqrt(2));
        f = Math.asin((2 * f + Math.sin(2 * f)) / Math.PI);
        xlate_r[d] = Math.floor((0.5 - f / Math.PI) * a.rows)
    }
    for (f = 0; f < b.width; f++) for (d = 0; d < b.height; d++) {
        var g = mollweide_z(a, b, f, d);
        g > 0 && set_pixel(c, f, d, e[g])
    }
}

function mollweide_z(a, b, c, e) {
    if (c > b.wd2 - edge_c[e] && c < b.wd2 + edge_c[e]) {
        b = Math.floor((c - b.wd2) / phi_x[e]) + a.cd2;
        return normal_z(a, xlate_r[e], b)
    } else return 0
}
function image_sinusoidal(a, b, c) {
    var e = a.palette.cmap,
        d;
    for (d = 0; d < b.height; d++) {
        phi_x[d] = Math.sin(d / b.height * Math.PI);
        edge_c[d] = Math.floor(b.wd2 * phi_x[d])
    }
    var f;
    for (f = 0; f < b.width; f++) for (d = 0; d < b.height; d++) {
        var g = sinusoidal_z(a, b, f, d);
        g > 0 && set_pixel(c, f, d, e[g])
    }
}

function sinusoidal_z(a, b, c, e) {
    if (c > b.wd2 - edge_c[e] && c < b.wd2 + edge_c[e]) {
        b = Math.floor((c - b.wd2) / phi_x[e]) + a.cd2;
        return normal_z(a, e, b)
    } else return 0
}
function normal_z(a, b, c) {
    c -= a.rpx;
    if (b < 0) b = 0;
    if (b >= a.rows) b = a.rl1;
    for (; c < 0;) c += a.cols;
    if (c >= a.cols) c %= a.cols;
    return a.map[b][c]
}
function save_map() {
    save_canvas($("map"), $("seed").getValue() + ".png")
}
document.observe("dom:loaded", init_form);