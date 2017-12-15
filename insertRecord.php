<?php
   $query="insert into activitylog (TimeStamp ,HostName ,Color ,RemoteIP)values( $TimeStamp , $HostName,$clr,$ipAdd)";
        $result=  mysqli_query($connect, $query);

?>