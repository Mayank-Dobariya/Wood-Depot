<?php
//submit_rating.php


$connect = new PDO("mysql:host=localhost;dbname=ruper", "root", "");


if(isset($_POST["rating_data"]))
{

	$data = array(
        ':user_id'           =>  $_POST["user_id"],
        ':prod_name'        =>  $_POST["prod_name"],
		':user_name'		=>	$_POST["user_name"],
		':user_rating'		=>	$_POST["rating_data"],
		':user_review'		=>	$_POST["user_review"],
	
	);

	$query = "
		INSERT INTO tbl_feedback 
		(user_id, name, product_id, rating, review, datetime) 
		VALUES (:user_id, :user_name, :prod_name, :user_rating, :user_review, now())
	";   

	// try {
	// 	$statement = $conn->prepare($query);
	// 	$statement->execute($data);
	// 	echo "Your Review & Rating Successfully Submitted";
	// } catch (PDOException $e) {
	// 	echo "An error occurred while submitting your review and rating: " . $e->getMessage();
	// }
	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";
} 



if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$query = "
	SELECT * FROM tbl_feedback
	ORDER BY feedback_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);

	foreach($result as $row)
	{
		$review_content[] = array(
			// 'product_id'	=>  $row["product_id"],
			'user_name'		=>	$row["name"],
			'user_review'	=>	$row["review"],
			'rating'		=>	$row["rating"],
			'datetime'		=>	date('l jS, F Y h:i:s A', $row["datetime"])
		);

		if($row["rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
