  <?php
        //2- delete from database
        $query="delete from activitylog  where NumberAccess not in (select top 10 NumberAccess from activitylog ORDER BY NumberAccess DESC ) ";
        $result=  mysqli_query($connect, $query);
        if(! $result){
            die("Error in query");
        }
    ?>