function valiDate(date) {
    const pat = RegExp(/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/)
    return pat.test(date)
}

function boucletempo(n) {
    for (x = 0; x < n; x++) {
        setTimeout(function () { alert("Hello"); }, 100);
    }
}