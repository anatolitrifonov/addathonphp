<h2>Index Hello</h2>
<?php for ($i = 0; $i < count($derbies); $i++){?>
    <a href="<?=ROOTPATH?>/derby/sturgeon/<?=$derbies[$i]->id?>"><?=$derbies[$i]->name?></a><br /><br />
<?php }?>

