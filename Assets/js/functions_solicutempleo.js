$(document).ready(function() {

    //getTitulaciones
    $(".titulaciones").select2({
        ajax: {
            url: " " + base_url + "/solicitudempleo/getTitulaciones",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //getCarreras
    $(".carreras").select2({
        ajax: {
            url: " " + base_url + "/solicitudempleo/getCarreras",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //get Competencias
    $(".competencias").select2({
        ajax: {
            url: " " + base_url + "/solicitudempleo/getCompetencias",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    //get Idiomas
    $(".idiomas").select2({
        ajax: {
            url: " " + base_url + "/solicitudempleo/getIdiomas",
            type: "post",
            dataType: 'json',
            delay: 250,
            data: function(params) {
                return {
                    palabraClave: params.term // search term
                };
            },
            processResults: function(response) {
                return {
                    results: response
                };
            },
            cache: true
        }
    });

    console.log();

});
