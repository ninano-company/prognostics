<?php
    $conn=mysqli_connect('localhost','copaki','whosKGB3@33','copaki');
    function noNULL( $value ){
        if ( $value == ""){
          return '0';
        } else {
          return $value;
        }
      }
      $Rname = noNULL($_POST['pushdata']);
      $sql = "
    SELECT
    sensorName, sensorPos, sensorWork
    FROM GGsensorList WHERE belongName = $Rname
    "
   ;
   $return = array();
  $result = mysqli_query( $conn, $sql );
  while( $row = mysqli_fetch_row($result) ){
   $object = array(
     "Sname"      => $row[0],
     "Spos"     => $row[1],
     "Swork"     => $row[2],
   );
   array_push( $return, $object );
 }
 $json = array(
   "data" => $return
);

$out = json_encode($json);
echo $out;
   
?>