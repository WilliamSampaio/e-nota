// jQuery Mask Plugin v1.14.11
// github.com/igorescobar/jQuery-Mask-Plugin

var cpfMascara = function (val) {
    return val.replace(/\D/g, '').length > 11 ? '00.000.000/0000-00' : '000.000.000-009';
};

cpfOptions = {
    onKeyPress: function (val, e, field, options) {
        field.mask(cpfMascara.apply({}, arguments), options);
    }
};

$('.mascara-cpfcnpj').mask(cpfMascara, cpfOptions);

$('.mascara-moeda').on('input', function () {
    var txt = $(this).val();
    txt = txt.replace(/\D/g, '');
    if (txt == '0') {
        return $(this).val('');
    }
    while (txt[0] == '0') {
        txt = txt.slice(1);
    }
    if (txt.length == 1) {
        txt = '00' + txt;
    } else if (txt.length == 2) {
        txt = '0' + txt;
    }
    if (txt == '') {
        return $(this).val('');
    } else {
        txt = txt.slice(0, txt.length - 2) + "." + txt.slice(txt.length - 2);
    }
    txt = txt.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    $(this).val(txt);
});