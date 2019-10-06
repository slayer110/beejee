<html>
<head>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
          integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/scripts/style.css">
    <script type="text/javascript" src=" https://code.jquery.com/jquery-1.11.2.js "></script>
    <script type="text/javascript" src="public/scripts/form.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
</head>

<div class="header">
    <div style="float: left;width: 60%;text-align: right"><h1>Главная страница</h1></div>
    <div style="text-align: right"> <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') { ?>
            <p><a href="account/exit">Выход</a></p>
        <? } else { ?>
            <p><a href="account/login">Вход</a></p>
        <? } ?>
    </div>
</div>
<div class="content">
    <div style="float: left"><a href="#exampleModal" class="add-popup" data-toggle="modal">
            Создать новую задачу</a></div>

    <table class="table table-condensed" type="<?php echo $type ?>" field="<?php echo $field ?>">
        <thead>
        <tr>
            <th>Задача</th>
            <th>
                <div class="inscription">Email&nbsp</div>
                <div class="email">
                    <a href="/?field=email&type=ASC"><i class="fa fa-caret-up fa-lg" aria-hidden="true"></i></a>
                    <a href="/?field=email&type=DESC"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>
                </div>
            </th>
            <th>
                <div class="inscription">Имя пользователя&nbsp</div>
                <div class="name">
                    <a href="/?field=user&type=ASC"><i class="fa fa-caret-up fa-lg" aria-hidden="true"></i></a>
                    <a href="/?field=user&type=DESC"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>
                </div>
            </th>
            <th>
                <div class="inscription">Статус задачи&nbsp</div>
<!--                <div class="status">-->
<!--                    <a href="/?field=status&type=ASC"><i class="fa fa-caret-up fa-lg" aria-hidden="true"></i></a>-->
<!--                    <a href="/?field=status&type=DESC"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>-->
<!--                </div>-->
            </th>
            <th>
                <div class="inscription">Отредактировано&nbsp</div>
                <div class="edit">
                    <!--                    <a href="/?field=status&type=ASC"><i class="fa fa-caret-up fa-lg" aria-hidden="true"></i></a>-->
                    <!--                    <a href="/?field=status&type=DESC"><i class="fa fa-caret-down fa-lg" aria-hidden="true"></i></a>-->
                </div>
            </th>
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') { ?>
                <th>
                </th>
            <? } ?>

        </tr>
        </thead>
        <?php foreach ($tasks as $val) {
            ?>
            <tr>
                <td class="taskTd"><?php echo htmlspecialchars($val['task'], ENT_QUOTES); ?></td>
                <td class="emailTd"><?php echo $val['email']; ?></td>
                <td class="userTd"><?php echo $val['user']; ?></td>
                <td class="statusTd"><?php if ($val['status'] == 1) {
                        echo "Выполнено";
                    } else {
                        echo "Не выполнено";
                    } ?></td>
                <td class="statusTd"><?php if ($val['editionable'] == 1) {
                        echo "+";
                    } else {
                        echo "-";
                    } ?></td>
                <td class="testId" style="display: none"><input
                            value="<?php echo $val['id'] ?>"><?php echo $val['id'] ?></td>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == 'admin') { ?>
                    <td><a href="#exampleModal" class="edit-popup" data-toggle="modal"><i class="material-icons"
                                                                                          data-target="#exampleModalLive">
                                edit
                            </i></a></td>
                <? } ?>
            </tr>

        <?php } ?>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title title-popup" id="exampleModalLabel">Панель редактирования</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><label>Задача<br>
                            <input class="taskEdit" name="task" type="text"></label></p>
                    <p><label>Email<br>
                            <input class="emailEdit" name="email" type="email"></label></p>
                    <p><label>Имя пользователя<br>
                            <input class="nameEdit" name="name" type="text"></label></p>
                    <p><label>Статус<br>
                            <input class="statusEdit" type="checkbox" checked></label></p>
                    <p>
                        <input class="idEdit" type="hidden"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>

                    <button type="button" class="btn btn-primary">Сохранить изменения</button>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div style="text-align: center"><?php for ($i = 1; $i <= $countPages; $i++) {
            echo "<a href=/?field=" . $field . "&type=" . $type . "&page=" . $i . "> " . $i . " </a>";
        } ?>
    </div>
</div>
</body>
</html>
