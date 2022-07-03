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

<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
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
          <p class="card-text fst-italic">Desfrute de todo sabor </p>
      </div>
        <div class="card-footer">
      </div>
    </div>
  </div>
  
  <div class="col">
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
              
            


<?= view('components/footer'); ?>



