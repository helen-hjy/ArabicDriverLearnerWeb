<!DOCTYPE html>
<html lang="en">

<body>

</body>
</html>


<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>
  <style>
    body {
      font-family: Calibri, sans-serif;
      margin: 0;
    }

    h1 {
      font-size: 35pt;
      margin-bottom: 0;
    }

    p {
      font-size: 14pt;
    }

    #header {
      display: flex;
    }

    #main-banner {
      background-color: #729d39;
      height: 580px;
    }

    .btn-transition {
      transition: padding 0.2s ease-in-out;
    }

    .banner-heading {
      margin: 0;
      padding-top: 50px;
      font-size: 45pt;
      color: white;
      margin-bottom: 70px;
    }

    .begin-btn {
      cursor: pointer;
      border: 3px solid white;
      color: white;
      font-size: 22pt;
      padding: 5px 50px;
      display: table;
      font-weight: 600;
      margin: auto;
      margin-bottom: 60px;
    }

    .begin-btn:hover {
      padding: 5px 60px;
    }

    .begin-btn:active {
      padding: 5px 40px;

    }

    /*.banner-select {*/
    /*display:flex;*/
    /*color: white;*/
    /*width: 600px;*/
    /*margin: auto;*/
    /*}*/

    .banner-select td {
      padding: 25px 50px;
      color: white;
    }

    #navigation a {
      color: #231f20;;
      text-decoration: none;
      font-size: 22pt;
      border-bottom: 2px solid #729d39;
      text-align: center;
      padding: 14px 16px;
      float: left;
      width: auto;
      display: block;
      outline: 0;
    }

    #navigation {
      width: 80%;
      max-width: 1200px;
    }
    @media (max-width: 1200px) {
      #navigation a {
        font-size:18pt;
      }
      #navigation {
        width: 100%;
      }
    }
    @media (max-width:1000px) {

    }

    .main-content {
      padding: 30px;
      max-width: 1200px;
      width: 80%;
      margin: auto;
      background-color: white;
    }

    .footer {
      width: 100%;
      background-color: #f1f1f1;
    }

    .footer table {
      max-width: 600px;
      margin: auto;
      width: 80%;
      padding: 25px 0;
    }

    #questionContainer {
        background:
        white;
        padding: 50px;
        border-radius: 10px;
        width: 500px;
        position: relative;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
    }

    h2 {
    margin: 0;
    padding-bottom: 20px;
    }

    #langSelect {
          position: absolute;
          height: 30px;
          width: 100px;
          right: 10px;
          top: 50px;
        }


  </style>
</head>
<body>
<div id="header">

  <table id="navigation">
    <tr>
      <td>
        <img src="img/logo.png" style="height:100px; padding:10px"/>
      </td>
      <td>
        <a href="index.html"></a>
      </td>
      <td>
        <a href="practice.html"></a>
      </td>
      <td>
        <a href="lessons.html"></a>
      </td>
      <td>
        <a href="about.html"></a>
      </td>
      <td>
        <a href="contact.html"></a>
      </td>
    </tr>
  </table>
  <select id="langSelect">
      <option value="English">English</option>
      <option value="Arabic">عربى</option>
    </select>


</div>
<div id="main-banner">
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

$query = "SELECT Answers.answerID,Answers.answerENG,Answers.answerARAB,Answers.answerCorrect,Questions.questionENG,Questions.questionARAB,Questions.questionID,Questions.questionImage FROM Answers INNER JOIN Questions ON Answers.questionID = Questions.questionID WHERE Answers.questionID=" . $QV;

$result = mysqli_query($mysqli,$query);

$row = mysql_fetch_array($result);
$newQuestion = true;

$jsonObj;
$list = array();

if($result = $mysqli->query($query)){
    while ($row = $result->fetch_assoc())
    {
            $jsonObj->question = $row['questionENG'];
            $jsonObj->questionARAB = $row['questionARAB'];
            $list[] = $row;
    }
    $jsonObj->answers = $list;
}

$jsonObj = json_encode($jsonObj);

$record = mysql_query("SELECT Answers.answerID,Answers.answerENG,Answers.answerCorrect,Questions.questionENG,Questions.questionID,Questions.questionImage FROM Answers INNER JOIN Questions ON Answers.questionID = Questions.questionID WHERE Answers.questionID=1");
while($row=mysql_fetch_assoc($record)){
      //fill array how to fill array that will look like bellow from database???

}

?>
<div id='questionContainer'>

</div>
</div>

<div class='main-content'>

</div>

