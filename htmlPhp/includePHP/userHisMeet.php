<?php
//$userClass;
$userAccount=$_SESSION['userAccount'];
date_default_timezone_set('Asia/Taipei');
/*
                                                                                                    //取得使用者群組
$sqlUserInfo = "SELECT * FROM userInfo WHERE userAccount ='{$_SESSION["userAccount"]}'";
    $userInfoResult=mysqli_query($conn,$sqlUserInfo);                                                               //connection,query(查詢字串);回傳result
    $userClassData = mysqli_fetch_assoc($userInfoResult);
    $userClass = $userClassData["userClass"];
    */
                                                                                                    //取得參加courseId
//$sqlCourseId = "SELECT courseId FROM courseMember WHERE courseMember ='{$_SESSION['userAccount']}' OR courseMember ='{$userClass}'";
$sqlCourseId = "SELECT courseId FROM courseMember WHERE courseMember ='{$userAccount}'";
    $courseMemberResult=mysqli_query($conn,$sqlCourseId);                                           //connection,query(查詢字串);回傳result
    while ($courseMemberRow = mysqli_fetch_assoc($courseMemberResult)){
        ///*
        $sqlCourseInfo = "SELECT *
                            FROM courseInfo INNER JOIN courseHost ON courseInfo.courseId=courseHost.courseId
                            WHERE courseInfo.courseId ='{$courseMemberRow['courseId']}'                       
                            ORDER BY courseHost.courseHostAcc ASC";
        //*/                   
        //$sqlCourseInfo = "SELECT * from (courseInfo INNER JOIN courseHost ON courseInfo.courseId = courseHost.courseId) WHERE courseInfo.courseId ='{$courseMemberRow['courseId']}' ORDER BY courseDateEnd DESC";
        $courseInfoResult=mysqli_query($conn,$sqlCourseInfo);
        $courseInfoData = mysqli_fetch_assoc($courseInfoResult);
        //echo ($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']).'<br>'.(date('Y-m-d H:i:s')).'<br><br>';
        if(strtotime($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']) < strtotime(date('Y-m-d H:i:s'))){
            echo'
                <tr data-bs-toggle="collapse" data-bs-target="#r'.$courseInfoData['courseId'].'">
                    <td>'.$courseInfoData['courseName'].'</td>
                    <td>'.$courseInfoData['courseDateStart'].'</td>
                    <td>'.$courseInfoData['courseTimeStart'].'</td>
                    <td>'.$courseInfoData['courseDateEnd'].'</td>
                    <td>'.$courseInfoData['courseTimeEnd'].'</td>
                    <td>'.$courseInfoData['courseHostAcc'].'</td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm" onclick="location.href=\'../Histogram.php?courseID='.$courseInfoData['courseId'].'\'">播放</button></td>
                </tr>
                <tr class="collapse accordion-collapse" id="r'.$courseInfoData['courseId'].'">
                    <td colspan="7"> 
                        '.$courseInfoData['courseContent'];

                        if($courseInfoData['fileExist']==1){
                            echo"
                                <br>
                                <a href=\"../sessionFile/{$courseInfoData['courseId']}.pdf\">會議檔案</a>
                            ";
                        }

            echo'
                    </td>
                </tr>
            ';
        }
    }

/*
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
*/