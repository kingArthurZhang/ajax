<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>index</title>
    <script type="text/javascript" src="jquery.min.js"></script>
</head>
<body>
    <h1>Manage User</h1>

    <?php
    $pdo=new PDO('mysql:host=localhost;dbname=test','arthur','Arthur1022');
    $pdo->exec('set names utf8');

    $sql="select * from user";
    $smt=$pdo->query($sql);
    $rows=$smt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table width='1000px' border="1" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Time</th>
            <th>Delete</th>
        </tr>

        <?php

        foreach($rows as $row){
            echo "<tr id='{$row['id']}'>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['username']}</td>";
            echo "<td>{$row['password']}</td>";
            echo "<td>".date('Y-m-d H:i:s',$row['time'])."</td>";
            echo "<td><a href='javascript:' class='del' id='{$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }

    ?>
    </table>
<script>

$('.del').click(function(){
    id=this.id;
    obj=$(this);

    $.get('delete.php',{id:id},function(r){
        if(r=='1'){
            obj.parent().parent().hide(100);
        }
    });
});

</script>

</body>
</html>