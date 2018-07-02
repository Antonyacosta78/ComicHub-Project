<!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-4">
          <img class="img-fluid rounded" 
          src="<?php echo $this->base_url."userContent/".$data['userinfo']->ID."/".$data['userinfo']->Userimg?>" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-8">
            <h1><?php echo $data['userinfo']->Username?></h1>
            </div>
            <div class="col-lg-3">
                <button class="btn btn-primary btn-lg active">Ver todas comics</button>
            </div>
          </div>
            <h3>Email:<?php echo $data['userinfo']->Email?></h3>
            <h3>Data de nascimento:<?php echo $data['userinfo']->Birthdate?></h3>
            <?php if($_SESSION['user']['Username']==$data['userinfo']->Username):?>
            <a href="<?php echo $this->base_url."User/editprofile"?>" style="text-decoration:none">
                <button class="btn btn-success btn-lg active"><i class="fa fa-edit"></i>Editar perfil</button>
            </a> 
            <a href="<?php echo $this->base_url."User/editpreferences"?>" style="text-decoration:none">
                <button class="btn btn-success btn-lg active"><i class="fa fa-edit"></i>Editar Preferências</button>
            </a>
            <?php endif; ?>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
	<div class="row"><br/><br/><h3>Últimas comics por User123:</h3></div>
      <!-- Content Row -->
      <div class="row">
        <div class="col-md-3 mb-3">
          <div class="card">
          <a href="<?php echo $this->base_url?>comics/viewcomic">
                <img class="card-img-top" src="http://placehold.it/250x350" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title text-center">Batman: Origins</h2>
              <div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;4.7</div> 
              <p class="card-text">Conheça a história dos antepassados do grande herói morcego dos quadrinhos.</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $this->base_url?>comics/viewcomic" class="btn btn-primary btn-block">Leer</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-3 -->
        <div class="col-md-3 mb-3">
          <div class="card">
          <a href="<?php echo $this->base_url?>comics/viewcomic">
                <img class="card-img-top" src="http://placehold.it/250x350" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title text-center">Hanamura Tales</h2>
              <div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;4.3</div> 
              <p class="card-text">Uma grande promessa em termos de rpg online se torna um pesadelo para o jovem estudante Shiiro Ikarasu.</p></p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $this->base_url?>comics/viewcomic" class="btn btn-primary btn-block">Leer</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-3 -->
        <div class="col-md-3 mb-3">
          <div class="card">
          <a href="<?php echo $this->base_url?>comics/viewcomic">
                <img class="card-img-top" src="http://placehold.it/250x350" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title text-center">BATGIRL VOL. 3</h2>
              <div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;3.5</div> 
              <p class="card-text">Batgirl and Nightwing’s feelings for each other have always run deep...</p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $this->base_url?>comics/viewcomic" class="btn btn-primary btn-block">Leer</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-3 -->
        <div class="col-md-3 mb-3">
          <div class="card">
          <a href="<?php echo $this->base_url?>comics/viewcomic">
                <img class="card-img-top" src="http://placehold.it/250x350" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title text-center">A queda de Vader</h2>
              <div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;5.0</div> 
              <p class="card-text">Darth Vader acaba enfrentando a frota rebelde sozinho e tem seu TIE abatido, derrubando-o em um planeta próximo. </p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $this->base_url?>comics/viewcomic" class="btn btn-primary btn-block">Leer</a>
            </div>
          </div>
        </div>
        <!-- /.col-md-3 -->
        
      </div>
      <!-- /.row -->
     

