<h2>Admin Page</h2>

<a href="<?=ROOTPATH?>/">Home</a><br /><br />

<?php for($i = 0; $i < count($derbies); $i++) { ?>
    <a href="<?=ROOTPATH?><?=ADMINURLPATH?>/andyadmin/<?=$derbies[$i]->id?>"><?=$derbies[$i]->name?></a> 
    <?php if($derbies[$i]->is_open == 0) { ?>
        <span>(OPEN)</span>
    <?php } else { ?>
        <span>(CLOSED)</span>
    <?php } ?>
    <br /><br />
<?php } ?>