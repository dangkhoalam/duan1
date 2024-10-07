<div class="main" >
    <h1 style="text-align: center;margin-bottom: 50px;">Tài Khoản</h1>
    <div style="float: right; margin-right: 450px;">
    <table border="1" style="text-align: center;">
    <tr >
            <th>STT</th>
            <th>Username</th>
            <th>Pass</th>
            <th>Họ tên</th>
            <th>Địa Chỉ</th>
            <th>Email</th>
            <th>Điện thoại</th>
            <th>Đặc quyền</th>
            <th style="width: 100px;">Xoá tài khoản</th>
        </tr>
        <?php
            //var_dump($kq);
            
        ?>
    <?php
        if (isset($kq)&&(count($kq)>0)) {
            $i=1;
            foreach ($kq as $user) {
                echo '<tr>
                    <td>'.$i.'</td>
                    <td>'.$user['username'].'</td>
                    <td>'.$user['password'].'</td>
                    <td>'.$user['ten'].'</td>
                    <td>'.$user['diachi'].'</td>
                    <td>'.$user['email'].'</td>
                    <td>'.$user['dienthoai'].'</td>
                    <td>'.$user['role'].'</td>
                    <td><button style=" background: red; border: 0;color: white;padding: 10px;border-radius: 20px;"><a href="index.php?act=deluser&id='.$user['id'].'" style="color: white;" >Xoá</a></button></td>


                </tr>';
                $i++;
            }
        }
    ?>
    
    </table>
</div>
</div>