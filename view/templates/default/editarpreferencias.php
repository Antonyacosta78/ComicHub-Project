

<?php if($data['userinfo']):?>
<style>
@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
</style>
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Editar Preferências</h1></div>
    </div>
    <div class="card-body">
        <?php if($data['error']):?>
        <div class="card error-msg">
            <div class="card-body text-center">
                <?php echo $data['error']; ?>
            </div>
        </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="searchInput">Mostar conteúdo adulto no feed</label><br>
                    <span>Sim <input type="radio" 
                    <?php if($data['userinfo']->NSFWOnFeed){echo "checked";}?>
                    value="1" name="feed"></span>
                    <span>Não <input type="radio" 
                    <?php if(!$data['userinfo']->NSFWOnFeed){echo "checked";}?>                 
                    value="0" name="feed"></span>
            </div>
            <div class="form-group">
                <label for="feedInput">Mostrar conteúdo adulto na pesquisa</label><br>
                    <span>Sim <input type="radio"
                    <?php if($data['userinfo']->NSFWOnSearch){echo "checked";}?>                 
                    value="1" name="search"></span>
                    <span>Não <input type="radio" 
                    <?php if(!$data['userinfo']->NSFWOnSearch){echo "checked";}?>                 
                    value="0" name="search"></span>
            </div>
            
            <input type="submit" class="btn btn-primary" name="update" value="Aplicar mudanças">
        </form>
    </div>
</div>

<?php endif;?>