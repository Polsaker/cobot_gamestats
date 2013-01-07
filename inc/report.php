<?php include("config.php"); ?>
<div class="close"><a id="HideStat" href='javascript:ocultarDiv($("#stat"));'>X</a></div>

<?php 
//sleep(5);
mysql_connect($dbhost,$dbuser,$dbpass);mysql_select_db($db);
			$user=htmlspecialchars(stripslashes( mysql_real_escape_string($_GET['u'])));?>
			<?php 
			$q1=mysql_query("SELECT * FROM games_users WHERE nick='$user'");$u=mysql_fetch_array($q1);
			$q2=mysql_query("SELECT * FROM games_stats WHERE nick='$user'");
			if(mysql_num_rows($q2)==0){	$q2=mysql_query("INSERT INTO games_stats (nick) VALUES ('$user')");$q2=mysql_query("SELECT * FROM games_stats WHERE nick=$user");}
			@$s=mysql_fetch_array($q2);?>
			<h1>Reporte del usuario <?php echo $user ?></h1>
			Dinero: $<b><?php if($u['dinero']=="*"){echo "&#8734; (infinito)";}else{ echo $u['dinero'];} ?></b><br />
			Nivel: <b><?php echo $u['nivel'] ?></b><br/>
			Bono: <b><?php if($u['bono']=="0"){echo "Sin bono";}elseif($u['bono']=="1"){echo "Bono normal";}elseif($u['bono']=="2"){echo "Ultrabono"; } ?></b><br/>
			Paga: <b><?php if($u['imp']=="0"){echo "Impuestos normales";}elseif($u['imp']=="1"){echo "No paga impuestos";}elseif($u['imp']=="2"){echo "Paga el 15% de impuestos"; } ?></b><br/>
			Caja: <b><?php echo $u['caja']; ?></b><br/>
			Cobre: <b><?php echo $u['cobre']; ?></b><br/>
			Plata: <b><?php echo $u['plata']; ?></b><br/>
			Oro: <b><?php echo $u['oro']; ?></b><br/>
			<?php if($u['dist']==1){ ?> <b>Este es un usuario distinguido</b><br/> <?php } ?>
			<h2>Estadísticas</h2>
			<table>
				<tr>
					<td>-</td>
					<td>Cantidad</td>
				</tr>
				<tr>
					<td>Dados</td>
					<td><?php echo $s['dados'] ?></td>
				</tr>
				<tr>
					<td>Tragaperras</td>
					<td><?php echo $s['traga'] ?></td>
				</tr>
				<tr>
		 			<td>Rueda</td>
					<td><?php echo $s['rued'] ?></td>
				</tr>
				<tr>
					<td>Total</td>
					<td><?php echo ($s['rued']+$s['traga']+$s['dados']) ?></td>
				</tr>
			</table>
