displayGroupTicket = () => {
  tickets_container = document.getElementById("tickets-container");
  tickets_container.innerHTML = ` <div id="ticket-container">
  <div id="ticket-form">
    <div>
      <img id="ticket__qr-code" src="media/QR.png">
    </div>
      <div id="ticket__info">
      <div id="ticket__info__movie-id">${booking["movieName"]}</div>
      <div id="ticket__info__movie-time">${booking["movieDay"]} - ${
    booking["movieHour"]
  }</div>
      <div id="ticket__info__group-seat">
        <div>STA</div>
        <div>STP</div>
        <div>STC</div>
        <div>FCA</div>
        <div>FCP</div>
        <div>FCC</div>
      </div>
      <div id="ticket__info__group-seat">
        <div>${booking["STA"]}</div>
        <div>${booking["STP"]}</div>
        <div>${booking["STC"]}</div>
        <div>${booking["FCA"]}</div>
        <div>${booking["FCP"]}</div>
        <div>${booking["FCC"]}</div>
      </div>
      <div style="margin-top: 20px;">
        SCREEN 5
      </div>
      <div style="margin-top: 20px;">
          Ticket Id - #${Math.floor(100000 + Math.random() * 900000)}
      </div>
    </div>
  </div>
</div>`;
};

getTicketName = (ticketCode) => {
  switch (ticketCode) {
    case "STA":
      return "STANDARD ADULT";
    case "STP":
      return "STANDARD CONCESSION";
    case "STC":
      return "STANDARD CHILD";
    case "FCA":
      return "FIRST CLASS ADULT";
    case "FCP":
      return "FIRST CLASS CONCESSION";
    case "FCC":
      return "FIRST CLASS CHILD";
  }
};

displayTicketsByCode = (ticketCode) => {
  tickets_container = document.getElementById("tickets-container");
  for (i = 0; i < booking[ticketCode]; i++) {
    tickets_container.innerHTML += `<div id="ticket-container">
    <div id="ticket-form">
      <div>
        <img id="ticket__qr-code" src="media/QR.png">
      </div>
      <div id="ticket__info">
        <div id="ticket__info__movie-id">${booking["movieName"]}</div>
        <div id="ticket__info__movie-time">${booking["movieDay"]} - ${
      booking["movieHour"]
    }</div>
        <div id="ticket__info__individual-seat">${getTicketName(
          ticketCode
        )}</div>
        <div style="margin-top: 20px;">
          SCREEN 5
        </div>
        <div style="margin-top: 20px;">
          Ticket Id - #${Math.floor(100000 + Math.random() * 900000)}
        </div>
      </div>
    </div>`;
  }
};

displayInidividualTickets = () => {
  tickets_container = document.getElementById("tickets-container");
  tickets_container.innerHTML = "";
  displayTicketsByCode("STA");
  displayTicketsByCode("STP");
  displayTicketsByCode("STC");
  displayTicketsByCode("FCA");
  displayTicketsByCode("FCP");
  displayTicketsByCode("FCC");
};

switchTicketType = (e) => {
  buttons = document.getElementById("tickets__buttons-container").children;
  if (e.innerHTML == "Individual Tickets") {
    buttons[0].classList.remove("active");
    buttons[1].classList.add("active");
    displayInidividualTickets();
  } else {
    buttons[1].classList.remove("active");
    buttons[0].classList.add("active");
    displayGroupTicket();
  }
};
