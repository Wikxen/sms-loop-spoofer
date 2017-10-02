
<!DOCTYPE html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="HandheldFriendly" content="True"/>
  <meta name="MobileOptimized" content="461"/>
  <meta name="language" content="swedish" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="SMS iP.1 Networks Gateway"/>
  <meta name="description" content="">
  <meta name="author" content="Hannes Kindströmmer">

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMS Når Långt - iP.1 Networks AB</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/latest/united/bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style media="screen">
  @font-face{
    font-family:vagSerifThin;
    src:url("http://www.ip1sms.com/assets/fonts/Linotype-VAGRoundedStd-Thin.otf");
  }
  body{
    background: url('background.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    font-family: vagSerifThin;
  }
  h1{
    font-size: 4em;
    margin-bottom: 150px;
    text-shadow: 3px 3px 3px #666;
  }
  </style>
</head>
<body>
  <h1 class="text-center text-muted">SMS Når Långt</h1>
  <div class="container">
    <main class="col-md-6 col-md-offset-3">
      <form class="form-horizontal" action="sendsms.php" method="post">
        <fieldset>
          <div class="form-group">
            <label for="recipeint"></label>
            <textarea
            required
            autofocus
            class="form-control"
            id="recipients"
            name="recipients"
            placeholder="Lista med telefonnummer formaterat på följande sätt...
4610-1606060
+12025550199
+12025550146"
            title="Mottagaren måste vara ett korrekt mobiltelefon-nummer och måste börja på '07' eller '+467'"
            rows="8"></textarea>
            <p class="help-block text-muted">Mottagare</p>
          </div>
          <div class="form-group">
            <label for=""></label>
            <textarea name="text" rows="8" cols="100" required maxlength="160" placeholder="Text meddelande" class="form-control"></textarea>
            <p class="help-block text-muted">Text meddelande</p>
          </div>
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-default" value="Skicka SMS"/>
          </div>
        </fieldset>
      </form>
    </main>
  </div>
  <footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </footer>
</body>
</html>
