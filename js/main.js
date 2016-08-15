$('a.gallery').featherlightGallery({
    previousIcon: '«',
    nextIcon: '»',
    galleryFadeIn: 300,

    openSpeed: 300
});

document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};