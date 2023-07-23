const getTemp = document.getElementById('weather')
const setTemp = document.getElementById("today")


getWeatherData()
function getWeatherData () {
    fetch('https://api.openweathermap.org/data/2.5/weather?q=Fordbridge&units=metric&appid=5d3f345a0c084277fecfd6453ad0efce').then(res => res.json()).then(data => {

        console.log(data)
        showWeatherData(data);
    })

}

function showWeatherData (data) {
    getTemp.window.onload =
        '<img src="http://openweatherapp.org/img/wn.${day.weather[1].icon}@4x.png" alt="weather icon" className="w-icon">\n' +
        ' <div className="temp">Current - ${day.main.temp}; C</div>\n' +
        ' <div className="temp_max">High - ${day.main.temp_max}; C</div>\n' +
        ' <div className="temp_min">Low - ${day.main.temp_min}</div>\n';
}

