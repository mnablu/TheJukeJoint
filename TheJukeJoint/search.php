<!DOCTYPE HTML>
<html>
<head>
    <meta  http-equiv="Content-Type" content="text/html;  charset=iso-8859-1">
    <title>Search </title>
</head>
<?php
include "mysql_connect.php";
?>
<p><body>
    <h3>Search</h3>
    <form id = "searchform"  action="search.php?go" method="post">
        <label>Song Name</label>
        <input  type="text"  name="song_name">
        <label>Artist's Name</label>
        <input  type="text"  name="artist_name">
        <input  type="submit" name="submit" value="Search">
    </form>
    <p><a  href="?by=A">A</a> | <a  href="?by=B">B</a> | <a  href="?by=C">C</a> |<a  href="?by=D"> D</a></p>
    <?php
if(isset($_POST['submit'])){
    if(isset($_GET['go'])){
        if(preg_match("/^[  a-zA-Z]+/", $_POST['name'])){
            $name=$_POST['name'];
            
            //-query  the database table
            $sql="SELECT id, song_name, artist_name FROM jukejoint_database WHERE song_name LIKE '%" . $name .  "%' OR artist_name LIKE '%" . $name ."%'";
            //-run  the query against the mysql query function
            $result=mysql_query($sql);
            //-create  while loop and loop through result set
            while($row=mysql_fetch_array($result)){
                $song_name  =$row['song_name'];
                $artist_name=$row['artist_name'];
                $id=$row['id'];
                //-display the result of the array
                echo "<ul>\n";
                echo "<li>" . "<a  href=\"search.php?id=$id\">"   .$song_name . " " . $artist_name .  "</a></li>\n";
                echo "</ul>";
            }
        }
        else{
            echo  "<p>Please enter a search query</p>";
        }
    }
}
?>
</html>
