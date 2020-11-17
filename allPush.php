<?php
$conn=mysqli_connect('localhost','copaki','whosKGB3@33','copaki');
    function noNULL( $value ){
        if ( $value == ""){
          return '0';
        } else {
          return $value;
        }
      }
      $Rname = noNULL($_POST['Rname']);
      $Rplace = noNULL($_POST['Rposition']);
      $Rwork = noNULL($_POST['Rkind']) ;
      $sensorNum = noNULL($_POST['Rsensor']) ;
   
    $sql = "
    INSERT INTO ggmachine (robotName, position, purpose , hasSensor)
    VALUES('{$Rname}','{$Rplace}', '{$Rwork}','{$sensorNum}')
    ";
    
    // die($sql);
    $result = mysqli_query($conn,$sql);
   if($result === false){
       echo mysqli_error($conn);
   }
     else {
        for($i=0; $i< $sensorNum; $i++){
            $Sname = noNULL($_POST['Sname'.$i]);
            $Spos = noNULL($_POST['Spos'.$i]);
            $Swork = noNULL($_POST['Skind'.$i]);
            $sql = "
               INSERT INTO GGsensorList (belongName, sensorName, sensorPos ,sensorWork)
               VALUES('{$Rname}','{$Sname}', '{$Spos}','{$Swork}')
               ";
               $result = mysqli_query($conn,$sql);
            if($result === false){
               echo mysqli_error($conn);
            }
         }
        echo "<script>document.location.href='index2.php';</script>";
        
      }
?>