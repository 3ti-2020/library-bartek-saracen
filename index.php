<!DOCTYPE html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteka</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <div class="top">
            <h1>Biblioteka</h1>
        </div>
        <section>
        </section>
        <main>
        <?php
            function tabela($sql) {
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "library";
                $conn = new mysqli($servername,$username,$password,$dbname);
                $result=$conn->query($sql);
                echo("<table class='tab'><tr><th>id</th><th>imie</th><th>nazwisko</th><th>tytuł</th><th>ISBN</th><th>delete</th></tr>");
                while($row=$result->fetch_assoc()){
                    echo("<tr>");
                    echo("<td>".$row['id_spis']."</td><td>".$row['Imie']."</td><td>".$row['Nazwisko']."</td><td>".$row['tytul']."</td><td>".$row['ISBN']."</td><td>".'<form action="delete.php" method="POST">
                    <input type="hidden" name="id_spis" value='.$row['id_spis'].'>
                    <input type="hidden" name="id_autor" value='.$row['id_autor'].'>
                    <input type="hidden" name="id_tytul" value='.$row['id_tytul'].'>
                    <input class="delete" type="submit" value="delete">
                </form>'."</td>");
                    echo("</tr>");
                }
                echo("</table>");
                mysqli_close($conn);
            }
            tabela("SELECT id_spis,Imie,Nazwisko,tytul,ISBN,autorzy.id_autor,tytuly.id_tytul from autorzy,tytuly,spis where autorzy.id_autor=spis.id_autor and tytuly.id_tytul=spis.id_tytul;");
            ?>
        </main>
        <footer></footer>
    </div>
</body>
</html>