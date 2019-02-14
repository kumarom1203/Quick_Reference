
<table border='1'>

<?php
$k=1;
foreach ($data as $key)
{
?>
<tr>
	<td><?php echo $k++; ?></td>
	<td><img width="200px" src="<?php echo $key->url; ?>"></td>
	<td>
		<a href="<?php echo base_url('Catapi/addfav/');?><?php echo $key->id; ?>"">Add To Favorite</a>
	</td>
</tr>
<?php
}
?>
</table>