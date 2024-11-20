function generateBookingURL(event) {
    event.preventDefault();  // Prevent the form from being submitted normally

    // Get the user input values
    const arrivalDate = document.getElementById('arrivalDate').value;
    const departureDate = document.getElementById('departureDate').value;
    const adults = document.getElementById('adults').value;
    const children1 = document.getElementById('children1').value;
    const children2 = document.getElementById('children2').value;
    
    // Function to sanitize and encode input data
    function sanitizeInput(input) {
        return encodeURIComponent(input.trim());  // Trim and encode special characters
    }

    // Sanitize and encode each user input value
    const sanitizedArrivalDate = sanitizeInput(arrivalDate);
    const sanitizedDepartureDate = sanitizeInput(departureDate);
    const sanitizedAdults = sanitizeInput(adults);
    const sanitizedChildren1 = sanitizeInput(children1);
    const sanitizedChildren2 = sanitizeInput(children2);

    // Construct the URL with the sanitized inputs
    const baseURL = 'https://booking.hotelname.dk/hotel-name/hotel-name/booking/ophold/';
    const url = `${baseURL}?ArrivalDate=${sanitizedArrivalDate}&DepartureDate=${sanitizedDepartureDate}&Adults=${sanitizedAdults}&Children1=${sanitizedChildren1}&Children2=${sanitizedChildren2}`;

    // Open the URL in a new window
    window.open(url, '_blank');
}