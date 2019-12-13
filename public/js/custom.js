(function(){

    $(".delete-from-list").on("click", function(){
        let dataType = $(this).attr("data-type");
        let id = $(this).attr("data-id");
        let url = $("#url").val()+'/'+id;
        let _token = $("#token").val();
        
        $.ajax({
            url,
            data:{
                _token
            },
            dataType: "JSON",
            type : "delete",
            success : function(data){
                window.location.href = ""
            },
            error : function(error){

            }
        });
    });

    $(".taskassign").on("click", function(){
        let task_id = $(this).attr("data-id");
        let status = $(`#status_${task_id}`).val();
        let assignto = $(`#assign_${task_id}`).val();
        let _token = $("#token").val();
        let url = $("#url").val();

        $.ajax({
            url,
            method : "POST",
            data : {
                task_id, status, assignto, _token
            },
            dataType : "JSON",
            success : function(data){
                console.log(data)
            },
            error : function(err){

            }
        })

    });

})();