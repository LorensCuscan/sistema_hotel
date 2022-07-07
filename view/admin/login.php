<?= view('components/header'); ?>

<!-- Conteudo do site -->

<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4  bg-dark p-5 rounded mt-5">
            <h1 class="text-center text-light">Login</h1>
            <p class="text-center text-light mb-4">Sistema de gerenciamento</p>

            <div class="form-group">
                <label class="text-light" style="padding-right:5.2px">Email: </label>
                <input id="email" type="text" class="w-75"/>
            </div>

            <div class="form-group mt-2">
                <label class="text-light">Senha: </label>
                <input id="password" type="password" class="w-75"/>
            </div>

            <div class="justify-content-center text-center mt-2">
                <button id="login" type="button" class="btn btn-light w-100  my-2">Login</button>
            </div>

            <div class="row">
                <div class="col-8 mt-3 text-light">
                    <a>Esqueceu a senha?</a>
                </div>
                
                <div class="col-4 mt-3 text-light">
                    <a>Criar conta</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#login').on('click', function(){
        var email = $('#email').val()
        var password = $('#password').val()
        $.ajax({
            url: "login", 
            dataType: "json",
            type: "POST",
            data: {
                email: email,
                password: password
            },
            success: function (res){
                if(res == 'success'){
                    return window.location.href = "admin";
                }
                console.log(res)
                alert(res)
            }
        })
    })
</script>

<?= view('components/footer'); ?>
