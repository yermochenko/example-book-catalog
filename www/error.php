<HTML>
	<HEAD>
		<TITLE>Error</TITLE>
	</HEAD>
	<BODY>
		<H1>Error</H1>
		<?php
			if(isset($_GET['message'])) {
				echo '<P>'.$_GET['message'].'</P>';
			}
		?>
		<P><A href="/">Back home</A></P>
	</BODY>
</HTML>