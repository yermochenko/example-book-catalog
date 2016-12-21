<DIV id="authors">
	<H2>Authors</H2>
	<OL>
		<?php
			foreach($authors as $auth) {
		?>
		<LI><A href="index.php?id=<?php echo $auth['id']; ?>"><?php echo $auth['name'].' '.$auth['surname']; ?></A></LI>
		<?php
			}
		?>
	</OL>
</DIV>