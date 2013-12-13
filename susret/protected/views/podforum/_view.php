<html>
	<head>
		<style type="text/css">
			td {
				width: 150px;
				border: solid 2px #000;
				text-align: center;
			}
		</style>
	</head>
	<?php
	/* @var $this PodforumController */
	/* @var $data Podforum */
	?>

	<?php $name = CHtml::encode($data->naziv); 
		$podforum = Podforum::model()->find('naziv=:naziv', array(':naziv' => $data->naziv)); ?>

	<?php
	if ($name === 'Rasprava') {
		if (Yii::app()->user->checkAccess('istrazivac')) {
			?>
			<div class="view">
				<table style="border: 5px #000; border-collapse: collapse">
					<tr>
					<td>Podforum</td>
					<td>Moderatori</td>
					<td>Broj tema</td>
					<td>Broj postova</td>
					<td>Zadnji post</td>
				</tr>
				<tr><br><font size="4">
					<td><img src="<?php echo CHtml::encode($data->slika); ?>" alt="image">
						<a href="<?php echo "/susret/podforum/view/" . $podforum->id; ?>"><?php echo $data->naziv; ?></a></td><td>
						<?php
						$mods = Korisnik::model()->findAll('idPodforum=:id', array(':id' => $podforum->id));
						;
						foreach ($mods as $mod) {
							?>
								<?php echo $mod->userName; ?></br>
						<?php } ?></td>
					<?php $threads = Tema::model()->findAll('idPodforum=:id', array(':id' => $podforum->id)); ?>
					<td><?php echo count($threads); ?></td>
					<?php
					$totalPosts = 0;
					foreach ($threads as $thread) {
						$posts = Post::model()->findAll('idTema=:id', array(':id' => $thread->id));
						$totalPosts += count($posts);
					}
					?>
					<td><?php echo $totalPosts; ?></td>
					<?php
					$sql = Yii::app()->db->createCommand()
									->select('post.*')
									->from('podforum p')
									->join('tema t', 't.idPodforum =' . $podforum->id)
									->join('post post', 't.id = post.idTema')
									->order('datumPost desc')->limit('1');
					$post = $sql->queryRow();
					?>
					<td><?php
						echo $post['id'] . "</br>";
						$date = "";
						if (!empty($post)) {
							$date = new DateTime($post['datumPost']);
							$today = new DateTime(date('d.m.Y.'));
							$yesterday = new DateTime(date('d.m.Y.', time() - (24 * 60 * 60)));
							if ($date->format('d.m.Y.') == $today->format('d.m.Y.')) {
								echo "danas u " . $date->format('H:m');
							} else if ($date->format('d.m.Y.') == $yesterday->format('d.m.Y.')) {
								echo "jučer u " . $date->format('H:m');
							} else {
								echo $date->format('d.m.Y.') . " u " . $date->format('H:m');
							}
						}
						?></td>
				<?php } ?></font></b></tr>
				</table>
			</div>
			<?php
		
	} else {
		?>
		<div class="view">
			<table style="border: 5px #000; border-collapse: collapse" >
				<tr>
					<td>Podforum</td>
					<td>Moderatori</td>
					<td>Broj tema</td>
					<td>Broj postova</td>
					<td>Zadnji post</td>
				</tr>
				<tr><b><font size="4">
					<td><img src="<?php echo CHtml::encode($data->slika); ?>" alt="image">
						<a href="<?php echo "/susret/podforum/view/" . $podforum->id; ?>"><?php echo $data->naziv; ?></a></td><td>
						<?php
						$mods = Korisnik::model()->findAll('idPodforum=:id', array(':id' => $podforum->id));
						;
						foreach ($mods as $mod) {
							?>
								<?php echo $mod->userName; ?></br>
						<?php } ?></td>
					<?php $threads = Tema::model()->findAll('idPodforum=:id', array(':id' => $podforum->id)); ?>
					<td><?php echo count($threads); ?></td>
					<?php
					$totalPosts = 0;
					foreach ($threads as $thread) {
						$posts = Post::model()->findAll('idTema=:id', array(':id' => $thread->id));
						$totalPosts += count($posts);
					}
					?>
					<td><?php echo $totalPosts; ?></td>
					<?php
					$sql = Yii::app()->db->createCommand()
									->select('post.*')
									->from('podforum p')
									->join('tema t', 't.idPodforum =' . $podforum->id)
									->join('post post', 't.id = post.idTema')
									->order('datumPost desc')->limit('1');
					$post = $sql->queryRow();
					?>
					<td><?php
						echo $post['id'] . "</br>";
						$date = "";
						if (!empty($post)) {
							$date = new DateTime($post['datumPost']);
							$today = new DateTime(date('d.m.Y.'));
							$yesterday = new DateTime(date('d.m.Y.', time() - (24 * 60 * 60)));
							if ($date->format('d.m.Y.') == $today->format('d.m.Y.')) {
								echo "danas u " . $date->format('H:m');
							} else if ($date->format('d.m.Y.') == $yesterday->format('d.m.Y.')) {
								echo "jučer u " . $date->format('H:m');
							} else {
								echo $date->format('d.m.Y.') . " u " . $date->format('H:m');
							}
						}
						?></td>
				<?php } ?></font></b></tr></table></div>

	<br />
</html>