<?php
include_once "models/User.php";


var_dump(validate_type("s.paramonov@rsit.ru", "email"));


//var_dump(validate_min('qwe', 4)); exit;


//    if (isset($_POST) && count($_POST) > 0) {
//        $validate = validate($_POST);
//
//        if ($validate['is_success'] === false) {
//            include_once "components/error.php";
//            outputError($validate['error']);
//        }
//
//        outputUser($_POST);
//    }

?>
<body>
<h2>Создание пользователя</h2>
<form action="" method="post">

    <div>
        <label for="first_name">
            Имя
            <input type="text" name="first_name">
        </label>
    </div>

    <div>
        <label for="email">
            E-mail
            <input type="email" name="email">
        </label>
    </div>

    <div>
        <label for="password">
            Пароль
            <input type="password" name="password">
        </label>
    </div>

    <div>
        <button type="submit">
            Создать
        </button>
    </div>

</form>

</body>