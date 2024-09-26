const seats = document.querySelectorAll('.seat');
const confirmbutton = document.getElementById('confirmbutton');
const reservedSeatsInput = document.getElementById('reservedSeats');

seats.forEach(seat => {
    seat.addEventListener('click', () => {
        if (!seat.classList.contains('reserved')) {
            seat.classList.toggle('selected');
            updateReservedSeats();
            updateNumberOfTicketsAndTotal(); //  updates the number of tickets
        }
    });
});


function updateReservedSeats() {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const selectedSeatIDs = Array.from(selectedSeats).map(seat => seat.id);
    reservedSeatsInput.value = selectedSeatIDs.join(',');
}

function updateNumberOfTicketsAndTotal() {
    const ticketPrice=450
    const selectedSeats = document.querySelectorAll('.seat.selected');
    const numberOfSelectedSeats = selectedSeats.length;
    const NumberOfTickets = document.getElementById("no_of_tickets");
    const total =document.getElementById("total");
    NumberOfTickets.innerHTML = numberOfSelectedSeats;
    total.innerHTML = "Rs."+numberOfSelectedSeats*ticketPrice;
}


document.getElementById('confirmbutton').addEventListener('click', function(event) {
    var numberOfTicketsDiv = document.getElementById('no_of_tickets');
    var numberOfTickets = parseInt(numberOfTicketsDiv.textContent);

    if (isNaN(numberOfTickets) || numberOfTickets <= 0) {
        // No value in no_of_tickets or it's not a positive number
        alert("Please select at least one seat for reservation.");
        event.preventDefault(); // Prevent the form from being submitted
    }
});
