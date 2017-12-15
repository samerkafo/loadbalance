<?php
$host="172.22.0.4";
$user="root";
$password="netlab";
$database="bigdata";
$connect=  mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    die("cannot connect to database field:". mysqli_connect_error());
    
}
 else {
    echo 'Database is connected';  
}
?>
 <?php
     $TimeStamp=date("h:i:s");
     $HostName = "Website_1";
     $ipAdd=$_SERVER['REMOTE_ADDR'];
     #$clr= "#F5A9A9" ;   

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


<?php

   $query="insert into activitylog (TimeStamp ,HostName ,Color ,RemoteIP)values( '$TimeStamp' , '$HostName','#F5A9A9','$ipAdd')";
        $result=  mysqli_query($connect, $query);

?>
  <?php
        //2- read from database
        $query="select * from activitylog ORDER BY NumberAccess DESC limit 10";
        $result=  mysqli_query($connect, $query);
        if(! $result){
            die("Error in query");
        }
    ?>
        <ul>
    <?php
        // 3- write or display data
        echo "<table border='1'>
              <tr>
              <th>NumberAccess</th>
              <th>TimeStamp</th>
              <th>HostName </th>
              <th>Color </th>
              <th>RemoteIP</th>
              </tr>";


        while($row = mysqli_fetch_array($result))
        {
           $clr= $row['Color'];

        echo "<tr>";
        echo " <td bgcolor='$clr'>" . $row['NumberAccess'] . "</td>";
        echo " <td bgcolor='$clr'>" . $row['TimeStamp'] . "</td>";
        echo " <td bgcolor='$clr'>" . $row['HostName'] . "</td>";
        echo " <td bgcolor='$clr'>". $row['Color'] . "</td>";
        echo " <td bgcolor='$clr'>". $row['RemoteIP'] . "</td>";

        echo "</tr>";
        }
        echo "</table>";
   ?>
        </ul>


<?php
        //2- delete from database
        $query="select * from activitylog ";
        $result=  mysqli_query($connect, $query);
        $numofrows= mysqli_num_rows($result);
        if ($numofrows > 200 )
        {
            $del_rows=$numofrows - 200;

        $query1="delete from activitylog order by NumberAccess limit '$del_rows'  ";
        $result1=  mysqli_query($connect, $query1);

    }
        if(! $result){
            die("Error in query");
        }
        $result++
    ?>



</body>
</html>
<?php
mysqli_close($connect);
?>

