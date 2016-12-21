<HTML>
	<HEAD>
		<META charset="UTF-8"/>
		<TITLE>Book catalog</TITLE>
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
				if(isset($selectedAuthor) && isset($books)) {
			?>
			<H2>Books of author <?php echo $selectedAuthor['name'].' '.$selectedAuthor['surname']?></H2>
			<?php
					if(count($books) > 0) {
			?>
			<OL>
				<?php
						foreach($books as $book) {
				?>
				<LI><A href="edit-book.php?id=<?php echo $book['id']; ?>"><?php echo $book['title']; ?></A> (<?php echo $book['pages']; ?> pages)</LI>
				<?php
						}
				?>
			</OL>
			<?php
					} else {
			?>
			<P>There are no books of this author in catalog</P>
			<?php
					}
				} else {
			?>
			<H2>Choose author</H2>
			<?php
				}
			?>
			<FORM action="edit-book.php">
				<?php
					if(isset($selectedAuthor)) {
				?>
				<INPUT type="hidden" name="author-id" value="<?php echo $selectedAuthor['id']; ?>">
				<?php
					}
				?>
				<BUTTON>Add new book</BUTTON>
			</FORM>
		</DIV>
	</BODY>
</HTML>