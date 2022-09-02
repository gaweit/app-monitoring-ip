$(function(e) {
    "use strict";
    $(".date-inputmask").inputmask("dd/mm/yyyy"), 
    $(".phone-inputmask").inputmask("(999) 999-9999"), 
    $(".international-inputmask").inputmask("+9(999)999-9999"), 
    $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"), 
    $(".purchase-inputmask").inputmask("aaaa 9999-****"), 
    $(".cc-inputmask").inputmask("9999 9999 9999 9999"), 
    $(".ssn-inputmask").inputmask("999-99-9999"), 
    $(".ip-inputmask").inputmask({
        alias: "ip",
        greedy: false //The initial mask shown will be "" instead of "-____".
    }),

    $(".isbn-inputmask").inputmask("999-99-999-9999-9"), 
    $(".currency-inputmask").inputmask("$9999"), 
    $(".percentage-inputmask").inputmask("99%"), 
    $(".decimal-inputmask").inputmask({
        alias: "decimal"
        , radixPoint: "."
    }), 
    
    $(".email-inputmask").inputmask({
    mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]"
    , greedy: !1
    , onBeforePaste: function (n, a) {
        return (e = e.toLowerCase()).replace("mailto:", "")
    }
    , definitions: {
        "*": {
            validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]"
            , cardinality: 1
            , casing: "lower"
        }
    }
    })
});