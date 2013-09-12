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

	// Post Add ------------------------------------------------------------------
	
	/*
	Description: Adds a post
	
	Inputs: author, title, text and category
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postAdd&author=Author&title=Title&text=Text&category=database
	*/

	elseif($_GET["action"] == "postAdd" && 
		isset($_GET["author"]) && 
		isset($_GET["title"]) && 
		isset($_GET["text"]) && 
		isset($_GET["category"])){
		
		$author = $_GET["author"];
		$title = $_GET["title"];
		$text = $_GET["text"];
		$category = explode(",",$_GET["category"]);
		
		$postAdd = postAdd($author,$title,$text,$category);
		
		$postList = postList();
		
		if(json_encode($postList) != "null"){
			$posts = array();
			
			$n = 0;
			foreach($postList as $p){
				$posts[$n] = $p;
				$n++;
			}
			echo(json_encode($posts));
			
		}else{
			echo '{"Error": "Make sure you are using all the inputs (author, title, text and category)"}';	
		}
	}
	
	// Post Comment Add ------------------------------------------------------------------
	
	/*
	Description: Adds a comment to the post selected with ID
	
	Inputs: id, author and text
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postCommentAdd&id=12345&author=Author&text=Comment
	*/
	
	elseif($_GET["action"] == "postCommentAdd" && 
		isset($_GET["id"]) && 
		isset($_GET["author"]) && 
		isset($_GET["text"])){
				
		$id = (int)$_GET["id"];
		$author = $_GET["author"];
		$text = $_GET["text"];
				
		$postAdd = postCommentAdd($id,$author,$text);
		
		$postList = postList();
		$posts = array();
		
		$n = 0;
		foreach($postList as $p){
			$posts[$n] = $p;
			$n++;
		}
		
		echo(json_encode($posts));
	}
	
	// Post Update ------------------------------------------------------------------
	
	/*
	Description: Updates the post selected with ID
	
	Inputs: id(required), author, categoory, text and title
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=postUpdate&id=12345&text=Text&category=database,vader,post&author=Darth%20Vader&title=Title
	*/
	
	elseif($_GET["action"] == "postUpdate" && 
		isset($_GET["id"]) && 
		isset($_GET["author"]) &&
		isset($_GET["category"]) &&
		isset($_GET["text"]) &&
		isset($_GET["title"])){
			
		$id = (int)$_GET["id"];
		
		$post = postInfo($id);
		
		if($post){
															
			$id = $post["_id"];
			
			$author = $post["author"];
			if(isset($_GET["author"])){
				$author = $_GET["author"];
			}
									
			$category = "";
			if(isset($_GET["category"])){
				$category = explode(",",$_GET["category"]);
			}
			
			$text = $post["text"];
			if(isset($_GET["text"])){
				$text = $_GET["text"];
			}
			
			$title = $post["title"];
			if(isset($_GET["title"])){
				$title = $_GET["title"];
			}
										
			if($post["author"] != $author ||
				$post["category"] != $category ||
				$post["text"] != $text ||
				$post["title"] != $title){
												
				$postUpdate = postUpdate($id,$author,$category,$text,$title);
				
			}
			
			$postList = postList();
			$posts = array();
		
			$n = 0;
			foreach($postList as $p){
				$posts[$n] = $p;
				$n++;
			}
			
			echo(json_encode($posts));
		}
	}
	
	// Category List ------------------------------------------------------------------
	
	/*
	Description: Shows all the categories posted
	
	Inputs: none
	
	URL: 
	http://localhost:8080/adb/api/api.php?action=categoryList
	*/

	elseif($_GET["action"] == "categoryList"){
		$postList = postList();
		
		$posts = array();
		$categories = array();
		
		$n = 0;
		foreach($postList as $p){
			$posts[$n] = $p["category"];
			$result = call_user_func_array("array_merge", $posts);
			$n++;
		}
		
		$categoryList = array_unique($result);
		
		echo(json_encode($categoryList));
		
	}else{
		
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