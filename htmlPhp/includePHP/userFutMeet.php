<?php
$userClass;
date_default_timezone_set('Asia/Taipei');
                                                                                                    //取得使用者群組
$sqlUserInfo = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $userInfoResult=mysqli_query($conn,$sqlUserInfo);                                                               //connection,query(查詢字串);回傳result
    $userClassData = mysqli_fetch_assoc($userInfoResult);
    $userClass = $userClassData["userClass"];
                                                                                                    //取得參加courseId
//$sqlCourseId = "SELECT courseId FROM courseMember WHERE courseMember ='{$_SESSION['userAccount']}' OR courseMember ='{$userClass}'";
$sqlCourseId = "SELECT courseId FROM courseMember WHERE courseMember ='{$userClass}'";
    $courseMemberResult=mysqli_query($conn,$sqlCourseId);                                           //connection,query(查詢字串);回傳result

    while ($courseMemberRow = mysqli_fetch_assoc($courseMemberResult)){
        $sqlCourseInfo = "SELECT * 
                            FROM courseInfo INNER JOIN courseHost ON courseInfo.courseId=courseHost.courseId 
                            WHERE courseInfo.courseId ='{$courseMemberRow['courseId']}' 
                            ORDER BY courseInfo.courseDateStart ASC";
        $courseInfoResult=mysqli_query($conn,$sqlCourseInfo);
        $courseInfoData = mysqli_fetch_assoc($courseInfoResult);
        //echo ($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']).'<br>'.(date('Y-m-d H:i:s')).'<br><br>';
        ///*
        if(strtotime($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']) >= strtotime(date('Y-m-d H:i:s'))){
            echo'
                <tr data-bs-toggle="collapse" data-bs-target="#r'.$courseInfoData['courseId'].'">
                    <td>'.$courseInfoData['courseName'].'</td>
                    <td>'.$courseInfoData['courseDateStart'].'</td>
                    <td>'.$courseInfoData['courseTimeStart'].'</td>
                    <td>'.$courseInfoData['courseDateEnd'].'</td>
                    <td>'.$courseInfoData['courseTimeEnd'].'</td>
                    <td>'.$courseInfoData['courseHostAcc'].'</td>';
                                                                                                    //根據目前時間開放會議連結
            if(strtotime($courseInfoData['courseDateStart'] . ' ' . $courseInfoData['courseTimeStart']) <= strtotime(date('Y-m-d H:i:s'))){
                echo '<td><button type="button" class="btn btn-outline-dark btn-sm">參加</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>';
            }
            echo'
                </tr>
                <tr class="collapse accordion-collapse" id="r'.$courseInfoData['courseId'].'">
                    <td colspan="7"> 
                        '.$courseInfoData['courseContent'].'
                    </td>
                </tr>
            ';
        }
        //*/
    }
/*
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
}*/