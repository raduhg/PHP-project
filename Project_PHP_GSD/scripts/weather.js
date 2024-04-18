const apiKey = "70feff1f23f94ffea870e609b232f0d5";
const weatherForm = document.getElementById('weather-form');
const latInput = document.getElementById('lat-input');
const longInput = document.getElementById('long-input');
const card = document.querySelector('.card');

weatherForm.addEventListener('submit', async event => {

    event.preventDefault();
    const latitude = latInput.value;
    const longitude = longInput.value;

    if (latitude && longitude) {
        try {
            const weatherLocation = await getWeatherLocation(latitude, longitude);
            displayWeatherInfo(weatherLocation);
        }
        catch (error) {
            console.error(error);
            displayError(error);
        }
    }
    else {
        displayError("Please enter a valid pair of coordinates");
    }
});

async function getWeatherLocation(latitude, longitude) {
    const apiURL = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;

    const response = await fetch(apiURL);

    if (!response.ok) {
        throw new Error("Could not fetch weather data");
    }

    return await response.json();
}

function displayWeatherInfo(data) {
    const { main: { temp, feels_like },
        weather: [{ description, id }],
        wind: { speed, deg },
        visibility } = data;

    card.textContent = '';
    card.style.display = 'flex';

    const chosenLocation = document.createElement('p');
    const tempDisplay = document.createElement('p');
    const feelsLikeDisplay = document.createElement('p');
    const descriptionDisplay = document.createElement('p');
    const windDisplay = document.createElement('p');
    const visibilityDisplay = document.createElement('p');
    const emojiDisplay = document.createElement('p');

    chosenLocation.textContent = `${latInput.value} ${longInput.value}`;
    tempDisplay.textContent = `${(temp - 273.15).toFixed(1)}°C`;
    feelsLikeDisplay.textContent = `feels like: ${(feels_like - 273.15).toFixed(1)}°C`;
    descriptionDisplay.textContent = description;
    if (deg <= 22, 5 || deg > 337.5) { windDisplay.textContent = `wind: ${speed}m/s N` };
    if (deg >= 22.5 && deg < 67.5) { windDisplay.textContent = `wind: ${speed}m/s NE` };
    if (deg >= 67.5 && deg < 112.5) { windDisplay.textContent = `wind: ${speed}m/s E` };
    if (deg >= 112.5 && deg < 157.5) { windDisplay.textContent = `wind: ${speed}m/s SE` };
    if (deg >= 157.5 && deg < 202.5) { windDisplay.textContent = `wind: ${speed}m/s S` };
    if (deg >= 202.5 && deg < 247.5) { windDisplay.textContent = `wind: ${speed}m/s SV` };
    if (deg >= 247.5 && deg < 292.5) { windDisplay.textContent = `wind: ${speed}m/s V` };
    if (deg >= 292.5 && deg < 337.5) { windDisplay.textContent = `wind: ${speed}m/s NV` };
    visibilityDisplay.textContent = `visibility: ${visibility}m`;
    emojiDisplay.textContent = getWeatherEmoji(id);


    chosenLocation.classList.add('chosen-point');
    tempDisplay.classList.add('temp-display');
    feelsLikeDisplay.classList.add('feels-like-display');
    descriptionDisplay.classList.add('description-display');
    windDisplay.classList.add('wind-display');
    visibilityDisplay.classList.add('visibility-display');
    emojiDisplay.classList.add('emoji-display');

    card.appendChild(chosenLocation);
    card.appendChild(tempDisplay);
    card.appendChild(feelsLikeDisplay);
    card.appendChild(descriptionDisplay);
    card.appendChild(windDisplay);
    card.appendChild(visibilityDisplay);
    card.appendChild(emojiDisplay);
}

function getWeatherEmoji(weatherId) {
    switch (true) {
        case (weatherId >= 200 && weatherId < 300):
            return '⛈️';
        case (weatherId >= 300 && weatherId < 400):
            return '🌧️';
        case (weatherId >= 500 && weatherId < 600):
            return '🌧️';
        case (weatherId >= 600 && weatherId < 700):
            return '❄️';
        case (weatherId >= 700 && weatherId < 800):
            return '🌫️';
        case (weatherId === 800):
            return '☀️';
        case (weatherId >= 801 && weatherId < 810):
            return '☁️';
        default:
            return '?';
    }
}

function displayError(message) {
    const errorDisplay = document.createElement("p");
    errorDisplay.textContent = message;
    errorDisplay.classList.add("error-display");

    card.textContent = '';
    card.style.display = 'flex';
    card.appendChild(errorDisplay);
}