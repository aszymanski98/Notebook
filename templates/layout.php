<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notebook</title>
</head>

<body>
  <h1 class="header">
    My notes
  </h1>

  <ul>
    <li>
      <a href="/">Notes list</a>
    </li>

    <li>
      <a href="/?action=create">New note</a>
    </li>
  </ul>

  <div class="container">
    <?php include_once("pages/$page.php"); ?>
  </div>

  <footer>

  </footer>
</body>

</html>