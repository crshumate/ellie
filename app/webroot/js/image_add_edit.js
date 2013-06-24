$(function(){
		
	$('#image-add').load(function(){
	var $this = $(this);
	updatePage($this);
		
	});
	
	$("#more-images").click(function(){
			var $newIframe = $("<iframe />").attr({
				frameborder: "no",
				id: 'image-add',
				scrolling: 'no',
				height: "75px",
				width: "200px",
				src: "/admin/images/add"})
				$(".add-images").append($newIframe);	
		
				$newIframe.load(function(){
				var $this = $(this);
				updatePage($this);

				});
		
		})
	
	function updatePage($this){
			var location = $this.get(0).contentWindow.location.pathname;
			if(location != "/admin/images/add"){
				$filename = $this.contents().find("#filename");
				$filename = $.trim($filename.html());
		
				$imageId = $this.contents().find("#imageId");
				$imageId = $.trim($imageId.html());
				$this.fadeOut(500).remove();
				var $a = $("<a />").attr('href', imagePath+$filename)
					.addClass('image-link')
					.text($filename)
					.click(function(ev){
						ev.preventDefault();			
						addImageHtml(this);
					});
				
				var $deleteBtn=$("<a />")
					.attr('href', "#")
					.data('image_id',$imageId)
					.addClass('btn btn-danger delete-image btn-mini')
					.text('delete')
					.click(function(ev){
						ev.preventDefault();
						deleteImage($(this));
					})
				
				var $div=$("<div />").addClass('image-row uploads-container');
				
				$div.append($a,$deleteBtn);
				var li = $("<li />").append($div);
				$(".uploaded-images ul").append(li);
		
			 	$("#more-images").show()
			
				var idx = $(".image-id-input").length;
				var imageIdInput = $("<input />")
				.attr({type:'hidden', name: 'data[Image][images][image'+idx+']'})
				.val($imageId)
				.addClass('image-id-input');
				$(".image-add-form").prepend(imageIdInput);
			}
		}
		
		function addImageHtml (thisLink) {
			var pathToFile = jQuery(thisLink).attr('href');
			url="<img src='"+pathToFile+"' />"
			var textArea = $(".add-image-content").val();
		
			if(textArea=="") textArea=url;
			 else textArea+=url;
			$(".add-image-content").val(textArea);
		
		}
		
		function deleteImage($btn){
			var $imageId = $btn.data('image_id');
			var url = deleteUrl+"/"+$imageId
			var imageContainer = $btn.parent().parent();
			var mainContainer = $btn.parent().parent().parent();
			$.get(url, "", function(response){
				if(response=='success'){
					var statusMsg="<div class='alert delete-image-status'>"+
					  "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
					  "<strong>Success!</strong> Succesfully deleted image"+
					"</div>";
					imageContainer.remove();
				}else{
						var statusMsg="<div class='alert delete-image-status'>"+
						  "<button type='button' class='close' data-dismiss='alert'>&times;</button>"+
						  "<strong>Failure!</strong> Failed to delete image."+
						"</div>";
				}
				
					mainContainer.prepend(statusMsg);
					$(".delete-image-status").fadeOut(3000, function(){
						$(this).remove();
					})
					
			})
		}
		
		
		//On edit page load the links and buttons have no events attached....
		$(".image-link").click(function(ev){
			ev.preventDefault();
			addImageHtml(this);
		});
		
		$(".delete-image").click(function(ev){
			ev.preventDefault();
			deleteImage($(this));
		});
	
})