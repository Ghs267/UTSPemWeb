<?php
$connect = mysqli_connect("localhost", "root", "", "ushop");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM item 
	WHERE item_id LIKE '%".$search."%'
	OR item_name LIKE '%".$search."%' 
	OR item_stock LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM item ORDER BY item_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Stok id</th>
							<th>name</th>
							<th>stock</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["item_id"].'</td>
				<td>'.$row["item_name"].'</td>
				<td>'.$row["item_stock"].'</td>

			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>