<div class="card bg-dark text-white">
    <div class="card-header">
        <h2 class="text-center">Recuperar Senha</h2>
    </div>
    <div class="card-body">
        <?php if($data): ?>
        <div class="card" style="color:black; margin-bottom:1em;">
            <div class="card-body text-center">
                <?php echo $data; ?>
            </div>
        </div>
        <?php endif;?>
        <form method="POST">
            <div class="form-group">
                <input type="email" class="form-control" placeholder="seu@email.com" name="email" id="emailInput">
            </div>
            <input type="submit" value="Enviar Email" name="recoverPassword" class="btn btn-primary btn-block">
        </form>
    </div>
</div>