<?php if($team_id > 0){?>
<h2>Edit Team <?=$team_id?></h2>
<?php } else { ?>
<h2>New Team</h2>
<?php } ?>
<table class="score_table">
    <tr>
        <td>Team</td>
        <td><input type="text" width="250" name="TeamName" id="TeamName" value="<?php if($team) echo $team->name;?>" /></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="text" width="250" name="Password" id="Password" value="<?php if($team) echo $team->secret_string;?>" /></td>
    </tr>
    <tr>
        <td><a href="<?=ROOTPATH?><?=ADMINURLPATH?>/andyadmin/<?=$derby_id?>">Cancel</a></td>
        <td>
			<input type="button" value="Save" id="btnSubmit" />
			<input type="button" value="Delete" id="btnDelete" />
		</td>
    </tr>
</table>
<form id="frm_list" name="frm_list" method="post" action="<?=ROOTPATH?><?=ADMINURLPATH?>/andyadmin/<?=$derby_id?>"></form>
<script type="text/javascript">
    $(function() {
        $("#btnSubmit").click(function() {
            $.post(
				"<?=ROOTPATH?><?=ADMINURLPATH?>/save_team/<?=$derby_id?>/<?=$team_id?>",
				{
					"team_name": $("#TeamName").prop("value"),
					"secret": $("#Password").prop("value")
				},
				function(data) {
					$("#frm_list").submit();
				});
        });
        $("#btnDelete").click(function() {
            $.post("<?=ROOTPATH?><?=ADMINURLPATH?>/remove_team/<?=$derby_id?>/<?=$team_id?>",
			{},
			function(data) {
                $("#frm_list").submit();
            });
        });
    });
</script>