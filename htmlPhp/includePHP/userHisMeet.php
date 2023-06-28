<?php
$userAccount=$_SESSION['userAccount'];
date_default_timezone_set('Asia/Taipei');

    $sqlCourseInfo = "SELECT *
                        FROM courseInfo 
                        INNER JOIN courseHost ON courseInfo.courseId=courseHost.courseId
                        INNER JOIN courseMember ON courseInfo.courseId = courseMember.courseId
                        WHERE courseMember.courseMember ='{$userAccount}'
                        ORDER BY CONVERT(CONCAT(courseInfo.courseDateEnd,' ',courseInfo.courseTimeEnd),CHAR) DESC";

    $courseInfoResult=mysqli_query($conn,$sqlCourseInfo);
    
    $countNumber = 0;
    while($courseInfoData = mysqli_fetch_assoc($courseInfoResult)){
        if(strtotime($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']) < strtotime(date('Y-m-d H:i:s'))){
            $countNumber++;
            if($countNumber >= 6)
                break;
            echo'
                <tr data-bs-toggle="collapse" data-bs-target="#r'.$courseInfoData['courseId'].'">
                    <td>'.$courseInfoData['courseName'].'</td>
                    <td>'.$courseInfoData['courseDateStart'].'<br>'.$courseInfoData['courseTimeStart'].'</td>
                    <td>'.$courseInfoData['courseDateEnd'].'<br>'.$courseInfoData['courseTimeEnd'].'</td>
                    <td>'.$courseInfoData['courseHostAcc'].'</td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm" onclick="location.href=\'../Histogram.php?courseID='.$courseInfoData['courseId'].'\'">播放</button></td>
                </tr>
                <tr class="collapse accordion-collapse" id="r'.$courseInfoData['courseId'].'">
                    <td colspan="5"> 
                        會議代碼:'.$courseInfoData['courseId'].'<br>'
                        .$courseInfoData['courseContent'];

                        if($courseInfoData['fileExist']==1){
                            echo"
                                <br>
                                <a href=\"../sessionFile/{$courseInfoData['courseId']}.pdf\">會議檔案</a>
                            ";
                        }
                        if($courseInfoData['courseHostAcc'] === $userAccount){
                            echo"
                                <br>
                                <button type=\"button\" class=\"btn btn-danger btn-sm\" onclick=\"
                                    location.href='../Manager/deleteSession.php?courseId={$courseInfoData['courseId']}'\">刪除</button>
                            ";
                        }

            echo'
                    </td>
                </tr>
            ';
        }
    }
        