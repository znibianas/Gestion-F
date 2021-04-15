
$(document).ready(function () {
    table = $('#tsearch').DataTable({
        scrollX: true,
        cache: false,
        ajax: "",
        ajax: {
            url: "controller/gestionFonction.php",
            type: "POST",
            dataSrc: "",
            data: {
                "op": ""
            }
        },
        "columns": [{
                "data": "nom"
            }
        ]
    });

    var filiere = $("#filiere");
    $.ajax({
        url: 'controller/GestionDepartement.php',
        data: {op: ''},
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            var option = '<option value="-1">Choisir une filiere</option>';
            for (var i = 0; i < data.length; i++) {
                option += '<option value="' + data[i].code + '">' + data[i].libelle + '</option>';
            }
            filiere.html(option);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
        }
    });

    $('#btn').click(function () {
        var filiere = $("#filiere");
//    var filiere = $("#filiere");
        if ($('#btn').text() === 'Rechercher') {
            if ($("#filiere").val() === '-1') {
                table.ajax.reload();
            } else {
                console.log($("#filiere").val());
                $.ajax({

                    url: 'controller/gestionDepartement.php',
                    data: {op: 'findclasses', filiere: filiere.val()},
                    type: 'POST',
                    async: false,
                    success: function (data, textStatus, jqXHR) {
                        remplir(data);
                        //remplir(data);

//                nom.val('');
//                filiere.val('');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(textStatus);
                    }
                });
                //$("#main-content").load("./pages/Classes.php");

            }
        }
        function remplir(data) {
            var contenu = $('#table-content');
            var ligne = "";
            for (i = 0; i < data.length; i++) {
                ligne += '<tr><th scope="row">' + data[i].nom + '</th>';
            }
            contenu.html(ligne);
        }
    });





}
);



