<h2>Teams Standings (Derby: <?php if($derbie) echo $derbie->name;?>)</h2>
<table>
    <tr>
        <td valign="top">
            <table class="score_table">
                <tr><th>Team</th><th>Score</th></tr>
                <?php foreach ($teams as $team) {?>
                    <tr>
                        <td>
                            <a href="<?=ROOTPATH?>/derby/team/<?=$team->id?>"><?=$team->name?></a>
                        </td>
                        <td>
                            <?php if(isset($team->score_sum)) echo $team->score_sum; else echo "0"; ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </td>
        <td style="padding-left:100px">
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/1s_xtreme.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/2s_fish sniffer.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/3s_per_o.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/4s_2013delta.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/5s_artscustomsliders.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/6s_pro-gear-reels.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/7s_phenixlogo.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/8s_pro-cure.png" width="300" /><br /><br />
            <img src="<?=ROOTPATH?>/assets/images/Sponsors/9s_xtreme.png" width="300" /><br /><br />
        </td>
    </tr>
</table>