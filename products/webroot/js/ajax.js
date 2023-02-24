$(document).ready(function(){
    $(document).on("click", ".add-like", function () {
        var id = $(this).attr("data-id");
        
        $.ajax({
            url: "/UserLikes/like?id="+id,
            data: id,
            type: "JSON",
            method: "post",
            success: function (response) {
                data = $.parseJSON(response);
                var status = data['status'];
                console.log(status);
                if(status==0){
                        alert('success like');
                }                
    
            },
        });
    });
})

