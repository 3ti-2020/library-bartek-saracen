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
            <div class="a">
                <h1>INSERT</h1>
                <form action="insert.php" method="POST">
                <p>Tytuł</p>
                <input type="text" name="tytul" placeholder="Podaj tytuł">
                <p>Imie autora</p>
                <input type="text" name="imie" placeholder="Podaj imie">
                <p>Nazwisko autora</p>
                <input type="text" name="nazwisko" placeholder="Podaj nazwisko">
                <p>ISBN</p>
                <input type="text" name="isbn" placeholder="Podaj ISBN">
                <input type="submit" value="DODAJ" >
                </form>
            </div>
            <div class="b">
                <p>Dodaj do spisu</p>
            <?php
                require('connect.php');
                $result1 = $conn->query("SELECT * FROM autorzy ORDER BY id_autor DESC");
                $result2 = $conn->query("SELECT * FROM tytuly ORDER BY id_tytul DESC");
                echo("<form action='insert1.php' method='POST'>");
                echo("<select name='idautor'>");
                while($row=$result1->fetch_assoc() ){
                    echo("<option value='".$row['id_autor']."'>".$row['Imie']." ".$row['Nazwisko']."</option>");
                }
                echo("</select>");
                echo("<select name='idtytul'>");
                while($row=$result2->fetch_assoc() ){
                    echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");
                echo("<input type='submit' value='DODAJ'>");
                echo("</form>");
                mysqli_close($conn);
            ?>
            </div>
            <div  class="b">
            <p>Usuń autora</p>
            <?php
                require('connect.php');
                $result1 = $conn->query("SELECT * FROM autorzy");
                echo("<form action='deleteautor.php' method='POST'>");
                echo("<select name='idautor'>");
                while($row=$result1->fetch_assoc() ){
                    echo("<option value='".$row['id_autor']."'>".$row['Imie']." ".$row['Nazwisko']."</option>");
                }
                echo("</select>");
                echo("<input type='submit' value='USUŃ'>");
                echo("</form>");
                mysqli_close($conn);
            ?>
            </div>
            <div class="b">
            <p>Usuń tytuł</p>
            <?php
                require('connect.php');
                $result1 = $conn->query("SELECT * FROM tytuly");
                echo("<form action='deletetytul.php' method='POST'>");
                echo("<select name='idtytul'>");
                while($row=$result1->fetch_assoc() ){
                    echo("<option value='".$row['id_tytul']."'>".$row['tytul']."</option>");
                }
                echo("</select>");
                echo("<input type='submit' value='USUŃ'>");
                echo("</form>");
                mysqli_close($conn);
            ?>
            </div>
        </section>
        <main>
        <?php
            function tabela($sql) {
                require('connect.php');
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