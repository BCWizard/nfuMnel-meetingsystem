<?php
$sql = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);

for($i=0;$i<5;$i++){
echo'
    <tr data-bs-toggle="collapse" data-bs-target="#r'.$i.'">
        <td>中文(一)</td>
        <td>2022/12/12</td>
        <td>通識教育中心</td>
        <td>莊怡文</td>
        <td><button type="button" class="btn btn-outline-dark btn-sm">播放</button></td>
    </tr>
    <tr class="collapse accordion-collapse" id="r'.$i.'">
        <td colspan="5"> 
        Item 1 detail .. This is the first item\'s accordion body.
        </td>
    </tr>
';
}