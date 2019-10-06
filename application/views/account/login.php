<html>

<head>
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src=" https://code.jquery.com/jquery-1.11.2.js "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css"/>
    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/public/scripts/style.css"/>

<body>
<div class="container">
    <div class="row">

        <div class="col-md-offset-3 col-md-6">
            <form class="form-horizontal">
                <span class="heading">АВТОРИЗАЦИЯ</span>
                <div class="form-group">
                    <input type="text" class="form-control" name="login" id="inputLogin" placeholder="login" value="<?php echo $login ?>">
                    <i class="fa fa-user"></i>
                </div>
                <div class="form-group help">
                    <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password" value="<?php echo $pass ?>">
                    <i class="fa fa-lock"></i>
                </div>
                <p><?php echo $status ?></p>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">ВХОД</button>
                </div>
            </form>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->
<script src="/public/scripts/login.js"></script>
<body>
</html>
