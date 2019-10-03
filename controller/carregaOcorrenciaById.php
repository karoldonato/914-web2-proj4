<?xml version="1.0" encoding="UTF-8"?>
<?php
header('Content-type: xml');
?>

<?php
    if($_GET['id'] != "" || array_key_exists('id', $_GET)) {
        require_once "../controller/OcorrenciaController.php";
        $o = (new OcorrenciaController())->buscarOcorrenciaPorId($_GET['id']);
        ?>
        <ocorrencia>
            <existe><?php echo $o != null ? 'true' : 'false'; ?></existe>
            <?php if($o != null) {?>
            <id><?php echo $o->getId();?></id>
            <descricao><?php echo $o->getDescricao();?></descricao>
            <horario><?php echo  $o->getHorario();?></horario>
            <tipo><?php echo $o->getTipo();?></tipo>
            <x><?php echo $o->getCordenadaX();?></x>
            <y><?php echo $o->getCordenadaY();?></y>
            <?php } ?>
        </ocorrencia>
        <?php
    }
?>