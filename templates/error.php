<?php if($_SESSION['lang'] == 'hr') : ?>
	<h2 class="section_header-new">
	    <hr style="z-index: 1;" class="left visible-desktop">
		<span style="position: relative; z-index: 5;">Venn dijagram za grešku 404</span>
	    <hr style="z-index: 1;" class="right visible-desktop">
	</h2>
	<div class="row error">
		<div class="col-sm-6">
			<img src="/images/404.png" alt="404" class="fourohfour">
		</div>
		<div class="col-sm-6">
			<a class="error-404" href="/">Odvedi me na početnu stranicu</a>
			<h2>Venn diagram</h2>
			<p>Venn diagrami su diagrami koji pokazuju hipotetski mogući logičnan odnos između kolekcija ili grupa. Venn diagrami su osmišljeni oko 1880., a osmislio ih je John Venn. Koriste se u mnogo različitih teorija, vjerojatnosti, logici, statistici, računalnim znanostima i u pokušajima posjeta stranicama koje ne postoje.</p>
		</div>
	</div>
<?php else : ?>
	<h2 class="section_header-new">
	    <hr class="left visible-desktop">
		Venn of a 404
	    <hr class="right visible-desktop">
	</h2>
	<div class="row error">
		<div class="col-sm-6">
			<img src="/images/404.png" alt="404" class="fourohfour">
		</div>
		<div class="col-sm-6">
			<a class="error-404" href="/">Please take me to the homepage</a>
			<h2>The Venn Diagram</h2>
			<p>Venn diagrams or set diagrams are diagrams that show all hypothetically possible logical relations between a finite collection of sets (groups of things). Venn diagrams were conceived around 1880 by John Venn. They are used in many fields, including set theory, probability, logic, statistics, computer science, and trying to visit web pages that don't exist.</p>
		</div>
	</div>
<?php endif; ?>