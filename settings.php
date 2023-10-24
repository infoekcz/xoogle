<?php
                $config = require "config.php";

                if (isset($_REQUEST["reset"]))
                {
                    if (isset($_SERVER["HTTP_COOKIE"]))
                    {
                        $cookies = explode(";", $_SERVER["HTTP_COOKIE"]);
                        foreach($cookies as $cookie)
                        {
                            $parts = explode("=", $cookie);
                            $name = trim($parts[0]);
                            setcookie($name, "", time() - 1000);
                        }
                    }
                }

                if (isset($_REQUEST["save"]))
                {
                    foreach($_POST as $key=>$value)
                    {
                        if (!empty($value))
                        {
                            setcookie($key, $value, time() + (86400 * 90), '/');
                        }
                        else
                        {
                            setcookie($key, "", time() - 1000);
                        }
                    }
                }

                if (isset($_REQUEST["save"]) || isset($_REQUEST["reset"]))
                {
                    header("Location: ./");
                    die();
                }

                require "misc/header.php";
?>

    <title>Nastavení Xooglu</title>
    </head>
    <body>
        <div class="misc-container">
            <h1>Nastavení:</h1>
            <form method="post" enctype="multipart/form-data" autocomplete="off">
              <div>
                <label for="theme">Výběr barevných témat:</label>
                <select name="theme">
                <?php
                    $themes = "<option value=\"dark\">Dark</option>
                    <option value=\"darker\">Darker</option>
                    <option value=\"amoled\">AMOLED</option>
                    <option value=\"light\">Light</option>
                    <option value=\"auto\">Auto</option>
					<option value=\"dracula\">Dracula</option>
                    <option value=\"nord\">Nord</option>
                    <option value=\"night_owl\">Night Owl</option>
                    <option value=\"discord\">Discord</option>
                    <option value=\"google\">Google Dark</option>
                    <option value=\"startpage\">Startpage Dark</option>
                    <option value=\"gruvbox\">Gruvbox</option>
                    <option value=\"github_night\">GitHub Night</option>
                    <option value=\"catppuccin\">Catppucin</option>";

                    if (isset($_COOKIE["theme"]))
                    {
                        $cookie_theme = $_COOKIE["theme"];
                        $themes = str_replace($cookie_theme . "\"", $cookie_theme . "\" selected", $themes);
                    }

                    echo $themes;
                ?>
                </select>
                </div>
                <div>
                    <label>Disable special queries (e.g.: currency conversion)</label>
                    <input type="checkbox" name="disable_special" <?php echo isset($_COOKIE["disable_special"]) ? "checked"  : ""; ?> >
                </div>

                <h2>Instance dalších služeb</h2>
                <p>Pro vyšší soukromí při sledování YouTube obsahu si můžete nastavit Invidious instanci dle vlastních potřeb.</p>
                <div class="settings-textbox-container">
                      <?php
                           foreach($config->frontends as $frontend => $data)
                           {
                                echo "<div>";
                                echo "<a for=\"$frontend\" href=\"" . $data["project_url"] . "\" target=\"_blank\">" . ucfirst($frontend) . "</a>";
                                echo "<input type=\"text\" name=\"$frontend\" placeholder=\"Replace " .  $data["original_name"] . "\" value=";
                                echo isset($_COOKIE["$frontend"]) ? htmlspecialchars($_COOKIE["$frontend"]) :  $data["instance_url"];
                                echo ">";
                                echo "</div>";
                           }
                      ?>
                    <div>
                        <label>Bezpečné vyhledávání vhodné pro děti a dospívající:</label>
                        <input type="checkbox" name="safe_search" <?php echo isset($_COOKIE["safe_search"]) ? "checked"  : ""; ?> >
                    </div>
                </div>

                <div>
                  <button type="submit" name="save" value="1">Uložit nastavení</button>
                  <button type="submit" name="reset" value="1">Reset</button>
                </div>
            </form>
        </div>

<?php require "misc/footer.php"; ?>
