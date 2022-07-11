<?php

namespace App\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $rooms = $this->router->route("painel.rooms");
        return view('admin/rooms', compact("rooms"));
    }

    public function Cadastrar()
    {
        $cadastrar = $this->router->route("rooms/create");
        return view('admin/rooms/create', compact("rooms/create"));
    }
}
?>


<script>
    include __FILE__ . "admin/rooms"
    $('#cadastrar').on('click', function(){
        var name = $('#name').val()
        var price = $('#price').val()
        var class = $('#class').val()
        $.ajax({
            url: "cadastro", 
            dataType: "json",
            type: "POST",
            data: {
                name: nome
                price: preço
                class: classe
            },
            success: function (res){
                if(res == 'success'){
                    return window.location.href = "admin/rooms";
                }
                console.log(res)
                alert(res)
            }
        }
        )
    })
</script>
