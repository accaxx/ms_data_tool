<!DOCTYPE HTML>
<html>
<head>
    <title>マスタデータ管理ツール</title>
</head>
<body>
<h1>編集</h1>
<p>
    <form action="/table" method="post">
        <?php
            echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
        ?>
        <input type="submit" value="戻る">
    </form>
</p>
<p>
    <form action="/table/update" method="post">
        <table border="1"><thead>
            <?php
                echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
                echo '<thead><tr>';
                foreach ($val['data'] as $key => $value) {
                    // 見出し
                    echo '<th align="center">' . $key . '</th>';
                }
                echo '</thead><tbody>';
                foreach ($val['data'] as $key => $value) {
                    echo '<td><input type="text" name="' . $key . '" value="' . $value . '"></td>';
                }
                echo '</tbody>';
            ?>
        </table>
        <input type="submit" value="データを追加">
    </form>
</p>
</body>
</html>
