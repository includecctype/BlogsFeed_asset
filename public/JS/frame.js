
// menu button effect, navbar effect
const Menu = document.querySelector('.Navbar > svg')
const path1 = document.querySelector('.Navbar > svg > g > g > :nth-child(1)')
const path2 = document.querySelector('.Navbar > svg > g > g > :nth-child(2)')
const path3 = document.querySelector('.Navbar > svg > g > g > :nth-child(3)')
const Navbar = document.querySelector('.Navbar > :nth-child(2)')

const pathDistance = path3.getBoundingClientRect().y - path1.getBoundingClientRect().y

let toggle = false

Menu.addEventListener('click', function(){
    if(!toggle){
        gsap.to(path2, {
            duration: 0.35,
            ease: `none`,
            transformOrigin: `center`,
            rotateZ: `-45deg`,
            y: `${pathDistance/1.5}`,
        })
        gsap.to(path1, {
            duration: 0.35,
            ease: `none`,
            scale: 0,
            transformOrigin: `center`
        })
        gsap.to(path3, {
            duration: 0.35,
            ease: `none`,
            transformOrigin: `center`,
            rotateZ: `45deg`,
            y: `${-pathDistance/1.5}`,
            onComplete: () => {
                toggle = true
            }
        })
        gsap.from(Navbar, {
            duration: 0.35,
            ease: `none`,
            opacity: 0,
            x: 50,
            pointerEvents: `auto`,
            onStart: () => {
                gsap.set(Navbar, {
                    display: `flex`
                })
            }
        })
    }else if(toggle){
        gsap.to(path2, {
            duration: 0.35,
            ease: `none`,
            transformOrigin: `center`,
            rotateZ: `0`,
            y: `0`,
        })
        gsap.to(path1, {
            duration: 0.35,
            ease: `none`,
            scale: 1,
            transformOrigin: `center`
        })
        gsap.to(path3, {
            duration: 0.35,
            ease: `none`,
            transformOrigin: `center`,
            rotateZ: `0`,
            y: `0`,
            onComplete: () => {
                toggle = false
            }
        })
        gsap.to(Navbar, {
            duration: 0.35,
            ease: `none`,
            opacity: 0,
            x: 50,
            pointerEvents: `none`,
            onComplete: () => {
                gsap.set(Navbar, {
                    display: `none`,
                    opacity: 1,
                    x: 0
                })
            }
        })
    }
})

// AddPost

const MenuTop = Menu.getBoundingClientRect().y
const MenuLeft = Menu.getBoundingClientRect().x
const MenuWidth = Menu.getBoundingClientRect().width

if (typeof whether_Authenticated !== 'undefined' && whether_Authenticated) {

    const AddPost = document.querySelector('.AddPost')
    const AddPostHeight = AddPost.getBoundingClientRect().height
    const AddPostWidth = AddPost.getBoundingClientRect().width
    AddPost.style.top = `${window.innerHeight - MenuTop - AddPostHeight}px`
    AddPost.style.left = `${MenuLeft - (AddPostWidth - MenuWidth)/2}px`

    window.addEventListener('resize', ()=>{
        const MenuTop = Menu.getBoundingClientRect().y
        const MenuLeft = Menu.getBoundingClientRect().x
        const MenuWidth = Menu.getBoundingClientRect().width

        const AddPost = document.querySelector('.AddPost')
        const AddPostHeight = AddPost.getBoundingClientRect().height
        const AddPostWidth = AddPost.getBoundingClientRect().width
        AddPost.style.top = `${window.innerHeight - MenuTop - AddPostHeight}px`
        AddPost.style.left = `${MenuLeft - (AddPostWidth - MenuWidth)/2}px`
    })

}
