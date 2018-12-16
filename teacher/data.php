 <?php
  include 'Connection.php';
  
  
$stmt =("SELECT outcome,bid FROM overall");
$stmt->execute();
$row1 = [];
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);
        $row1[]= ['outcome' => $year, 'bid' => $income];
    }
    echo json_encode($row1);
?>