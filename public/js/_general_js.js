function focus_on_first_input(){
    $("form").find('input[type=text],textarea,select').filter(':visible:eq(0)').focus();
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

$(document).ready(function(){     
    
    $(".list_delete_btn").confirm({
        text: "Are you sure you want to proceed?",
        title: "Confirmation required",
        confirm: function(a) {
            var href = a.context.dataset.href;
            var id   = a.context.id;
            if(id == 'delete_all_btn'){
                $("#list_form").submit();
            }else{
                window.location.href = href;
            }            
        },
        cancel: function(button) {
            // nothing to do
        },
        confirmButton: "Yes, I am",
        cancelButton: "No",
        post: true,
        confirmButtonClass: "btn-danger",
        cancelButtonClass: "btn-default",
        dialogClass: "modal-dialog modal-lg" // Bootstrap classes for large modal
    });
});