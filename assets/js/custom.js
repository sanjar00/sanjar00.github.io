/*==================================================================================
    Custom JS (Any custom js code you want to apply should be defined here).
====================================================================================*/
$('#number').on('keypress', function (e) {
    return e.metaKey || // cmd/ctrl
        e.which <= 0 || // arrow keys
        e.which == 8 || // delete key
        /[0-9]/.test(String.fromCharCode(e.which)); // numbers
})

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
});

var d = new Date();
document.getElementById("year").innerHTML = d.getFullYear();