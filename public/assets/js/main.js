(function(){

	var postBox = 		$(".postBox"),
		addCarBtn = 		$(".addCarBtn"),
		hideCarFormBtn = 	$(".hideCarFormBtn"),
		addedCarForm = 		$(".addedCarForm"),
		addCarForm = 		$(".addCarForm"),
		selectCar = 		$(".selectCar"),
		selectedCar = 		"NULL",
		likeBtn =			$(".likeBtn"),
		liked = 			false;

	addCarBtn.click(function(){
		addedCarForm.css("display","none");
		addCarForm.css("display","block");
		selectedCar = selectCar.val();
		selectCar.val("NULL");
		postBox.css("height",845)
	});

	hideCarFormBtn.click(function(){
		addedCarForm.css("display","block");
		addCarForm.css("display","none");
		selectCar.val(selectedCar);
		postBox.css("height",670)
	});

	likeBtn.click(function(){

		if(!liked){
			var likeNum = $(".likes"),
				user_id = $(".user_id"),
				article_id = $(".article_id")
				total_likes = 0;

			likeNum.html(parseInt(likeNum.html()) + 1);

			total_likes = parseInt(likeNum.html());

			likeBtn.css({
				"color" : "#eeeeee",
				"background-color" : "#1193ff",
				"cursor" : "none"
			});

			likeBtn.html("Liked");

			liked = true;

			lib.ajax({
				url: "../../assets/xhr/api.php",
				type: "post",
				data: {
					action: "like",
					user_id: user_id.html(),
					article_id: article_id.html(),
					total_likes: total_likes
				},
				success: function(result){
					console.log(result);
				},
				error: function(result){
					console.log("There was an error!");
				}
			})
		}
	})

})()