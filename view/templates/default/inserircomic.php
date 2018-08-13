<style>
@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
</style>
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Cadastrar comic</h1></div>
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
            <div class="form-group">
                <label for="titleInput">Título da comic</label>
                <input class="form-control" type="text" name="title" id="titleInput">
            </div>
            <div class="form-group">
                <label for="passwordInput">Sinopse</label>
                <textarea class="form-control" 
                          placeholder="Escreva uma breve descrição de sua história..."
                          id="sinopsisInput" name="sinopsis"></textarea>
            </div>

            <div class="form-group">
                <label for="genreInput">Gênero</label>
                <input class="form-control" id="genreInput" type="text" name="genre"
                       placeholder="Em qual gênero se encaixa sua história?">
            </div>
            <div class="form-group">
                <label for="emailInput">Counteúdo impróprio</label>
                <input type="checkbox" id="ageInput" name="age" aria-describedby="ageHelp">
                <small id="ageHelp" class="form-text text-muted">
                Essa comic contém conetúdo considerado inadequado para menores?</small>
            </div>
            <div class="form-group">
                <label for="imgInput">Adicione páginas e capítulos</label>
                <div id="comicStructure">
                    <input class="form-control" id="chapterInput-1" name="chapter1" type="text"
                       placeholder="Digite o nome do capítulo...">
                    <input class="form-control-file" type="file" name="img-0" id="imgInput-0" aria-describedby="imgHelp">
                </div>
                <br/>
                <button type="button" class="btn btn-primary" id="addChapter"><i class="fa fa-plus"></i>Adicionar capítulo</button>
                <button type="button" class="btn btn-primary" id="addPage"><i class="fa fa-plus"></i>Adicionar página</button> 
                <small id="imgHelp" class="form-text text-muted">Só imagens em formato .jpg, .png ou .gif</small>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="zueraInput">
                <label for="zueraInput">Não li e aceito os termos para a postagem de comics nesse site</label>
            </div>
            
            <input type="submit" class="btn btn-primary" name="register" value="Registrar">
        </form>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    var vez=0;
    var chapter=0;
     $('body').on('click','#addPage',function (){
        vez++;
        $('#comicStructure').append(
        "<input class='form-control-file' type='file' name='img-"+vez+
        "' id='imgInput-"+vez+"' aria-describedby='imgHelp'>");
});
     $('body').on('click','#addChapter',function (){
        chapter++;
        $('#comicStructure').append(
        "<input class='form-control' type='text' name='chapter-"+chapter+
        "' id='chapterInput-"+chapter+"' placeholder='Digite o nome do capítulo...'>");
});
});
</script>

