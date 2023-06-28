let datatable;
let rowTable = "";
let divLoading = document.querySelector("#divLoading");
document.addEventListener('DOMContentLoaded', function() {
    //actualizar
    datatable = $('#datatable').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        // "language": {
        //     "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        // },
        "ajax": {
            "url": " " + base_url + "/encuestaempresasadmin/get",
            "dataSrc": ""
        },
        "columns": [
            { "data": "idencuestause" },
            { "data": "ruc" },
            { "data": "p1" },
            { "data": "p2" },
            { "data": "p3" },
            { "data": "p4" },
            { "data": "p5" },
            { "data": "p6" },
            { "data": "p7" },
            { "data": "p8" },
            { "data": "p9" },
            { "data": "p10" }
        ],
        'dom': 'lBfrtip',
        'buttons': [{
            "extend": "copyHtml5",
            "text": "<i class='far fa-copy'></i> Copiar",
            "titleAttr": "Copiar",
            "className": "btn btn-secondary"
        }, {
            "extend": "excelHtml5",
            "text": "<i class='fas fa-file-excel'></i> Excel",
            "titleAttr": "Esportar a Excel",
            "className": "btn btn-success"
        }, {
            "extend": "pdfHtml5",
            "text": "<i class='fas fa-file-pdf'></i> PDF",
            "titleAttr": "Esportar a PDF",
            "className": "btn btn-danger"
        }, {
            "extend": "csvHtml5",
            "text": "<i class='fas fa-file-csv'></i> CSV",
            "titleAttr": "Esportar a CSV",
            "className": "btn btn-info"
        }],
        "resonsieve": "true",
        "bDestroy": true,
        "iDisplayLength": 20,
        "order": [
            [0, "desc"]
        ]
    });


}, false);

window.addEventListener('load', function() {
    //fntRolesUsuario();
}, false);
