<?= view('components/header'); ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active ">
      <img src="https://assets.hyatt.com/content/dam/hyatt/hyattdam/images/2018/10/19/1052/Grand-Hyatt-Sao-Paulo-P843-Grand-Twin-Bed-Room.jpg/Grand-Hyatt-Sao-Paulo-P843-Grand-Twin-Bed-Room.16x9.jpg?imwidth=1280" style="width:100vw; max-height:90vh;" class="d-block mh-75 h-75" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Quartos Simples...</h5>
        <p>Pensados em cada detalhe pra voce!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://www.oitihotel.com.br/wp-content/uploads/2021/10/04.jpeg" style="width:100vw; max-height:90vh;" class="d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Um Hotel com Spa</h5>
        <p>Para tornar a sua experiencia única.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://pizarromoveis.com.br/wp-content/uploads/2019/08/quartos-de-hotel-feitos-com-moveis-planejados-1280x720.png"  style="width:100vw; max-height:90vh;" class=" d-block" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Bem pertinho</h5>
        <p>o hotel Atrium fica há apenas 5 minutos da praia.</p>
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


<section>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-dark text-center fst-italic my-3">
            <h1>Tranquilidade, elegância e conforto</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-4">
          <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>

    </section>

<?= view('components/footer'); ?>



