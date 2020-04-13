function Angka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function Huruf(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
        return false;
    return true;
}
function tampilnominal() {
    var nominal = $("#spp option:selected").attr("nominal");

    var isi = document.getElementById("nominal");
    isi.value = nominal;
}
