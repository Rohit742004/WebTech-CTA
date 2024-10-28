<?php
    // Establish connection with server
    $connection = mysqli_connect('localhost', 'root', '', 'sdmcet');

    // Check if connection was successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if ($_POST["ddlCRUDOp"] == "1") {
        // Create operation
        $stName = $_POST["txtname"];
        $stUSN = $_POST["txtUsn"];
        $stCompany = $_POST["txtComp"];
        $selYear = $_POST["datesel"];
        $package = $_POST["txtpack"];
        
        // Check if 'chkJobType' is set and handle multiple selections
        $stJob = isset($_POST["chkJobType"]) ? implode(",", $_POST["chkJobType"]) : "";

        $sqlquery = "INSERT INTO tbl_placement (Student_Name, Student_USN, Company, Job_type, `Year`, Package_Details) 
                     VALUES ('$stName', '$stUSN', '$stCompany', '$stJob', '$selYear', '$package')";
        
        // Execute SQL Statement
        $exequery = mysqli_query($connection, $sqlquery);

        if ($exequery) {
            echo "<span style=\"color:Red\"><p><b><center>New Record created successfully</center></b></p></span><br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt;-Back</a></center>";
        } else {
            echo "Exception!!! Unable to execute query: " . mysqli_error($connection);
        }

    } elseif ($_POST["ddlCRUDOp"] == "2") {
        // Display operation
        $stUSN = $_POST["txtUsn"];
        
        $selectquery = "SELECT * FROM tbl_placement WHERE Student_USN = '$stUSN'";
        
        // Execute SQL query
        $exequery = mysqli_query($connection, $selectquery);

        if ($exequery && mysqli_num_rows($exequery) > 0) {
            echo "<table border=\"1\">
                    <tr>
                        <th>Student Name</th>
                        <th>USN</th>
                        <th>Company Name</th>
                        <th>Job Type</th>
                        <th>Year of Selection</th>
                        <th>Package Details</th>
                    </tr>";
            while ($row = mysqli_fetch_assoc($exequery)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['Student_Name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Student_USN']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Company']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Job_type']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Year']) . "</td>";
                echo "<td>" . htmlspecialchars($row['Package_Details']) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "<center><a href=\"StudentDetail.html\">&lt;-Back</a></center>";
        } else {
            echo "<span style=\"color:Red\"><p><b><center>Record not found! Try with another input.</center></b></p></span><br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt;-Back</a></center>";
        }

    } elseif ($_POST["ddlCRUDOp"] == "3") {
        // Update operation
        $stName = $_POST["txtname"];
        $stUSN = $_POST["txtUsn"];
        $stCompany = $_POST["txtComp"];
        $selYear = $_POST["datesel"];
        $package = $_POST["txtpack"];
        $stJob = isset($_POST["chkJobType"]) ? implode(",", $_POST["chkJobType"]) : "";

        $updatequery = "UPDATE tbl_placement 
                        SET Student_Name = '$stName', Company = '$stCompany', Job_type = '$stJob', `Year` = '$selYear', Package_Details = '$package'
                        WHERE Student_USN = '$stUSN'";
        
        // Execute SQL query
        $exeupdatequery = mysqli_query($connection, $updatequery);

        if ($exeupdatequery) {
            echo "<span style=\"color:Red\"><p><b><center>Record updated successfully</center></b></p></span><br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt;-Back</a></center>";
        } else {
            echo "Exception!! Unable to execute SQL query: " . mysqli_error($connection);
        }

    } elseif ($_POST["ddlCRUDOp"] == "4") {
        // Delete operation
        $stUSN = $_POST["txtUsn"];

        $deleteQuery = "DELETE FROM tbl_placement WHERE Student_USN = '$stUSN'";

        // Execute Query
        $exedeletequery = mysqli_query($connection, $deleteQuery);

        if ($exedeletequery) {
            echo "<span style=\"color:Red\"><p><b><center>Record deleted successfully</center></b></p></span><br/>";
            echo "<center><a href=\"StudentDetail.html\">&lt;-Back</a></center>";
        } else {
            echo "Exception!!! Unable to delete record: " . mysqli_error($connection);
        }
    }

    // Close the database connection
    mysqli_close($connection);
?>
