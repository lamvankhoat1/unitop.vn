<?php get_header(); ?>

<?php
  $sql = "SELECT * FROM tbl_users";
  $result = db_query($sql);
  $list_users = array();
  $num_rows  = db_num_rows($sql);
  if (db_num_rows($sql) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $list_users[] = $row;
    }
  };

  foreach ($list_users as &$user) {
    $user['url_update'] = "?mod=users&act=update&id={$user['user_id']}";
    $user['url_delete'] = "?mod=users&act=delete&id={$user['user_id']}";
  };
;
?>
<style>
    table thead tr {
        border-bottom: 2px solid #ddd;
    }

    table tbody tr {
        border-bottom: 1px solid #ccc;
    }

    table tbody tr:last-child {
        border-bottom: none;
    }

    table td,
    table th {
        padding: 10px 15px;
        border-left: 1px solid #ccc;
    }

    table td:first-child,
    table th:first-child {
        border-left: none;
    }
</style>
<div id="main">
    <a href="?mod=users&act=add">Thêm thành viên</a>
    <h2>DANH SÁCH THÀNH VIÊN</h2>
    <table>
        <thead>
            <tr>
                <th>STT</th>    
                <th>User Id</th>
                <th>Username</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th colspan="2" style="text-align: center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
              for ($i=0; $i <= $num_rows; $i++) { 
                  ?>
                <?php
                  if ($i < $num_rows) {
                      ?>
                    <tr>
                        <td><?php echo ($i+1); ?></td>
                        <td><?php echo $list_users[$i]['user_id']; ?></td>
                        <td><?php echo $list_users[$i]['username']; ?></td>
                        <td><?php echo $list_users[$i]['fullname']; ?></td>
                        <td><?php echo $list_users[$i]['email']; ?></td>
                        <td><?php echo $list_users[$i]['gender']; ?></td>
                        <td><a href="<?php echo $list_users[$i]['url_update']; ?>">Edit</a></td>
                        <td><a href="<?php echo $list_users[$i]['url_delete']; ?>">Delete</a></td>
                    </tr>
                  <?php  }
                ?>
              <?php  }
            ?>
        </tbody>
    </table>
    <p style="margin-top: 20px; font-style: italic; text-align: left">Có <b><?php echo $num_rows; ?></b> thành viên trong hệ thống</p>
</div>
<?php get_footer(); ?>