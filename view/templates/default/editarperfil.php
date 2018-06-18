<?php if($data['userinfo']):?>
<style>
@import url('https://fonts.googleapis.com/css?family=Do+Hyeon');
</style>
<div class="card">
    <div class="card-header bg-dark text-white">
        <div class="card-title text-center"><h1 style="font-family: 'Do Hyeon', sans-serif;">Editar Conta</h1></div>
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
                <label for="emailInput">Mudar email</label>
                <input class="form-control" type="email" id="emailInput" name="email" aria-describedby="emailHelp"
                       placeholder="<?php echo $data['userinfo']->Email?>">
                <small id="emailHelp" class="form-text text-muted">Será usado somente para recuperação de senha</small>
            </div>
            <div class="form-group">
                <label for="birthdateInput">Mudar data de nascimento</label>
                <input class="form-control" id="birthdateInput" name="birthdate" type="date" 
                       value="<?php echo $data['userinfo']->Birthdate?>">
            </div>
            <!--<div class="form-group">
                <label for="userimgInput">Mudar foto de perfil</label>
                <input class="form-control-file" type="file" name="userimg" id="userimgInput" onchange='showImage(event)' aria-describedby="userimgHelp">
                <small id="userimgHelp" class="form-text text-muted">Só imagens em formato .jpg, .png ou .gif</small>
                <input type="hidden" name="x" id="x">
                <input type="hidden" name="y" id="y">
                <input type="hidden" name="x2" id="x2">
                <input type="hidden" name="y2" id="y2">
                <input type="hidden" name="w" id="w">
                <input type="hidden" name="h" id="h">
                <input type="hidden" name="bw" id="bw">
                <input type="hidden" name="bh" id="bh">
                <img id="uploadedImage" src="#" class="img-fluid" style="display:none; max-height: 800px;">
            </div> -->
            
            <input type="submit" class="btn btn-primary" name="update" value="Aplicar mudanças">
        </form>
    </div>
</div>

<?php endif;?>
