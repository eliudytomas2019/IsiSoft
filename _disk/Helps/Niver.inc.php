<?php

if(isset($_POST['t_sub']) && isset($_POST['t_desconto']) && isset($_POST['t_imposto']) && isset($_POST['t_geral'])):
    $t_sub = $_POST['t_sub'];
    $t_desconto = $_POST['t_desconto'];
    $t_imposto = $_POST['t_imposto'];
    $t_geral = $_POST['t_geral'];
    $t_retencao = $_POST['t_retencao'];
endif;
?>


<label>Total Ilíquido: <span><?= str_replace(",", ".", number_format($t_sub, 2)); ?> Kz</span></label>
<label>Total Descontos: <span><?= str_replace(",", ".",number_format($t_desconto, 2)); ?> Kz</span></label>
<label>Total IVA: <span><?= str_replace(",", ".",number_format($t_imposto, 2)); ?> Kz</span></label>
<label>Retenção na Fonte: <span><?= str_replace(",", ".",number_format($t_retencao, 2)); ?> Kz</span></label>

<label style="font-weight: bold!important;text-transform: uppercase!important;">Total Geral: <span><?php echo str_replace(",", ".",number_format($t_geral, 2)); if(DBKwanzar::CheckConfig($id_db_settings) != false) echo " ".DBKwanzar::CheckConfig($id_db_settings)['moeda']; ?> Kz<input type="hidden" value="<?= $t_geral?>" id="totalGeral"></span></label>