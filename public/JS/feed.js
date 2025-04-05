// Toggle Form

if (typeof isAuthenticated !== 'undefined' && isAuthenticated) {
    // Toggle Form
    const PostBtn = document.querySelector('.AddPost');
    const PostForm = document.querySelector('.PostForm');

    let toggle_form = false;

    PostBtn.addEventListener('click', () => {
        if (!toggle_form) {
            PostForm.style.display = `flex`;
            toggle_form = true;
        } else if (toggle_form) {
            PostForm.style.display = `none`;
            toggle_form = false;
        }
    });
}

// Image resize

const FeedImages = document.querySelectorAll('.Feed > div > img');

for(const FeedImage of FeedImages){

    if(FeedImage.src == "https://blogsfeed.s3.amazonaws.com/0"){

        FeedImage.style.display = `none`;

    }

}

