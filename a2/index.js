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

let changeScreeningDate = (schedule, screeningTimes) => {
    for (i = 0; i < schedule.length; i++) {
        [date, time] = schedule[i].innerText.split("-");
        schedule[i].innerText = date + "- " + screeningTimes[i];
    }
};

let updateSynopsis = panel => {
  // Get the content from the clicked panel
  let title = panel.getElementsByClassName("panel__content__title")[0]
    .innerText;
  let rating = panel.getElementsByClassName("panel__content__rating")[0]
    .innerText;
  let content = panel.getElementsByClassName("panel__content__rating")[0]
    .innerText;

  // Get the synopsis's components needed to be updated
  let synopsis_title = document.getElementById("synopsis__content__title");
  let synopsis_rating = document.getElementById("synopsis__content__rating");
  let synopsis_movie_desc = document
    .getElementById("synopsis__content__plot")
    .getElementsByTagName("p")[0];
  let synopsis_video_link = document.getElementById("synopsis__trailer__video");
  let schedule = document.getElementsByClassName(
    "synopsis__booking-bar__button"
  );
  // Update the synopsis's components
  synopsis_title.innerText = title;
  synopsis_rating.innerText = rating;

  switch (title) {
    case "Avengers: Endgame".toUpperCase():
      synopsis_movie_desc.innerText =
        "After the devastating events of Avengers: Infinity War (2018)," +
        " the universe is in ruins. With the help of remaining allies, the Avengers assemble" +
        " once more in order to reverse Thanos' actions and restore balance to the universe.";
      synopsis_video_link.src = "https://www.youtube.com/embed/TcMBFSGVi1c";
      changeScreeningDate(schedule, [
        "N/A",
        "N/A",
        "9:00 p.m",
        "9:00 p.m",
        "9:00 p.m",
        "6:00 p.m",
        "6:00 p.m"
      ]);
      break;

    case "Top End Wedding".toUpperCase():
      synopsis_movie_desc.innerText =
        "From the makers of The Sapphires, TOP END WEDDING is a celebration of love," +
        " family and belonging, set against the spectacular natural beauty of the Northern Territory. This heartwarming" +
        " romantic comedy tells the story of successful Adelaide lawyer Lauren (Tapsell) and her fiancé Ned (Lee)." +
        " Engaged and in love, they have just ten days to pull off their dream Top End Wedding.";

      synopsis_video_link.src = "https://www.youtube.com/embed/uoDBvGF9pPU";

      changeScreeningDate(schedule, [
        "6:00 p.m",
        "6:00 p.m",
        "N/A",
        "N/A",
        "N/A",
        "3:00 p.m",
        "3:00 p.m"
      ]);
      break;

    case "Dumbo".toUpperCase():
      synopsis_movie_desc.innerText =
        "Circus owner Max Medici (Danny DeVito) enlists former star Holt Farrier (Colin Farrell)" +
        " and his children Milly (Nico Parker) and Joe (Finley Hobbins) to care for a newborn elephant whose oversized ears" +
        " make him a laughingstock in an already struggling circus. But when they discover that Dumbo can fly, the circus" +
        " makes an incredible comeback, attracting persuasive entrepreneur V.A.";
      synopsis_video_link.src = "https://www.youtube.com/embed/7NiYVoqBt-8";
      changeScreeningDate(schedule, [
        "12:00 p.m",
        "12:00 p.m",
        "6:00 p.m",
        "6:00 p.m",
        "6:00 p.m",
        "12:00 p.m",
        "12:00 p.m"
      ]);
      break;

    case "The Happy Prince".toUpperCase():
      synopsis_movie_desc.innerText =
        "In a cheap Parisian hotel room Oscar Wilde lies on his death bed and the past floods back," +
        " transporting him to other times and places. Was he once the most famous man in London? The artist crucified by a" +
        " society that once worshiped him? The lover imprisoned and freed, yet still running towards ruin in the final chapter" +
        " of his life?";
      synopsis_video_link.src = "https://www.youtube.com/embed/tXANCJQkUIE";
      changeScreeningDate(schedule, [
        "N/A",
        "N/A",
        "12:00 p.m",
        "12:00 p.m",
        "12:00 p.m",
        "9:00 p.m",
        "9:00 p.m"
      ]);
      break;
  }
  // EXTRA WORK:
  // Scroll to the synopsis when user click on any panel
  let synopsis = document.getElementById("synopsis");
  synopsis.scrollIntoView();
};
