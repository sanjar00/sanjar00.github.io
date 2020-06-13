/*==================================================================================
    Custom JS (Any custom js code you want to apply should be defined here).
====================================================================================*/

var d = new Date();
document.getElementById("year").innerHTML = d.getFullYear();

$('#sendMail').on("click", function () {
    var name = $("#name").val();
    var number = $("#number").val();
    var address = $("#address").val();
    var option = $("#option").val();

    if (name == "") {
        $("#errorMess").text("Введите Ваше имя");
        return false;
    } else if (number.length < 9) {
        $("#errorMess").text("Номер должен быть не менее 9 цифр");
        return false;
    } else if (address == "") {
        $("#errorMess").text("Укажите район для доставки");
        return false;
    } else if (option == "") {
        $("#errorMess").text("Выберите товар");
        return false;
    }

    $("#errorMess").text("");

    $.ajax({
        url: '../php/send.php',
        type: 'POST',
        cache: false,
        data: {
            'name': name,
            'number': number,
            'address': address,
            'option': option
        },
        dataType: 'html',
        beforeSend: function () {
            $('#sendMail').prop("disabled", true);
        },
        success: function (data) {
            alert(data);
            $("#text-presuccess").addClass("d-none");
            $("#form-dis").addClass("d-none");
            $("#text-success").removeClass("d-none");
        }
    });

});