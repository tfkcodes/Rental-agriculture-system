<?php
    include 'include/session.php';

	if(isset($_POST['delete'])){
		$request_id =$_POST['request_id'];
		$now=date('y-m-d');
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM request WHERE request_id =:request_id");
			 $stmt->execute(['request_id'=>$request_id]);

			$_SESSION['success'] = 'Request deleted successfully...!';

			$action="Delete request";
			$user_id=$_SESSION['farmer'];
			$stmt=$conn->prepare("INSERT INTO system_logs (user_id,action1,date) VALUES (:user_id,:action1,:date)");
			$stmt->bindParam(':action1',$action);
			$stmt->bindParam(':user_id',$user_id);
			$stmt->bindParam(':date',$now);
			$stmt->execute();
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select request to delete first';
	}

	header('location: request.php');
	
?>