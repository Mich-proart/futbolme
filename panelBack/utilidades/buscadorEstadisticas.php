<table style="width:500px; font-size: 20px" cellspacing="2" cellpadding="2" bgcolor="gainsboro">
	<tr><td colspan="3" align="center">G</td>
		<td colspan="3" align="center">E</td>
		<td colspan="3" align="center">P</td>
		<td colspan="3" align="center">Gf</td>
		<td colspan="3" align="center">Gc</td>
	</tr>
	<tr bgcolor="white">
		<td align="center"><?php echo $value['galocal']?></td>
		<td align="center"><?php echo $value['gavisitante']?></td>
		<td align="center" bgcolor="green" style="color:white"><?php echo $value['galocal']+$value['gavisitante']?></td>
		<td align="center"><?php echo $value['emlocal']?></td>
		<td align="center"><?php echo $value['emvisitante']?></td>
		<td align="center" bgcolor="orange" style="color:white"><?php echo $value['emlocal']+$value['emvisitante']?></td>
		<td align="center"><?php echo $value['pelocal']?></td>
		<td align="center"><?php echo $value['pevisitante']?></td>
		<td align="center" bgcolor="red" style="color:white"><?php echo $value['pelocal']+$value['pevisitante']?></td>
		<td align="center"><?php echo $value['gflocal']?></td>
		<td align="center"><?php echo $value['gfvisitante']?></td>
		<td align="center" bgcolor="navy" style="color:white"><?php echo $value['gflocal']+$value['gfvisitante']?></td>
		<td align="center"><?php echo $value['gclocal']?></td>
		<td align="center"><?php echo $value['gcvisitante']?></td>
		<td align="center" bgcolor="dimgray" style="color:white"><?php echo $value['gclocal']+$value['gcvisitante']?></td>
	</tr>	
</table>