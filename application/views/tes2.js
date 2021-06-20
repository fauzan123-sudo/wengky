<script>
	$(document).ready( function () {
		$("#upload").click(function(){
			const fileupload = $('#fileupload').prop('files')[0];
			var nama_file = $('#nama_file').val();

			if (nama_file!="" && fileupload!="") {
		        let formData = new FormData();
		        formData.append('fileupload', fileupload);
		        formData.append('nama_file', nama_file);

		        $.ajax({
		            type: 'POST',
		            url: "upload.php",
		            data: formData,
		            cache: false,
		            processData: false,
		            contentType: false,
		            success: function (msg) {
		                alert(msg);
		                document.getElementById("form-data").reset();
		            },
		            error: function () {
		                alert("Data Gagal Diupload");
		            }
		        });
		    }
        });
    });
</script>