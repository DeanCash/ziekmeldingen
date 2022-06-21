<header>
    <nav class="navbar">
        <ul class="navbar-ul" id="nav">
            <a href="home.php"><li>Registration</li></a>
            <a href="students.php"><li>Students</li></a>
            <?php
                // if user logged in, add a log out option to the navbar
                require_once("functions.php");
                if (check_logged_in()) {
                    echo "<a href='logout.php'><li>Logout</li></a>";
                }
            ?>
            <!-- toggle background dark or light mode -->
            <button onclick="toggleBgColor()" class="mode-btn" style="display: block;"><img class="mode-img" src="media/moon.png" alt="Moon Icon"></button>
        </ul>
    </nav>
</header>



<style>
    .mode-img {
        height: 3rem;
        filter: invert(1);
    }

    .mode-btn {
        margin-left: auto;
        align-self: center;
        justify-content: center;
        margin-right: 2em;
        background-color: transparent;
        font-size: 1.2rem;
        padding: 1rem;
        border: 0;
        transition: 200ms;
    }

    .mode-btn:hover {
        cursor: pointer;
        transform: scale(1.2);
    }

    .navbar li {
        list-style: none;
        padding: 2em 4em;
        transition: 200ms;
    }

    .navbar-ul {
        text-transform: uppercase;
        font-weight: 900;
        font-size: 1.2rem;
        padding: 0;
        display: flex;
        flex-wrap: wrap;
        position: relative;
        height: fit-content;
        background-color: var(--gray);
        box-shadow: 0 0 15px 2px rgb(45, 42, 52);
    }

    .navbar-ul li:hover {
        background-color: var(--blue-green);
    }

</style>