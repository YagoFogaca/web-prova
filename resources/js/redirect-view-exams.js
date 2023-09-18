$(document).ready(function () {
    $("table > tbody > tr").on("click", function () {
        console.log("clique", $(this).data("url"));
        // window.location = $(this).data('url');
        // return true;
    });
});
