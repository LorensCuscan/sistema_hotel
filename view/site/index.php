<?= view('components/header'); ?>

<br>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>


  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2014/09/21/1420/KOLKA-P030-Guchhi-Evening.jpg/KOLKA-P030-Guchhi-Evening.16x9.jpg?imwidth=1280" style="width:100vw; max-height:90vh;" alt="...">
      <div class="carousel-caption d-none d-md-block ">
      <article>
          <header>
            <h1>Venha comemorar conosco</h1>
            <p>Um salão de festas exclusivo para suas data mais especiais!</p>
      </article>
      </div>
  </div>
    <div class="carousel-item">
      <img src="https://blog.chatuba.com.br/wp-content/uploads/2019/07/2019-07-19-como-organizar-o-banheiro-1280x720.jpg" style="width:100vw; max-height:90vh;" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <article>
          <header>
            <h1>Para tornar a sua experiencia única.</h1>
            <p>Atenção a cada detalhe!</P>
          </article>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://cf.bstatic.com/images/hotel/max1280x900/276/276667969.jpg"  style="width:100vw; max-height:90vh;" class=" d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <article>
          <header>
            <h1>Todo charme e conforto que você merece</h1>
            <p>Confira!</P>
          </article>
      </div>
    </div>
  </div>
</div>
<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
</button>

<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="visually-hidden">Next</span>
</button>

<br>
<br>


<h6 style="color:#878787; padding:px; text-align:center; font-size:12px; line-height:12px; letter-spacing: 2px; font-weight:darker;" class="nd_options_second_font ">ATRIUM HOTEL</h6>

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="align-self-center">
      <div class="card h-25">
        <img src="https://hoteldom.com.br/wp-content/uploads/2021/08/Hero-01-1.jpg" class="card-img-top" alt="...">
        <div class="card-body mb-3">
          <h5 class="card-title fst-italic">Tranquilidade</h5>
          <p class="card-text fst-italic">Uma experiencia única</p>
        </div>
          <div class="card-footer">
        </div>
      </div>
    </div>

    <div class="col">
  <div class="card h-100">
    <img src="https://hoteldom.com.br/wp-content/uploads/2021/08/Hero-02.jpg" class="card-img-top" alt="...">
      <div class="card-body card text-bg-dark  mb-3">
        <h5 class="card-title fst-italic">O bistrô Atrium</h5>
          <p class="card-text fst-italic">Desfrute de todo sabor da nossa culinaria </p>
      </div>
        <div class="card-footer">
      </div>
    </div>
  </div>
  
  <div class="align-self-center">
    <div class="card h-25">
      <img src="https://hoteldom.com.br/wp-content/uploads/2021/08/hero-03.jpg" class="card-img-top" alt="...">
      <div class="card-body card text-bg-success mb-3">
        <h5 class="card-title fst-italic">Todo conforto</h5>
        <p class="card-text fst-italic">que voce precisar em qualquer lugar</p>
      </div>
      <div class="card-footer">
      </div>
    </div>
  </div>
</div>

<br>
<br>

<h6 style="color:#878787; padding:px; text-align:center; font-size:12px; line-height:12px; letter-spacing: 2px; font-weight:lighter;" class="nd_options_second_font ">ATRIUM HOTEL</h6>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button fst-italic" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Bistrô.
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Culinaria refinada.</strong> venha aproveitar todo sabor que nossa cozinha internacional tem para te oferecer.
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
       Spa.
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>Venha ter momentos tranquilos.</strong> Imagine um Spa completo e uma equipe preparada para te proporcionar a alta qualidade de momentos que voce merece!
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingThree">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
       Conforto.
      </button>
    </h2>
    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>O hotel Atrium conta com cada pedaço desenhado para a sua maior comodidade.</strong> Desde piscinas e hidromassagem até lareiras quentinhas para curtir bons momentos.
      </div>
    </div>
  </div>
</div>

<hr class="my-4">
<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 font-italic">Duvidas</h1>
          <p class="lead my-3">Perguntas frequentes</p>
          <p class="lead my-3">Trabalhe conosco</p>
          <p class="lead my-3">Localização</p>
        </div>
      </div>
            


<?= view('components/footer'); ?>



