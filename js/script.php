<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var slides = document.getElementsByClassName("mySlides");

        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }

        slideIndex++;

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 10000);
    }

    function toggleApplicationForm() {
        var element = document.getElementById("application-form");
        if (element.style.display == "none") {
            element.style.display = "inline-block";
        } else {
            element.style.display = "none";
        }
    }
</script>
