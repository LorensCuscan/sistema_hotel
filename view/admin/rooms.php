<?= view('components/header'); ?>



<form action="Cadastrar" method="post">
    <form>
        <div class="form-group">
            <label>Nome do quarto</label>
            <input type="text" class="form control" name="nome">
        </div>

<div class="form-group">
    <label>Preço</label>
    <input type="text" class="form control" name="preço">
</div>

<div class="form-group">
    <label>Classe</label>
    <input type="number" min="1" max="5" value="1" class="form control" name="classe">
</div>

<section>
    <a href="rooms/create.php">
        <button id="cadastrar" class="btn btn-success"> Cadastrar </button>
    </a>
</section>




<?= view('components/footer'); ?>