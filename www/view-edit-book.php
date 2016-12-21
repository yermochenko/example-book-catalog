<HTML>
	<HEAD>
		<META charset="UTF-8"/>
		<TITLE>Book catalog :: edit book</TITLE>
		<LINK rel="stylesheet" type="text/css" href="main.css">
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
			<FORM action="save-book.php" method="post">
				<INPUT type="hidden" id="id-field" name="id" value="<?php echo $book['id']; ?>"/>
				<LABEL for="author-field">Author:</LABEL>
				<INPUT type="text" id="author-field" value="<?php echo $author['name'].' '.$author['surname']; ?>">
				<LABEL for="title-field">Title:</LABEL>
				<INPUT type="text" id="title-field" name="title" value="<?php echo $book['title']; ?>">
				<LABEL for="pages-field">Pages:</LABEL>
				<INPUT type="text" id="pages-field" name="pages" value="<?php echo $book['pages']; ?>">
				<BUTTON>Save</BUTTON>
			</FORM>
		</DIV>
	</BODY>
</HTML>