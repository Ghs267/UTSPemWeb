<?php
include "../model/database.php";

$output = '';

if(isset($_POST["query"]))
{
	$search = htmlspecialchars($_POST["query"]);
	$query = "
	SELECT * FROM account 
	WHERE username LIKE '%".$search."%'
	OR first_name LIKE '%".$search."%' 
	OR last_name LIKE '%".$search."%' 
	";

	$result = $db->query($query);
	if($result->rowCount() > 0)
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th></th>
							</tr>';
		while($row = $result->fetch())
		{
			$output .= '
				<tr>
					<td><img src="../model/img/'.$row[7].'" style="max-width:2em;max-height:2em;"><p><a href="../view/profile.php?username='.$row[3].'">'.$row[3].'</a></p></td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'Data Not Found';
	}
}

?>