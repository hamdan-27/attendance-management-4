document.addEventListener("DOMContentLoaded", function () {
    const boxes = document.querySelectorAll('.customBox');
    const images = document.querySelectorAll('.image');
    const paragraphs = document.querySelectorAll('.imageParagraph');

    // Show only the first paragraph and image of the first box
    paragraphs.forEach(paragraph => paragraph.style.display = 'none');
    paragraphs[0].style.display = 'block';

    images.forEach(image => image.style.display = 'none');
    images[0].style.display = 'block';

    let currentIndex = 0;

    function toggleBox(index) {
        // Hide all images and paragraphs
        images.forEach(image => image.style.display = 'none');
        paragraphs.forEach(paragraph => paragraph.style.display = 'none');

        // Display the corresponding image and paragraph
        images[index].style.display = 'block';
        paragraphs[index].style.display = 'block';

        currentIndex = index;
    }

    boxes.forEach((box, index) => {
        // Add clickable box styling
        box.style.cursor = 'pointer';

        // Add hover effect
        box.addEventListener('mouseover', function () {
            box.style.backgroundColor = 'lightblue';
        });

        box.addEventListener('mouseout', function () {
            box.style.backgroundColor = 'white';
        });

        // Add click event listener
        box.addEventListener('click', function () {
            toggleBox(index);
        });
    });
});
