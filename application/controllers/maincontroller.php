<?php

include_once 'application/core/database.php';

class maincontroller extends controller {

    function __construct() {
        $this->model = new mainmodel();
        $this->view = new view();
    }

    function actionindex() {
        $data = $this->model->pay_print(date('m'), date('Y'));
        $this->view->generate('index.php', 'template.php', 'main', $data, $this->kurs());
    }

    function actionpay() {
        if (($_POST['year'] && $_POST['calendar']) != NUll) {
            $data = $this->model->pay_print($_POST['calendar'], $_POST['year']);
            $this->view->generate('pay.php', NULL, 'main', $data, $this->kurs());
        }
    }

    function actionbonus() {
        if (date(m) + 1 > 12) {
            $datem = 1;
            $datey = date(Y) + 1;
        } else {
            $datem = date(m) + 1;
            $datey = date(Y);
        }
        $data = $this->model->bonus($datem, $datey, $_POST['prof'], $_POST['bonus']);
    }

    function actionaddsot() {

        $uploaddir = './images/sotr/full/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        copy($_FILES['file']['tmp_name'], $uploadfile);

        function images_size($tmp_name, $new_name, $resolution_width, $resolution_height, $max_size) {
            $image_size = filesize($tmp_name);
            $image_size = floor($image_size / '1048576');
            if ($image_size <= $max_size) {

                $params = getimagesize($tmp_name);
                if ($params['0'] > $resolution_width || $params['1'] > $resolution_height) {
                    switch ($params['2']) {
                        case 1: $old_img = imagecreatefromgif($tmp_name);
                            break;
                        case 2: $old_img = imagecreatefromjpeg($tmp_name);
                            break;
                        case 3: $old_img = imagecreatefrompng($tmp_name);
                            break;
                        case 6: $old_img = imagecreatefromwbmp($tmp_name);
                            break;
                    }

                    if ($params['0'] > $params['1']) {
                        $size = $params['0'];
                        $resolution = $resolution_width;
                    } else {
                        $size = $params['1'];
                        $resolution = $resolution_height;
                    }
                    $new_width = floor($params['0'] * $resolution / $size);
                    $new_height = floor($params['1'] * $resolution / $size);

                    $new_img = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresampled($new_img, $old_img, 0, 0, 0, 0, $new_width, $new_height, $params['0'], $params['1']);

                    switch ($params['2']) {
                        case 1: $type = '.gif';
                            break;
                        case 2: $type = '.jpg';
                            break;
                        case 3: $type = '.png';
                            break;
                        case 6: $type = '.bmp';
                            break;
                    }
                    $new_name = "$new_name$type";
                    switch ($type) {
                        case '.gif': imagegif($new_img, $new_name);
                            break;
                        case '.jpg': imagejpeg($new_img, $new_name, 100);
                            break;
                        case '.bmp': imagejpeg($new_img, $new_name, 100);
                            break;
                        case '.png': imagepng($new_img, $new_name);
                            break;
                    }
                    $message = true;
                    imagedestroy($old_img);
                } else {

                    switch ($params['2']) {
                        case 1: $type = '.gif';
                            break;
                        case 2: $type = '.jpg';
                            break;
                        case 3: $type = '.png';
                            break;
                        case 6: $type = '.bmp';
                            break;
                    }
                    $new_name = "$new_name$type";
                    copy($tmp_name, $new_name);
                    $message = true;
                }
            } else
                $errors = false;
            return($message);
            return($errors);
        }

        $info = pathinfo($_FILES['file']['name']);
        $filen = basename($_FILES['file']['name'], '.' . $info['extension']);

        $tmp_name = './images/sotr/full/' . $_FILES['file']['name'];
        $new_name = './images/sotr/' . $filen;
        $resolution_width = '60';
        $resolution_height = '60';
        $max_size = '10';
        $message = images_size($tmp_name, $new_name, $resolution_width, $resolution_height, $max_size);


        $data = $this->model->addsot($_POST['name'], $_POST['surname'], $_POST['prof'], $_POST['salary'], $_FILES['file']['name']);
        echo $data;
    }

    public function kurs() {
        // Формируем сегодняшнюю дату 
        $date = date("d/m/Y");
        // Формируем ссылку 
        $link = "http://www.cbr.ru/scripts/XML_daily.asp?date_req=$date";
        // Загружаем HTML-страницу 
        $fd = fopen($link, "r");
        $text = "";
        if (!$fd)
            echo "Запрашиваемая страница не найдена";
        else {
            // Чтение содержимого файла в переменную $text 
            while (!feof($fd))
                $text .= fgets($fd, 4096);
        }
        // Закрыть открытый файловый дескриптор 
        fclose($fd);

        $pattern = "#<Valute ID=\"([^\"]+)[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>[^>]+>([^<]+)[^>]+>[^>]+>([^<]+)#i";
        preg_match_all($pattern, $text, $out, PREG_SET_ORDER);
        $dollar = "";
        foreach ($out as $cur) {
            if ($cur[2] == 840)
                $dollar = str_replace(",", ".", $cur[4]);
        }
        return $dollar;
    }

}
