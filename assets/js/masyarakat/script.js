$(".form-check input[type='radio']").on("change", function () {
    if ($("#tipe_pengaduan").is(':checked')) {
        $('.form_pengaduan').removeClass("hidden");
        $('.form_aspirasi').addClass("hidden");
    } else if ($("#tipe_aspirasi").is(':checked')) {
        $('.form_pengaduan').addClass("hidden");
        $('.form_aspirasi').removeClass("hidden");
    }
});

$(".show-mobile-header").click(function () {
    $(".mobile-header").removeClass('hidden');
});
$(".hide-mobile-header").click(function () {
    $(".mobile-header").addClass('hidden');
});

$("#show-form-lampiran-pengaduan").click(function () {
    $(".form-lampiran-pengaduan").slideToggle("fast", function () { });
});
$("#show-form-lampiran-aspirasi").click(function () {
    $(".form-lampiran-aspirasi").slideToggle("fast", function () { });
});