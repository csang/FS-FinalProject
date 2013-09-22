(function(){

	var postBox = 			$(".postBox"),
		addCarBtn = 		$(".addCarBtn"),
		hideCarFormBtn = 	$(".hideCarFormBtn"),
		addedCarForm = 		$(".addedCarForm"),
		addCarForm = 		$(".addCarForm"),
		selectCar = 		$(".selectCar"),
		selectedCar = 		"NULL",
		likeBtn =			$(".likeBtn"),
		followBtn =			$(".followBtn"),
		deleteBtn =			$(".deleteBtn"),
		bioArrow =			$(".bio img"),
		nameArrow = 		$(".names img");

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
					console.log(result);

					likeNum.html(parseInt(likeNum.html()) - 1);
					likeBtn.html("Like");
					likeBtn.removeClass("liked");
				},
				error: function(result){
					console.log("There was an error!");
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
					console.log(result);

					likeNum.html(parseInt(likeNum.html()) + 1);
					likeBtn.html("Liked");
					likeBtn.addClass("liked");
				},
				error: function(result){
					console.log("There was an error!");
				}
			})
		}
	})

	followBtn.click(function(){

		var user_id = $(".user_id").html(),
			follow_id = $(".follow_id").html();

		if(followBtn.hasClass("following")){

			lib.ajax({
				url: "assets/xhr/api.php",
				type: "post",
				data: {
					action: "unfollow",
					user_id: user_id,
					follow_id: follow_id
				},
				success: function(result){
					console.log(result);

					followBtn.removeClass("following");
					followBtn.html("Follow");
				},
				error: function(result){
					console.log("There was an error!", result);
				}
			})

		}else{

			lib.ajax({
				url: "assets/xhr/api.php",
				type: "post",
				data: {
					action: "follow",
					user_id: parseInt(user_id),
					follow_id: parseInt(follow_id)
				},
				success: function(result){
					console.log(result);

					followBtn.addClass("following");
					followBtn.html("Following");
				},
				error: function(result){
					console.log("There was an error!", result);
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
})()