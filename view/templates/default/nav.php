<nav class="navbar navbar-expand-lg navbar-black">
    <a class="navbar-brand" href="<?php echo $this->base_url; ?>">
        <img class="img-logo" src="<?php echo $this->asset; ?>img/logo.png">
    </a>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto right-content">
            <?php if(!isset($_SESSION['user'])):?>
            <li class="nav-item">
                <a style="color: #999999;" role="button" data-toggle="modal" data-target="#loginModal" class="text-right">
                    <div class="btn-menu-top">
                       <i class="fa fa-sign-in"></i>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a style="color: #999999;" href="<?php echo $this->base_url; ?>User/register" title="Registrar-se" class="text-right">
                    <div class="btn-menu-top">
                        <i class="fa fa-user-plus"></i>
                    </div>
                </a>
            </li>
            &nbsp;
            <?php endif;?>
            <li class="nav-item dropdown">
                <div class="btn-menu-top">
                <a class="nav-link dropdown-toggle"  style="color: #999999;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>
                </a>
                </div>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                </div>
            </li>
            <form class="form-inline">
                <div class="input-group">
                <input class="form-control" type="search" placeholder="Pesquisar Comics" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-secondary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                </div>
                </div>
                
            </form>
        </ul>
    </div>
</nav>
<div id="wrapper" <?php if(isset($_SESSION['user'])):?>class="toggled"<?php endif;?> >
         <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <br>
            <?php if(isset($_SESSION['user'])):?>
                <li>
                  <a href="<?php echo $this->base_url; ?>User/profile">
                    <div id="div-img-user">
                        <img class="img-fluid" id="img-user" src="<?php echo $this->base_url."userContent/".$_SESSION['user']['ID']."/".$_SESSION['user']['Userimg'];?>" alt="Foto de <?php echo $_SESSION['user']['Username']; ?>" title="Meu Perfil">
                    </div>
                  </a>
                </li>
                <li>
                    <div class="btn-menu" title="Minhas Comics"><a href="minhascomics.html"><i class="fa fa-address-book"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Listas de Leitura"><a href="comicsfavoritas.html"><i class="fa fa-bookmark"></i></a></div>
                </li>
                <li>
                    <div class="btn-menu">
                        <a href="<?php echo $this->base_url;?>user/logout">
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