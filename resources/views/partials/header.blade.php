<div class="header">
    <div class="page_container">
        <div class="header_top">
            <button class="menu_btn" aria-label="burger">
                <span></span>
            </button>
            <div class="main_logo">
                <?php if( strpos($_SERVER['SCRIPT_FILENAME'], 'index.php') == false):?> <a href="index.php"><?php endif?>
                    <img width="303" height="99" src="css/images/main_logo.svg" alt="" title=""/>
                    <?php if( strpos($_SERVER['SCRIPT_FILENAME'], 'index.php') == false):?> </a><?php endif?>
            </div>
            <div class="sign_block">
                <a href="login.php" class="icon_user primary_btn main_btn">Login</a>
            </div>
            <ul class="socials_list">
                <li><a href="https://www.facebook.com" target="_blank" class="icon_facebook">facebook</a></li>
                <li><a href="https://www.twitter.com" target="_blank" class="icon_twitter">twitter</a></li>
                <li><a href="https://www.instagram.com" target="_blank" class="icon_instagram">instagram</a></li>
            </ul>
            <div class="lg_block">
                <a href="#">AM</a>
            </div>
            <div class="search_block" data-type="close">
                <form class="search_form">
                    <label>
                        <span class="label">Search</span>
                        <input type="text" name="search" placeholder="Search" autocomplete="off"/>
                    </label>
                    <button type="submit" class="icon_search" aria-label="search"></button>
                </form>
            </div>
        </div>
        <div class="menu_block">
            <div class="menu_inner">
                <ul class="main_menu">
                    <li><a href="features_listing.php">Features</a></li>
                    <li><a href="news_listing.php">News</a></li>
                    <li><a href="recipes_listing.php">Recipes</a></li>
                    <li><a href="wines.php">Wines</a></li>
                    <li><a href="guides.php">Guides</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="wine_club.php">Wine Club</a></li>
                    <li><a href="about_us.php">About</a></li>
                    <li><a href="contacts.php">Contact Us</a></li>
                </ul>
            </div>
        </div>


    </div>
</div>




