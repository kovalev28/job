<script type="text/javascript">
    document.getElementsByClassName('ru').flag = true;
</script>

<div id="contentBody">
    <table class="table_main">     
        <thead>
            <tr>
                <th width=60>ID</th>
                <th width=170>Name</th>
                <th width=170>Surname</th>
                <th width=300>Profession</th>
                <th width=100>Pay</th>
                <th width=100>bonus</th>
                <th width>Image</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Profession</th>
                <th>Pay</th>
                <th>bonus</th>
                <th>Image</th>
            </tr >  
        </tfoot>
        <?php
        foreach ($data as $row) {
            echo '
    <tbody>
        <tr>
            <th>' . $row["work_id"] . '</th>
            <th>' . $row["name"] . '</th>
            <th>' . $row["surname"] . '</th>
            <th>' . $row["name_prof"] . '</th>
            <th class="123">' . $row["payments"] . '</th>
            <th class="123">' . $row["bonus"] . '</th>
            <th><a  href="/images/sotr/full/' . $row["image"] . '" class="highslide" onclick="return hs.expand(this)"><img src="/images/sotr/' . $row["image"] . '" class="hsdot" /></a></th>
        </tr>  
    </tbody>
              ';
        }
        ?>
    </table>
</div>

<!-- Модальное окно - Выбор даты -->
<div id="win" class="winm" style="display:none;">
    <form name="form">
        <div class="overlay"></div>
        <div class="visible">
            <h3>Выбор даты</h3>
            <div class="content">
                <table border="1" align="center">
                    <tr>
                        <td colspan="4"><center><? dateFilter(); ?></center></td>
                    </tr>
                    <tr>   
                        <td><label class="lab_check"><input type="radio" name="calendar" value="01" id="1"><span1></span1></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="02" id="2"><span2></span2></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="03" id="3"><span3></span3></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="04" id="4"><span4></span4></label></td>
                    </tr>
                    <tr>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="05" id="5"><span5></span5></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="06"><span6></span6></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="07"><span7></span7></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="08"><span8></span8></label></td>
                    </tr>
                    <tr>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="09"><span9></span9></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="10"><span10></span10></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="11"><span11></span11></label></td>
                        <td><label class="lab_check"><input type="radio" name="calendar" value="12"><span12></span12></label></td>
                    </tr>
                </table>
            </div>
            <button type="button" onClick="getElementById('win').style.display = 'none';">Закрыть</button>
            <button type="button" onClick="showContent('/main/pay'); getElementById('win').style.display = 'none';">Выбрать</button>
        </div>
    </form>
</div>  

<!-- Модальное окно - Выдача премии -->
<div id="win2" class="winm" style="display:none;">
    <form name="form">
        <div class="overlay"></div>
        <div class="visible">
            <h3>Выдача премии</h3>
            <div class="content">
                <table align="center">
                    <tr>
                        <td>Выберите профессию</td>
                        <td><select name="prof" id="prof">
                                <optgroup label="Профессия">
                                    <option value="бухгалтер">бухгалтер</option>
                                    <option value="курьер">курьер</option>
                                    <option value="менеджер">менеджер</option>
                                </optgroup>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Введите размер премии </td>
                        <td> <input type="number" maxlength="15" size="20" name="bonussum" id="bonussum" require></td>
                    </tr>
                </table>
            </div>
            <button type="button" onClick="getElementById('win2').style.display = 'none';">Закрыть</button>
            <button type="button" onClick="addBonus('/main/bonus'); getElementById('win2').style.display = 'none';">Выбрать</button>
        </div>
    </form>
</div>  

<!-- Модальное окно - Добавление нового сотрудника -->
<div id="win3" class="winm" style="display:none;">
    <form name="form">
        <div class="overlay"></div>
        <div class="visible">
            <h3>Добавление сотрудника</h3>
            <div class="content">
                <table align="center">
                    <tr>
                        <td>Введите имя</td>
                        <td><input type="text" maxlength="25" size="20" name="namesot" id="namesot"></td>
                    </tr>
                    <tr>
                        <td>Введите фамилию</td>
                        <td><input type="text" maxlength="25" size="20" name="surnamesot" id="surnamesot"></td>
                    </tr>
                    <tr>
                        <td>Выберите профессию</td>
                        <td><select name="profsot" id="profsot">
                                <optgroup label="Профессия">
                                    <option value="1">бухгалтер</option>
                                    <option value="2">курьер</option>
                                    <option value="3">менеджер</option>
                                </optgroup>
                            </select></td>
                    <tr>
                        <td>Введите зарплату</td>
                        <td><input type="number" maxlength="25" size="20" name="salsot" id="salsot"></td>
                    </tr>
                    <tr>
                        <td>Выберите фотографию</td>
                        <td><input type="file"  name="uploadfile" id="uploadfile"></td>
                    </tr>
                </table>
            </div>
            <button type="button" onClick="getElementById('win3').style.display = 'none';">Закрыть</button>
            <button type="button" onClick="addSot('/main/addsot'); getElementById('win3').style.display = 'none';">Выбрать</button>
        </div>
    </form>
</div>  


<?php

function dateFilter() {
    $minYear = "2000"; //максимальный в прошлом год.
    $maxYear = ""; // Максимальный год, если переменная пуста, то максимальный год будет текущим.
    //Формируем массив с годами
    $yearArr = array();
    for ($i = ($maxYear == '' ? date('Y') : $maxYear); $i >= $minYear; $i--) {
        $selected = $i == date('Y') ? 'selected' : ''; // Отмечаем текущий год добавляя атрибут selected
        $yearArr[] = array('val' => $i, 'name' => $i, 'selected' => $selected);
    }
    //Формируем HTML структуру
    $output = "<div id=\"dateFilter\"><select name=\"year\">";
    foreach ($yearArr as $year) {
        $output .= '<option value="' . $year['val'] . '" ' . $year['selected'] . '>' . $year['name'] . '</option>';
    }
    $output .= "</select>";
    $output .= "</div>";
    echo $output;
}
?>