<?php foreach($list as $row):?>
<div class="form-group <?php echo $level==0?'firsts':'';?>">

    <div class="col-sm-10">
        <label class="checkbox-inline i-checks" onclick="checkclick('<?php echo $row['id'];?>cl',this);" >
            <?php $classd=str_replace(',','cl ',$row['org']);$classd=$classd.'cl';?>
           <div class="icheckbox_square-green <?php echo in_array($row['id'],$menulist)?'checked':''; ?>" style="position: relative;">
               <input <?php echo in_array($row['id'],$menulist)?'checked=checked':''; ?> name="menu[]" class="<?php echo $classd;?>" id="<?php echo $row['id'];?>cl"  type="checkbox" value="<?php echo $row['id'];?>" style="position: absolute; opacity: 0;">
               <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
           </div> <?php echo $row['title'];?></label>
        <?php echo action('admin/userrole/roletest',array($row['id'],$level+1));?>
    </div>
</div>

<?php endforeach;?>
