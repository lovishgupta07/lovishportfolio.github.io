<?php
	$Name = $_POST['Name'];
	$Email = $_POST['Email'];
	$Number = $_POST['Number'];
	$Message = $_POST['Message'];
    $conn = new mysqli('localhost','root','','portfolio');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name,Email, Number, Message) values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssis",$Name,$Email, $Number, $Message);
        $execval = $stmt->execute();
		echo $execval;
		echo "Message sent successfully...";
		$stmt->close();
		$conn->close();
	}
?>