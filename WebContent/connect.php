<?php

$search=$_POST['search'];
$x = 0;
$connect = mysqli_connect('localhost', 'newremoteuser', 'password', 'myMovies');
if(!$connect)
{
        die("Connection Failed: " . mysql_error());
}

$print = mysqli_query($connect, "SELECT * FROM movieTable;");

        echo "<style>body{background-color: #d3d3d3;}</style>";
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

$doesMatch = mysqli_query($connect, "SELECT * FROM movieTable WHERE TITLE='$search' OR DIRECTOR='$search' OR RELEASEDATE='$search' OR RATING='$search';");
while ($col = mysqli_fetch_array($doesMatch))
{
        echo '<h1>';
        echo "Your Search Returned: ";
        echo '</h1>';
        echo '<h2>';
        echo $col['TITLE'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp";
        echo $col['DIRECTOR'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp";
        echo $col['RELEASEDATE'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp";
        echo $col['RATING'];
        echo "&nbsp;&nbsp;&nbsp;&nbsp";
        echo '<br /></h2>';
        $x++;
}
if ($x == 0)
{
echo '<h1>';
echo 'Your Search Returned 0 Results';
echo '</h1>';

}
