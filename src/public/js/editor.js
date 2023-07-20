
function submit() {
    const editor = document.getElementById('editor');
    const text = editor.innerText;
    const content = document.getElementById('content')
    content.value=text;
    const form=document.getElementById('notice')
    form.submit();
}
