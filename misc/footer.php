<div class="footer-container">
    <a href="./">>Domů</a>
	<a href="https://blog.xoogle.cz/kontakt/">>Kontakt</a>
	<a href="https://blog.xoogle.cz/mobilni-aplikace-xoogle-2022/">>Xoogle aplikace</a>
	<a href="./settings.php">>Nastavení</a>
	<a href="https://blog.xoogle.cz/dostupne-instance-librex-2022/">>Instance</a>
   	<a href="https://blog.xoogle.cz/podpora-2022/">>Podpora❤️</a>
	<a href="https://github.com/infoekcz/xoogle/">>Zdroják</a>
</div>
<div class="git-container">
    <?php
        $hash = file_get_contents(".git/refs/heads/main");
        echo "<a href=\"https://github.com/hnhx/librex/commit/$hash\" target=\"_blank\">Latest commit: $hash</a>";
    ?>
</div>
</body>
</html>
