<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Работа</title>

        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/win-modal.css">
        <link rel="stylesheet" type="text/css" href="css/calendar.css">

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,300" type="text/css">
        <script src="js/main.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <!--highslide-->
        <link rel="stylesheet" type="text/css" href="/css/highslide.css" />
        <script type="text/javascript" src="/js/highslide.js"></script>
        <script type="text/javascript">
            hs.graphicsDir = '/images/highslide/';
            hs.outlineType = null;
            hs.wrapperClassName = 'colored-border';
            hs.showCredits = false;
        </script>
        <!--highslide end-->

    </head>
    <body>
        <div id="wrapper">
            <header>
                <nav>
                    <ul class="top-menu">
                        <li><a href="/">HOME</a></li>
                    </ul>
                </nav>           
            </header>
            <aside>
                <nav>
                    <ul class="aside-menu">
                        <li><button onClick="getElementById('win').removeAttribute('style');document.getElementById(<?= date('m') ?>).setAttribute('checked', 'checked');" type="button">Выбор даты</button></li>
                        <li><button onClick="getElementById('win2').removeAttribute('style');" type="button">Выдать премию</button></li>
                        <li><button onClick="getElementById('win3').removeAttribute('style');" type="button">Добавить сотрудника</button></li>
                    </ul>
                </nav>
            </aside>
            <main>
                <nav>
                    <select>
                        <optgroup label="Валюта">
                            <option class="ru" name="ru" value="ru" onclick='sform(this,<?= $data2 ?>);'>RU</option>
                            <option class="usd" value="usd" onclick='sform(this,<?= $data2 ?>);'>USD</option>
                        </optgroup>
                    </select>
                </nav>
                <div role="main">
                    <?php include 'application/views/' . $puth . '/' . $contentView; ?>
                </div>           
            </main>
        </div>
    </body>
    <footer>

    </footer>
</html>

