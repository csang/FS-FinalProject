<?php 
/*
Name: Carlos Sang
Description: API for carsignite
*/

// Functions ----------------------------------------------------------------------------

function like($user_id, $article_id, $total_likes){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "INSERT INTO likes (user_id,article_id)
			VALUES (:user_id,:article_id);";

	$sql2 = "UPDATE articles 
			SET likes = :total_likes
			WHERE id = :article_id;";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":article_id" => $article_id));

	$s2 = $db->prepare($sql2);
	$s2->execute(array(":total_likes" => $total_likes, ":article_id" => $article_id));
}

function dislike($user_id, $article_id, $total_likes){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "DELETE FROM likes
			WHERE user_id = :user_id AND article_id = :article_id;";

	$sql2 = "UPDATE articles 
			SET likes = :total_likes
			WHERE id = :article_id;";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":article_id" => $article_id));

	$s2 = $db->prepare($sql2);
	$s2->execute(array(":total_likes" => $total_likes, ":article_id" => $article_id));
}

function flag($user_id, $article_id, $total_flags){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "INSERT INTO flags (user_id,article_id)
			VALUES (:user_id,:article_id);";

	$sql2 = "UPDATE articles 
			SET likes = :total_flags
			WHERE id = :article_id;";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":article_id" => $article_id));

	$s2 = $db->prepare($sql2);
	$s2->execute(array(":total_flags" => $total_flags, ":article_id" => $article_id));
}

function unflag($user_id, $article_id, $total_flags){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "DELETE FROM flags
			WHERE user_id = :user_id AND article_id = :article_id;";

	$sql2 = "UPDATE articles 
			SET likes = :total_flags
			WHERE id = :article_id;";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":article_id" => $article_id));

	$s2 = $db->prepare($sql2);
	$s2->execute(array(":total_flags" => $total_flags, ":article_id" => $article_id));
}

function follow($user_id, $follow_id){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "INSERT INTO follows (follower, follow)
			VALUES (:user_id, :follow_id);";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":follow_id" => $follow_id));
}

function unfollow($user_id, $follow_id){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql = "DELETE FROM follows
			WHERE follower = :user_id AND follow = :follow_id;";
	
	$s = $db->prepare($sql);
	$s->execute(array(":user_id" => $user_id, ":follow_id" => $follow_id));
}

function filter($make, $model, $year){

	$db = new PDO("mysql:hostname=localhost;port=80;dbname=carsignite", "root", "root");
	
	$sql1 = "SELECT id FROM vehicle_makes
			WHERE name = :make;";

	$sql2 = "SELECT id FROM vehicle_models
			WHERE name = :model;";

	$sql3 = "SELECT id FROM cars
			WHERE make_id = :make_id OR model_id = :model_id OR year = :year";

	$sql4 = "SELECT * FROM articles
			WHERE car_id = :car_id;";
	
	$s1 = $db->prepare($sql1);
	$s1->execute(array(":make" => $make));
	$make_id = $s1->fetchAll();

	$s2 = $db->prepare($sql2);
	$s2->execute(array(":model" => $model));
	$model_id = $s2->fetchAll();

	$s3 = $db->prepare($sql3);
	$s3->execute(array(":make_id" => $make_id[0]["id"], ":model_id" => $model_id[0]["id"], ":year" => $year));
	$car_id = $s3->fetchAll();

	$sql_results = array();
	$s4 = $db->prepare($sql4);
	foreach($car_id as $car){
		
		$s4->execute(array(":car_id" => $car["id"]));
		
		array_push($sql_results, $s4->fetchAll());
	}
	
	return $sql_results;
}

