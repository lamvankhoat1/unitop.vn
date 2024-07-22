<?php get_header() ?>
<?php
  $order_info = json_decode($order['list_orders'], 1);
?>
<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <div id="content" class="detail-exhibition">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Người nhận hàng</h3>
                        <span class="detail"><?php echo $order['fullname']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail"><?php echo $order['address']; ?> / <?php echo $order['phone']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Email liên hệ</h3>
                        <span class="detail"><?php echo $order['email']; ?></span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail"><?php echo $order['payment_method']; ?></span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <?php 
                                $GLOBALS['status_order'] = $order['status_orders'];
                                function selected_status_order($status) {
                                    if ($status == $GLOBALS['status_order']) {
                                        echo "selected";
                                    }
                                }
                            ?>
                            <select name="status">
                                <option value='pending' <?php selected_status_order('pending')?>>Chờ duyệt</option>
                                <option value='shipping' <?php selected_status_order('shipping')?>>Đang vận chuyển</option>
                                <option  value='success' <?php selected_status_order('success')?>>Thành công</option>                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">
                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tmp_number = 0; ?>
                            <?php foreach ($order_info['buy'] as $product) {  ?>
                                <tr>
                                    <td class="thead-text"><?php echo ++$tmp_number; ?></td>
                                    <td class="thead-text">
                                        <div class="thumb">
                                            <img src="../<?php echo $product['thumb_main']; ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="thead-text"><?php echo $product['name']; ?></td>
                                    <td class="thead-text"><?php echo currency($product['new_price']); ?> VNĐ</td>
                                    <td class="thead-text"><?php echo $product['qty']; ?></td>
                                    <td class="thead-text"><?php echo currency($product['total_price']); ?> VNĐ</td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>
                        <li>
                            <span class="total-fee"><?php echo $order_info['summary']['qty']; ?> sản phẩm</span>
                            <span class="total"><?php echo currency($order_info['summary']['total_price']); ?> VNĐ</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php get_footer() ?>