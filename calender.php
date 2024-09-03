<?php
function build_calendar($month, $year) {
    $mysqli = new mysqli('localhost', 'root', '', 'autoservice');
    
    // Check if connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    
    $stmt = $mysqli->prepare("SELECT DATE(date) AS date, COUNT(*) AS booked_slots FROM bookings WHERE MONTH(date) = ? AND YEAR(date) = ? GROUP BY DATE(date)");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $bookings[$row['date']] = $row['booked_slots'];
        }
        
        $stmt->close();
    }
    
    // Create array containing abbreviations of days of week
    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    
    // What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    
    // How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);
    
    // Retrieve some information about the first day of the month in question
    $dateComponents = getdate($firstDayOfMonth);
    
    // What is the name of the month in question?
    $monthName = $dateComponents['month'];
    
    // What is the index value (0-6) of the first day of the month in question?
    $dayOfWeek = $dateComponents['wday'];
    
    // Create the table tag opener and day headers
    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</a> ";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Current Month</a> ";
    $calendar .= "<a class='btn btn-xs btn-primary' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</a></center><br>";
    $calendar .= "<tr>";
    
    // Create the calendar headers
    foreach($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    } 
    
    // Create the rest of the calendar
    $currentDay = 1;
    $calendar .= "</tr><tr>";
    
    if ($dayOfWeek > 0) { 
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar .= "<td class='empty'></td>"; 
        }
    }
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  
    while ($currentDay <= $numberDays) {
        if ($dayOfWeek == 7) {
            $dayOfWeek = 0;
            $calendar .= "</tr><tr>";
        }
        
        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        
        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        $today = $date == date('Y-m-d') ? "today" : "";
        
        if (isset($bookings[$date]) && $bookings[$date] >= 3) {
            // Date with all slots booked - display message
            $calendar .= "<td class='$today'><h4>$currentDay</h4> <span class='btn btn-danger btn-xs'>All slots booked</span>";
        } elseif ($date < date('Y-m-d')) {
            // Past date - display N/A
            $calendar .= "<td class='empty'><h4>$currentDay</h4> <span class='btn btn-default btn-xs'>N/A</span>";
        } else {
            // Date with available slots - display "Book" button
            $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."' class='btn btn-success btn-xs'>Book</a>";
        }
        
        $calendar .= "</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    
    if ($dayOfWeek != 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($l=0;$l<$remainingDays;$l++){
            $calendar .= "<td class='empty'></td>"; 
        }
    }
    
    $calendar .= "</tr>";
    $calendar .= "</table>";
    
    echo $calendar;
}
?>



<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
       @media only screen and (max-width: 760px),
        (min-device-width: 802px) and (max-device-width: 1020px) {

            /* Force table to not be like tables anymore */
            table, thead, tbody, th, td, tr {
                display: block;

            }
            .empty {
                display: none;
            }

            /* Hide table headers (but not display: none;, for accessibility) */
            th {
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            tr {
                border: 1px solid #ccc;
            }

            td {
                /* Behave  like a "row" */
                border: none;
                border-bottom: 1px solid #eee;
                position: relative;
                padding-left: 50%;
            }



            /*
		Label the data
		*/
            td:nth-of-type(1):before {
                content: "Sunday";
            }
            td:nth-of-type(2):before {
                content: "Monday";
            }
            td:nth-of-type(3):before {
                content: "Tuesday";
            }
            td:nth-of-type(4):before {
                content: "Wednesday";
            }
            td:nth-of-type(5):before {
                content: "Thursday";
            }
            td:nth-of-type(6):before {
                content: "Friday";
            }
            td:nth-of-type(7):before {
                content: "Saturday";
            }


        }

        /* Smartphones (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            body {
                padding: 0;
                margin: 0;
            }
        }

        /* iPads (portrait and landscape) ----------- */

        @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
            body {
                width: 495px;
            }
        }

        @media (min-width:641px) {
            table {
                table-layout: fixed;
            }
            td {
                width: 33%;
            }
        }
        
        .row{
            margin-top: 20px;
        }
        
        .today{
            background:yellow;
        }
        
        
    
    @media only screen and (max-width: 760px),
    (min-device-width: 802px) and (max-device-width: 1020px) {
        /* Force table to not be like tables anymore */
        table,
        thead,
        tbody,
        th,
        td,
        tr {
            display: block;
        }

        .empty {
            display: none;
        }

        th {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

        tr {
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        td {
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
            transition: all 0.3s ease;
        }

        td:before {
            position: absolute;
            top: 6px;
            left: 6px;
            content: attr(data-day);
            font-weight: bold;
            transition: all 0.3s ease;
        }
    }

    .table {
        border-collapse: collapse;
        width: 100%;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: center;
        vertical-align: middle;
        transition: all 0.3s ease;
    }

    .table th {
        background-color: #A9A9A9;
    }

    .table tr:hover {
        background-color: #f5f5f5;
    }

    .table .today {
        background: yellow;
    }

    .btn {
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        border: 1px solid transparent;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }

    .btn-primary:hover {
        background-color: #286090;
        border-color: #204d74;
    }

    .btn-success {
        color: #fff;
        background-color: #5cb85c;
        border-color: #4cae4c;
    }

    .btn-success:hover {
        background-color: #449d44;
        border-color: #398439;
    }

    .btn-danger {
        color: #fff;
        background-color: #d9534f;
        border-color: #d43f3a;
    }

    .btn-danger:hover {
        background-color: #c9302c;
        border-color: #ac2925;
    }
    body {
        background-image: url('https://rajkottaxi.in/images/slider2.jpg');
        background-size: cover; /* Cover the entire background */
        background-repeat: no-repeat; /* Do not repeat the image */
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .container {
        padding: 20px;
    }
    td h4 {
        color: #fff; /* Change this color to your desired color */
    }
    h2 {
        font-family: "Times New Roman", Times, serif;
        font-size: 40px;
    }
    .calendar-cell:hover {
        background-color: #f0f0f0; /* Change background color on hover */
        cursor: pointer; /* Change cursor to pointer on hover */
    }
    
    </style>
</head>
<script>
    $calendar .= "<td class='calendar-cell $today'>";
</script>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                     $dateComponents = getdate();
                     if(isset($_GET['month']) && isset($_GET['year'])){
                         $month = $_GET['month']; 			     
                         $year = $_GET['year'];
                     }else{
                         $month = $dateComponents['mon']; 			     
                         $year = $dateComponents['year'];
                     }
                    echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
</body>

</html>
