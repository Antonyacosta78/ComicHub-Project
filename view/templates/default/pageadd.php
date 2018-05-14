<style>
@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
</style>
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Adicionar Página</h1></div>
    </div>
    <div class="card-body">
        <?php if($data):?>
        <div class="card error-msg">
            <div class="card-body text-center">
                <?php echo $data; ?>
            </div>
        </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <br/>
            <div class="form-group">
                <label for="titleInput">Título</label>
                <input class="form-control" type="text" name="title" id="titleInput" aria-describedby="titleHelp">
                <small id="titleHelp" class="form-text text-muted">O título tem que ser único</small>
            </div>
            <div class="form-group">
                <label for="iconInput">Ícone</label>
                <input class="form-control" id="iconInput" type="text" name="icon" aria-describedby="iconHelp"
                       placeholder="fa-accessible-icon">
                <small id="iconHelp" class="form-text text-muted">O ícone tem que vir do font-awesome, tira o s do fas</small>
            </div>

            <div class="form-group">
                <label for="contentInput">Conteúdo</label>
                <textarea class="form-control" id="contentInput" name="content" rows="15"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" name="create" value="Criar">
        </form>
    </div>
</div>