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
                <!-- gambiarra "temporal" -->
                <div class="btn-menu-top" style="color: #999999;" onclick="var a = document.getElementById('newsDropdownList'); if(a.style.display==''){a.style.display='block';}else if(a.style.display=='block'){a.style.display='';}" id="newsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-newspaper-o"></i>
                </div>
                <div class="dropdown-menu" id="newsDropdownList" aria-labelledby="newsDropdown">
                    <?php
                if($data['menu']):
                    foreach($data['menu'] as $item):?>
                    <a class="dropdown-item" title="<?php echo $item->title; ?>" href="<?php echo $this->base_url."Pages/load/".$item->url?>"><?php echo $item->title; ?></a>
                <?php endforeach;
                endif;
                ?>
                </div>
             </li>
             <form class="form-inline" method="POST" action="<?php echo $this->base_url; ?>Comics/search">
                <div class="input-group">
                <input class="form-control" type="search" placeholder="Pesquisar Comics" name="t" aria-label="Search">
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
                <br>
                <li>
                    <div class="btn-menu" title="Minhas Comics"><a href="<?php echo $this->base_url; ?>/Comics"><i class="fa fa-address-book"></i></a></div>
                </li>
                
                <li>
                    <div class="btn-menu" title="Listas de Leitura"><a href="Comics/favorite"><i class="fa fa-bookmark"></i></a></div>
                </li>
                <li>
                    <div class="btn-menu">
                        <a href="<?php echo $this->base_url;?>?logout=1">
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </div>
                </li>
                <?php endif;?>
                <br>
                <hr style="background-color: #999999; width: 80%; margin: 0 5px;">
                <br>
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="main-content" class="container">
        <br>