if(isset($_GET["action"])){
	
// Actions ----------------------------------------------------------------------------

	// Like action ------------------------------------------------------------------
	
	/*
	Description: Like an article
	
	Inputs: none
	
	URL: 
	http://carsignite.com/public/username/article/id
	*/

	if($_GET["action"] == "like"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$article_id = 0;
		if(isset($_GET["article_id"])){
			$article_id = $_GET["article_id"];
		}

		$total_likes = 0;
		if(isset($_GET["total_likes"])){
			$total_likes = $_GET["total_likes"];
		}

		$like = like($user_id, $article_id, $total_likes);
		
		echo(json_encode($like));
	}
	
	// Dislike action ------------------------------------------------------------------

	/*
	Description: Dislikes an article
	
	Inputs: none
	
	URL: 
	http://carsignite.com/public/username/article/id
	*/
	

	elseif($_GET["action"] == "dislike"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$article_id = 0;
		if(isset($_GET["article_id"])){
			$article_id = $_GET["article_id"];
		}

		$total_likes = 0;
		if(isset($_GET["total_likes"])){
			$total_likes = $_GET["total_likes"];
		}

		$dislike = dislike($user_id, $article_id, $total_likes);
		
		echo(json_encode($dislike));
	}

	elseif($_GET["action"] == "flag"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$article_id = 0;
		if(isset($_GET["article_id"])){
			$article_id = $_GET["article_id"];
		}

		$total_flags = 0;
		if(isset($_GET["total_flags"])){
			$total_flags = $_GET["total_flags"];
		}

		$flag = flag($user_id, $article_id, $total_flags);
		
		echo(json_encode($flag));
	}

	elseif($_GET["action"] == "unflag"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$article_id = 0;
		if(isset($_GET["article_id"])){
			$article_id = $_GET["article_id"];
		}

		$total_flags = 0;
		if(isset($_GET["total_flags"])){
			$total_flags = $_GET["total_flags"];
		}

		$unflag = unflag($user_id, $article_id, $total_flags);
		
		echo(json_encode($unflag));
	}

	// Post Add ------------------------------------------------------------------
	
	/*
	Description: Adds a post
	
	Inputs: author, title, text and category
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postAdd&author=Author&title=Title&text=Text&category=database
	*/

	elseif($_GET["action"] == "follow"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$follow_id = 0;
		if(isset($_GET["follow_id"])){
			$follow_id = $_GET["follow_id"];
		}

		$follow = follow($user_id, $follow_id);
		
		echo(json_encode($follow));
	}
	
	// Post Comment Add ------------------------------------------------------------------
	
	/*
	Description: Adds a comment to the post selected with ID
	
	Inputs: id, author and text
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postCommentAdd&id=12345&author=Author&text=Comment
	*/
	
	elseif($_GET["action"] == "unfollow"){

		$user_id = 0;
		if(isset($_GET["user_id"])){
			$user_id = $_GET["user_id"];
		}

		$follow_id = 0;
		if(isset($_GET["follow_id"])){
			$follow_id = $_GET["follow_id"];
		}

		$unfollow = unfollow($user_id, $follow_id);
		
		echo(json_encode($unfollow));
	}

	elseif($_GET["action"] == "filter"){

		$make = "";
		if(isset($_GET["make"])){
			$make = $_GET["make"];
		}

		$model = "";
		if(isset($_GET["model"])){
			$model = $_GET["model"];
		}

		$year = 0;
		if(isset($_GET["year"])){
			$year = $_GET["year"];
		}

		$filter = filter($make, $model, $year);
		
		echo(json_encode($filter));
	}
	
	else{
		
	// Error Messages ----------------------------------------------------------------------
		
		echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action", 
				"postInfo": ["id"],
				"postAdd": ["author","title","text","category"],
				"postCommentAdd": ["id","author","text"],
				"postUpdate": ["id","author","title","text","category","wrong"]}';
	}
	
}else{
	
	echo '{"Error": "Please make sure to type the action correctly and to use all the required inputs for every action", 
			"postInfo": ["id"],
			"postAdd": ["author","title","text","category"],
			"postCommentAdd": ["id","author","text"],
			"postUpdate": ["id","author","title","text","category","wrong"]}';
}
?>