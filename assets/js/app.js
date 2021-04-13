$(".preloader").fadeOut(700, function () {
    setTimeout(function () {
        toastr.options = {
            timeOut: 500,
            progressBar: !0,
            showMethod: "slideDown",
            hideMethod: "slideUp",
            showDuration: 200,
            hideDuration: 200
        };
    }, 500);
});