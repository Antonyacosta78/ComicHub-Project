<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Adicionar Capítulo</h1></div>
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
                <label for="nomeInput">Nome do capítulo</label>
                <input class="form-control" type="text" name="name" id="nomeInput" aria-describedby="titleHelp">
                <small id="nomeHelp" class="form-text text-muted">dê um nome a esse capítulo</small>
            </div>
            <label for="portraitInput">Páginas</label><br>
                <input type="file" name="portrait" id="portraitInput" multiple="multiple">
            </div>
            <br>
            <br>
            <input type="submit" class="btn btn-primary" name="create" value="Enviar">
        </form>
    </div>
</div>
