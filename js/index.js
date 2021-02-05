

function submitCriticaConQuill(){
    
    var quillHtml = quill.root.innerHTML;

    var quillInput = document.querySelector("#quill-html");

    quillInput.value = quillHtml;    
    
}