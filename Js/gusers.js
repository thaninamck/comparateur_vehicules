$(document).ready(function() {
    $('#statusFilter').change(function() {
        var selectedStatus = $(this).val();
        console.log("filter clicked ",selectedStatus)
        if (selectedStatus === 'all') {
            $('.user-row').show();
        } else {
            $('.user-row').hide();
            $('.' + selectedStatus).show();
        }
    });


    $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".user-row").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
