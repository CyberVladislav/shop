$(document).ready(function () {
    var buttonClick;
    $(function(){
        var idOfParChil = 0;
        var chldId = 0;
        $('.reply_btn').on('click', function(){
            idOfParChil = $(this).attr("parnId");
            idOfProduct = $(this).attr("productId");
            var selector = ('div[testId=' + idOfParChil +']');
            chldId = $(this).attr("chldId");
            if(typeof(chldId) != "undefined" && chldId !== null) {
                var selector = ('div[chldId=' + chldId +']');
            }
        $('#testFORM').remove();
        var node = '<form id="testFORM">{{ csrf_field() }}<textarea class="form-control mb-2" name="textfield" id="textfield_" rows="2"></textarea> <button class="primary-btn-test close_modal_window" onClick="buttonClick()" id="sendButton" type="button">Submit Now</button></form>';
        $(selector).append(node);
            console.log("parnId = "+idOfParChil);
            console.log("chldId = "+chldId);
        });
        buttonClick = function() {
            var asd = $("#textfield_").val();
            if (asd == "")	asd = "empty field";
            var dataString = "replyy="+asd;
            $.ajax({
                type: "POST",
                url: "/ajaxFeedbackReply", 
                data: dataString + '&idOfParentOrChild=' + idOfParChil + '&idOfProduct=' + idOfProduct,
                success: function(result){ 
                    var selector = ('div[id=' + idOfParChil +']');
                    $(selector).append(result);
                    console.log(result); 
                    document.getElementById('textfield_').value = "";
                    $('#testFORM').remove();
                },
                error: function(err){
                    console.log(err);
                    document.getElementById('textfield_').value = "";
                    $('#testFORM').remove();
                }
            })
        };
    });
});
