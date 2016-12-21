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
			<?php
				if(!isset($book)) {
					$book = array('title' => '', 'pages' => '');
					if(!isset($author)) {
						$author = array('name' => '', 'surname' => '');
			?>
			<H2>Adding new book</H2>
			<?php
					} else {
			?>
			<H2>Adding new book of author <?php echo $author['name'].' '.$author['surname']; ?></H2>
			<?php
					}
				} else {
			?>
			<H2>Editing book &laquo;<?php echo $book['title']; ?>&raquo; of author <?php echo $author['name'].' '.$author['surname']; ?></H2>
			<?php
				}
			?>
			<FORM action="save-book.php" method="post">
				<?php
					if(isset($book['id'])) {
				?>
				<INPUT type="hidden" id="id-field" name="id" value="<?php echo $book['id']; ?>"/>
				<?php
					}
				?>
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