// Change the navigation link's appearance based on the section
// When click on the link
let addCurrentLinkEffect = link => {
  let currentLink = document.getElementsByClassName("current_link");
  currentLink[0].classList.remove("current_link");
  link.classList.add("current_link");
};
// When scroll the page to a specific section

window.onscroll = () => {
  const navbar = document.getElementById("navbar");
  const aboutSection = document.getElementById("about-us-section");
  const priceSection = document.getElementById("price-section");
  const nowShowingSection = document.getElementById("now-showing-section");
  if (
    window.scrollY + navbar.offsetHeight >= aboutSection.offsetTop &&
    window.scrollY + navbar.offsetHeight < priceSection.offsetTop
  ) {
    let link = document.getElementById("about-us_link");
    addCurrentLinkEffect(link);
    //console.log("about us section");
  } else if (
    window.scrollY + navbar.offsetHeight >= priceSection.offsetTop &&
    window.scrollY + navbar.offsetHeight < nowShowingSection.offsetTop
  ) {
    let link = document.getElementById("price_link");
    addCurrentLinkEffect(link);
    //console.log("price section");
  } else if (
    window.scrollY + navbar.offsetHeight >=
    nowShowingSection.offsetTop
  ) {
    let link = document.getElementById("now-showing_link");
    addCurrentLinkEffect(link);
    //console.log("now showing section");
  } else {
    let link = document.getElementById("home_link");
    addCurrentLinkEffect(link);
    //console.log("Home");
  }
};
