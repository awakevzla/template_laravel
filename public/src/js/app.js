var id=0;
var body="";
var elemento=null;
$(document).on("click", ".editar", function(e){
    elemento=e.target.parentNode.parentNode.parentNode.childNodes[1];
    id=$(this).data("id");
    body=$(this).data("body");
    $("#body-edit").val(body);
    $("#edit-modal").modal();
});
$(document).on("click", "#guardar", function () {
    var _token=$("#_token").val();
    var body=$("#body-edit").val();
    $.ajax({
        method:'post',
        data:{_token:_token,body:body,id:id},
        url:urlEditar,
        dataType:'json'
    }).done(function(msj){
        console.log(msj["msj"]);
        elemento.textContent=msj["msj"];
        $("#edit-modal").modal("hide");
    });

});
$(document).on("click", ".like", function (e) {
    e.preventDefault();
    id=$(this).data('id');
    esLike=$(this).data("like");
    $.ajax({
        method:'post',
        url:urlLike,
        data:{like:esLike,post_id:id,_token:token}
    }).done(function (msj) {
        console.log(msj);
    }).error(function (msj) {
        console.log(msj);
    });
});