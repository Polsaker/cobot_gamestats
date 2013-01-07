<?php include("config.php"); ?>

		<h2>Jugadores con mas dinero</h2>
		<?php 

			mysql_connect($dbhost,$dbuser,$dbpass);mysql_select_db($db);
			$q=mysql_query("SELECT * FROM  `games_users` ORDER BY `dinero` DESC ");
			$din=array();$nick=array();$niv=array();
			while(@$a=mysql_fetch_array($q)){
				if($a['dinero']=="*"){$dinero=1000000000000000000000000123;}else{$dinero=$a['dinero'];}
				array_push($din,array('din'=>$dinero,'niv'=>$a['nivel'],'nick'=>$a['nick'],'c'=>$a['frozen'],'d'=>$a['dist']));

			}
			rsort($din);
			
			$q=mysql_query("SELECT * FROM  `games_stats`");
			$fld=array();
			while(@$a=mysql_fetch_array($q)){array_push($fld,array('fld'=>($a['dados']+$a['traga']+$a['rued']),'nick'=>$a['nick']));}
			rsort($fld);
		?>
		<table class="rtable">
			<tr>
				<td>#</td>
				<td><b>Nick</b></td>
				<td><b>Nivel</b></td>
				<td><b>Dinero</b></td>
			</tr>
			
				<?php
					$i=0;
					foreach($din as $key=>$val){if($val["c"]!=2){$i++;}else{continue;}
						echo "<tr>";
						echo "<td>$i</td>";
						//if($val["c"]!=2){echo "<td>".($val["c"]?"<s>":"").($val["d"]?"<u>":"")."<a href=\"?action=report&user=".$val['nick']."\">".$val['nick']."</a></td>";}
						echo "<td>".($val["c"]?"<s>":"").($val["d"]?"<u>":"")."<a class=\"ShowStat\" href=\"javascript:llamarasincrono('inc/report.php?u=".urlencode($val['nick'])."', 'stat');\">".$val['nick']."</a>".($val["d"]?"</u>":"").($val["c"]?"</s>":"")."</td>";
						echo "<td>".$val['niv']."</td>";
						if($val['din']==1000000000000000000000000123){echo "<td>&#8734; (infinito)</td>";}else{echo "<td>".$val['din']."</td>";}
						echo "</tr>";
						unset($niv[$dinero]);unset($nick[$dinero]); unset($din[$key]);

					}
				?>
			
		</table>
		<?php $rsx = mysql_query("SELECT * FROM games_users");
		$tm=0;$i=0;
		while($rowx=mysql_fetch_array($rsx)){$i++;if($rowx["dinero"]!="*"){$tm=$tm+$rowx["dinero"];}}
		$rsx = mysql_query("SELECT * FROM games_banco");
		$rowx2=mysql_fetch_array($rsx); ?>
		<div class="generalstats">En total hay circulando $<b><?php echo $tm+$rowx2['plata']; ?></b>, de los cuales $<b><?php echo $rowx2['plata']; ?></b> están en el banco y $<b><?php echo $tm ?></b> están en el bolsillo de los usuarios.<br />En total, hay <b><?php echo $i ?></b> usuarios registrados</div>
		<div class="floodstats" style="">
		<h2>Top 30 flood</h2>
		<table>
			<tr>
				<td>#</td>
				<td>Nick</td>
				<td>Lineas</td>
			</tr>
			<?php
					$i=0;
					foreach($fld as $key=>$val){$i++;
						echo "<tr>";
						  echo "<td>$i</td>";
						  echo "<td><a class=\"ShowStat\" href=\"javascript:llamarasincrono('inc/report.php?u=".urlencode($val['nick'])."', 'stat');\">".$val['nick']."</a></td>";
						  echo "<td>$val[fld]</td>";
						echo "</tr>";
						if($i==30){break;}
					}
			?>
		</table>
		</div>
