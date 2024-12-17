$(document).ready(function () {
    $("#bookingForm").submit(function (event) {
        event.preventDefault();
        
        const formData = $(this).serialize();

        $.ajax({
            url: "submit.php",
            type: "POST",
            data: formData,
            success: function (response) {
                $("#successMessage").html(response).show();
                $("#bookingForm")[0].reset();
            },
            error: function () {
                $("#successMessage").html("<p style='color: red;'>Error processing your request.</p>").show();
            }
        });
    });
});