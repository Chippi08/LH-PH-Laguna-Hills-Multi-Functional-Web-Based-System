<?php
 include 'connection.php';
 if(isset($_POST['VUsername'])){
if(isset($_POST['displayLotSend'])){

  $VUsername =$_POST['VUsername'];
    $ownerLotTable= '<table class="table text-center">
    <thead>
      <tr>
        <th scope="col">Property</th>
        <th scope="col">Type of Ownership</th>
       
      </tr>
    </thead>';

    $lotsql = "SELECT * FROM `assigned_lot` where owner_username='".$VUsername."'";
    $lotresult = mysqli_query($con, $lotsql);
    while($row = mysqli_fetch_assoc($lotresult)){

        $Ownerusername = $row['owner_username'];
        $Lotid = $row['lot_id'];
        $Ownership= $row['ownership'];
        $hihi= $row['owner_username'];

    $ownerLotTable.= '<tr>
        <td scope="row">'.$Lotid.'</td>
        <td>'. $Ownership.'</td>
        
  

      </tr>';
    }
    $ownerLotTable.='</table>';
    echo  $ownerLotTable;
}}

?>



<!--<td>'. $hihi.'</td>-->