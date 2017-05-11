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