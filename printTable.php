  <?php
        //2- read from database
        $query="select * from activitylog ORDER BY NumberAccess DESC ";
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
        echo "<tr>";
        echo "<td>" . $row['NumberAccess'] . "</td>";
        echo "<td>" . $row['TimeStamp'] . "</td>";
        echo "<td>" . $row['HostName'] . "</td>";
        echo "<td>" . $row['Color'] . "</td>";
        echo "<td>" . $row['RemoteIP'] . "</td>";

        echo "</tr>";
        }
        echo "</table>";
   ?>
        </ul>
