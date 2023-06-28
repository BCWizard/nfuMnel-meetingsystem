<?php
//$userClass;
$userAccount=$_SESSION['userAccount'];
date_default_timezone_set('Asia/Taipei');

    $sqlCourseInfo = "SELECT *
                        FROM courseInfo 
                        INNER JOIN courseHost ON courseInfo.courseId=courseHost.courseId
                        INNER JOIN courseMember ON courseInfo.courseId = courseMember.courseId
                        WHERE courseMember.courseMember ='{$userAccount}'
                        ORDER BY courseInfo.courseDateEnd DESC";            

    $courseInfoResult=mysqli_query($conn,$sqlCourseInfo);

    $countNumber = 0;
    while($courseInfoData = mysqli_fetch_assoc($courseInfoResult)){
        if(strtotime($courseInfoData['courseDateEnd'] . ' ' . $courseInfoData['courseTimeEnd']) >= strtotime(date('Y-m-d H:i:s'))){
            $countNumber++;
            if($countNumber >= 6)
                break;
            echo'
                <tr data-bs-toggle="collapse" data-bs-target="#r'.$courseInfoData['courseId'].'">
                    <td>'.$courseInfoData['courseName'].'</td>
                    <td>'.$courseInfoData['courseDateStart'].'<br>'.$courseInfoData['courseTimeStart'].'</td>
                    <td>'.$courseInfoData['courseDateEnd'].'<br>'.$courseInfoData['courseTimeEnd'].'</td>
                    <td>'.$courseInfoData['courseHostAcc'].'</td>';
                                                                                                    //根據目前時間開放會議連結
            if(strtotime($courseInfoData['courseDateStart'] . ' ' . $courseInfoData['courseTimeStart']) <= strtotime(date('Y-m-d H:i:s'))){
                echo '<td><button type="button" class="btn btn-outline-dark btn-sm" onclick="redirectMeetingRoom(\''.$courseInfoData['courseId'].'\')">參加</button></td>';
                //echo '<td><button type="button" class="btn btn-outline-dark btn-sm" onclick="<script>redirect(\'localhost:3000/room/'.$courseInfoData["courseId"].'\')</script>">參加</button></td>';
            }else{
                echo '<td><button type="button" class="btn btn-outline-dark btn-sm" disabled>參加</button></td>';
            }
            echo'
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
            echo'                        
                    </td>
                </tr>
            ';
        }
        //*/
    }
    echo "<script>
                        function redirectMeetingRoom(meetingRoomCode){
                            // 轉址函式
                            function redirect(url) {
                                window.location.href = url;
                            }
                            // 嘗試主要轉址
                            function tryMainRedirect() {
                                redirect('https://localhost:3000/room/'+meetingRoomCode);
                            }
                            // 備用轉址
                            function fallbackRedirect() {
                                alert('在嘗試3秒後無法連線至會議室!');                
                            }
                            // 設置轉址超時時間（以毫秒為單位）
                            const redirectTimeout = 3000; // 3秒
                            // 設置嘗試主要轉址的計時器
                            const timerId = setTimeout(fallbackRedirect, redirectTimeout);
                            // 嘗試主要轉址
                            tryMainRedirect();
                        }
                        </script>";


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