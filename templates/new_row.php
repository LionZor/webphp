<tr>
    <td><?=$id?></td>
    <td><?=$login?></td>
    <td><?=$name?></td>
    <td><?=$surname?></td>
    <td><?=$gender?></td>
    <td><?=$date?></td>
    <td> <form action="edit_user.php" method="GET">
            <input type="hidden" name="id" value="<?=$id?>">
            <button  class="btn" type="submit" class="delete">Редактировать</button>
        </form></td>
    <td> <form action="delete_user.php" method="POST" onsubmit='if(confirm("Удалить?")){ return true}else {return false}'>
            <input type="hidden" name="id" value="<?=$id?>">
            <button  class="btn" type="submit" class="delete">Удалить</button>
        </form></td>
</tr>