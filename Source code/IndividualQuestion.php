<html>
<body>
<h1>Retrieval Trial 2</h1>
<?php
include 'db_connection.php';
$mysqli = OpenCon();
if($mysqli === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sSQL= 'SET CHARACTER SET utf8'; 

mysqli_query($mysqli,$sSQL) 
or die ('Can\'t charset in DataBase'); 




$QV = $_GET["QV"];

if (empty($QV)){
    $QV = "1";
}

$query = "SELECT Answers.answerID,Answers.answerENG,Answers.answerCorrect,Questions.questionENG,Questions.questionID,Questions.questionImage FROM Answers INNER JOIN Questions ON Answers.questionID = Questions.questionID WHERE Answers.questionID=" . $QV;

$result = mysqli_query($mysqli,$query);
$row = mysql_fetch_array($result);
$newQuestion = true; 

if($result = $mysqli->query($query)){
        
        
        echo "<table>";
        echo'<table border ="1">';
        echo "<tr>";
        echo "<th>answerID</th>";
        //echo "<th>Question ID</th>";
        echo "<th>English Answer</th>";
        //echo "<th>Answer Correct</th>";
        echo "</tr>";

    while ($row = $result->fetch_assoc())
    {
        if ($newQuestion){
            echo "<H2> Question ID: " . $row['questionID'] . "</H2>";
            echo nl2br ("<H2> \r\n Question: " . $row['questionENG'] . "</H2>");
            if(isset($row['questionImage'])){
                echo "<img src=" . $row['questionImage'] . "alt='Image Unavailable'>";
                echo $row['questionImage'];
            }
            $newQuestion = false;
        }

            echo "<tr>";
                echo "<td>" . $row['answerID'] . "</td>";
               // echo "<td>" . $row['questionID'] . "</td>";
                echo "<td>" . $row['answerENG'] . "</td>";
                //echo "<td>" . $row['answerCorrect'] . "</td>";

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