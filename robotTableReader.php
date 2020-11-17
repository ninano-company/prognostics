<?php
  $conn = mysqli_connect( 'localhost',
                          'copaki',
                          'whosKGB3@33',
                          'copaki' );
  
  $data = array();

  $sql = "
    SELECT
      s.idN, s.place, s.workPosition, s.sensorNum, s.state
      FROM GGmachineList AS s
  ";

  $result = mysqli_query( $conn, $sql );
  while( $row = mysqli_fetch_row($result) ){
    $object = array(
      "v1"      => $row[0],
      "v2"     => $row[1],
      "v3"     => $row[2],
      "v4"     => $row[3],
      "v5"    => $row[4]
    );
    array_push( $data, $object );
  }
  // for( $i = 0; $i < 3; $i=$i+1 ) {
  //   $object = array(
  //     "v1"      => '$row[0]',
  //     "v2"     => '$row[1]',
  //     "v3"     => '$row[2]',
  //     "v4"     => '$row[3]',
  //     "v5"    => '$row[4]'
  //   );
  //   array_push( $data, $object );
  // }

  $json = array(
      "data" => $data
  );

  $out = json_encode($json);
  echo $out;
?>