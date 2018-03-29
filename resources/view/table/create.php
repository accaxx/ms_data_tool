<!DOCTYPE HTML>
<html>
<head>
    <title>マスタデータ管理ツール</title>
</head>
<body>
<h1>テーブルデータ追加</h1>
<p>
    <form action="/table" method="post">
        <?php
            echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
        ?>
        <input type="submit" value="戻る">
    </form>
</p>
<p>
    <form action="/table/create" method="post">
        <table border="1"><thead>
            <?php
                foreach ($val['all_data'] as $column) {
                    // 見出し
                    echo '<th align="center">'. $column['Field'] .'('. $column['Type'] . ')</th>';
                }
                echo '</thead><tbody>';

                foreach ($val['all_data'] as $column) {
                    echo '<td><input type="text" name="' . $column['Field'] . '"></td>';
                }
                echo '</tbody>';
            ?>
        </table>
        <input type="submit" value="データを追加">
    </form>
</p>
</body>
</html>
