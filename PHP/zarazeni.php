<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/zarazeni.css">
    <title>SZO- Dodaj osobu</title>
</head>
<body>
<?php
if(isset($_COOKIE['notice'])){
    echo "<div class='notice'>".$_COOKIE['notice']."</div>";
setcookie("notice","",time()-1000);
}
?>
<div class="image-container">
    <img src="../IMAGE/logo.png">
</div>
<div class="form-container">
    <div class="form-wrapper">
    <?php
    include "form-zarazeni.php"
    ?>
    </div>
</div>
<script src="../JS/form-validate.js"></script>
</body>
</html>