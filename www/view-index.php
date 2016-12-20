<HTML>
	<HEAD>
		<META charset="UTF-8"/>
		<TITLE>Book catalog</TITLE>
	</HEAD>
	<BODY>
		<H1>Book catalog</H1>
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
		<DIV id="books">
			<H2>Books</H2>
			<OL>
				<?php
					foreach($books as $book) {
				?>
				<LI><A href="edit-book.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></A> (<?php echo $book['pages']; ?> pages)</LI>
				<?php
					}
				?>
			</OL>
		</DIV>
	</BODY>
</HTML>