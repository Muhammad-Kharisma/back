<table>
    <tr>
        <td>Nama</td>
        <td>NIM</td>
    </tr>
    <?php
        // print_r($data);
        foreach ($data as $key=>$value){
            echo "<tr>";
            echo "<td>".$value['nama']."</td>";
            echo "<td>".$value['nim']."</td>";
            echo "</tr>";
        }
    ?>
</table>