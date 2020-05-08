const movies = [
  {
    title: "Avengers: Endgame",
    rating: "PG",
    plot:
      "After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore balance to the universe.",
    schedule: [
      "Mon - N/A",
      "Tue - N/A",
      "Wed - 9:00 p.m",
      "Thu - 9:00 p.m",
      "Fri - 9:00 p.m",
      "Sat - 6:00 p.m",
      "Sun - 6:00 p.m"
    ],
    trailer: "https://www.youtube.com/embed/TcMBFSGVi1c"
  },
  {
    title: "Top End Wedding",
    rating: "M",
    plot:
      "Lauren and Ned are engaged, they are in love, and they have just ten days to find Lauren's mother who has gone AWOL somewhere in the remote far north of Australia, reunite her parents and pull off their dream wedding.",
    schedule: [
      "Mon - 6:00 p.m",
      "Tue - 6:00 p.m",
      "Wed - N/A",
      "Thu - N/A",
      "Fri - N/A",
      "Sat - 3:00 p.m",
      "Sun - 3:00 p.m"
    ],
    trailer: "https://www.youtube.com/embed/uoDBvGF9pPU"
  },
  {
    title: "Dumbo",
    rating: "PG",
    plot:
      "A young elephant, whose oversized ears enable him to fly, helps save a struggling circus, but when the circus plans a new venture, Dumbo and his friends discover dark secrets beneath its shiny veneer.",
    schedule: [
      "Mon - 12:00 p.m",
      "Tue - 12:00 p.m",
      "Wed - 6:00 p.m",
      "Thu - 6:00 p.m",
      "Fri - 6:00 p.m",
      "Sat - 12:00 p.m",
      "Sun - 12:00 p.m"
    ],
    trailer: "https://www.youtube.com/embed/7NiYVoqBt-8"
  },
  {
    title: "The Happy Prince",
    rating: "R",
    plot:
      "The untold story of the last days in the tragic times of Oscar Wilde, a person who observes his own failure with ironic distance and regards the difficulties that beset his life with detachment and humor.",
    schedule: [
      "Mon - N/A",
      "Tue - N/A",
      "Wed - 12:00 p.m",
      "Thu - 12:00 p.m",
      "Fri - 12:00 p.m",
      "Sat - 9:00 p.m",
      "Sun - 9:00 p.m"
    ],
    trailer: "https://www.youtube.com/embed/tXANCJQkUIE"
  }
];

// Change the navigation link's appearance based on the section
// When click on the link
const addCurrentLinkEffect = link => {
  const currentLink = document.getElementsByClassName("current_link");
  currentLink[0].classList.remove("current_link");
  link.classList.add("current_link");
};
// When scroll the page to a specific section

window.onscroll = () => {
  const navbar = document.getElementById("navbar");
  const aboutSection = document.getElementById("about-us-section");
  const priceSection = document.getElementById("price");
  const nowShowingSection = document.getElementById("now-showing");
  if (
    window.scrollY + navbar.offsetHeight >= aboutSection.offsetTop &&
    window.scrollY + navbar.offsetHeight < priceSection.offsetTop
  ) {
    const link = document.getElementById("about-us_link");
    addCurrentLinkEffect(link);
    //console.log("about us section");
  } else if (
    window.scrollY + navbar.offsetHeight >= priceSection.offsetTop &&
    window.scrollY + navbar.offsetHeight < nowShowingSection.offsetTop
  ) {
    const link = document.getElementById("price_link");
    addCurrentLinkEffect(link);
    //console.log("price section");
  } else if (
    window.scrollY + navbar.offsetHeight >=
    nowShowingSection.offsetTop
  ) {
    const link = document.getElementById("now-showing_link");
    addCurrentLinkEffect(link);
    //console.log("now showing section");
  } else {
    const link = document.getElementById("home_link");
    addCurrentLinkEffect(link);
    //console.log("Home");
  }
};

panelOnClickHandler = (e, movieIndex) => {
  addActivePanelEffect(e);
  updateSynopsis(movieIndex);
  scrollToSynopsisArea();
  updateBookingMovieId(movieIndex);
};

addActivePanelEffect = e => {
  // update "active" status on panels
  const active_panel = document.getElementsByClassName("panel active");
  if (active_panel.length != 0) {
    active_panel[0].classList.remove("active");
  }
  e.classList.add("active");
};

updateSynopsis = movieIndex => {
  // get elements of synopsis area
  const title = document.getElementById("synopsis__content__title");
  const rating = document.getElementById("synopsis__content__rating");
  const plot = document.getElementById("synopsis__content__plot");
  const bookingContainer = document.getElementById("booking-button__container");
  const trailer = document.getElementById("synopsis__trailer__video");

  // update content of those elements
  title.innerHTML = movies[movieIndex].title;
  rating.innerHTML = movies[movieIndex].rating;
  plot.innerHTML = `<h2>Plot description:</h2>
                        <p>${movies[movieIndex].plot}</p>`;

  bookingButtons = Array.from(bookingContainer.children);
  for (i = 0; i < 7; i++) {
    bookingButtons[i].innerHTML = movies[movieIndex].schedule[i];
  }
  trailer.src = movies[movieIndex].trailer;
};

scrollToSynopsisArea = () => {
  // scroll into synopsis area
  let synopsis = document.getElementById("synopsis");
  synopsis.classList.remove("invisible");
  synopsis.scrollIntoView();
};
