<?= __('-Kind') ?>
<br>
<br>
<?php
    foreach ($loaibantin as $loaibantin) {
    	$url = $this->Url->build('/home/news/'.$loaibantin->id);
        echo '<a href="'.$url.'">'.$loaibantin->name.' ('.$loaibantin->count.')</a><br><br>';
    }
?>