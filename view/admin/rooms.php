<?= view('components/header'); ?>


<form method="post">


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
    <input type="text" class="form control" name="classe">
</div>

<section>
    <button type="submit" class="btn btn-success"> cadastrar quarto </button>
</section> 
</form>








    


<?= view('components/footer'); ?>