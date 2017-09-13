<?php

$TITLE=$_POST['TITLE'];
$DIRECTOR=$_POST['DIRECTOR'];
$RELEASEDATE=$_POST['RELEASEDATE'];
$RATING=$_POST['RATING'];

$connect = mysqli_connect('localhost','newremoteuser','password','myMovies');
if (!$connect)
{
        die ("Connection Failed:" . mysql_error());
}
mysqli_query($connect,"INSERT INTO movieTable (TITLE, DIRECTOR, RELEASEDATE, RATING)
                        VALUES ('$TITLE','$DIRECTOR','$RELEASEDATE','$RATING')");
        if(mysqli_affected_rows($connect) > 0){
        echo "<style>body{ background-color: #d3d3d3;}</style>";
        echo "<h1>Movie information has been added</h1>";
        $print = mysqli_query($connect, "SELECT * FROM movieTable;");
        echo "<p>All Movies:</p>";
        while ($row = mysqli_fetch_array($print))
        {
                echo $row['TITLE'];
                echo "&nbsp;&nbsp;&nbsp;&nbsp";
                echo $row['DIRECTOR'];
                echo "&nbsp;&nbsp;&nbsp;&nbsp";
                echo $row['RELEASEDATE'];
                echo "&nbsp;&nbsp;&nbsp;&nbsp";
                echo $row['RATING'];
                echo "&nbsp;&nbsp;&nbsp;&nbsp";
                echo '<br />';
        }
} else {
        echo "Movie NOT Added<br />";
        echo mysqli_error ($connect);
}
