<div class="page-sidebar ">
<?php $url = $_SERVER['PHP_SELF']; $end = end(explode('/', rtrim($url, 'php'))); ?>
<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="<?php echo $base_url; ?>dashboard" class="waves-effect <?php if($end=="dashboard."){ echo 'active';}?>">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-airplay"></i></div>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-circle-layer"></i></div>
                        <span>Release</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?php if($end=="create-release."){ echo 'mm-active';}?>"><a href="create-release" >Create Single Release</a></li>
                        <li class="<?php if($end=="edit-release."){ echo 'mm-active';}?>"><a href="edit-release">Edit Single Release</a></li>
                        <li class="<?php if($end=="create-release-multiple."){ echo 'mm-active';}?>"><a href="create-release-multiple" >Create Release Multiple</a></li>
                        <li class="<?php if($end=="edit-release-multiple."){ echo 'mm-active';}?>"><a href="edit-release-multiple" >Edit Release Multiple</a></li>
                        <li class="<?php if($end=="view-release."){ echo 'mm-active';}?>"><a href="view-release">View Release</a></li>
                    </ul>
                </li>
                <?php if($_SESSION["role"]=="admin"||$_SESSION["role"]=="superadmin"){?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-circle-layer"></i></div>
                        <span>Manage Release</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?php if($end=="edit-manage-release."){ echo 'mm-active';}?>"><a href="edit-manage-release">Edit Release</a></li>
                        <li class="<?php if($end=="view-manage-release."){ echo 'mm-active';}?>"><a href="view-manage-release">View Release</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <div class="d-inline-block icons-sm mr-1"><i class="uim uim-lock"></i></div>
                        <span>User Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li class="<?php if($end=="view-add-edit-user."){ echo 'mm-active';}?>"><a class="<?php if($end=="view-add-edit-user."){ echo 'active';}?>" href="<?php echo $base_url; ?>view-add-edit-user" >Add Edit View User</a></li>
                        <li class="<?php if($end=="delete-user."){ echo 'mm-active';}?>"><a class="<?php if($end=="delete-user."){ echo 'active';}?>" href="<?php echo $base_url; ?>delete-user" >Delete User</a></li>
                    </ul>
                </li> 

                <?php }?>
                
            </ul>
        </div>
    </div>
</div>