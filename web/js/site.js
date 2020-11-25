$(document).ready(function () {
    $(".author-ac").focus(function () {
        $(".author-ac").val('');
        $(this).autocomplete({
            source: function (request, response) {
                $.ajax({
                    type: "POST",
                    contentType: "application/x-www-form-urlencoded",
                    url: url_ac,
                    data: {'pref': $(".author-ac").val()},
                    dataType: "json",
                    success: function (data) {
                        response(data);
                    },
                    error: function (result) {
                        alert("No Match");
                    }
                });
            }
        });
    });
});