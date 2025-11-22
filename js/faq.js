const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach(function(item) {
    const question = item.querySelector('.faq-question');

    question.addEventListener("click", function(){
        // Toggle the 'active' class for the clicked FAQ item
        item.classList.toggle("active");   
     
    });
});
