<?php
if($_POST['btn_submit'] == 'ส่งข้อมูล') {
	
	//echo $_POST['check_list'];
	$check_list = implode(',  ', $_POST['check_list']);
	
	$status = false;
	if($_POST['txt_email'] == ''){
		$txt = "กรุณาใส่อีเมลล์ค่ะ";
		echo "<script>alert(' $txt !!!'); </script>";
		$status = true;

	}
	if($_POST['txt_tel'] == '' && $status == false){
		$txt = "กรุณาใส่เบอร์โทรค่ะ";
		echo "<script>alert(' $txt !!!')</script>";
		$status = true;
	}
	if($_POST['txt_name'] == '' && $status == false){
		$txt = "กรุณาใส่ชื่อ";
		echo "<script>alert(' $txt !!!')</script>";
		$status = true;
	}
	if($_POST['txt_born'] == '' && $status == false){
		$txt = "กรุณาใส่ปี พ.ศ. เกิด";
		echo "<script>alert(' $txt !!!')</script>";
		$status = true;
	}

	
		
		require_once('phpmailer/class.phpmailer.php');
		
		
		$mail = new PHPMailer();
		$mail->IsHTML(true);
		$mail->IsSMTP();
		$mail->SMTPAuth = true; // enable SMTP authentication
		$mail->SMTPSecure = "ssl"; // sets the prefix to the servier
		$mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
		$mail->Port = 465; // set the SMTP port for the GMAIL server
		$mail->Username = "nitikarnboom2030@gmail.com"; // GMAIL username
		$mail->Password = "Boom5990"; // GMAIL password
		$mail->From = "bb@gmail.com"; // "name@yourdomain.com";
		$mail->FromName = "!! ลูกค้าสนใจ เมืองไทยประกันชีวิต !!";  // set from Name
		$mail->Subject = "ติดต่อกลับหาลูกค้า"; 
		$mail->CharSet = "utf-8";
		$mail->Body = "<table width='603' border='1'>
	<tr>
		<td width='324'><div align='right'>E- mail;*</div></td>
		<td width='239' style='color:blue;'>  ".$_POST['txt_email']. "</td>
	</tr>
	<tr>
		<td><div align='right'>เบอร์มือถือ :*</div></td>
		<td style='color:blue;'>  ".$_POST['txt_tel']." </td>
	</tr>
	<tr>
		<td><div align='right'>ชื่อ-สกุล ผู้จะทำประกัน :*</div></td>
		<td style='color:blue;'>  ".$_POST['txt_name']." </td>
	</tr>
	<tr>
		<td><div align='right'>ปี พ.ศ. เกิด *ของผู้จะทำประกัน :*</div></td>
		<td style='color:blue;'>  ".$_POST['txt_born']." </td>
	</tr>
	<tr>
		<td><div align='right'>จังหวัด :</div></td>
		<td style='color:blue;'>  ".$_POST['txt_province']." </td>
	</tr>
	<tr>
		<td><div align='right'>เบี้ยประกันที่ท่านชำระได้ (บาทต่อปี) :</div></td>
		<td style='color:blue;'> ". $_POST['insperyear'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ทุนประกันที่ต้องการ (บาท) :</div></td>
		<td style='color:blue;'> ". $_POST['ins'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ผู้ป่วยใน IPD (HS) ค่าห้อง ค่าอาหาร ค่าบริการ :</div></td>
		<td style='color:blue;'> ". $_POST['ipd']." </td>
	</tr>
	<tr>
		<td height='31'><div align='right'>ค่าชดเชยกรณีนอนโรงพยาบาล(HB)ต้องการวันละ:</div></td>
		<td style='color:blue;'> ". $_POST['hb']." </td>
	</tr>
	<tr>
		<td><div align='right'>อนุสัญญาเพิ่มเติม คุ้มครอง :</div></td>
		<td style='color:blue;'>  ".$check_list."</td>
	</tr>
	<tr>
		<td><div align='right'>ช่วงเวลาที่สะดวกให้ติดต่อกลับ :</div></td>
		<td style='color:blue;'>  ".$_POST['calltime'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ข้อความ :</div></td>
		<td style='color:blue;'> ". $_POST['txt_msg']." </td>
	</tr>
</table>";
		 
		$mail->AddAddress('pittaya.mtl@gmail.com'); // to Address
		 
		$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
		if($status == false){
			if(!$mail->Send()) 
			{
				//echo 'Mailer Error: ' . $mail->ErrorInfo.'<br />';
			} 
			else 
			{
				echo "<script>alert('สำเร็จ !!!')</script>";
			}
		}
		
		
			$strTo = "mtl@tanonghomestay.com";
		
			$strSubject = "!! ลูกค้าสนใจ เมืองไทยประกันชีวิต !!";
			
			$strHeader  = "MIME-Version: 1.0\r\n";
			$strHeader .= "Content-type: text/plain; charset=utf-8\r\n";
			$strHeader .= "From: mtl@tanonghomestay.com\r\n";
			$strHeader .= "Reply-To: mtl@tanonghomestay.com\r\n";
			$strHeader .= "X-Mailer: PHP/picoHosting";
			//$strMessage .= "\n\n";
			$strMessage .= "<table width='603' border='1'>
	<tr>
		<td width='324'><div align='right'>E- mail;*</div></td>
		<td width='239' style='color:blue;'>  ".$_POST['txt_email']. " </td>
	</tr>
	<tr>
		<td><div align='right'>เบอร์มือถือ :*</div></td>
		<td  style='color:blue;'>  ".$_POST['txt_tel']." </td>
	</tr>
	<tr>
		<td><div align='right'>ชื่อ-สกุล ผู้จะทำประกัน :*</div></td>
		<td  style='color:blue;'>   ".$_POST['txt_name']." </td>
	</tr>
	<tr>
		<td><div align='right'>ปี พ.ศ. เกิด *ของผู้จะทำประกัน :*</div></td>
		<td  style='color:blue;'>  ".$_POST['txt_born']." </td>
	</tr>
	<tr>
		<td><div align='right'>จังหวัด :</div></td>
		<td  style='color:blue;'>  ".$_POST['txt_province']." </td>
	</tr>
	<tr> 
		<td><div align='right'>เบี้ยประกันที่ท่านชำระได้ (บาทต่อปี) :</div></td>
		<td  style='color:blue;'> ". $_POST['insperyear'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ทุนประกันที่ต้องการ (บาท) :</div></td>
		<td  style='color:blue;'> ". $_POST['ins'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ผู้ป่วยใน IPD (HS) ค่าห้อง ค่าอาหาร ค่าบริการ :</div></td>
		<td  style='color:blue;'> ". $_POST['ipd']." </td>
	</tr>
	<tr>
		<td height='31'><div align='right'>ค่าชดเชยกรณีนอนโรงพยาบาล(HB)ต้องการวันละ:</div></td>
		<td  style='color:blue;'> ". $_POST['hb']." </td>
	</tr>
	<tr>
		<td><div align='right'>อนุสัญญาเพิ่มเติม คุ้มครอง :</div></td>
		<td  style='color:blue;'>  ".$check_list."</td>
	</tr>
	<tr>
		<td><div align='right'>ช่วงเวลาที่สะดวกให้ติดต่อกลับ :</div></td>
		<td  style='color:blue;'>  ".$_POST['calltime'] ."</td>
	</tr>
	<tr>
		<td><div align='right'>ข้อความ :</div></td>
		<td  style='color:blue;'> ". $_POST['txt_msg']." </td>
	</tr>
</table>";
			
		if($status == false){
			$flgSend = @mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //
			if($flgSend)
			{
			//	echo "Email Sending.";
			}
			else
			{
				//echo "Email Can Not Send.";
			}
		}
		
}

