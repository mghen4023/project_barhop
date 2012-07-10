<center>

<h2>Create a <?php echo $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open($controller . '/create') ?>

	<table>
		<tr>
			<td>
				<label for="name">Name:</label> 
			</td>
			<td>
				<input type="input" name="name" /><br />	
			</td>
		</tr>
		<tr>
			<td>
				<label for="description">Description:</label>
			</td>
			<td>
				<input type="input" name="description" /><br />
			</td>
		</tr>
		<tr>
			<td>
				<label for="price">Price:</label>
			</td>
			<td>
				<input type="input" name="price" /><br />
			</td>
		</tr>
		<tr>
			<td colspan=2>
				<input type="submit" name="submit" value="Create" />
			</td>
		</tr>
	</table>

</form>

</center>