<!DOCTYPE HTML>
<html>
<head>
    <title>マスタデータ管理ツール</title>
</head>
<body>
<h1>マスタデータ管理ツール</h1>
<p>
    <a href="/">戻る</a>
</p>
<p>
    <table border="1">
        <?php
            // 全ての行から1行ずつ取得
            foreach ($val as $key => $value) {
                // カラム名
                $key_array = array_keys($value);

                // 見出し
                echo '<thead><tr>';
                foreach ($key_array as $key){
                    echo '<th align="center">' . $key . '</th>';
                }
                echo '</tr></thead><tbody><tr>';
                // value(値)
                foreach ($value as $column_value) {
                    echo '<td align="center">' . $column_value . '</td>';
                }
                echo '</tr></tbody>';
            }
        ?>
    </table>
</p>
</body>
</html>
