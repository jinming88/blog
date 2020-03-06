var result_array = Array();

$(document).ready(function(){

	$("#company_group").on("change",function(){
		$("#result_company").val($("#company_group").val());
	})

    $("#upload_company_image").on("change",function(){
    	var fd = new FormData(document.getElementById('upload_form'));
	    var id = $("#company_group").val();

	    fd.append("id",id);
	    $.ajax({
	        url:'builder_controller/upload_company_image',
	        type:'post',
	        data : fd,
	        contentType : false,
	        processData : false,

	        dataType: 'json',
	        success:function(res){
	        	var image_id = $("#hidden_current_image_id").val();
	        	image_id = parseInt(image_id);

		    	var html = "<div class='col-md-2' style = 'padding:10px'>"+
		    					"<a href='#' onclick='show_image("+image_id+")'>"+
							    	"<img id = 'image_list"+image_id+"' src='"+res[0]['path']+"' style = 'width: 100%' />"+
							    	"<input type='hidden' id = 'hidden_image_id"+image_id+"' value = '"+res[0]['id']+"'>"+
						    "</a>"+
					  	"</div>";

				$("#company_image_list")[0].innerHTML += html;
	        	image_id=image_id+1;
	        	$("#hidden_current_image_id").val(image_id);
	        }
	    });
    })

    $("#choose_random_image").on("click",function(){
    	var image_id = $("#hidden_current_image_id").val();
    	image_id = parseInt(image_id);
    	var id = Math.floor(Math.random() * (image_id - 0) );
    	$("#result_image").val($("#hidden_image_id"+id).val());
    });

    $("#choose_new").on("click",function(){
    	$("#existing_image_div").css("display","block");
    	$("#new_message_div").css("display","none");
    })

    $("#insert_new_message").on("click",function(){
    	$("#existing_image_div").css("display","none");
    	$("#new_message_div").css("display","block");
    })

    $("#choose_random_message").on("click",function(){

    	$("#existing_image_div").css("display","none");
    	$("#new_message_div").css("display","none");
    })

    $("#company_message").on("change",function(){
    	var message = $("#company_message option:selected").text();
    	$("#result_message").val(message);
    });

    $("#choose_random_message").on("click",function(){
    	var id = $("#company_message_value").val();
    	id = parseInt(id);
    	var id = Math.floor(Math.random() * (id - 0));
    	var message = $("#hidden_company_message"+id).val();
    	$("#result_message").val(message);
    })

    $("#check_exist_link").on("click",function(){
    	$("#existing_link_div").css("display","block");
    	$("#insert_link_div").css("display","none");
    })

    $("#check_new_link").on("click",function(){
    	$("#existing_link_div").css("display","none");
    	$("#insert_link_div").css("display","block");
    })

    $("#check_default_link").on("click",function(){
    	$("#existing_link_div").css("display","none");
    	$("#insert_link_div").css("display","none");
    })

    $("#check_random_link").on("click",function(){
    	$("#existing_link_div").css("display","none");
    	$("#insert_link_div").css("display","none");
    })

    $("#company_link").on("change",function(){
    	var id = $("#company_link").val();
    	$.ajax({
			url : "builder_controller/get_link_by_id",
			type : "POST",
			data : {
				id : id,
			},
			dataType : "JSON",
			success : function(res)
			{
				$("#result_nick").val(res[0]['link']);
				$("#result_nick_link").val(res[0]['nick']);
			}
		})
    	$("#result_link").val(id);
    })

    $("#check_random_link").on("click",function(){
    	var id = $("#link_count").val();
    	id = parseInt(id);
    	var id = Math.floor(Math.random() * (id - 0));
    	var link = $("#hidden_link"+id).val();
    	$("#result_link").val(link);
    })

    $("#choose_addon").on("click",function(){
    	$("#existing_addon_div").css("display","block");
    	$("#new_addon_div").css("display","none");
    })
    $("#insert_new_addon").on("click",function(){
    	$("#existing_addon_div").css("display","none");
    	$("#new_addon_div").css("display","block");
    })
    $("#choose_random_addon").on("click",function(){
    	$("#existing_addon_div").css("display","none");
    	$("#new_addon_div").css("display","none");
    })
    $("#addon_message").on("click",function(){
    	$("#result_addon").val($("#addon_message").val());
    })

    $("#choose_random_addon").on("click",function(){
    	var id = $("#hidden_addon").val();
    	id = parseInt(id);
    	var id = Math.floor(Math.random() * (id - 0));
    	var addon = $("#hidden_addon_message"+id).val();
    	$("#result_addon").val(addon);
    })

    $("#check_exist_hash").on("click",function(){
    	$("#existing_hash_div").css("display","block");
    	$("#insert_hash_div").css("display","none");
    })

    $("#check_new_hash").on("click",function(){
    	$("#existing_hash_div").css("display","none");
    	$("#insert_hash_div").css("display","block");
    })

    $("#check_random_hash").on("click",function(){
    	$("#existing_hash_div").css("display","none");
    	$("#insert_hash_div").css("display","none");
    })


    $("#company_hash").on("change",function(){
    	var id = $("#company_hash").val();
    	$("#result_hash").val(id);
    })

    $("#check_random_hash").on("click",function(){
    	var id = $("#hash_count").val();
    	id = parseInt(id);
    	var id = Math.floor(Math.random() * (id - 0));
    	var link = $("#hidden_hash"+id).val();
    	$("#result_hash").val(link);
    })



    $("#save_post").on("click",function(){
    	$("#save_post").attr("disabled", true);

    	var company = $("#result_company").val();
    	var image = $("#result_image").val();
    	var message = "";
    	var link;
    	var nick;
    	var hash = $("#result_hash").val();
    	var addon_message;


    	if($("#insert_new_message").prop("checked") == true)
    	{
    		if($("#save_message").prop("checked") == true)
    		{
    			$.ajax({
    				url : "builder_controller/save_new_message",
    				type : "post",
    				data : {
    					id : $("#result_company").val(),
    					message : $("#new_message_area").val(),
    				},
    				dataType : "JSON",
    				success : function(res)
    				{
    					$("#result_message").val($("#new_message_area").val());
    					message = $("#result_message").val();

    				}
    			})
    		}else{
    			message = $("#new_message_area").val();
    		}
    	}else{
    		message = $("#result_message").val();
    	}

    	//insert hash

    	if($("#check_new_hash").prop("checked") == true)
    	{
    		if($("#save_hash").prop("checked") == true)
    		{
    			$.ajax({
    				url : "builder_controller/save_new_hash",
    				type : "post",
    				data : {
    					id : $("#result_company").val(),
    					hash : $("#new_hash").val(),
    				},
    				dataType : "JSON",
    				success : function(res)
    				{
    					$("#result_hash").val($("#new_hash").val());
    					hash = $("#result_hash").val();

    				}
    			})
    		}else{
    			hash = $("#result_hash").val();
    		}
    	}else{
    		hash = $("#result_hash").val();
    	}


    	//insert addon
    	if($("#insert_new_addon").prop("checked") == true)
    	{
    		if($("#save_addon").prop("checked") == true)
    		{
    			$.ajax({
    				url : "builder_controller/save_new_addon",
    				type : "post",
    				data : {
    					id : $("#result_company").val(),
    					message : $("#new_addon").val(),
    				},
    				dataType : "JSON",
    				success : function(res)
    				{
    					$("#result_addon").val($("#new_addon").val());
    					addon_message = $("#result_addon").val();

    				}
    			})
    		}else{
    			addon_message = $("#new_addon").val();
    		}
    	}else{
    		addon_message = $("#result_addon").val();
    	}

    	
    	if($("#check_new_link").prop("checked") == true)
    	{
    		if($("#save_link").prop("checked") == true)
    		{
    			var new_nick = $("#new_nickname").val();
    			var new_link = $("#new_link").val();
    			$.ajax({
    				url : "builder_controller/save_new_link",
    				type : "POST",
    				data : {
    					id : $("#result_company").val(),
    					new_nick : new_nick,
    					new_link : new_link,
    				},
    				dataType : "JSON",
    				success : function(res)
    				{
    					link = $("#new_link").val();
    					nick = $("#new_nickname").val();
    				}
    			})
    		}else{
    			link = $("#new_link").val();
				nick = $("#new_nickname").val();
    		}
    	}else{
    		link = $("#result_nick_link").val();
    		nick = $("#result_nick").val();
    	}

    	setTimeout(function(){
		  	console.log(company);
			console.log(image);
			console.log(message);
			console.log(link);
			console.log(nick);
			console.log(addon_message);
			console.log(hash);

			$.ajax({
				url : "builder_controller/save_post",
				type : "POST",
				data : {
					company : company,
					image : image,
					message : message,
					link : link,
					nick : nick,
					addon_message : addon_message,
					hash : hash,
				},
				dataType : "JSON",
				success : function(res)
				{
					$.toast({
					    heading:'Success',
					    text:'New post has been saved!',
					    icon:'success',
					    loader: true,
					    loaderBg: '#fff',
					    showHideTransition: 'fade',
					    hideAfter: 3000,
					    allowToastClose: false,
					    position : 'top-right'
			  		})
				}
			})
		}, 2000);
    	
    })

})

function show_image(id)
{
	$("#result_image").val($("#hidden_image_id"+id).val());
	var image = $("#image_list"+id).attr("src");
	$("#square").attr("src",image);
	$(".close").click();
}
