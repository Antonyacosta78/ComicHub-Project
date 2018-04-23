<div id="logo" class="navbar navbar-expand-lg navbar-black">      
    <a href="<?php echo $this->base_url; ?>"><img class="img-logo" src="<?php echo $this->asset; ?>img/logo.png" style="max-height: 50px;"></a>
 </div>
<div id="wrapper" class="toggled">
         <!-- Sidebar -->
         
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br>
                <?php if(isset($_SESSION['user'])):?>
                <a href="perfil.html"><div id="div-img-user"><img class="img-fluid" id="img-user" src="view/images/<?php echo $_SESSION['user']['Userimg'];?>" alt="Foto de <?php echo $_SESSION['user']['Username']; ?>" 
					title="Meu Perfil"></div></a>
                <br>
                <?php endif;?>
                <li>
                    <div class="btn-menu" title="Pesquisar Comics"><a href="pesquisacomics.html"><i class="fas fa-search"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Minhas Comics"><a href="minhascomics.html"><i class="fas fa-address-book"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Listas de Leitura"><a href="comicsfavoritas.html"><i class="fas fa-bookmark"></i></a></div>
                </li>
                <?php if(!isset($_SESSION['user'])):?>
                <li>
                    <div class="btn-menu" title="login"><a style="color: #999999;" role="button" data-toggle="modal" data-target="#loginModal"><i class="fas fa-sign-in"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Registrar-se"><a href="<?php echo $this->base_url; ?>Register"><i class="fas fa-user-plus"></i></a></div>
                </li>
                <?php endif;?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="main-content" class="container">
        <br>