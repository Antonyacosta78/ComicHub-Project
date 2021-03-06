
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Adicionar Comic</h1></div>
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
                <label for="nomeInput">Nome</label>
                <input class="form-control" type="text" name="name" id="nomeInput" aria-describedby="titleHelp">
                <small id="nomeHelp" class="form-text text-muted">O nome tem que ser único</small>
            </div>
            <div class="form-group">
                <label for="sinopsisInput">Sinopse</label><textarea name="sinopsis" id="sinopsisInput" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="genreInput">Género</label>
                <input type="text" name="genre" id="genreInput" aria-describedby="genreHelp" class="form-control">
                <small id="genreHelp" class="form-text text-muted">Separe os géneros com vírgula</small>
            </div>
            <div class="form-check">
                <input type="checkbox" name="nsfw" id="nsfwInput" class="form-check-input">
                <label class="form-check-label" value="1" for="nsfwInput">NSFW</label>
            </div>
            <br>
            <label for="portraitInput">Portada</label><br>
                <input type="file" name="portrait" onchange='showImage(event,25/35)' id="portraitInput">
            </div>
            <br>
            <input type="hidden" name="x" id="x">
            <input type="hidden" name="y" id="y">
            <input type="hidden" name="x2" id="x2">
            <input type="hidden" name="y2" id="y2">
            <input type="hidden" name="w" id="w">
            <input type="hidden" name="h" id="h">
            <input type="hidden" name="bw" id="bw">
            <input type="hidden" name="bh" id="bh">
            <img id="uploadedImage" src="#" class="img-fluid" style="display:none; max-height: 800px;">
            <br>
            <input type="submit" class="btn btn-primary" name="create" value="Enviar">
        </form>
    </div>
</div>