(function(){
    $(".delete-from-list").on("click", function(){
        let dataType = $(this).attr("data-type");
        let id = $(this).attr("data-id");
        let url = $("#url").val()+'/'+id;
        let _token = $("#token").val();
        
        $.ajax({
            url,
            data:{
                _token,

            },
            dataType: "JSON",
            type : "delete",
            success : function(data){
                
            },
            error : function(error){

            }
        });

    });  
})();