<?php
// auto-generated by sfPropelCrud
// date: 2009/08/28 12:12:29
?>
<?php use_helper('Object') ?>

<?php echo form_tag('category/delete') ?>

<?php echo input_hidden_tag('id', $id) ?>
<h1>Confirm Deleting Category -> '<?php echo $category->getCategoryName()?>' ??</h1>
<table>
<tbody>
<tr>
  <th width="50%">this category has total Sub Category:</th>
  <td><?php echo $hasChild; ?></td>
</tr>
<tr>
  <th>this category has total Files:</th>
  <td><?php echo $hasFiles; ?></td>
</tr>
</tr>
</tbody>
</table>
<hr />
<?php echo submit_tag('confirm delete') ?>
&nbsp;<?php echo link_to('Do not Delete', 'category/list') ?>
</form>
