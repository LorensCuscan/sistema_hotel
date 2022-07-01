<?= view('components/header'); ?>

<!-- Conteudo do site -->

<div class="container-fluid">
    <div class="row justify-content-center ">
        <div class="col-10 col-sm-8 col-md-6 col-lg-4  bg-dark p-5 rounded mt-5">
            <h1 class="text-center text-light mb-5">Login</h1>

            <div class="form-group">
                <label class="text-light" style="padding-right:5.2px">Email: </label>
                <input type="text" class="w-75"/>
            </div>

            <div class="form-group mt-2">
                <label class="text-light">Senha: </label>
                <input type="password" class="w-75"/>
            </div>

            <div class="justify-content-center text-center mt-2">
                <button type="button" class="btn btn-light w-75  my-2">Login</button>
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

<?= view('components/footer'); ?>