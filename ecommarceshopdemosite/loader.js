const loader = document.querySelector('.loader');
var menu = false;

window.addEventListener('load',() => {
    setTimeout(()=>{
        loader.classList.add('fadeOut');
        setTimeout(()=>{
            loader.classList.add('hidden');
        }, 700)//disparition
        
}, 2500)//opacité reduite
});