
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>

    <style>
        body {
            margin: 20px;
            font-family: "Comic Sans MS", "Trebuchet MS", sans-serif;

            /* Background sendiri */
            background-image: url("manga.jpg");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            min-height: 100vh;
        }

        h2 {
            display: inline-block;
            margin: 0 0 18px 0;
            padding: 8px 15px;

            background: white;
            color: black;

            border: 4px solid black;
            box-shadow: 6px 6px 0 black;

            font-size: 22px;
            font-weight: bold;

            transform: rotate(-1deg);
        }

        table {
            border-collapse: collapse;
            background: white;

            border: 4px solid black;
            box-shadow: 8px 8px 0 black;

            font-size: 14px;
        }

        th, td {
            border: 2px solid black;
            padding: 8px 12px;
        }

        th {
            background: black;
            color: white;

            font-weight: bold;
            text-transform: uppercase;
        }

        td {
            background: white;
        }

        tr:nth-child(even) td {
            background: #e8e8e8;
        }

        tr:hover td {
            background: #cfcfcf;
        }

        td:first-child {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>★ Daftar Mahasiswa</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Alamat</th>
            <th>No HP</th>
        </tr>

        <?php
        $i = 1;

        foreach ($datamhs as $mhs) {
            echo "<tr>";
            echo "<td>" . $i++ . "</td>";
            echo "<td>" . $mhs['nama'] . "</td>";
            echo "<td>" . $mhs['nim'] . "</td>";
            echo "<td>" . $mhs['alamat'] . "</td>";
            echo "<td>" . $mhs['no_hp'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    Admin, <?= htmlspecialchars($name_user) ?>

</body>
</html>