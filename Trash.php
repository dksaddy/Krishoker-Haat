//for adding a video
<video autoplay loop class="background-video" muted plays-inline>
            <source src="image/background.mp4" type="video/mp4">
        </video>
//class
.background-video{
    position: absolute; 
    top: 0; left:0;
    width: 100%; height: 100%; 
    z-index: -1;
    filter: brightness(40%);
}
@media (min-aspect-ratio:16/9){
    .background-video{
        width: 100;
        height: auto;
    }
}
@media (max-aspect-ratio:16/9){
    .background-video{
        width: auto;
        height: 100%;
    }
}


//for fectch profile picture
/*'.$fetch['profile_picture'].'*/