<h5 class="border-bottom">Anexos</h5>
<?php
    $path = "../anexos/";
    $diretorio = dir($path);
    $diretorio -> read();
    $diretorio -> read();
    $v = 0;
    while($arquivo = $diretorio -> read()){
        if(fnmatch($_GET['id'] . "_*", $arquivo)) {?>
            <a href="<?php echo $path.$arquivo ?> " target="_blank"><?php echo $arquivo ?></a><br />
        <?php
        $v = 1;
        }
    }
    if(!$v) {
        echo 'Não existem anexos nesse caso!';
    }
    $diretorio -> close();
?>