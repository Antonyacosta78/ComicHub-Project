<?php if($data):?>
<script type="text/javascript">
$(document).ready(function(){
 $("#loginModal").modal("show");
 });
</script>
<?php endif;?>
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
       <form method="POST">
           <div class="modal-header">
                <h3 class="modal-title text-center">Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
           </div>
           <div class="modal-body">
               <?php if($data): ?>
               <div class="card error-msg">
                   <div class="card-body text-center">
                       <h4><?php echo $data->getMessage(); ?></h4>
                   </div>
               </div>
               <br>
               <?php endif; ?>
                <div class="form-group">
                  <input class="form-control" placeholder="Username" type="text" name="username" id="usernameInput">
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Senha" type="password" name="password" id="passwordInput">
                </div>
                <div class="form-group row">
                    <div class='col-4'>
                        <label for="captchaInput" class="text-center">Captcha</label>
                    </div>
                    <div class='col-8'>
                        <input type="hidden" name="n1" value="<?php $n1 = rand(1,20); echo $n1;?>">
                        <input type="hidden" name="n2" value="<?php $n2 = rand(1,20); echo $n2;?>">                        
                               
                        <input class="form-control" placeholder="<?php echo $n1." + ".$n2; ?>" type="number" name="captcha" id="captchaInput">
                    </div>
                </div>
                <div class="form-check">
                   <input class="form-check-input" type="checkbox" name="keepMeLogged">
                   <label class="form-check-label">Manter-me logado</label>
                </div>
               <a href="<?php echo $this->base_url; ?>user/RecoverPassword">Esquesceu a senha?</a>
           </div>  
           <div class="modal-footer">
                  <input class="btn btn-primary" type="submit" name="login" value="Logar">
           </div>
        </form>
        </div>
    </div>  
</div>