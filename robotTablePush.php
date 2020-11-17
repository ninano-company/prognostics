<?php
$conn=mysqli_connect('localhost','copaki','whosKGB3@33','copaki');
    function noNULL( $value ){
        if ( $value == ""){
          return '0';
        } else {
          return $value;
        }
      }
      
      $place = noNULL($_POST['Rposition']);
      $workPosition = noNULL($_POST['Rkind']) ;
      $sensorNum = noNULL($_POST['Rsensor']) ;
      $state = noNULL($_POST['Rcondition']) ;
      
    $sql = "
    INSERT INTO GGmachineList (place, workPosition, sensorNum , state)
    VALUES('{$place}', '{$workPosition}','{$sensorNum}',
    '{$state}' )
    ";
    // die($sql);
    $result = mysqli_query($conn,$sql);
    if($result === false){
        echo mysqli_error($conn);
    }
     else {
        echo "<script>document.location.href='index.php';</script>";
    }
?>