<?php

session_start();

require_once 'assets/config.php';

$result = mysqli_query($induction, "SELECT * FROM `images` ORDER BY rand()");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/my.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="https://kit.fontawesome.com/4d1ce4c9a9.js" crossorigin="anonymous"></script>
	<title>Document</title>
</head>

<body>

<div class="container">
    <form action="assets/logout.php">
        <div >
            <button class="button" type="submit">
                <a>Log out</a>
            </button>
            <a href="profile.php">
                <button class="button" type="button"><?= $_SESSION["user"]["username"]?>'s profile</button>
            </a>

        </div>
    </form>
</div>
<div class="container">
    <p>Here is uploads of all time
        <br>
        Be careful: every time you refresh this page all photos will be display randomly!
    </p>
</div>
<div class="container">

        <?php
        $userid = $_SESSION["user"]['id'];
        while ($img = mysqli_fetch_assoc($result)){
            $postid = $img['id'];
            $type = -1;

            // Checking user status
            $status_query = "SELECT count(*) as cntStatus,type FROM like_unlike WHERE userid=".$userid." and postid=".$postid;
            $status_result = mysqli_query($induction,$status_query);
            $status_row = mysqli_fetch_array($status_result);
            $count_status = $status_row['cntStatus'];
            if($count_status > 0){
                $type = $status_row['type'];
            }
            // Count post total likes and unlikes
            $like_query = "SELECT COUNT(*) AS cntLikes FROM like_unlike WHERE type=1 and postid=".$postid;
            $like_result = mysqli_query($induction,$like_query);
            $like_row = mysqli_fetch_array($like_result);
            $total_likes = $like_row['cntLikes'];

            $unlike_query = "SELECT COUNT(*) AS cntUnlikes FROM like_unlike WHERE type=0 and postid=".$postid;
            $unlike_result = mysqli_query($induction,$unlike_query);
            $unlike_row = mysqli_fetch_array($unlike_result);
            $total_unlikes = $unlike_row['cntUnlikes'];

            ?>
            <div class="row">
                <div class="col">
                    <a href="otherprofiles.php?profile_id=<?= $img['userid'] ?>">
                        <img class="db-img" src="assets/<?php echo $img['image']; $imgid = $img['id'];?>" alt="Someone`s upload">
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col">
            <?php
            if($_SESSION["auth"] === true) {
                ?>
                        <input type="button" value="Like" id="like_<?php echo $postid; ?>" class="like" style="<?php if($type == 1){ echo "color: #ffa449;"; } ?>" />&nbsp;(<span id="likes_<?php echo $postid; ?>"><?php echo $total_likes; ?></span>)&nbsp;
                        <input type="button" value="Dislike" id="unlike_<?php echo $postid; ?>" class="unlike" style="<?php if($type == 0){ echo "color: #lightseagreen;"; } ?>" />&nbsp;(<span id="unlikes_<?php echo $postid; ?>"><?php echo $total_unlikes; ?></span>)
                </div>
                <?php
                }
                ?>
            </div>
            <?php
        }
        ?>
</div>
</body>
</html>