<table class="table table-responsive">
    <thead>
    <tr style="border-bottom: 1px solid #000!important;">
        <th>Descrição do Produto/Serviço</th>
        <th>Qtd</th>
        <th>Preço Uni.</th>
        <th>Desconto(%)</th>
        <th>Taxa(%)</th>
        <th>Total</th>
        <th>-</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $t_quantidade = 0;
    $t_desconto = 0;
    $t_value = 0;
    $t_sub = 0;
    $t_geral = 0;
    $t_imposto = 0;

    $t_retencao = 0;
    $total_service = 0;

    $t_total = 0;
    $t_incidencia = 0;
    $t_rows = 0;


    if(!isset($id_mesa)): $id_mesa = 0; endif;
    $suspenso = 0;

    $read = new Read();
    $read->ExeRead("sd_billing_tmp", "WHERE id_db_settings=:st AND session_id=:ses AND page_found=:ppY AND suspenso=:s ORDER BY id ASC", "st={$id_db_settings}&ses={$id_user}&ppY={$page_found}&s={$suspenso}");

    if($read->getResult()):
        foreach($read->getResult() as $key):
            extract($key);
            $t_rows += 1;
            $t_quantidade += $key['quantidade_tmp'];
            $value    = ($key['quantidade_tmp'] * $key['preco_tmp']);
            $imposto  = ($value * $key['taxa']) / 100;

            if($key['desconto_tmp'] >= 100):
                $desconto = $key['desconto_tmp'];
            else:
                $desconto = ($value * $key['desconto_tmp']) / 100;
            endif;

            $t_total += $value;

            $sub = ($value - $desconto) + $imposto;

            $t_imposto += $imposto;
            $t_desconto += $desconto;
            //$t_value += $value;
            $t_sub += $value;

            if($key['product_type'] == "S"):
                $total_service += $value;
            endif;
            ?>
            <tr style="font-size: 10pt!important;">
                <td style="max-width: 20%!important;"><?= $key['product_name']; ?></td>
                <td style="max-width: 10%!important;">
                    <input type="number" style="max-width: 100%!important;" value="<?= $key['quantidade_tmp']; ?>" min="<?= $key['quantidade_tmp']; ?>" class="form-control Qtds" data-file="<?= $key['id']; ?>" placeholder="Qtd">
                </td>
                <td style="max-width: 20%!important;">
                    <input type="number" style="max-width: 100%!important;" <?php if($level < 3): ?> disabled <?php endif; ?> value="<?= $key['preco_tmp']; ?>" min="<?= $key['preco_tmp']; ?>" class="form-control Pricings" data-file="<?= $key['id']; ?>" placeholder="Preço">
                </td>
                <td style="max-width: 10%!important;">
                    <input type="number" style="max-width: 100%!important;" <?php if($level < 3): ?> disabled <?php endif; ?> value="<?= $key['desconto_tmp']; ?>" min="<?= $key['desconto_tmp']; ?>" class="form-control Descs" data-file="<?= $key['id']; ?>" placeholder="Descs">
                </td>
                <td style="max-width: 10%!important;"><?= str_replace(",", ".",number_format($key['taxa'], 2)) ?>%</td>
                <td style="max-width: 10%!important;"><?= str_replace(",", ".",number_format($sub, 2)); ?></td>
                <td style="max-width: 10%!important;">
                    <a href="javascript:void()" onclick="RemovePS(<?= $key['id']; ?>)" class="btn btn-danger btn-sm">
                        Excluir
                    </a>
                </td>
            </tr>
        <?php
        endforeach;
    endif;

    if(DBKwanzar::CheckConfig($id_db_settings)['IncluirNaFactura'] == 2):
        $t_retencao = ($total_service * DBKwanzar::CheckConfig($id_db_settings)['RetencaoDeFonte']) / 100;
    else:
        $t_retencao = 0;
    endif;

    $t_geral = ($t_sub - ($t_desconto + $t_retencao)) + $t_imposto;
    ?>
    </tbody>
    <tfoot>
    <tr>
        <input type="hidden" id="t_total" name="t_total" value="<?= $t_total; ?>"/>
        <th colspan="5" style="text-align: right!important;"><strong>Total</strong></th>
        <th colspan="4">
            <strong><?= str_replace(",", ".", number_format($t_total, 2)); ?></strong><br/>
            <small><strong><?= $t_rows; ?></strong> itens; <strong><?= $t_quantidade; ?></strong> unidade(s).</small>
        </th>
    </tr>
    </tfoot>
</table>


<input type="hidden" id="t_sub" value="<?= $t_sub; ?>"/>
<input type="hidden" id="t_desconto" value="<?= $t_desconto; ?>"/>
<input type="hidden" id="t_imposto" value="<?= $t_imposto; ?>"/>
<input type="hidden" id="t_retencao" value="<?= $t_retencao; ?>">
<input type="hidden" id="t_geral" value="<?= $t_geral; ?>"/>