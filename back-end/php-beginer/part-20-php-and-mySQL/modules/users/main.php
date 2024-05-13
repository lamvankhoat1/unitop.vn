<?php get_header(); ?>

<?php
  $sql = "SELECT * FROM tbl_users";
  $result = mysqli_query($conn, $sql);
  $list_users = array();
  $num_rows  = mysqli_num_rows($result);
  if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $list_users[] = $row;
    }
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
        padding: 10px 15px
    }
</style>
<div id="main">
    <a href="?mod=users&act=add">Thêm thành viên</a>
    <h2>DANH SÁCH THÀNH VIÊN</h2>
    <table>
        <thead>
            <tr>
                <th>User Id</th>
                <th>Username</th>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Giới tính</th>
            </tr>
        </thead>
        <tbody>
            <?php
              foreach ($list_users as $user) {  ?>
                  <tr>
                      <td><?php echo $user['user_id']; ?></td>
                      <td><?php echo $user['username']; ?></td>
                      <td><?php echo $user['fullname']; ?></td>
                      <td><?php echo $user['email']; ?></td>
                      <td><?php echo $user['gender']; ?></td>
                  </tr>
              <?php  }
            ?>
        </tbody>
    </table>
    <p style="margin-top: 20px; font-style: italic; text-align: left">Có <b><?php echo $num_rows; ?></b> thành viên trong hệ thống</p>
</div>
<?php get_footer(); ?>