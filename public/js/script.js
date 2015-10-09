$(function() {
    $("#submit_button").click(function(){
        if($("#amount").val().length < 1 || $("#amount").val().search(/[^0-9]{1,}/) >= 0) {
            alert('Странная сумма...');
            return;
        }
        $.ajax({
            url: "/ajax.php",
            data: {
                act: 'getCart',
                sum: $("#amount").val()
            },
            success: function(data) {
                $("#result_count").text(data.count);
                $("#result_sum").text(data.sum);
                $("#result_download_link").attr("href", "/download.php?sum="+$("#amount").val());
                $("#result_container").show();
            },
            dataType: 'json'
        });
    });
    $("#regenerate_link").click(function(){
        $(this).prop("disabled", true);
        $(this).text("Генерирую...");
        $.ajax({
            url: "/ajax.php",
            data: {act: 'generateProducts'},
            success: function(data) {
                $("#base_count").text(data.count);
                $("#base_min").text(data.min.price);
                $("#base_max").text(data.max.price);

                $("#regenerate_link").prop("disabled", false);
                $("#regenerate_link").text("Перегенерить базу");

            },
            dataType: 'json'
        });
    });
});