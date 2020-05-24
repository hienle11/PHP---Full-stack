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
  const priceSection = document.getElementById("price-section");
  const nowShowingSection = document.getElementById("now-showing-section");
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
  sessionStorage.setItem("selectedPanel", movieIndex);
  if (sessionStorage['selectedButton'] != null) {
    bookingButtons[sessionStorage['selectedButton']].onclick();
  }
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

updateBookingMovieId = movieIndex => {
  // update value of movie id in booking-form
  movieId = document.getElementById("movie-id")
  switch (movieIndex) {
      case 0: movieId.value = "ACT"; break;
      case 1: movieId.value = "AHF"; break;
      case 2: movieId.value = "ANM"; break;
      case 3: movieId.value = "RMC"; break;
  }
}

updateBookingForm = e => {
  buttonList =  Array.prototype.slice.call( document.getElementById('booking-button__container').children );
  sessionStorage.setItem("selectedButton",  buttonList.indexOf(e));

  var activeBookingButton = document.getElementsByClassName("synopsis__booking-bar__button active")
  if (activeBookingButton.length > 0) {
      activeBookingButton[0].classList.remove("active");
  }

  document.getElementById("booking-form").reset();
  document.getElementById("total-amount").innerHTML = "0.00"

  var bookingFormContainer = document.getElementById("booking-form-container");
  if (e.innerHTML.search("N/A") >= 0) {
      bookingFormContainer.classList.add("invisible");    // add invisibility when there is no schedule on that day
      return false;
  } else {
      bookingFormContainer.classList.remove("invisible");  // remove invisibility when the page first loaded
  }
 
  // update movie title on booking form
  movieTitle = document.getElementById("movie-title");
  movieTitle.innerHTML = document.getElementById("synopsis__content__title").innerHTML;

  // update movie-day value
  movieDay = document.getElementById("movie-day");
  movieDay.value = e.innerHTML.substring(0, 3).toUpperCase();

  // update movie-hour value
  movieHour = document.getElementById("movie-hour");
  if (e.innerHTML.search("12:00 p.m") >= 0) {
      movieHour.value = "T12";
  } else if (e.innerHTML.search("3:00 p.m") >= 0) {
      movieHour.value = "T15";
  } else if (e.innerHTML.search("6:00 p.m") >= 0) {
      movieHour.value = "T18";
  } else if (e.innerHTML.search("9:00 p.m") >= 0) {
      movieHour.value = "T21";
  }

  e.classList.add("active");
}

isDiscounted = () => {
  // get movie day and movie hour to check for discount price
  movieDay = document.getElementById("movie-day");
  movieHour = document.getElementById("movie-hour");
  if (movieDay.value.search("WED") >= 0) {
      return true;
  } else if (movieHour.value.search("T12") >= 0) {
      if (movieDay.value.search("SAT") < 0 && movieDay.value.search("SUN") < 0) {
          return true;
      } 
  }
  return false ;
}

updateTotalAmount = e => {
  var totalAmount = 0;
  var numberOfSeats = [];
  // get the current number of seats, adding "0" helps avoiding blank value being converted to NaN value
  numberOfSeats["STA"] = parseInt("0" + document.getElementById("seats-STA").value);
  numberOfSeats["STP"] = parseInt("0" + document.getElementById("seats-STP").value);
  numberOfSeats["STC"] = parseInt("0" + document.getElementById("seats-STC").value);
  numberOfSeats["FCA"] = parseInt("0" + document.getElementById("seats-FCA").value);
  numberOfSeats["FCP"] = parseInt("0" + document.getElementById("seats-FCP").value);
  numberOfSeats["FCC"] = parseInt("0" + document.getElementById("seats-FCC").value);

  if (isDiscounted()) {
      totalAmount = numberOfSeats["STA"] * 14.00 + numberOfSeats["STP"] * 12.50 + numberOfSeats["STC"] * 11.00
                  + numberOfSeats["FCA"] * 24.00 + numberOfSeats["FCP"] * 22.50 + numberOfSeats["FCC"] * 21.00; 
  } else {
      totalAmount = numberOfSeats["STA"] * 19.80 + numberOfSeats["STP"] * 17.50 + numberOfSeats["STC"] * 15.30
                  + numberOfSeats["FCA"] * 30.00 + numberOfSeats["FCP"] * 27.00 + numberOfSeats["FCC"] * 24.00; 
  }

  document.getElementById("total-amount").innerHTML = totalAmount.toFixed(2);
}

updateCurrentTime = () => {
  var today = new Date();
  var month = today.getMonth() + 1;
  var year = today.getFullYear();
  if (month < 10) {
      document.getElementById("cust-expiry").min = year + "-0" + month;
  } else {
      document.getElementById("cust-expiry").min = year + "-" + month;
  }
}

onSubmit = () => {
  sessionStorage.setItem("isFormSubmitted", "true");
}

// Keep the chosen info such as movie and booking remained if the post method failed
window.onload = () => {
  panels = document.getElementsByClassName("panel");
  bookingButtons = document.getElementsByClassName("synopsis__booking-bar__button");

  console.log("start");
  if (sessionStorage['selectedPanel'] != null) {
    panels[sessionStorage['selectedPanel']].onclick();
  }

  if (sessionStorage['selectedButton'] != null) {
    bookingButtons[sessionStorage['selectedButton']].onclick();
  }

  console.log("finish");
  if (sessionStorage['isFormSubmitted'] == 'true') {
    document.getElementById('booking-form').scrollIntoView();
  }
}