?>
<form action="" method="post">
<p style="text-align: center;">-------------------------------------------------</p><br><br><br>
<p style="text-align: center;"><span style="color: #0000ff;"><strong>สนใจแบบประกัน กรุณากรอกข้อมูลด้านล่างเพื่อให้เจ้าหน้าที่ติดต่อให้ข้อมูลโดยละเอียด</strong></span></p>
    <div class="listService" align="center">
        <strong style="font-family:Verdana, Geneva, sans-serif !important; font-size:19px !important;">กรอกข้อมูลให้ตัวแทนติดต่อกลับ</strong>
        <div class="row">
            <div class="col-md-5 box-gd">
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">(ข้อมูลสำคัญ) E-mail Address : <span style="color:#F00; font-size:18px !important;">*</span></div>
                    <div class="">
                        <input type="text" name="txt_email" value="<?php echo $_POST['txt_email'] ?>" style="width:180px; height:25px;">
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">(ข้อมูลสำคัญ) เบอร์มือถือ :<span style="color:#F00; font-size:18px !important;">*</span></div>
                    <div class="">
                        <input type="text" name="txt_tel" value="<?php echo $_POST['txt_tel'] ?>" style="width:180px; height:25px;">
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">(ข้อมูลสำคัญ) ชื่อ-สกุล ผู้จะทำประกัน :<span style="color:#F00; font-size:18px !important;">*</span></div>
                    <div class="">
                        <input type="text" name="txt_name" value="<?php echo $_POST['txt_name'] ?>" style="width:180px; height:25px;">
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">(ข้อมูลสำคัญ) ปี พ.ศ. เกิด *ของผู้จะทำประกัน :<span style="color:#F00; font-size:18px !important;">*</span></div>
                    <div class="">
                        <input type="text" name="txt_born" value="<?php echo $_POST['txt_born'] ?>" style="width:180px; height:25px;">
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">จังหวัด :</div>
                    <div class="">
                        <input type="text" name="txt_province" value="<?php echo $_POST['txt_province'] ?>" style="width:180px; height:25px;">
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">เบี้ยประกันที่ท่านชำระได้ (บาทต่อปี)  :</div>
                    <div class="">
                        <select name="insperyear" id="" style="width:175px;">
                            <option value="">Please Select</option>
                            <option value="10,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '10,000 บาทต่อปี' ? 'selected' : '' ?>>&lt; 10,000 บาทต่อปี</option>
                            <option value="10,001-15,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '10,001-15,000 บาทต่อปี' ? 'selected' : '' ?>>10,001-15,000 บาทต่อปี</option>
                            <option value="15,001-20,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '15,001-20,000 บาทต่อปี' ? 'selected' : '' ?>>15,001-20,000 บาทต่อปี</option>
                            <option value="20,001-25,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '20,001-25,000 บาทต่อปี' ? 'selected' : '' ?>>20,001-25,000 บาทต่อปี</option>
                            <option value="25,001-30,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '25,001-30,000 บาทต่อปี' ? 'selected' : '' ?>>25,001-30,000 บาทต่อปี</option>
                            <option value="30,001-35,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '30,001-35,000 บาทต่อปี' ? 'selected' : '' ?>>30,001-35,000 บาทต่อปี</option>
                            <option value="35,001-40,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '35,001-40,000 บาทต่อปี' ? 'selected' : '' ?>>35,001-40,000 บาทต่อปี</option>
                            <option value="40,001-45,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '40,001-45,000 บาทต่อปี' ? 'selected' : '' ?>>40,001-45,000 บาทต่อปี</option>
                            <option value="45,001-50,000 บาทต่อปี" <?php echo $_POST['insperyear'] == '45,001-50,000 บาทต่อปี' ? 'selected' : '' ?>>45,001-50,000 บาทต่อปี</option>
                            <option value="50,001 บาทต่อปี" <?php echo $_POST['insperyear'] == '50,001 บาทต่อปี' ? 'selected' : '' ?>>&gt; 50,001 บาทต่อปี</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">ทุนประกันที่ต้องการ (บาท) :</div>
                    <div class="">
                        <select name="ins" style="width:175px;">
                            <option value="">Please Select</option>
                            <option value="100,000-300,000 บาท" <?php echo $_POST['ins'] == '100,000-300,000 บาท' ? 'selected' : '' ?>>100,000-300,000 บาท</option>
                            <option value="300,001-500,000 บาท" <?php echo $_POST['ins'] == '300,000-500,000 บาท' ? 'selected' : '' ?>>300,001-500,000 บาท</option>
                            <option value="500,001-700,000 บาท (มีส่วนลดพิเศษ)" <?php echo $_POST['ins'] == '500,001-700,000 บาท (มีส่วนลดพิเศษ)' ? 'selected' : '' ?>>500,001-700,000 บาท (มีส่วนลดพิเศษ)</option>
                            <option value="700,001-1,000,000 บาท (มีส่วนลดพิเศษ)" <?php echo $_POST['ins'] == '700,001-1,000,000 บาท (มีส่วนลดพิเศษ)' ? 'selected' : '' ?>>700,001-1,000,000 บาท (มีส่วนลดพิเศษ)</option>
                            <option value="มากกว่า 1,000,000 บาทขึ้นไป (มีส่วนลดพิเศษ)" <?php echo $_POST['ins'] == 'มากกว่า 1,000,000 บาทขึ้นไป (มีส่วนลดพิเศษ)' ? 'selected' : '' ?>>มากกว่า 1,000,000 บาทขึ้นไป (มีส่วนลดพิเศษ)</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">ผู้ป่วยใน IPD (HS) ค่าห้อง ค่าอาหาร ค่าบริการ :</div>
                    <div class="">
                        <select name="ipd" style="width:175px;">
                            <option value="">Please Select</option>
                            <option value="ค่าห้อง 400 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 400 บาท' ? 'selected' : '' ?>>ค่าห้อง 400 บาท</option>
                            <option value="ค่าห้อง 600 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 600 บาท' ? 'selected' : '' ?>>ค่าห้อง 600 บาท</option>
                            <option value="ค่าห้อง 800 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 800 บาท' ? 'selected' : '' ?>>ค่าห้อง 800 บาท</option>
                            <option value="ค่าห้อง 1,000 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 1,000 บาท' ? 'selected' : '' ?>>ค่าห้อง 1,000 บาท</option>
                            <option value="ค่าห้อง 2,000 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 2,000 บาท' ? 'selected' : '' ?>>ค่าห้อง 2,000 บาท</option>
                            <option value="ค่าห้อง 3,000 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 3,000 บาท' ? 'selected' : '' ?>>ค่าห้อง 3,000 บาท</option>
                            <option value="ค่าห้อง 4,000 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 4,000 บาท' ? 'selected' : '' ?>>ค่าห้อง 4,000 บาท</option>
                            <option value="ค่าห้อง 5,000 บาท" <?php echo $_POST['ipd'] == 'ค่าห้อง 5,000 บาท' ? 'selected' : '' ?>>ค่าห้อง 5,000 บาท</option>
                            <option value="5,001 บาท (VIP ROOM)" <?php echo $_POST['ipd'] == '5,001 บาท (VIP ROOM)' ? 'selected' : '' ?>>ค่าห้อง &gt; 5,001 บาท (VIP ROOM)</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">ค่าชดเชยกรณีนอนโรงพยาบาล(HB)ต้องการวันละ: </div>
                    <div class="">
                        <select name="hb" style="width:175px;">
                            <option value="">Please Select</option>
                            <option value="ชดเชยวันละ 100-500 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 100-500 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 100-500 บาท</option>
                            <option value="ชดเชยวันละ 600-1,000 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 600-1,000 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 600-1,000 บาท</option>
                            <option value="ชดเชยวันละ 1,100-1,500 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 1,100-1,500 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 1,100-1,500 บาท</option>
                            <option value="ชดเชยวันละ 1,600-2,000 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 1,600-2,000 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 1,600-2,000 บาท</option>
                            <option value="ชดเชยวันละ 2,100-2,500 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 2,100-2,500 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 2,100-2,500 บาท</option>
                            <option value="ชดเชยวันละ 2,600-3,000 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 2,600-3,000 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 2,600-3,000 บาท</option>
                            <option value="ชดเชยวันละ 3,000-5,000 บาท" <?php echo $_POST['hb'] == 'ชดเชยวันละ 3,000-5,000 บาท' ? 'selected' : '' ?>>ชดเชยวันละ 3,000-5,000 บาท</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">อนุสัญญาเพิ่มเติม คุ้มครอง :</div>
                    <div class="row-sub">
                        <?php
                        foreach ($_POST['check_list'] as $item) {

                            if ($item == 'คุ้มครอง 30 โรคร้ายแรง') {
                                $c1 = 'checked';
                            }
                            if ($item == 'ชดเชยอุบัติเหตุ') {
                                $c2 = 'checked';
                            }
                            if ($item == 'ชดเชยโรคมะเร็ง') {
                                $c3 = 'checked';
                            }
                            if ($item == 'คุ้มครองผู้ชำระเบี้ย (ผู้ปกครองชำระเบี้ยให้บุตร)') {
                                $c4 = 'checked';
                            }
                        }
                        ?>
                        <input id="" type="checkbox" name="check_list[]" value="คุ้มครอง 30 โรคร้ายแรง" <?php echo $c1; ?>>
                        <label>คุ้มครอง 30 โรคร้ายแรง</label>
                    </div>
                    <div class="row-sub" >
                        <input id="" type="checkbox" name="check_list[]" value="ชดเชยอุบัติเหตุ" <?php echo $c2; ?>>
                        <label>ชดเชยอุบัติเหตุ</label>
                    </div>
                    <div class="row-sub" >
                        <input id="" type="checkbox" name="check_list[]" value="ชดเชยโรคมะเร็ง" <?php echo $c3; ?>>
                        <label>ชดเชยโรคมะเร็ง</label>
                    </div>
                    <div class="row-sub" >
                        <input id="" type="checkbox" name="check_list[]" value="คุ้มครองผู้ชำระเบี้ย (ผู้ปกครองชำระเบี้ยให้บุตร)" <?php echo $c4; ?>>
                        <label>คุ้มครองผู้ชำระเบี้ย (ผู้ปกครองชำระเบี้ยให้บุตร)</label>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">ช่วงเวลาที่สะดวกให้ติดต่อกลับ :</div>
                    <div class="">
                        <select name="calltime">
                            <option value="">Please Select</option>
                            <option value="08:00-12:00 น." <?php echo $_POST['calltime'] == '08:00-12:00 น.' ? 'selected' : '' ?>>08:00-12:00 น.</option>
                            <option value="12:00-13:00 น." <?php echo $_POST['calltime'] == '12:00-13:00 น.' ? 'selected' : '' ?>>12:00-13:00 น.</option>
                            <option value="13:00-17:00 น." <?php echo $_POST['calltime'] == '13:00-17:00 น.' ? 'selected' : '' ?>>13:00-17:00 น.</option>
                            <option value="ตลอดเวลา" <?php echo $_POST['calltime'] == 'ตลอดเวลา' ? 'selected' : '' ?>>ตลอดเวลา</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="" style="font-size:13px;  font-weight:bold; color:#000;">ข้อความ :</div>
                    <div class="">
                        <textarea rows="4" name="txt_msg"><?php echo $_POST['txt_msg']; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="pull">
                        <input type="submit" value="ส่งข้อมูล" name="btn_submit">
                    </div>
                </div>
            </div>
            <div class="col-md-5"> <img src="<?php echo ADDRESS_MEDIA ?>call-back-1.gif" style="width:100%;"> </div>
        </div>
    </div>

