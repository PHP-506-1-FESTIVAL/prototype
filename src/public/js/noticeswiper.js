setTimeout(() => noticeslide(), 3000);
setTimeout(() => noticeslide2(), 6000);
setTimeout(() => noticeslide3(), 9000);

function noticeslide() {
    const noticebox = document.getElementById('noticebox');
    noticebox.style.transform = 'translateY(-62px)';
    setInterval(() => noticebox.style.transform = 'translateY(-62px)', 9000);
    
}

function noticeslide2() {
    const noticebox = document.getElementById('noticebox');
    noticebox.style.transform = 'translateY(-124px)';
    setInterval(() => noticebox.style.transform = 'translateY(-124px)', 9000);
    
}

function noticeslide3() {
    const noticebox = document.getElementById('noticebox');
    noticebox.style.transform = 'translateY(0px)';
    setInterval(() => noticebox.style.transform = 'translateY(0px)', 9000);
    
}