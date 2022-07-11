<?= view('components/header'); ?>


<div class="form-group">
    <label>Nome do quarto</label>
    <input id="name" type="text" class="form control" name="nome">
</div>

<div class="form-group">
    <label>Preço</label>
    <input id="price"  type="text" class="form control" name="preço">
</div>

<div class="form-group">
    <label>Classe</label>
    <input id="classe" type="number" min="1" max="5" value="1" class="form control" name="classe">
</div>

<div class="form-group">
    <button id="cadastrar" class="btn btn-success"> Cadastrar </button>
</div>


<script>
    $('#cadastrar').on('click', function(){
        var name = $('#name').val()
        var price = $('#price').val()
        var classe = $('#classe').val()
        $.ajax({
            url: "/admin/rooms/store", 
            dataType: "json",
            type: "POST",
            data: {
                name: name,
                price: price,
                classe: classe
            },
            success: function (res){
                console.log(res)
                alert(res)
            }
        }
        )
    })
</script>




<?= view('components/footer'); ?>