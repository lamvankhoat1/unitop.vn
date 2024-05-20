<?php get_header(); ?>

<?php 
  $num_rows  = db_num_rows("SELECT * FROM `tbl_users`");
  $num_per_page = 5;
  $num_page = ceil($num_rows/$num_per_page);
  # start
  $page = (isset($_GET['page'])) ? $_GET['page'] : 1 ;
  $start = ($page-1)*$num_per_page;
  # data array
  $sql = "SELECT * FROM `tbl_users` LIMIT {$num_per_page} OFFSET {$start}";
  $list_users = db_fetch_array($sql);


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

.table-info {
    display: flex;
    justify-content: space-between;
    align-items: end;
    margin-top: 20px
}

.table-info ul.paging {
    list-style: none;
}

.table-info ul.paging li {
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ddd;
    margin-right: 10px;
    border-radius: 5px;
}

ul.paging li.active {
    border-color: red;
}

ul.paging li.active a {
    color: red;
    font-weight: bold;
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
              for ($i=0; $i <= count($list_users); $i++) { 
                  ?>
            <?php
                  if ($i < count($list_users)) {
                      ?>
            <tr>
                <td><?php echo ($i+$start+1); ?></td>
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
    <div class="table-info">
        <p style="margin-top: 20px; font-style: italic; text-align: left">Có <b><?php echo $num_rows; ?></b> thành viên
            trong hệ thống</p>
        <ul class="paging">
        <?php
          if ($page > 1) {
            $page_prev = $page-1;
            echo "<li><a href=\"?mod=users&act=main&page={$page_prev}\">Trước</a></li>";
          }
          for ($i=1; $i <= $num_page; $i++) {
            $active_page = "";
            if ($i == $page) {
                $active_page = " class='active' ";
            }
            echo "<li {$active_page}><a href=\"?mod=users&act=main&page={$i}\">{$i}</a></li>";
          }
          if ($page < $num_page) {
            $page_next = $page+1;
            echo "<li><a href=\"?mod=users&act=main&page={$page_next}\">Sau</a></li>";
          }
        ?>    
        </ul>   
            <!-- 
            <li><a href="?mod=users&act=main&page=5">Sau</a></li> -->
    </div>
</div>
<?php get_footer(); ?>