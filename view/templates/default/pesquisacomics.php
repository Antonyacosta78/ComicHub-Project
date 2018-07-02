<div class="container">
    <h2 class="text-center">Pesquisa de comics</h2>
    <form method="POST">
        <div class="form-group">
            <input type="text" value="<?php echo (isset($data['text'])) ? $data['text'] : "";?>" name="t" placeholder="Pesquisar...">
        </div>
    </form>
    <br>    
    <?php if(isset($data['comics'])):?>
        <?php if(!$data['comics']):?>
            <h3 class="text-muted">Nenhum comic achado</h3>
        <?php else: ?>
            <?php foreach($data['comics'] as $comic):?>
            <div class="card card-comic">
                <img class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $comic->ComicName;?></h5>
                    <p class="card-text"><?php echo $comic->Sinopsis;?></p>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif;?>
    <?php endif;?>
    
</div>
