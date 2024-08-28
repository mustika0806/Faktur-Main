<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        let currentSlide = 0;
        const slides = $('.modal-slide');

        function showSlide(index) {
            slides.removeClass('active');
            slides.eq(index).addClass('active');
        }

        $('.btn-previous').click(function() {
            currentSlide = Math.max(currentSlide - 1, 0);
            showSlide(currentSlide);
        });

        $('.btn-next').click(function() {
            currentSlide = Math.min(currentSlide + 1, slides.length - 1);
            showSlide(currentSlide);
        });

        // Menampilkan modal
        $('#show-modal-button').click(function() {
            currentSlide = 0;
            showSlide(currentSlide);
            $('.modal').show();
        });

        // Menutup modal
        $('.modal').click(function(e) {
            if (e.target === this) {
                $('.modal').hide();
            }
        });

        // Menutup modal dengan tombol Close
        $('.btn-close').click(function() {
            $('.modal').hide();
        });
    });
</script>