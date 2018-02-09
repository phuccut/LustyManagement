<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
var $LoaiGiaoDich;
$(document).ready(function () {
    demo.initMaterialWizard();
    setTimeout(function() {
        $('.card.wizard-card').addClass('active');
    }, 600);
    // selectobject = document.getElementById("Khac");
    // selectobject.disabled = true;
});

function InitLGD()
{
	var radios = document.getElementsByName('RadioButton');
	for (var i = 0, length = radios.length; i < length; i++)
	{
		if (radios[i].checked)
 		{
		  if (radios[i].value == 'Khac')
		  	$LoaiGiaoDich = $('#Khac').val();
		  else $LoaiGiaoDich = radios[i].value;
  		  break;
  		}
	}
}

// function InitKhac()
// {
// 	var selectobject;
//     selectobject = document.getElementById("Khac");
//     selectobject.disabled = false;
// }
</script>