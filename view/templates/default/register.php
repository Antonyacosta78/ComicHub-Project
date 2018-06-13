<style>
@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
</style>
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Registrar-se</h1></div>
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
                <label for="usernameInput">Username</label>
                <input class="form-control" type="text" name="username" id="usernameInput" aria-describedby="usernameHelp">
                <small id="usernameHelp" class="form-text text-muted">O username tem que ser único</small>
            </div>
            <div class="form-group">
                <label for="passwordInput">Senha</label>
                <input class="form-control" id="passwordInput" type="password" name="password">
            </div>

            <div class="form-group">
                <label for="passwordRepeatInput">Repetir Senha</label>
                <input class="form-control" id="passwordRepeatInput" type="password" name="passwordRepeat">
            </div>
            <div class="form-group">
                <label for="emailInput">Email</label>
                <input class="form-control" type="email" id="emailInput" name="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Será usado somente para recuperação de senha</small>
            </div>
            <div class="form-group">
                <label for="birthdateInput">Data de Nascimento</label>
                <input class="form-control" id="birthdateInput" name="birthdate" type="date" placeholder="" >
            </div>
            <div class="form-group">
                <label for="userimgInput">Foto de perfil</label>
                <input class="form-control-file" type="file" name="userimg" id="userimgInput" onchange='showImage(event)' aria-describedby="userimgHelp">
                <small id="userimgHelp" class="form-text text-muted">Só imagens em formato .jpg, .png ou .gif</small>
                <input type="hidden" name="x" id="x">
                <input type="hidden" name="y" id="y">
                <input type="hidden" name="x2" id="x2">
                <input type="hidden" name="y2" id="y2">
                <input type="hidden" name="w" id="w">
                <input type="hidden" name="h" id="h">
                <img id="uploadedImage" src="#" class="img-fluid" style="display:none;">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="zueraInput">
                <label for="zueraInput">Não li e aceito os termos</label>
            </div>
            
            <input type="submit" class="btn btn-primary" name="register" value="Registrar">
        </form>
    </div>
</div>
