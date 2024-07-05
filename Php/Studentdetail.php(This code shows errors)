<!--This code shows error except value in html document-->

<?php
    //Establish connection with server
    $connection = mysqli_connect('localhost','root','','sdmcet');

    if($_POST["ddlCRUDOp"]=="1")
    {
            //Collection of web page data
            $stName = $_POST["txtname"];
            $stUSN = $_POST["txtUsn"];
            $stCompany = $_POST["txtComp"];      
            if($_POST["chkJobType"]!=null)
                $stJob  = $_POST["chkJobType"];
            $selYear = $_POST["datesel"];
            $package = $_POST["txtpack"];
            $sqlquery = "INSERT into tbl_placement (Student_Name, Student_USN, Company, Job_type, `Year`, Package_Details) 
             VALUES ('$stName', '$stUSN', '$stCompany', '" . implode(",", $stJob) . "', '$selYear', '$package')";
            //Execute SQL Statements
            $exequery = mysqli_query($connection, $sqlquery);
            if($exequery)
            {
                echo "<span style=\"color:Red\"><p><b><center>New Record created sucessfully</center></b></p></span>"."<br/>";
                echo "<center><a href=\"StudentDetail.html\">&lt-Back</a></center>";
            }
            else
            {
                echo "Exception!!! not able to execute query";
            }

            mysqli_close($connection);	
    }
    else if($_POST["ddlCRUDOp"]=="2")
    {
        $stUSN = $_POST["txtUsn"];
            //prepare SQL statements
            $selectquery = "SELECT * FROM tbl_placement where St_USN='".$stUSN."'";

            //execute SQL query
            $exequery = mysqli_query($connection, $selectquery) or die(mysql_error());
            //print_r($exequery);
            if($exequery)
            {
                echo "<table border=\"1\">
                        <tr>
                            <th>Student Name</th>
                            <th>USN</th>
                            <th>Company Name</th>
                            <th>Job Type</th>
                            <th>Year of selection</th>
                            <th>Package Details</th>
                        </tr>";
                while($row = mysqli_fetch_array($exequery))
                {
                    echo "<tr>";
                    echo "<td>".$row['St_Name']."</td>";
                    echo "<td>".$row['St_USN']."</td>";
                    echo "<td>".$row['stCompany']."</td>";
                    echo "<td>".$row['stJob']."</td>";
                    echo "<td>".$row['selYear']."</td>";
                    echo "<td>".$row['package']."</td>";
                    echo "</tr>";
                }
                echo "<tr><td colspan=\"5\" align=\"center\"><a href=\"StudentDetail.html\">&lt-Back</a></td></tr></table>";
            }
            else{
                echo "<span style=\"color:Red\"><p><b><center>Record not found!!!! Try with some other input</center></b></p></span>"."<br/>";
                echo "<center><a href=\"StudentDetail.html\">&lt-Back</a></center>";
                mysqli_close($connection);
        }
    }
    else if($_POST["ddlCRUDOp"]=="3")
    {
        //Collection of web page data
        $stName = $_POST["txtname"];
        $stUSN = $_POST["txtUsn"];      
        $stCompany = $_POST["txtComp"];  
        if($_POST["chkJobType"]!=null)
            $stJob = $_POST["chkJobType"];
        $selYear = $_POST["datesel"];
        $package = $_POST["txtpack"];

        foreach ($stJob as $job) {
            $courseVal .= $job.",";
        }
        //Prepare SQL query
        $updatequery = "UPDATE tbl_placement SET Student_Name='$stName',Student_USN='$stUSN',Company='$stCompany',St_Job='$stJob',`Year`='$selYear',Package_Details='$package' WHERE Student_USN='$stUSN'";
        
        //execute SQL query
        $exeupdatequery = mysqli_query($connection, $updatequery) or die(mysql_error());


        if($exeupdatequery)
        {
            echo "<span style=\"color:Red\"><p><b><center>Record updated sucessfully</center></b></p></span>"."<br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt-Back</a></center>";
        }
        else
        {
            echo "Excpetion!! not able to execute SQL query";
        }
        mysqli_close($connection);
    }
    else if($_POST["ddlCRUDOp"]=="4")
    {
        $stUSN = $_POST["stUSN"];
        //Prepared statements
        $deleteQuery = "DELETE from tbl_Registration WHERE St_USN='$stUSN'";
        
        //execute Query
        $exedeletequery = mysqli_query($connection, $deleteQuery) or die(mysql_error());

        if($exedeletequery)
        {
            echo "<span style=\"color:Red\"><p><b><center>Record Deleted sucessfully</center></b></p></span>"."<br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt-Back</a></center>";
        }
        else
        {
            echo "Exception!!!, Record not deleted";
        }
    mysqli_close($connection);
    }
?>
