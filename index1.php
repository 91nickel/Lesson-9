<html>
<head>
    <style>
        input {
            display: inline-block;
            margin: 10px;
            width: 250px;
        }

        table {
            border: 1px solid #ccc;
            border-spacing: 0;
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid #ccc;
            padding: 5px;
        }

        .bold {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<h1>Библиотека успешного человека</h1>
<form action="" method="GET">
    <input type="text" name="name" placeholder="Название книги">
    <input type="text" name="author" placeholder="Автор">
    <input type="text" name="isbn" placeholder="ISBN">
    <input type="submit" value="Поиск">

    <table>
        <tr>
            <td class="bold">Название</td>
            <td class="bold">Автор</td>
            <td class="bold">Год выпуска</td>
            <td class="bold">Жанр</td>
            <td class="bold">ISBN</td>
        </tr>

        <?php
        // /*WHERE author LIKE "%$_GET['author']%"*/
        $pdo = new pdo("mysql:host=localhost;dbname=global", "nkuznetsov ", "neto1907");
        //$sql = 'SELECT * FROM books';

        $sql = 'SELECT * FROM books WHERE name LIKE "%'. $_GET['name'].'%" AND author LIKE "%'.$_GET['author'].'%" AND isbn LIKE "%'.$_GET['isbn'].'%"';
        print_r($sql);

        //var_dump($sql);
        // print_r($_GET);
        //var_dump($_GET[0]);

         foreach ($pdo->query($sql) as $row1) {
             echo '<tr>';
             echo '<td>' . $row1['name'] . '</td>';
             echo '<td>' . $row1['author'] . '</td>';
             echo '<td>' . $row1['year'] . '</td>';
             echo '<td>' . $row1['genre'] . '</td>';
             echo '<td>' . $row1['ISBN'] . '</td>';
             echo '</tr>';
         }
        ?>
    </table>
</body>

</html>


