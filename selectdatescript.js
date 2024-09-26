const seats = document.querySelectorAll('.seat');
const confirmbutton = document.getElementById('confirmbutton');

seats.forEach(seat => {
    seat.addEventListener('click', () => {
        if (!seat.classList.contains('reserved')) {
            seat.classList.toggle('selected');
        }
    });
});

confirmbutton.addEventListener('click', () => {
    const selectedSeats = document.querySelectorAll('.seat.selected');
    selectedSeats.forEach(seat => {
        seat.classList.remove('selected');
        seat.classList.add('reserved');
    });
    alert(`You have reserved ${selectedSeats.length} seats.`);
});
