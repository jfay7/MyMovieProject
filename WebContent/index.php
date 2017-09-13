<!DOCTYPE html>
<html>
        <head>
        <style>
                label{display:inline-block;width:100px;margin-bottom:10px;}
        </style>
        <style>body{ background-color: #d3d3d3;}</style>


        <title>Add Movies</title>
        </head>
                <body style ="text-align: center">
                        <h1> Add or Search Movie Titles Here </h1>
                        <form method="post" action="connect2.php">
                        <label>Movie Title</label>
                        <input type="text" name="TITLE" />
                        <br />
                        <label>Director</label>
                        <input type="text" name="DIRECTOR" />
                        <br />
                        <label>Release Year</label>
                        <input type="text" name="RELEASEDATE" />
                        <br />
                        <label>Rating (1-10)</label>
                        <input type="text" name="RATING" />

                        <br />
                        <input type="submit" value="Add Movies">

                        <br /><br />
                        <label></label>
                        </form>
                        <form method="post" action="connect.php">
                        <input type="text" name="search" />
                        <input type="submit" value="Search">
                        </form>
                </body>
</html>