<div class="footer">
  <table>
    <tr style="font-weight: 600">
      <td>Heading 1</td>
      <td>Heading 2</td>
      <td>Heading 3</td>
    </tr>
    <tr>
      <td>Links</td>
      <td>Links</td>
      <td>Links</td>
    </tr>
    <tr>
      <td>Links</td>
      <td>Links</td>
      <td>Links</td>
    </tr>
    <tr>
      <td>Links</td>
      <td>Links</td>
      <td>Links</td>
    </tr>
  </table>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
          integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
          crossorigin="anonymous"></script>

<script type='text/javascript'>

 $(document).ready(function() {

   var cookie = getCookie('arabic-dla');
   console.log(cookie);
   if (cookie == null) {
     var obj = {
       language: 'English',
     };
     setCookie('arabic-dla', JSON.stringify(obj), 365);
   } else {
     cookie = JSON.parse(cookie);
     $('#langSelect').val(cookie.language);
   }


    //Defines language for each element
    var pageContent = {
      bannerHeading: {
        en: 'Get on the road with confidence',
        ar: 'السيارة مع الثقة'
      },
      startBtn: {
        en: 'Click to Begin',
        ar: 'انقر لتبدأ'
      },
      navigation: {
        en: ['Home', 'Practice', 'Lessons', 'About', 'Contact Us'],
        ar: ['منزل', 'الدروس', 'ممارسة', 'معلومات عنا', 'اتصل بنا']
      }
    };

    //Defines elements in HTML
        var nagivation = $('#navigation').find('a'); //Navigation bar
        var heading = $('.banner-heading'); // banner heading
        var startBtn = $('.begin-btn'); // 'click to begin' button
        var questionContainer = $('#questionContainer').find('.answer');

        //Initialise language based on select value on page load
        setLanguage();

        // Triggers change of language when language select is changed
        $('#langSelect').on('change', function() {
          var cookie = getCookie('arabic-dla');
          cookie = JSON.parse(cookie);
          cookie.language = $(this).val();
          setCookie('arabic-dla', JSON.stringify(cookie), 365);
          setLanguage();
        });

        //Calls the relevant function based on which language is selected
        function setLanguage() {
          var  o =<?php echo json_encode($jsonObj); ?>;
          var obj = JSON.parse(o);

          var language = $('#langSelect').val();
          switch(language) {
            case 'Arabic':
              arabic(obj);
              break;
            case 'English':
              english(obj);
              break;
            default:
              english(obj);
          }
        }

        //Sets elements to Arabic translations
        function arabic(obj) {
          console.log('arab');
          heading.text(pageContent.bannerHeading.ar);
          startBtn.text(pageContent.startBtn.ar);
          nagivation.each(function(index) {
            $(this).text(pageContent.navigation.ar[index]);
          });
          $('#question').text(obj.questionARAB);
          questionContainer.each(function(index) {
            $(this).text(obj.answers[index].answerARAB);
          });
        }

        //Sets elements to English translations
        function english(obj) {
          heading.text(pageContent.bannerHeading.en);
          startBtn.text(pageContent.startBtn.en);
          nagivation.each(function(index) {
            $(this).text(pageContent.navigation.en[index]);
          });
          $('#question').text(obj.question);
          questionContainer.each(function(index) {
            $(this).text(obj.answers[index].answerENG);
          });
        }
      });
    var  o =<?php echo json_encode($jsonObj); ?>;
    var obj = JSON.parse(o);

 $('#questionContainer').append(
 // '<h2 id="question">'+obj.question+'</h2><table>'
 '<h2 id="question"></h2><table>'
 );
 for(var i = 0; i < obj.answers.length; i++) {
  $('#questionContainer').append(
  // '<tr><td style="display: flex"><input name="answer" type="radio" style="padding-right: 10px"><div class="answer">' + obj.answers[i].answerENG+'</div></tr></td>'
  '<tr><td style="display: flex"><input name="answer" type="radio" style="padding-right: 10px"><div class="answer"></div></tr></td>'
  )
 }
   $('#questionContainer').append(
   '</table> <input type="button" id="nextBtn" onclick="onClick()" value="Next Question"></input>'
    )

function onClick() {
console.log('test');
    var random = Math.round(Math.random() * 100);
    var url =  window.location.href.split('?')[0] + '?QV=' + random;
    window.open(url, '_self');
    };

    function setCookie(name, value, days) {
      var expires = "";
      if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
      var nameEQ = name + "=";
      var ca = document.cookie.split(';');
      for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
      }
      return null;
    }
    function deleteCookie(name) {
      document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    }

</script>
