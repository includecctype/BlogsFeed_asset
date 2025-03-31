// Toggle Form

const PostBtn = document.querySelector('.AddPost')
const PostForm = document.querySelector('.PostForm')

let toggle_form = false

PostBtn.addEventListener('click', ()=>{
    if(!toggle_form){
        PostForm.style.display = `flex`
        toggle_form = true
    }else if(toggle_form){
        PostForm.style.display = `none`
        toggle_form = false
    }
})

