<div id="logo" class="navbar navbar-black">
        <a href="<?php echo $this->base_url; ?>">
            <img class="img-logo" src="<?php echo $this->asset; ?>img/logo.png">
        </a>
        <span class="left-content">
        <?php if(isset($_SESSION['user'])):?>
        <a href="<?php echo $this->base_url; ?>user/userprofile">
            
            <div id="div-img-user">
                <img class="img-fluid" id="img-user" src="<?php echo $this->base_url."userContent/".$_SESSION['user']['Userimg'];?>" alt="Foto de <?php echo $_SESSION['user']['Username']; ?>" title="Meu Perfil">
            </div>
        </a>
        <?php endif;?>
        
        <?php if(!isset($_SESSION['user'])):?>
        <div class="btn-menu-top">
            <a style="color: #999999;" role="button" data-toggle="modal" data-target="#loginModal" class="text-right"><i class="fa fa-sign-in"></i></a>&nbsp;
        </div>
        <div class="btn-menu-top">
            <a style="color: #999999;" href="<?php echo $this->base_url; ?>Register" title="Registrar-se" class="text-right"><i class="fa fa-user-plus"></i></a>
        </div>
        <?php endif;?>
        </span>            
</div>
<div id="wrapper" class="toggled">
         <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br>
                <li>
                    <div class="btn-menu" title="Pesquisar Comics"><a href="<?php echo $this->base_url?>comics/searchcomics"><i class="fa fa-search"></i></a></div>
                </li>
                <?php if(isset($_SESSION['user'])):?>
                <li>
                    <div class="btn-menu" title="Minhas Comics"><a href="minhascomics.html"><i class="fa fa-address-book"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Listas de Leitura"><a href="comicsfavoritas.html"><i class="fa fa-bookmark"></i></a></div>
                </li>
                <li>
                    <div class="btn-menu">
                        <a href="<?php echo $this->base_url;?>Home/logout">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </div>
                </li>
                <?php endif;?>
                <br>
                <hr style="background-color: #999999; width: 80%; margin: 0 5px;">
                <br>
                <?php
                if($data['menu']):
                    foreach($data['menu'] as $item):?>
                <li>
                    <div class="btn-menu" title="<?php echo $item->title; ?>"><a href="<?php echo $this->base_url."Pages/load/".$item->url?>"><i class="fa <?php echo $item->icon; ?>"></i></a></div>
                </li>
                <?php endforeach;
                endif;
                ?>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="main-content" class="container">
        <br>