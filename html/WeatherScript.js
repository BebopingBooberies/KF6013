const getTemp = document.getElementById('today');

getWeatherData()
function getWeatherData() {
    fetch('https://api.openweathermap.org/data/2.5/weather?q=Fordbridge&units=metric&appid=5d3f345a0c084277fecfd6453ad0efce')
        .then(res => res.json())
        .then(data => {
            console.log(data)
            showWeatherData(data);
    })
}

function showWeatherData(data) {
    getTemp.innerHTML =
        `<img src="https://openweathermap.org/img/wn/${data.weather[0].icon}@4x.png" alt="weather icon" className="w-icon">
        <div class="Weather-type">the weather forecast is: ${data.weather[0].description}</div>
        <div className="temp">Current - ${data.main.temp}&#176;C</div>
        <div className="temp_max">High - ${data.main.temp_max}&#176;C</div>
        <div className="temp_min">Low - ${data.main.temp_min}&#176;C</div>`;
}

getWeatherData();