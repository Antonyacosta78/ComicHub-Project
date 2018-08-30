<!-- Heading Row -->
      <div class="row my-4">
        <div class="col-lg-4">
          <img class="img-fluid rounded" src="http://placehold.it/300x400" alt="">
        </div>
        <!-- /.col-lg-8 -->
        <div class="col-lg-8">
          <h1>Em destaque!</h1>
          <div class="row"><div class="col-10"><h2><?php echo $data['comics']['header']->ComicName?></h2></div><div class="col-2"><div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;4.7</div> </div></div>
          <p>Niki é uma estudante japonesa de 15 anos e descobre um misterioso aparelho que pode fazer com que ela tenha sua própria realidade
		  virtual, embora ela não tenha permissões para alterar esse mundo. Será que ela vai conseguir enfrentar o grande vilão que ameaça
		  destruir tudo que ela criou?</p>

           <p>Um grande sucesso no Japão, escrito por Yamato Jigunasa, agora traduzido totalmente para o português brasileiro.</p>
          <a class="btn btn-outline-primary btn-lg" href="<?php echo $this->base_url?>comics/viewcomic">Ver Más</a>
        </div>
        <!-- /.col-md-4 -->
      </div>
      <!-- /.row -->
	<div class="row"><br/><br/><h2>Comics novas:</h2></div>
      <!-- Content Row -->
      <div class="row">
        <?php foreach($data['comics']['content'] as $comic):?>
          <div class="col-md-3 mb-3">
          <div class="card">
          <a href="<?php echo $this->base_url?>comics/viewcomic">
                <img class="card-img-top" src="http://placehold.it/250x350" alt="Card image cap">
            </a>
            <div class="card-body">
              <h2 class="card-title text-center"><?php echo substr($comic->ComicName, 0, 20) ?></h2>
              <div class="rating-box"><i class="fa fa-star"></i>&nbsp;&nbsp;4.7</div> 
              <p class="card-text"><?php echo substr($comic->Sinopsis, 0, 30) ?></p>
            </div>
            <div class="card-footer">
              <a href="<?php echo $this->base_url?>comics/viewcomic" class="btn btn-primary btn-block">Leer</a>
            </div>
          </div>
        </div>
        <?php endforeach;?>
        
          
          
          
          
          
          
        
        
      </div>
      <!-- /.row -->