<!DOCTYPE HTML>
<html>
<head>
    <title>マスタデータ管理ツール</title>
</head>
<body>
<h1>マスタデータ管理ツール</h1>

<form action="/table" method="post">
    <select name="table_name">
        <?php
            foreach ($val as $table) {
               echo '<option name=table value="' . $table . '">' . $table . '</option>';
        }
        ?>
    </select>
    <input type="submit" value="テーブルを選択">
</form>
</body>
</html>
