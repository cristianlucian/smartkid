<!DOCTYPE html>
<html lang="en">
<head>
  <title>SmartKid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/users.css">
</head>
<body>
  <div class="header">
    <div class="logo">
      <a href="users.php"><img src="../images/logo4.png" alt="logo"></a>
    </div>
    <div class="message">
      <img src="../images/flag.png" alt="spanish flag">
      <?php echo ("<h1>Hola, <b>$user<b></h1>");?>
      </div>
      <div class="settings">
        <a href="#"><i class="material-icons">settings</i></a>
      </div>
    </div>

    <div class="main">
      <h2>Choose a chapter from bellow</h2>
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <div class="chapters">
              <img src="../images/colors.png" alt="colors">
              <div class="title">Colors</div>
            </div>
          </div>

          <div class="flip-box-back">
            <div class="lessons">
              <ul>
                <a href="lesson1colors.html"><li>Lesson 1</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 2</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 3</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Recap   </li>
                <i class="material-icons" style="padding-left:168px;">east</i></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <div class="chapters">
              <img src="../images/numbers.png" alt="numbers">
              <div class="title">Numbers</div>
            </div>
          </div>

          <div class="flip-box-back">
            <div class="lessons">
              <ul>
                <a href="#"><li>Lesson 1</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 2</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 3</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Recap   </li>
                <i class="material-icons" style="padding-left:168px;">east</i></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <div class="chapters">
              <img src="../images/animals.png" alt="animals">
             <div class="title">Animals</div>
            </div>
          </div>

          <div class="flip-box-back">
            <div class="lessons">
              <ul>
                <a href="#"><li>Lesson 1</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 2</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 3</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Recap   </li>
                <i class="material-icons" style="padding-left:168px;">east</i></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="flip-box">
        <div class="flip-box-inner">
          <div class="flip-box-front">
            <div class="chapters">
              <img src="../images/foods.png" alt="food">
              <div class="title">Foods</div>
            </div>
          </div>

          <div class="flip-box-back">
            <div class="lessons">
              <ul>
                <a href="#"><li>Lesson 1</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 2</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Lesson 3</li>
                <i class="material-icons">east</i></a>
                <a href="#"><li>Recap   </li>
                <i class="material-icons" style="padding-left:168px;">east</i></a>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="forum">
      <?php
        if(isset($_GET['id'])) {
          $postid = $_GET['id'];
	        echo "post ID is ".$postid;
          $query = $con->prepare("SELECT * FROM Fposts, Fusers"
          . " WHERE Fposts.postID = :postid AND Fposts.userid = Fusers.id");

          $query->bindParam(':postid', $postid, PDO::PARAM_INT);

          $query->execute();

          $OK = $query->rowCount();
          if($OK >= 1) {
            $result = $query->fetchall();
            foreach($result as $row) {
              $postTitle = $row['title'];
              $postContent = $row['content'];
              $postAuthor = $row['username'];
              $postDate = $row['date'];
            }
          }

          $query = $con->prepare("SELECT Freply.replyContent, Fusers.username, Freply.replyDate "
                . "FROM Freply, Fposts, Fusers "
                . "WHERE Freply.postid = Fposts.postid "
                . "AND Freply.userid = Fusers.id "
                . "AND Fposts.postid = :postid");
          $query->bindParam(':postid', $postid, PDO::PARAM_INT);
          $query->execute();

          $replyCount = $query->rowCount();
          $count = 0;
          if($replyCount >= 1) {
            $result = $query->fetchall();
            foreach($result as $row) {
              $replyContent[$count] = $row['replyContent'];
              $replyAuthor[$count] = $row['username'];
              $replyDate[$count] = $row['replyDate'];
              $count++;
            }
          }
       }

       if(isset($_POST['submit'])) {
         $userid = $_POST['userid'];
         $content = $_POST['content'];

         $query = $con->prepare('INSERT INTO Freply (replyContent, userid, postid)'
         . 'VALUES (:content, :userid, :postid)');

         $query->bindParam(':content', $content, PDO::PARAM_STR);
         $query->bindParam(':userid', $userid, PDO::PARAM_INT);
         $query->bindParam(':postid', $_GET['id'], PDO::PARAM_INT);
         $query->execute();
         header("Location: users.php?id=" . $_GET['id']);
       }

        for ($i = 0; $i < $replyCount; $i++) { ?>
          <p><?= $replyContent[$i]; ?></p>
          <p><i><?= $replyAuthor[$i]; ?> on <?= $replyDate[$i]; ?></i></p>
          <hr/>
          <?php }
       ?>

        <hr/>

        <h1>Reply</h1>
        <form method="post" action="users.php">
            <input type="text" name="userid" placeholder="Enter userid" required/><br/>
            <textarea rows="4" cols="50" name="content" required>Enter content</textarea><br/>
            <input type="submit" name="submit" value="Post" />
        </form>

    </div>

    <div class="footer">
      <a href="#">Contact us</a>
      <a href="#">Terms of use</a>
      <p>© 2021 SmartKid. All rights reserved.</p>
    </div>

  </body>
  </html>
