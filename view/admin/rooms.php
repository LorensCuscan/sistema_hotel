<?= view('components/header'); ?>





<form method="post" action="" method="post">
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


<script>
    $('#cadastro').on('click', function(){
        var id = $('#id').val()
        var name = $('#name').val()
        var price = $( 'price').val()
        var class = $('class').val()
        $.ajax({
            url: "rooms", 
            dataType: "json",
            type: "POST",
            data: {
                id: id
                name: name
                price: price
                class: classe
            },
            success: function (res){
                if(res == 'success'){
                    return window.location.href = "rooms";
                    <?php  exibirAlerta("success"); ?>
                }
                console.log(res)
                alert(res)
            }
        }
        )
    })
    <section>
    <div>
        <button type="submit" class="btn btn-success"> cadastrar quarto </button>
</section> 
</script>


</form>


<?= view('components/footer'); ?>