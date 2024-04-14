<h2 style="font-size: 7pt!important;">Resumo de Impostos</h2>
<table style="border: 1px solid #000!important;border-bottom: none!important;font-size: 7pt!important;">
    <thead style="font-size: 7pt!important;">
    <tr>
        <th style="border-right: 1px solid #000!important;">Descrição</th>
        <th style="border-right: 1px solid #000!important;">Taxa%</th>
        <th style="border-right: 1px solid #000!important;">Incidência</th>
        <th>Total Imposto</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($Array0002 as $Itachi):
        ?>
        <tr>
            <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;:nth-last-of-type(1)"><?= '<small style="color: #000">('.$Itachi['count'].') '.$Itachi["type"].'</small>'; ?></td>
            <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;:nth-last-of-type(1)"><?= str_replace(",", ".", number_format($Itachi['taxa'], 2)); ?></td>
            <td style="border-right: 1px solid #000!important;border-bottom: 1px solid #000!important;:nth-last-of-type(1)"><?= str_replace(",", ".", number_format($Itachi['valor'], 2)); ?></td>
            <td style="border-bottom: 1px solid #000!important;:nth-last-of-type(1)"><?= str_replace(",", ".", number_format($Itachi['iva'], 2)); ?></td>
        </tr>
    <?php
    endforeach;
    ?>
    </tbody>
</table>

<table style="font-size: 7pt!important;">
    <thead>
    <tr>
        <th>Regime de IVA</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><?= $k['config_regimeIVA']; ?></td>
    </tr>
    </tbody>
</table>