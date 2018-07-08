<div class="container">
    <h2 class="text-center">Pesquisa de comics</h2>
    <form method="POST">
        <div class="input-group">
            <input type="text" class="form-control" value="<?php echo (isset($data['text'])) ? $data['text'] : "";?>" name="t" placeholder="Pesquisar...">
            <div class="input-group-append">
                  <button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
    <br>    
    <?php if(isset($data['comics'])):?>
        <?php if(!$data['comics']):?>
            <h3 class="text-muted">Nenhum comic achado</h3>
        <?php else: ?>
            <div class="row">
                <?php foreach($data['comics'] as $comic):?>
                <div class="col"> 
                    <div class="card card-comic">
                        <img class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $comic->ComicName;?></h5>
                            <p class="card-text"><?php echo "<pre>"; var_dump($comic); echo "</pre>";
                            echo $comic->Sinopsis;?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif;?>
    <?php endif;?>
    
</div>
