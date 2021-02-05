

function submitCriticaConQuill(){
    
    var quillHtml = quill.root.innerHTML;

    var quillInput = document.querySelector("#quill-html");

    quillInput.value = quillHtml;    
    
}
/* Applying the "open" class when you click the Menu button, which triggers the mobile menu to open/close; Toggle Menu/Close menu text. */
$(document).ready(function() {
  $('.mobile-button a').click(function(e) {
	$(this).parent().parent().toggleClass('open');
  $(this).html($(this).html() == 'Close Menu' ? 'Menu' : 'Close Menu');
    e.preventDefault();
  });
});

