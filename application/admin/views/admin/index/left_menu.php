<?php if($level<3):?>

<?php foreach($list as $row):?>

<?php if($admin_user['type']==1||in_array($row['id'],$menus)):?>

        <?php if($level==2):?>
<ul class="nav nav-third-level">
    <?php endif;?>
        <li> <a class="<?php echo $row['url']?'J_menuItem':'';?>" href="<?php echo $row['url']?site_url($row['url']):'#';?>"><?php echo $row['title'];?> <?php if($row['m2id']&&$level<2):?><span class="fa arrow ff"></span><?php endif;?></a>

            <?php echo action('admin/index/left_menu',array($row['id'],$level+1));?>
        </li>

    <?php if($level==2):?>
            </ul>
<?php endif;?>
<?php endif;?>
        <?php endforeach;?>
        <?php endif;?>
