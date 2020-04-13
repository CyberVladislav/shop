$(document).ready(function(){
    $('.js-search-input').keyup(function(){
		var search = $('.js-search-input').val();
		if(search==""){
			$("#searchList").html("");
			$('#searchResult').hide();
		}
		else{
			$.get("/search",{search:search}, function(data){
				$('#searchList').empty().html(data);
				$('#searchResult').show();
			})
		}
	});		
});
$(document).mouseup(function (e){
    var container = $(".js-search-input");
    var searchResult = $(".js-searchResult");
    if (!container.is(e.target) && container.has(e.target).length === 0){
        searchResult.fadeOut();
    }
    else searchResult.fadeIn();
});
