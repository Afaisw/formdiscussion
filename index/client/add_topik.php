<?php
$errors = array();
if (isset($_POST['submit']))
	{
		//validasi data yang diinput
		require '../config/validate.inc';
	 	validateWajib($errors, $_POST, 'isi');
	 	if ($errors) //jika ada error / field yang tidak sesuai dengan validasi
		{
	 	// tampilkan kembali form
			include 'formtambahtopik.php';
	 	}
	 	else
	 	{
		//jika field sudah benar maka akan diinput ke database
		$state = $db->prepare("insert into tb_topik values (null, :isi)");
		$state->bindValue(':isi', $_POST['isi']);
		$state->execute();
		if ($state)
			{
			// akan memunculkan notif dan direct ke lokasi yang di tuju
			echo "<script>alert('Berhasil Menambah Topik');location.href='?page=v_question';</script>";
			}else {
			echo "<script>alert('Gagal Input ke DATABASE !');location.href='?page=addtopik';</script>";
			}	
	 	}
	}
else
	// tampilkan kembali form
	include 'formtambahtopik.php';
?> 