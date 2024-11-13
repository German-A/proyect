$(document).ready(function () {
    datatable = $('#datatable').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/difusion_cursos/getList",
            "dataSrc": ""
        },
        "columns": [{
            "data": "id_difusion_cursos"
        },
        {
            "data": "nombre_curso"
        },
        {
            "data": "tipo_curso"
        },
        {
            "data": "url"
        },
        {
            "data": "id_empresa_cursos"
        },
        {
            "data": "status"
        },
        {
            "data": "options"
        }
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
        "iDisplayLength": 10,

        "order": [
            [0, "desc"]
        ]
    });

});

$(".lista").select2({
    dropdownParent: $("#formmodal"),
});



function openModal() {
    document.querySelector('#id').value = "";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnText').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Registrar";
    document.querySelector('#titleModal').innerHTML = "Registrar";
    document.querySelector("#formmodal").reset();
    $('#modal').modal('show');
}


function Guardar() {
    var id = $("#id").val();
    var txtNombreEmpresa = $("#txtNombreEmpresa").val();
    var txtNombreCurso = $("#txtNombreCurso").val();
    var txtTipoCurso = $("#txtTipoCurso").val();
    var txtUrl = $("#txtUrl").val();

    if (txtNombreEmpresa == "") {
        swal("Atención!", "Ingresar el Nombre", "warning");
        return;
    }

    if (txtNombreCurso == "") {
        swal("Atención!", "Ingresar la Posición", "warning");
        return;
    }
    if (txtTipoCurso == "") {
        swal("Atención!", "Ingresar la Posición", "warning");
        return;
    }
    if (txtUrl == "") {
        swal("Atención!", "Ingresar la Posición", "warning");
        return;
    }

    var fd = new FormData();
    fd.append("id", id);
    fd.append("txtNombreEmpresa", txtNombreEmpresa);
    fd.append("txtNombreCurso", txtNombreCurso);
    fd.append("txtTipoCurso", txtTipoCurso);
    fd.append("txtUrl", txtUrl);

    divLoading.style.display = "flex";
    $.ajax({
        method: "POST",
        url: "" + base_url + "/difusion_cursos/set",
        data: fd,
        processData: false, // tell jQuery not to process the data
        contentType: false, // tell jQuery not to set contentType
    }).done(function (response) {
        var info = JSON.parse(response);

        if (info.status == true) {
            swal("difusion_cursos", info.msg, "success");
            datatable.api().ajax.reload();
            $("#modal").modal("hide");
        }

        if (info.status == false) {
            swal("Error!", info.msg, "error");
        }

        divLoading.style.display = "none";
        return;
    });
}
