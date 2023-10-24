<?php require "misc/header.php"; ?>

    <title>Xoogle - anonymní vyhledávač založený na LibreX</title>
    </head>
    <body>
        <form class="search-container" action="search.php" method="get" autocomplete="off">
				<h1><span class="X">X</span>oogle.cz</h1>
                <input type="text" name="q" autofocus/>
                <input type="hidden" name="p" value="0"/>
                <input type="hidden" name="t" value="0"/>
                <input type="submit" class="hide"/>
                <div class="search-button-wrapper">
                    <button name="t" value="0" type="submit">Vyhledat s Xooglem</button>
                    <button name="t" value="3" type="submit">Hledat torrenty s Xooglem</button>
					<button type="submit" formaction="https://sk.xoogle.cz/">Přepnout na slovenský Xoogle</button>
                </div>
				<div class="search-button-wrapper">
					<button type="submit" formaction="https://blog.xoogle.cz/xooglecz-vychozi-vyhledavac-2022/">Nastavit jako výchozí vyhledávač</button>
					<button type="submit" formaction="https://blog.xoogle.cz/o-projektu-xoogle-2022/">Je Xoogle anonymní?</button>
					<button type="submit" formaction="https://blog.xoogle.cz/">Xoogle Blog</button>
                </div>
        </form>

<?php require "misc/footer.php"; ?>
