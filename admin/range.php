  <?php
  include 'Connection.php';
  include 'header.php';
?>

<?php
// Include config file
require_once 'Connection.php';
 

//$conn = mysqli_connect("localhost", "root", "", "tut");
//$query = "SELECT * FROM users ORDER BY uno desc";
//$sql = mysqli_query($conn, $query);
?>
<?php
// Range.php
if(isset($_POST["user"],$_POST["From"], $_POST["to"]))
{
	//$conn = mysqli_connect("localhost", "root", "", "tut");
	$result = '';
	$query = "SELECT * FROM entry WHERE (tdate BETWEEN '".$_POST["From"]."' AND '".$_POST["to"]."') ";
	$sql = mysqli_query($conn, $query);
	$result .='
	<table class="table table-bordered">
	<tr>
	<th width="10%">id</th>
	<th width="35%">to/from</th>
	<th width="40%">date</th>
	<th width="10%">weight</th>
	<th width="5%">touch</th>
	<th width="10%">count</th>
	<th width="35%">mc</th>
	<th width="40%">totel mc</th>
	<th width="10%">totel wt</th>
	<th width="5%">balance mc</th>
	<th width="5%">balance wt</th>
	</tr>';
	if(mysqli_num_rows($sql) > 0)
	{
		while($row = mysqli_fetch_array($sql))
		{
			$result .='
			<tr>
			<td>'.$row["eno"].'</td>
			<td>'.$row["f_t"].'</td>
			<td>'.$row["tdate"].'</td>
			<td>'.$row["wt"].'</td>
			<td>'.$row["touch"].'</td>
			<td>'.$row["count"].'</td>
			<td>'.$row["mc"].'</td>
			<td>'.$row["t_mc"].'</td>
			<td>'.$row["t_wt"].'</td>
			<td>'.$row["mc_bal"].'</td>
			<td>'.$row["wt_bal"].'</td>
			</tr>';
		}
	}
	else
	{
		$result .='
		<tr>
		<td colspan="5">No  Item Found</td>
		</tr>';
	}
	$result .='</table>';
	echo $result;
}
?>