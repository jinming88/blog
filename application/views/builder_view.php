<!DOCTYPE html>
<html>
	<head>
		<title>Blog Post</title>
	</head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css">

	<link rel="stylesheet" type="text/css" href="assets/frontend/css/post.css">
	<style>
		.square {
		    width: 100%;
		    padding-bottom: 100%;
		    background-size: cover;
		    background-position: center;
		}
		.alert {
		    position: relative;
		    padding: 0rem !important; 
		    margin-bottom: 1rem;
		    border: 1px solid transparent;
		    border-radius: .25rem;
		}
	</style>

	<body>

		<div class="container" style="margin-top: 5%">


			<div class="row">

				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						1. Choose Company
					</div>
				</div>

				<div class="col-md-12">
				  	<div class="input-group mb-3">
					  	<div class="input-group-prepend">
					    	<label class="input-group-text" for="inputGroupSelect01">Choose Company</label>
					  	</div>
					  	<select class="custom-select" id="company_group">
						    <?php foreach($company as $com){?><option value="<?= $com['id']?>"><?=$com['name']?></option> <?php }?>
					  	</select>
					</div>

				</div>
			</div>

			<div class="row">

				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						2. Choose Image
					</div>
				</div>

				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<button type="button" style = "width: 100%;margin-bottom: 1rem !important" id = "choose_company_image" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalLong">Choose Image</button>
						</div>
					</div>
					
				</div>
			
				<div class="col-md-2"></div>
				<div class="col-md-4">
					<img id = "square" src="" style="width: 100%">
				</div>

			</div>

			<div class="row">

				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						3. Insert Message
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="message_radio" id="choose_new" value="" checked>
					  	<label class="form-check-label" for="choose_new">
					    	Choose existing message
					  	</label>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="message_radio" id="insert_new_message" value="" >
					  	<label class="form-check-label" for="choose_new">
					    	Insert new message
					  	</label>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="message_radio" id="choose_random_message" value="" >
					  	<label class="form-check-label" for="choose_new">
					    	randomly message
					  	</label>
					</div>
				</div>


				<div class="col-md-12" id = "existing_image_div" style="margin-top: 1rem">
					<div class="input-group mb-3">
					  	<div class="input-group-prepend">
					    	<label class="input-group-text" for="inputGroupSelect01">Choose existing message</label>
					  	</div>
					  	<select class="custom-select" id="company_message">
						<?php foreach($message as $mes => $value){?>
							<option value=""><?=$value['message']?></option>
						<?php }?>
					  	</select>

						<?php foreach($message as $mes => $value){?>
							<input type="hidden" id = "hidden_company_message<?=$mes?>" value = "<?=$value['message']?>"> 
						<?php }?>
						<input type="hidden" id = "company_message_value" value = "<?=count($message)?>">
					</div>
				</div>

				<div class="col-md-12" id = "new_message_div" style="display: none;margin-top: 1rem">
					<div class="row">
						<div class="col-md-12">
							<div class="form-check">
							  	<input class="form-check-input" type="checkbox" value="" id="save_message">
							  	<label class="form-check-label" for="defaultCheck1">
							    	Do you want to save a message as a default?
							  	</label>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
							    <textarea class="form-control" id="new_message_area" rows="3"></textarea>
							</div>
						</div>
					</div>
					
				</div>
			</div>


			<div class="row">

				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						4. Insert Link
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="link_radio" id="check_exist_link" value="" checked>
					  	<label class="form-check-label" for="check_exist_link">
					    	Choose existing link
					  	</label>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="link_radio" id="check_new_link" value="">
					  	<label class="form-check-label" for="check_new_link">
					    	Insert a new link
					  	</label>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="link_radio" id="check_default_link" value="">
					  	<label class="form-check-label" for="check_default_link">
					    	Choose default link
					  	</label>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="link_radio" id="check_random_link" value="">
					  	<label class="form-check-label" for="check_random_link">
					    	Random link
					  	</label>
					</div>
				</div>



				<div class="col-md-12" style="margin-top: 1rem">
					<div class="row" id = "existing_link_div">
						<div class = "col-md-12">
							<div class="input-group mb-3">
							  	<div class="input-group-prepend">
							    	<label class="input-group-text" for="inputGroupSelect01">Choose a link</label>
							  	</div>
							  	<select class="custom-select" id="company_link">
								    <?php foreach($link as $links => $key){?><option value = <?=$key['id']?>><?=$key['nick']?></option><?php }?>
							  	</select>
							  	<input type="hidden" id = "link_count" value = "<?=count($link)?>">
							  	<?php foreach($link as $links => $key){?><input type="hidden" id = "hidden_link<?=$links?>" value = "<?=$key['id']?>"><?php }?>
							</div>
						</div>
					</div>

					<div class="row" id = "insert_link_div" style="display: none">
						<div class="col-md-12">
							<div class="form-check">
							  	<input class="form-check-input" type="checkbox" value="" id="save_link">
							  	<label class="form-check-label" for="save_link">
							    	Do you want to save a link as a default?
							  	</label>
							</div>
						</div>
						<div class = "col-md-10">
							<div class="input-group">
							  	<div class="input-group-prepend">
							    	<span class="input-group-text" id="">Insert a link</span>
							  	</div>
							  	<input type="text" class="form-control" id = "new_nickname" placeholder="Nicename">
							  	<input type="text" class="form-control" id = "new_link" placeholder="link">
							</div>
						</div>
					</div>	

					<!-- <div class="row" id = "default_link_div" style="display: none">
						<div class="col-md-12">
							<div class="input-group mb-3">
							  	<div class="input-group-prepend">
							   		<button class="btn btn-outline-secondary" type="button">Default</button>
							  	</div>
							  	<input type="text" class="form-control" disabled="true" placeholder="" aria-label="" aria-describedby="basic-addon1" value="Linkedin">
							</div>
						</div>
					</div> -->
				</div>
			</div>

			<div class="row">
			
				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						5. Insert Hashtag
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="hash_radio" id="check_exist_hash" value="" checked>
					  	<label class="form-check-label" for="check_exist_link">
					    	Choose existing hashtag
					  	</label>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="hash_radio" id="check_new_hash" value="">
					  	<label class="form-check-label" for="check_new_link">
					    	Insert a new hashtag
					  	</label>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="hash_radio" id="check_random_hash" value="">
					  	<label class="form-check-label" for="check_random_link">
					    	Random hashtag
					  	</label>
					</div>
				</div>



				<div class="col-md-12" style="margin-top: 1rem">
					<div class="row" id = "existing_hash_div">
						<div class = "col-md-12">
							<div class="input-group mb-3">
							  	<div class="input-group-prepend">
							    	<label class="input-group-text" for="inputGroupSelect01">Choose a hashtag</label>
							  	</div>
							  	<select class="custom-select" id="company_hash">
								    <?php foreach($hash as $hashs => $key){?><option value = <?=$key['hash']?>><?=$key['hash']?></option><?php }?>
							  	</select>
							  	<input type="hidden" id = "hash_count" value = "<?=count($hash)?>">
							  	<?php foreach($hash as $hashs => $key){?><input type="hidden" id = "hidden_hash<?=$hashs?>" value = "<?=$key['hash']?>"><?php }?>
							</div>
						</div>
					</div>

					<div class="row" id = "insert_hash_div" style="display: none">
						<div class="col-md-12">
							<div class="form-check">
							  	<input class="form-check-input" type="checkbox" value="" id="save_hash">
							  	<label class="form-check-label" for="save_link">
							    	Do you want to save a hashtag as a default?
							  	</label>
							</div>
						</div>
						<div class = "col-md-10">
							<div class="input-group">
							  	<div class="input-group-prepend">
							    	<span class="input-group-text" id="">Insert a hashtag</span>
							  	</div>
							  	<input type="text" class="form-control" id = "new_hash" placeholder="">
							</div>
						</div>
					</div>	
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-12">
					<div class="alert alert-primary" role="alert">
						6. Addon text
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="addon_radio" id="choose_addon" value="" checked>
					  	<label class="form-check-label" for="choose_new">
					    	Choose existing add-on text
					  	</label>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="addon_radio" id="insert_new_addon" value="" >
					  	<label class="form-check-label" for="choose_new">
					    	Insert new add-on text
					  	</label>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-check">
					  	<input class="form-check-input" type="radio" name="addon_radio" id="choose_random_addon" value="" >
					  	<label class="form-check-label" for="choose_new">
					    	randomly add-on text
					  	</label>
					</div>
				</div>

				<div class="col-md-12" style="margin-top: 1rem">
					<div class="row" id = "existing_addon_div">
						<div class="col-md-12">
							<div class="input-group mb-3">
							  	<div class="input-group-prepend">
							    	<label class="input-group-text" for="company_group">Choose existing add-on text</label>
							  	</div>
							  	<select class="custom-select" id="addon_message">
							  		<?php foreach($addon as $add){?><option value="<?=$add['message']?>"><?=$add['message']?></option><?php }?>
							  	</select>

							  	<?php foreach($addon as $add => $val){?><input type="hidden" id = "hidden_addon_message<?=$add?>" value="<?=$val['message']?>"><?php }?>
							</div>
						</div>
					</div>

					<input type="hidden" id = "hidden_addon" value = "<?=count($addon)?>">

					<div class="row" id = "new_addon_div" style="display: none">
						<div class="col-md-12">
							<div class="form-check">
							  	<input class="form-check-input" type="checkbox" value="" id="save_addon">
							  	<label class="form-check-label" for="defaultCheck1">
							    	Do you want to save a message as a default?
							  	</label>
							</div>
						</div>
						<div class="col-md-12">
					    	<textarea class="form-control" id="new_addon" rows="3"></textarea>
						</div>
					</div>
				</div>
			</div>


			<div class="row" style="margin-bottom: 1rem">
				<div class="col-md-12">
					<button type="button" style="float: right" class="btn btn-secondary" id = "save_post">Save post</button>
				</div>
			</div>

		</div>

	</body>

	<div class="modal" tabindex="-1" role="dialog" id = "exampleModalLong" style="">
		<div class="modal-dialog" role="document" style="width: 100%;max-width: 90%">
			<div class="modal-content">
			  	<div class="modal-header">
				    <h5 class="modal-title">Modal title</h5>
				    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				      	<span aria-hidden="true">&times;</span>
				    </button>
			  	</div>
			  	<div class="modal-body">

			  		<div class="row">
			  			<div class="col-md-8">
			  				<div class="row" id = "company_image_list">
					    		<?php for($i = 0; $i < count($image); $i++){ ?> 
					    		<div class="col-md-2" style = "padding:10px">
								    <a href="#" onclick="show_image(<?=$i?>)">
								    	<img id = "image_list<?=$i?>" src="<?=$image[$i]['path']?>" style = "width: 100%" />
								    	<input type="hidden" id = "hidden_image_id<?=$i?>" value = "<?=$image[$i]['id']?>">
								    </a>
							  	</div>
					    		<?php }?>
								<input type="hidden" id = "hidden_current_image_id" value = "<?=$i?>">
					    	</div>
			  			</div>

			  			<div class="col-md-4" style="border-left: 1px solid gray">
			  				<div class="row">
								<div class="col-md-12">
									<div class="input-group mb-3">
									  	<div class="input-group-prepend">
										    <span class="input-group-text">Upload</span>
									  	</div>
				                        
									  	<div class="custom-file">
											<form class="form-horizontal" method="post" style="" enctype="multipart/form-data" id="upload_form" name = "upload_form">
										    	<input type="file" class="custom-file-input" name="upload_company_image" id="upload_company_image" >
											    <label class="custom-file-label" for="upload_company_image">Choose file</label>
							  				</form>
									  	</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<button type="button" id = "choose_random_image" style = "width: 100%;margin-bottom: 1rem !important" class="btn btn-secondary">Choose image randomly</button>
								</div>
							</div>	
			  			</div>
			  		</div>
			    	
			  	</div>
			  	<div class="modal-footer">
				    <button type="button" class="btn btn-primary">Select</button>
			  	</div>
			</div>
		</div>
	</div>
		

	<input type="hidden" id = "result_company" value = "<?=$company[0]['id']?>">
	<input type="hidden" id = "result_image" value = "0">
	<input type="hidden" id = "result_message" value = "<?=$message[0]['message']?>">
	<input type="hidden" id = "result_link" value = "<?=$link[0]['id']?>">
	<input type="hidden" id = "result_addon" value = "<?=$addon[0]['message']?>">
	<input type="hidden" id = "result_hash" value = "<?=$hash[0]['hash']?>">

	<input type="hidden" id = "result_nick" value = "<?=$link[0]['nick']?>">
	<input type="hidden" id = "result_nick_link" value = "<?=$link[0]['link']?>">




	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/frontend/js/post.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
</html>