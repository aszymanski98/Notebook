<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notebook</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../public/style.css">
</head>

<body>
  <div class="wrapper">

    <h1><i class="far fa-clipboard"></i>My notes</h1>

    <div class="container">
      <ul>
        <li><a href="/">Main page</a></li>
        <li><a href="/?action=create">New note</a></li>
      </ul>

      <div class="page">
        <?php require_once("templates/pages/$page.php"); ?>
      </div>
    </div>
  </div>
</body>

</html>