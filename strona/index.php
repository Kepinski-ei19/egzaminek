<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Warzywniak</title>
    <link rel="stylesheet" href="styl2.css">
</head>
<body>
    <?php
        if(isset($_POST["wyslij"])) {
            $connection = mysqli_connect("localhost", "root", "", "dane2");
            $query = "INSERT INTO `produkty`(`Rodzaje_id`, `Producenci_id`, `nazwa`, `ilosc`, `cena`, `zdjecie`) VALUES ('1', '4', '".$_POST["nazwa"]."', '10', '".$_POST["cena"]."', 'owoce.jpg')";
            $res = mysqli_query($connection, $query);
        } 
    ?>


    <header>
        <section id="lewy">
            <h1>Internetowy sklep z eko-warzywami</h1>
        </section>
        <section id="prawy">
            <ol>
                <li>warzywa</li>
                <li>owoce</li>
                <li><a href="https://terapiasokami.pl/" target="blank">soki</a></li>
            </ol>
    </header>
    <main>
        <?php
            $connection = mysqli_connect("localhost", "root", "", "dane2");
            $query = "SELECT nazwa, ilosc, opis, cena, zdjecie FROM `produkty` WHERE produkty.Rodzaje_id = 1 OR produkty.Rodzaje_id = 2";
            $res = mysqli_query($connection, $query);
            $result = mysqli_fetch_all($res);

            foreach ($result as $x) {
                echo '<div class="produkt">';
                echo '<img src="img/'.$x[4].'" alt="warzywniak">';
                echo "<h5>".$x[0]."</h5>";
                echo "<p>opis: ".$x[2]."</p>";
                echo "<p>na stanie: ".$x[1]."</p>";
                echo "<h2>".$x[3]." zł</h2>";
                echo "</div>";
            }

            mysqli_close($connection);
        ?>
    </main>
    <footer>
        <form method="post" action="" name="skrypt2">
            <label for="nazwa">Nazwa:<input type="text" name="nazwa" id="nazwa"></label>
            <label for="cena">Cena:<input type="text" name="cena" id="cena"></label>
            <input type="submit" name="wyslij" value="Dodaj produkt">
        </form>
        <p>Stronę wykonał: Stanisław Kępiński</p>
    </footer>
</body>
</html>