import Splide from "@splidejs/splide";

const renderSplide = () => {
    const splideContainer = document.querySelector(".splide");
    const width = splideContainer.clientWidth;
    const splideOptions = {
        type: "loop",
        autoWidth: true,
        height: "480px",
        focus: "center",
        lazyLoad: "nearby",
        autoplay: true,
        classes: {
            prev: "splide__arrow--prev left-10 rotate-45",
            next: "right-10",
            page: "splide__pagination__page w-10 h-1 mx-2 rounded-md",
        },
    };
    if (width < 768) {
        splideOptions.heightRatio = 9 / 16;
    }
    const splide = new Splide(".splide", splideOptions);
    splide.mount();
};

(() => {
    renderSplide();
})();
