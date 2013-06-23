


var app = app || {};

/*str.replace(/\s+/g, '-').replace(/[^a-zA-Z0-9\-\_ ]/g, '').toLowerCase();*/

app.global={
	init: function(){
		this.utility.searchBtn();
		app.utility = this.utility;
	},
	
	utility: {
		
		searchBtn: function(){
			$(".search-btn").html("<span class='add-on'><i class='icon-search icon-black'></i></span>");
		},
		slugInput: function(thisInput, copyInput){
			$(thisInput).keyup(function(){
				str = $(this).val();
				str = str.replace(/\s+/g, '-').replace(/[^a-zA-Z0-9\-\_ ]/g, '').toLowerCase();
				if(copyInput){
					$(copyInput).val(str);
				}else{
					$(this).val(str);	
				}
				
			
				
			})
			
		}
	}
	
	
}

$(function(){
app.global.init();	

app.utility.slugInput(".slugInput");
app.utility.slugInput(".copyTitle", '.slugInput');
	
});