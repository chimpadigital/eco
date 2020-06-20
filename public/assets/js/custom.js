$(function() {
    //Configuración Moment
    moment.locale("es-us");
    //Fecha Actual
    var dia = moment().format("D");
    var mes = moment().format("MMMM");
    //Setear Fecha actuall en el front calendario 1
    $("#dia").html(dia);
    $("#mes").html(mes);

    //Setear Fecha actuall en el front calendario 1
    $("#dia2").html(dia);
    $("#mes2").html(mes);
    //Desabilitando Boton
    $("#guardar_reserva_1").prop("disabled", true);
    $("#guardar_reserva_2").prop("disabled", true);

    // Pasando las Fecha para setear
    function parseDate(parseFecha) {
        var fecha = moment(parseFecha, "DD-MM-YYYY");
        var dia = fecha.format("D");
        var mes = fecha.format("MMMM");
        return {
            dia: dia,
            mes: mes
        };
    }
    //Inicio Calendario 1
    $("#Calendar-1").jalendar({
        type: "selector",
        color: "#FBF9F9",
        lang: "ES",
        sundayStart: true,
        dayWithZero: false,
        dayColor: "#515150",
        titleColor: "#0097D6",
        weekColor: "#00B49D",
        todayColor: "#fff",

        done: function() {
            var fechaSelect = $("#Calendar-1 input.data1").val();
            fecha = parseDate(fechaSelect);
            $("#dia").html(fecha.dia);
            $("#mes").html(fecha.mes);
            $("#guardar_reserva_1").prop("disabled", false);

            QueryDatefisrt();
        }
    });

    //Inicio Calendario 2
    $("#Calendar-2").jalendar({
        type: "selector",
        color: "#FBF9F9",
        lang: "ES",
        sundayStart: true,
        dayWithZero: false,
        dayColor: "#515150",
        titleColor: "#0097D6",
        weekColor: "#00B49D",
        todayColor: "#fff",
        done: function() {
            var fechaSelect = $("#Calendar-2 input.data1").val();
            fecha = parseDate(fechaSelect);
            $("#dia2").html(fecha.dia);
            $("#mes2").html(fecha.mes);
            $("#guardar_reserva_2").prop("disabled", false);

            QueryDateSecond();
        }
    });
    // Consultando Fechas Disponibles Calendario 1;
    function QueryDatefisrt() {
        $("#first_sesion_time")
            .find("option")
            .remove()
            .end();
        var fechaSelect = $("#Calendar-1 input.data1").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            url: "/quotes/consulta-fecha",
            type: "POST",
            data: { date: fechaSelect },
            success: function(res) {
                $.each(res, function(i, item) {
                    console.log(item, i);
                    $("#first_sesion_time").append(
                        new Option(item.horario, item.horario)
                    );
                });
            }
        });
    }
    // Consultando Fechas Disponibles Calendario 2;
    function QueryDateSecond() {
        $("#second_sesion_time")
            .find("option")
            .remove()
            .end();
        var fechaSelect = $("#Calendar-2 input.data1").val();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            }
        });
        $.ajax({
            url: "/quotes/consulta-fecha",
            type: "POST",
            data: { date: fechaSelect },
            success: function(res) {
                $.each(res, function(i, item) {
                    console.log(item, i);
                    $("#second_sesion_time").append(
                        new Option(item.horario, item.horario)
                    );
                });
            }
        });
    }

    // Guardando la reserva
    $("#guardar_reserva_1").click(function(e) {
        e.preventDefault();
        var fechaSelect = $("#Calendar-1 input.data1").val();
        var horario = $("#first_sesion_time").val();
        console.log($("#first_sesion_time").val());
        var fecha_reserva = fechaSelect + " " + horario;
        $.ajax({
            url: "/quotes/reservar-fecha",
            type: "POST",
            data: { fecha: fecha_reserva },
            success: function(res) {
                console.log(res);
            }
        });
    });

    $("#guardar_reserva_2").click(function(e) {
        e.preventDefault();
        var fechaSelect = $("#Calendar-2 input.data1").val();
        var horario = $("#second_sesion_time").val();
        var fecha_reserva = fechaSelect + " " + horario;
        $.ajax({
            url: "/quotes/reservar-fecha",
            type: "POST",
            data: { segunda_fecha: fecha_reserva },
            success: function(res) {
                console.log(res);
            }
        });
    });
});
