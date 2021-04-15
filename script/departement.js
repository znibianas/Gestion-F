
$(document).ready(function () {
    table = $('#tdepartement').DataTable({
        scrollX: true,
        cache: false,
        ajax: "",
        ajax: {
            url: "controller/gestionDepartement.php",
            type: "POST",
            dataSrc: "",
            data: {
                "op": ""
            }
        },
        "columns": [{
                "data": "id"
            },
            {
                "data": "code"
            },
            {
                "data": "libelle"
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-danger supprimer">Supprimer</button>';}
            },
            {
                "render" : function (){ return '<button type="button" class="btn btn-outline-secondary modifier">Modifier</button>';}
            }
        ]
    });
//    var baseurl = "http://localhost/gestionpointage/controller/gestionDepartement.php";
//    var xmlhttp = new XMLHttpRequest();
//    xmlhttp.open("POST", baseurl, true);
//    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//    xmlhttp.send("op");
//    xmlhttp.onreadystatechange = function () {
//        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
//            var persons = JSON.parse(xmlhttp.responseText);
//            $("#tdepartement").DataTable({
//                data: persons,
//                "columns": [{
//                        "data": "id"
//                    },
//                    {
//                        "data": "code"
//                    },
//                    {
//                        "data": "libelle"
//                    },
//                    {
//                        "render": function () {
//                            return '<button type="button" class="btn btn-outline-danger supprimer">Supprimer</button>';
//                        }
//                    },
//                    {
//                        "render": function () {
//                            return '<button type="button" class="btn btn-outline-secondary modifier">Modifier</button>';
//                        }
//                    }
//                ]
//
//            });
//        }
//    };
  


/*
 $.ajax({
 url: 'controller/gestionDepartement.php',
 data: {op: ''},
 type: 'POST',
 async: false,
 success: function (data, textStatus, jqXHR) {
 remplir(data);
 },
 error: function (jqXHR, textStatus, errorThrown) {
 console.log(textStatus);
 }
 });
 */
$('#btn').click(function () {
    var code = $("#code");
    var libelle = $("#libelle");
    if ($('#btn').text() == 'Ajouter') {
        $.ajax({
            url: 'controller/gestionDepartement.php',
            data: {op: 'add', libelle: libelle.val(), code: code.val()},
            type: 'POST',
            async: false,
            success: function (data, textStatus, jqXHR) {
                //remplir(data);
                table.ajax.reload();
//                code.val('');
//                libelle.val('');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        });
        //$("#main-content").load("./pages/Departement.php");

    }

});

$(document).on('click', '.supprimer', function () {
    var id = $(this).closest('tr').find('td').eq(0).text();
    var oldLing = $(this).closest('tr').clone();
    var newLigne = '<tr style="position: relative;" class="bg-light" ><th scope="row">' + id + '</th><td colspan="4" style="height: 100%;">';
    newLigne += '<h4 class="d-inline-flex">Voulez vous vraiment supprimer ce departement? </h4>';
    newLigne += '<button type="button" class="btn btn-outline-primary btn-sm confirmer" style="margin-left: 25px;">Oui</button>';
    newLigne += '<button type="button" class="btn btn-outline-danger btn-sm annuler" style="margin-left: 25px;">Non</button></td></tr>';

    $(this).closest('tr').replaceWith(newLigne);
    $('.annuler').click(function () {
        $(this).closest('tr').replaceWith(oldLing);
    });
    $('.confirmer').click(function () {
        $.ajax({
            url: 'controller/gestionDepartement.php',
            data: {op: 'delete', id: id},
            type: 'POST',
            async: false,
            success: function (data, textStatus, jqXHR) {
                if (data.includes("error") == true) {
                    $("#error").modal();
                } else {
                    table.ajax.reload();
                    //remplir(data);
                    //$("#main-content").load("./pages/Departement.php");

                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                $("#error").modal();
            }
        });
    });
});

$(document).on('click', '.modifier', function () {
var btn = $('#btn');
        var id = $(this).closest('tr').find('td').eq(0).text();
        var code = $(this).closest('tr').find('td').eq(1).text();
        var libelle = $(this).closest('tr').find('td').eq(2).text();
        btn.text('Modifier');
        $("#code").val(code);
        $("#libelle").val(libelle);
        $("#id").val(id);
        btn.click(function () {
        if ($('#btn').text() == 'Modifier') {
        $.ajax({
        url: 'controller/gestionDepartement.php',
                data: {op: 'update', id: $("#id").val(), libelle: $("#libelle").val(), code: $("#code").val()},
                type: 'POST',
                async: false,
                success: function (data, textStatus, jqXHR) {
                table.ajax.reload();
                        //remplir(data);
                        $("#code").val('');
                        $("#libelle").val('');
                        btn.text('Ajouter');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
                }
        });
        }
        });
});
        /*
         function remplir(data) {
         var contenu = $('#table-content');
         var ligne = "";
         for (i = 0; i < data.length; i++) {
         ligne += '<tr><th scope="row">' + data[i].id + '</th>';
         ligne += '<td>' + data[i].code + '</td>';
         ligne += '<td>' + data[i].libelle + '</td>';
         ligne += '<td><button type="button" class="btn btn-outline-danger supprimer">Supprimer</button></td>';
         ligne += '<td><button type="button" class="btn btn-outline-secondary modifier">Modifier</button></td></tr>';
         }
         contenu.html(ligne);
         }
         */
        }
);



