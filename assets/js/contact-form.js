const form = document.getElementById('contact-form');

form.addEventListener('submit', (event) => {
	event.preventDefault();

	const formData = new FormData(form);

	fetch('/submit-form.php', {
		method: 'POST',
		body: formData
	})
	.then(response => response.json())
	.then(data => {
		// Handle the response from the server
	})
	.catch(error => {
		// Handle any errors that occurred during the request
	});
});
