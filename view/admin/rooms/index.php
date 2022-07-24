<?= view('components/header'); 

include_once('RoomMigration');

?>




<!-- Conteudo do site -->



<p class="fw-bold">Cadastro e Reserva de sites</p>

<section>
    <a class="btn btn-success" href="rooms/create">Adicionar Quarto</a>
</section>

</br>



<p class="fw-bold">Listagem de quartos cadastrados</p>



<?php


$sql = ("SELECT * rooms ORDER BY class");

$resultado = $show->query($sql);

print_r($resultado);


?>


<?= view('components/footer'); ?>