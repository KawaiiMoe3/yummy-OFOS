//Slider
// Get prev,nextBtn
const prevBtn = document.querySelector('.prevBtn')
const nextBtn = document.querySelector('.nextBtn')
// Get slide
const slider = document.querySelector('.slider')
const slides = document.querySelectorAll('.slide')
const slideIcons = document.querySelectorAll('.slide-icon')
// Get number of slide
const numberOfSlides = slides.length
let slideNumber = 0

//Next button event
nextBtn.addEventListener("click", () => {
    // Remove 'active' class from current slide and slide icon
    slides[slideNumber].classList.remove('active')
    slideIcons[slideNumber].classList.remove('active')

    // Move to the next slide
    slideNumber++
    // If reached the end, loop back to the first slide
    if (slideNumber > numberOfSlides - 1) {
        slideNumber = 0
    }

    // Add 'active' class to the next slide and slide icon
    slides[slideNumber].classList.add("active")
    slideIcons[slideNumber].classList.add("active")
});

//Prev button event
prevBtn.addEventListener('click', () => {
    // Remove 'active' class from current slide and slide icon
    slides[slideNumber].classList.remove('active')
    slideIcons[slideNumber].classList.remove('active')

    // Move to the previous slide
    slideNumber--;
    // If reached the beginning, loop back to the last slide
    if (slideNumber < 0) {
        slideNumber = numberOfSlides - 1
    }

    // Add 'active' class to the next slide and slide icon
    slides[slideNumber].classList.add("active")
    slideIcons[slideNumber].classList.add("active")
})

//Slider autoplay
let playSlider

let repeater = () => {
    playSlider = setInterval(function() {
        // Remove 'active' class from current slide and slide icon
        slides[slideNumber].classList.remove('active')
        slideIcons[slideNumber].classList.remove('active')

        // Move to the next slide
        slideNumber++;
        // If reached the end, loop back to the first slide
        if (slideNumber > numberOfSlides - 1) {
            slideNumber = 0;
        }

        // Add 'active' class to the next slide and slide icon
        slides[slideNumber].classList.add("active")
        slideIcons[slideNumber].classList.add("active")
    }, 5000)
}
repeater()

//Stop the slider autoplay when mouseover
slider.addEventListener('mouseover', () => {
    clearInterval(playSlider)
})
//Start the slider autoplay when mouseout
slider.addEventListener('mouseout', () => {
    repeater()
})

//Get goToTopBtn
let goToTopBtn = document.querySelector('#goToTopBtn')

// When the user clicks on the button, scroll to the top of the document
goToTopBtn.addEventListener('click', function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
})

// When the user scrolls down 400px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        goToTopBtn.style.display = "block";
    } else {
        goToTopBtn.style.display = "none";
    }
}
