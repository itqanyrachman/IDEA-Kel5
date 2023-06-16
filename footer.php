<br/>
<br/>

<footer>
    <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
    </div>
    <ul class="social_icon">
        <li><a href="https://www.facebook.com/itqany"><ion-icon name="logo-facebook"></ion-icon></a></li>
        <li><a href="https://www.twitter.com/umikurniati"><ion-icon name="logo-twitter"></ion-icon></a></li>
        <li><a href="https://www.instagram.com/cahyaprs"><ion-icon name="logo-instagram"></ion-icon></a></li>
        <li><a href="https://www.linkedin.com/nurwandika"><ion-icon name="logo-linkedin"></ion-icon></a></li>
    </ul>
    <ul class="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">Idea</a></li>
        <li><a href="https://github.com/itqanyrachman/IDEA-Kel5">Tugas Akhir</a></li>
        <li><a href="https://www.instagram.com/ave">Kelompok 5</a></li>
    </ul>
    <div class="copy">
    &copy;Copyright 2023 Idea. <i class="bi bi-balloon-heart-fill"></i> All Right Reserved | Built by <a href="https://www.instagram.com/dummy" class="text-white fw-bold">Idea Kelompok 5</a>
    </div>
</footer>
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>
    // Mengatur animasi fade-in ketika elemen footer muncul dalam viewport
    function handleIntersection(entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }

    const options = {
        rootMargin: '0px',
        threshold: 0.3,
    };

    const observer = new IntersectionObserver(handleIntersection, options);
    const footer = document.querySelector('.footer');
    observer.observe(footer);
</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="assets_forum/assets/vendor/jquery/jquery.min.js"></script>
<script src="assets_forum/assets/vendor/popper/popper.min.js"></script>
<script src="assets_forum/assets/vendor/bootstrap/bootstrap.min.js"></script>
<script src="assets/bower_components/ckeditor/ckeditor.js"></script>
<script src="assets_forum/assets/vendor/headroom/headroom.min.js"></script>
<script src="assets_forum/assets/js/argon.js?v=1.1.0"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="assets_forum/summernote2/summernote-bs4.css">
<script src="assets_forum/summernote2/summernote-bs4.js"></script>
<link rel="stylesheet" href="stylefooter.css">
<script>
	$(document).ready(function(){

		$('#editor_forum').summernote({
			height:'250px',
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
					console.log(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});

		function uploadImage(image) {
			var data = new FormData();
			data.append("file", image);
			$.ajax({
				url: 'summernote_upload.php',
				cache: false,
				contentType: false,
				processData: false,
				data: data,
				type: "post",
				success: function(url) {
					var image = $('<img>').attr('src', 'http://' + url);
					$('#editor_forum').summernote("insertNode", image[0]);
				},
				error: function(data) {
					console.log(data);
				}
			});
		}

		function deleteImage(src) {
			$.ajax({
				data: {src : src},
				type: "POST",
				url: "summernote_delete.php",
				cache: false,
				success: function(response) {
					console.log(response);
				}
			});
		}


	});

</script>
</body>
</html>