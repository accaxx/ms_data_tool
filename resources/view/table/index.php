<!DOCTYPE HTML>
<html>
<head>
    <title>マスタデータ管理ツール</title>
</head>
<body>
<h1>マスタデータ管理ツール</h1>
<p>
    <a href="/">戻る</a>
    <form action="/table/get_create" method="post">
    <?php
        echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
    ?>
    <input type="submit" value="1行追加する">
    </form>
    <form action="/table/delete" method="post">
        <?php
            echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
        ?>
        ID：<input type="text" name="id" value="">
        <input type="submit" value="1行削除する">
    </form>
    <form action="/table/get_update" method="post">
        <?php
            echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';
        ?>
        ID：<input type="text" name="id" value="">
        <input type="submit" value="1行編集する">
    </form>
</p>
<p>
    <table border="1">
        <?php
            echo '<input type="hidden" name="table_name" value="'. $val['table_name'] . '">';

            // 全ての行から1行ずつ取得
            foreach ($val['all_data'] as $key => $value) {
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
            }
        ?>
    </table>
</p>
</body>
</html>
