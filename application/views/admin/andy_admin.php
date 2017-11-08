<h2>Admin page (Derby: <?php if($derbie) echo $derbie->name;?>)</h2>

<a href="<?=ROOTPATH?><?=ADMINURLPATH?>">Home</a><br /><br />
<a href="<?=ROOTPATH?><?=ADMINURLPATH?>/edit/<?=$derby_id?>">New Team</a><br /><br />

<table class="score_table">
    <tr><td>Id</td><td>Team</td><td>Score</td><td>Password</td></tr>
	<?php foreach ($teams as $team) {?>
        <tr>
            <td>
                <?=$team->id?>
            </td>
            <td>
                <a href="<?=ROOTPATH?>/derby/team/<?=$team->id?>"><?=$team->name?></a>
            </td>
            <td>
                <?php if(isset($team->score_sum)) echo $team->score_sum; else echo "0";?>
            </td>
            <td>
                <?=$team->secret_string?>
            </td>
            <td>
                <a href="<?=ROOTPATH?><?=ADMINURLPATH?>/edit/<?=$team->derby_id?>/<?=$team->id?>">Edit</a>
            </td>
        </tr>
    <?php }?>
</table>