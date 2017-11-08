<?php

    function __get_slot_score($scores, $__slot){

        for($i=0; $i<count($scores); $i++){
            if($scores[$i]->slot == $__slot)
                return $scores[$i]->score;
        }
        return 0;
    }

    function __get_total_score($scores){

        $__t_sum = 0;
        for($i=0; $i<count($scores); $i++){
            $__t_sum += $scores[$i]->score;
        }
        return $__t_sum;
    }

?>
<script type="text/javascript">
    $(function () {
        function reCalcScore(){
            __t_sum = 0;
            for(i=0; i<$(".Slot_Node").length/3; i++){
                cur_select_value = 0;
                for(j=0; j<3; j++)
                    if($(".Slot_Node").eq(3*i + j).prop("checked") == true)
                        cur_select_value = $(".Slot_Node").eq(3*i + j).prop("value");
                for(j=0; j<3; j++)
                    $(".Slot_Node").eq(3*i + j).attr("cur_value", cur_select_value);
                $(".Score_Node").eq(i).html(cur_select_value);
                __t_sum += 1 * cur_select_value;
            }
            $(".Total_Score_Node").html(__t_sum);
        }

        $(".btn_submit").click(function() {
            if ($(".secret_str").prop("value") == "") {
                $(".secret_str").focus();
                return false;
            }
            __t_str = "";
            for (i = 0; i < $(".Score_Node").length; i++) {
                __t_str += $(".Score_Node").eq(i).html() + ",";
            }
            $.post("<?=ROOTPATH?>/derby/save_score/<?=$team->id?>",
				{
					"score": __t_str,
					"secret": $(".secret_str").prop("value")
				},
				function(data) {
					$(".errMsg").html(data);
					if (data == "") {
						$("#frm_list").submit();
					}
				}
			);
        });

        $('input[name*="Slot"]').each(function() {
            if ($(this).attr("cur_value") == $(this).prop("value")) {
                $(this).prop('checked', true);
                $(this).data('waschecked', true);
            } else {
                $(this).prop('checked', false);
                $(this).data('waschecked', false);
            }
        });
        // bind all clicks
        $('input[name*="Slot"]').click(function () {
			
            var $radio = $(this);

            // if this was previously checked
            if ($radio.data('waschecked') == true) {
                $radio.prop('checked', false);
                $radio.data('waschecked', false);
            } else {
                $radio.data('waschecked', true);
            }

            // remove was checked from other radios
            $radio.siblings('input[name*="Slot"]').data('waschecked', false);

            reCalcScore();
        });
    });
</script>
<style>
    td {text-align: center;}
</style>
<h2>Team <?=$team->name?>!</h2>
<p class="smaller-text">Addathon Teams, this is your score card used to update your score and runs live, it will update main score page for all teams live.
All teams will get a link the night before to there own private score sheet with password.<br /><br />
Any questions message me Andy Doudna on facebook.<br />
AFTER YOU UPLOAD VIDEO TO FACEBOOK PAGE PER ADDATHON RULES ...<br />
1. Update your score sheet, select corresponding entry class of sturgeon per video uploaded.<br />
2. Enter password in password box and click "Submit".<br />
This will update your score, to see team standings. Visit the addathon page to see team scores.</p>
<span class="red errMsg"></span><br />
<form id="frm_list" name="frm_list" method="get" action="<?=ROOTPATH?>/derby/sturgeon/<?=$team->derby_id?>"></form>
<input type="hidden" name="TeamId" value="@Model.TeamId" />
<table class="score_table">
    <tr>
        <th>Entry</th>
        <th>Shaker</th>
        <th>Slot</th>
        <th>Oversize</th>
        <th>Score</th>
    </tr>
    <?php for ($i = 1; $i <= 50; $i++){?>
    <tr>
        <td>Entry # <?=$i?></td>
        <td>Shaker   <input name="Slot<?=$i?>" class="Slot_Node" type="radio" cur_value="<?=__get_slot_score($scores, $i)?>" value="3" /></td>
        <td>Slot     <input name="Slot<?=$i?>" class="Slot_Node" type="radio" cur_value="<?=__get_slot_score($scores, $i)?>" value="9" /></td>
        <td>Oversize <input name="Slot<?=$i?>" class="Slot_Node" type="radio" cur_value="<?=__get_slot_score($scores, $i)?>" value="5" /></td>
        <td class="Score_Node"><?=__get_slot_score($scores, $i)?></td>
    </tr>
    <?php }?>
    <tr>
        <td>Password</td>
        <td colspan="2"><input name="Password" type="password" class="secret_str" value="" /></td>
        <td>Total</td>
        <td class="Total_Score_Node"><?=__get_total_score($scores)?></td>
    </tr>
    <tr>
        <td colspan="5">
            <input type="button" class="btn_submit" value="Submit" />
        </td>
    </tr>
    <tr>
        <td colspan="5">
			<span class="red errMsg"></span><br />
        </td>
    </tr>
</table>