</form>
<style>
    .row{ margin-bottom:10px; width:100%;}
    .row-sub{  width:100%; color:#000; font-size:13px;}
    .col-md-12{width:100%; }
    .col-md-11{width:91.66666667%}
    .col-md-10{width:83.33333333%}
    .col-md-9{width:75%}
    .col-md-8{width:66.66666667%}
    .col-md-7{width:58.33333333%}
    .col-md-6{width:50%}
    .col-md-5{width:41.66666667%}
    .col-md-4{width:33.33333333%} 
    .col-md-3{width:25%}
    .col-md-2{width:16.66666667%}
    .col-md-1{width:8.33333333%}

    .col-md-12,.col-md-11,.col-md-10,.col-md-9,.col-md-8,.col-md-7,.col-md-6,.col-md-5,.col-md-4,.col-md-3,.col-md-2,.col-md-1{float:left; }
    .text-right { text-align:right;} 
    .text-left { text-align:left;} 
    .bb-boom{

        border-image-slice: 75 89 72 89; border-image-width: 20px 20px 20px 20px; border-image-outset: 0px 0px 0px 0px; border-image-repeat: stretch stretch; border-image-source: url("http://www.yogibotanicals.com/images/BORDER%201.jpg");
    }
    .row > div{text-align:left;}
    .box-gd{
        background: rgb(255,221,215); /* Old browsers */
        background: -moz-linear-gradient(top,  rgba(255,221,215,1) 0%, rgba(250,176,158,1) 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,221,215,1)), color-stop(100%,rgba(250,176,158,1))); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  rgba(255,221,215,1) 0%,rgba(250,176,158,1) 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  rgba(255,221,215,1) 0%,rgba(250,176,158,1) 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  rgba(255,221,215,1) 0%,rgba(250,176,158,1) 100%); /* IE10+ */
        background: linear-gradient(to bottom,  rgba(255,221,215,1) 0%,rgba(250,176,158,1) 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffddd7', endColorstr='#fab09e',GradientType=0 ); /* IE6-9 */
        padding: 20 30px 34px 50px;
        border-radius: 8px;
        margin-right: 20px;

    }
</style>
