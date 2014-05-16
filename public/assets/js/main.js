(function(){

	var postBox = 			$(".postBox"),
		addCarBtn = 		$(".addCarBtn"),
		hideCarFormBtn = 	$(".hideCarFormBtn"),
		addedCarForm = 		$(".addedCarForm"),
		addCarForm = 		$(".addCarForm"),
		selectCar = 		$(".selectCar"),
		selectedCar = 		"NULL",
		likeBtn =			$(".likeBtn"),
		flagBtn =			$(".flagBtn"),
		followBtn =			$(".followBtn"),
		deleteBtn =			$(".deleteBtn"),
		bioArrow =			$(".bio img"),
		nameArrow = 		$(".names img"),
		carInputs =         $(".carInputs input"),
		feed =              $(".feed");

	deleteBtn.click(function(){
		if (confirm('Are you sure you want to delete this article?')) {
		}
		else
		{
		    return false;
		}
	})

	addCarBtn.click(function(){
		addedCarForm.css("display","none");
		addCarForm.css("display","block");
		selectedCar = selectCar.val();
		selectCar.val("NULL");
		postBox.css("height",865)
	});

	hideCarFormBtn.click(function(){
		addedCarForm.css("display","block");
		addCarForm.css("display","none");
		selectCar.val(selectedCar);
		postBox.css("height",680)
	});

	likeBtn.click(function(){

		var likeNum = $(".likes"),
			user_id = $(".user_id"),
			article_id = $(".article_id"),
			total_likes = 0;

		if(!user_id.html()){
			var container = $(".container");
			container.prepend("<div class='flash-info'>You must be logged in to like an article</div>");

			return;
		};

		if(likeBtn.hasClass("liked")){

			total_likes = parseInt(likeNum.html());

			lib.ajax({
				url: "../../assets/xhr/api.php",
				type: "post",
				data: {
					action: "dislike",
					user_id: user_id.html(),
					article_id: article_id.html(),
					total_likes: total_likes - 1
				},
				success: function(result){
					// console.log(result);

					likeNum.html(parseInt(likeNum.html()) - 1);
					likeBtn.html("Like");
					likeBtn.removeClass("liked");
				},
				error: function(result){
					// console.log("There was an error!");
				}
			})

		}else{

			total_likes = parseInt(likeNum.html());

			lib.ajax({
				url: "../../assets/xhr/api.php",
				type: "post",
				data: {
					action: "like",
					user_id: user_id.html(),
					article_id: article_id.html(),
					total_likes: total_likes + 1
				},
				success: function(result){
					// console.log(result);

					likeNum.html(parseInt(likeNum.html()) + 1);
					likeBtn.html("Liked");
					likeBtn.addClass("liked");
				},
				error: function(result){
					// console.log("There was an error!");
				}
			})
		}
	})

	flagBtn.click(function(){

		var flagNum = $(".flags"),
			user_id = $(".user_id"),
			article_id = $(".article_id"),
			total_flags = 0;

		if(!user_id.html()){
			var container = $(".container");
			container.prepend("<div class='flash-info'>You must be logged in to flag an article</div>");

			return;
		};

		if(flagBtn.hasClass("flagged")){

			total_flags = parseInt(flagNum.html());

			lib.ajax({
				url: "../../assets/xhr/api.php",
				type: "post",
				data: {
					action: "unflag",
					user_id: user_id.html(),
					article_id: article_id.html(),
					total_flags: total_flags - 1
				},
				success: function(result){
					// console.log(result);

					flagNum.html(parseInt(flagNum.html()) - 1);
					flagBtn.html("Flag");
					flagBtn.removeClass("flagged");
				},
				error: function(result){
					// console.log("There was an error!");
				}
			})

		}else{

			total_flags = parseInt(flagNum.html());

			lib.ajax({
				url: "../../assets/xhr/api.php",
				type: "post",
				data: {
					action: "flag",
					user_id: user_id.html(),
					article_id: article_id.html(),
					total_flags: total_flags + 1
				},
				success: function(result){
					// console.log(result);

					flagNum.html(parseInt(flagNum.html()) + 1);
					flagBtn.html("Flagged");
					flagBtn.addClass("flagged");
				},
				error: function(result){
					// console.log("There was an error!");
				}
			})
		}
	})

	followBtn.click(function(){

		var user_id = $(".user_id").html(),
			btn = $(this),
			follow_id = $(this).next().html(),
			url = "assets/xhr/api.php";

		if($(".userIdList").length != 0)
		{
			url = "../assets/xhr/api.php";								
		}

		if(btn.hasClass("following")){

			lib.ajax({
				url: url,
				type: "post",
				data: {
					action: "unfollow",
					user_id: user_id,
					follow_id: follow_id
				},
				success: function(result){
					// console.log(result);

					btn.removeClass("following");
					btn.html("Follow");
				},
				error: function(result){
					// console.log("There was an error!", result);
				}
			})

		}else{

			lib.ajax({
				url: url,
				type: "post",
				data: {
					action: "follow",
					user_id: parseInt(user_id),
					follow_id: parseInt(follow_id)
				},
				success: function(result){
					// console.log(result);

					btn.addClass("following");
					btn.html("Following");
				},
				error: function(result){
					// console.log("There was an error!", result);
				}
			})
		}
	})

	nameArrow.click(function(){
		var carDropdown = $(".carDropdown");

		if(carDropdown.css("display") == "block")
		{
			nameArrow.animate({
				opacity: 0,
			}, 100, function(){
				nameArrow.attr("src", "http://carsignite.dev/public/assets/img/icons/down.png");
				nameArrow.animate({
					opacity: 1,
				},100)
			})
			
			carDropdown.animate({
				opacity: 0,
				display: "none"
			}, 200, function(){
				carDropdown.css("display", "none");
			})
		}
		else
		{
			nameArrow.animate({
				opacity: 0,
			}, 100, function(){
				nameArrow.attr("src", "http://carsignite.dev/public/assets/img/icons/up.png");
				nameArrow.animate({
					opacity: 1,
				},100)
			})

			carDropdown.css("display", "block");

			carDropdown.animate({
				opacity: 1,
				display: "block"
			},200)
		};

	})

	var filter = function(make, model, year){
		lib.ajax({
			url: "../assets/xhr/api.php",
			type: "get",
			data: {
				action: "filter",
				make: make,
				model: model,
				year: year
			},
			success: function(result){
				// console.log(result);
				var article = "";

				for(var i=0, max=result.length; i<max; i++){
					article += "<div class='post'>"+
								"<a href=\"<?= Uri::create($article->user->username.'/article/'.$article->id) ?>\">"+
									"<div class=\"postImgMask\">"+
										"<?= Asset::img(\"post_images/\".$article->images, array('class' => 'articleImg')) ?>"+
									"</div>"+
								"</a>"+
								"<div class=\"content\">"+
									"<div class=\"likeNum\">"+
										"<?= Html::anchor($article->user->username.'/car/'.$article->car->make().\"/\".$article->car->model().\"/\".$article->car->year, $article->car->make() . \" \" . $article->car->model(), array('class'=>'postCar')) ?>"+
										"<?= Asset::img('icons/tick.png') ?><p><?= $article->likes ?></p>"+
									"</div>"+
									"<h2><?= $article->title ?></h2>"+
									"<p class=\"timestamp\"><?= date(\"F j, g:i a\", $article->created_at) ?></p>"+
									"<p><?= $article->content_short() ?></p>"+
									"<div class=\"postUserInfo\">"+
										"<div class=\"postAvatarMask\">"+
											"<?= Html::anchor($article->user->profile_url(), Asset::img($article->user->avatar_url(), array('class' => 'postAvatar'))) ?>"+
										"</div>"+
										"<?= Html::anchor($article->user->profile_url(), $article->user->username, array('class'=>'postUser')) ?>"+
									"</div>"+
								"</div>"+
							"</div>"+
							"<?php }}else if(!$user){;?>"+
							"<h2>In here you'll see articles from the users you follow. Check out for cars you like and follow it's owner!</h2></br>"+
							"<div class=\"poster\">"+
								"<?= Asset::img('poster.jpg'); ?>"+
							"</div></br>";

					feed.innerHTML = article;
				}
			},
			error: function(result){
				// console.log("There was an error!", result);
			}
		})
	}

	carInputs.change(function(){
		var make = $(".filterMake")[0].value,
			model = $(".filterModel")[0].value,
			year = $(".filterYear")[0].value;

		filter(make, model, year);
	})

	// Validation ---------------------------------------------------------------------------------------------

	var submit = $("input.submit"),
		container = $(".container");

	submit.click(function(e){

		if($('.flash-error')){
			$('.flash-error').remove();
		};

		if($("input.password_repeat").html() != undefined){

			var username = $("input.username").val(),
				email = $("input.email").val(),
				password = $("input.password").val(),
				password_repeat = $("input.password_repeat").val();

			if(username == "" ||
				email == "" ||
				password == "" ||
				password_repeat == ""){

				container.prepend("<div class='flash-error'><p>All inputs are required</p></div>");
				e.preventDefault();
			}else{
				var username_regex = /^[a-zA-Z0-9][a-zA-Z0-9_]{5,29}$/,
					email_regex = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/igm;

				if(!username_regex.test(username)){
					container.prepend("<div class='flash-error'><p>Username must be at least 6 characters long and not contain any special character other than the underscore</p></div>");
					e.preventDefault();
				}

				if(!email_regex.test(email)){
					container.prepend("<div class='flash-error'><p>Please enter a valid email</p></div>");
					e.preventDefault();
				}

				if(password.length < 7){
					container.prepend("<div class='flash-error'><p>Password must be at least 7 characters long</p></div>");
					e.preventDefault();
				}

				if(password != password_repeat){
					container.prepend("<div class='flash-error'><p>Password did not match</p></div>");
					e.preventDefault();
				}
			}
		}else if($("input.avatar_file").html() != undefined){

			if($("input.avatar_file")[0].files[0] != undefined && $("input.avatar_file")[0].files[0].size > 5242880){
				container.prepend("<div class='flash-error'><p>Avatar file has to be less than 5Mb</p></div>");
				console.log($("input.avatar_file")[0].files[0]);
				e.preventDefault();
			}

			if($("input.poster_file")[0].files[0] != undefined && $("input.poster_file")[0].files[0].size > 5242880*2){
				container.prepend("<div class='flash-error'><p>Poster file has to be less than 10Mb</p></div>");
				e.preventDefault();
			}

		}else if($("input.file").html() != undefined){
			
			var car = $("select.selectCar").val(),
				make = $("input.make").val(),
				model = $("input.model").val(),
				trim = $("input.trim").val(),
				year = $("input.year").val(),
				title = $("input.title").val(),
				story = $("input.content").val(),
				image = $("input.file").val();

			if(addedCarForm.css("display") == "block"){

				if(car == "NULL"){
					container.prepend("<div class='flash-error'><p>You must select a car or add a car</p></div>");
					e.preventDefault();
				}

			}else if(addCarForm.css("display") == "block"){

				if(make == "" ||
					model == "" ||
					year == ""){
					container.prepend("<div class='flash-error'><p>Make, Model and Year are required</p></div>");
					e.preventDefault();
				}
			}

			if(title == "" ||
				story == ""){
				container.prepend("<div class='flash-error'><p>The Title and Story are required</p></div>");
				e.preventDefault();
			}

			if($("input.file")[0].files[0] != undefined && $("input.file")[0].files[0].size > 5242880*2){
				container.prepend("<div class='flash-error'><p>Image file has to be less than 10Mb</p></div>");
				e.preventDefault();
			}else if(image == ""){
				container.prepend("<div class='flash-error'><p>Image file is required</p></div>");
				e.preventDefault();
			}
		}
	});
})();