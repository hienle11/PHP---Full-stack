
addCurrentLinkEffect = e => {
    var currentLink = document.getElementsByClassName("current_link");
    currentLink[0].classList.remove("current_link")
    e.classList.add("current_link");
};
