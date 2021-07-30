<html>
<body>
<h1>Answers From Database</h1>
<?php
include 'db_connection.php';
$mysqli = OpenCon();
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($mysqli,$sSQL) 
or die ('Can\'t charset in DataBase'); 

$QuestionVariable = "1";
$QuestionVariable = $_GET["QuestionVariable"];
$query = "SELECT answerID,questionID,answerENG,answerARAB FROM Answers";

$result = mysqli_query($mysqli,$query);
$row = mysql_fetch_array($result);
$newQuestion = true; 

if($result = $mysqli->query($query)){
        
        
        echo "<table>";
        echo'<table border ="1">';
        echo "<tr>";
        echo "<th>Answer ID</th>";
        echo "<th>Question ID</th>";
        echo "<th>English Answer</th>";
        echo "<th>Arabic Answer</th>";
        echo "</tr>";

    while ($row = $result->fetch_assoc())
    {

            echo "<tr>";
                echo "<td>" . $row['answerID'] . "</td>";
                echo "<td>" . $row['questionID'] . "</td>";
                echo "<td>" . $row['answerENG'] . "</td>";
                echo '<td style="text-align:right">' . $row['answerARAB'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);

    }
         else{
        echo "No records matching your query were found.";
}
?>
</body>
</html>
