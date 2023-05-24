<?php
$sql = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $result=mysqli_query($conn,$sql);                                                               //connection,query(查詢字串);回傳result
    $data = mysqli_fetch_assoc($result);

for($i=6;$i<11;$i++){
echo'
    <tr data-bs-toggle="collapse" data-bs-target="#r'.$i.'">
        <td>安全程式設計</td>
        <td>2022/12/29</td>
        <td>多媒體網路實驗室</td>
        <td>林易泉</td>
        <td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>
    </tr>
    <tr class="collapse accordion-collapse" id="r'.$i.'">
        <td colspan="5"> 
        Item 1 detail .. This is the first item\'s accordion body.                   
        </td>
    </tr>
';
}