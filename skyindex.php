<?php
    $data = '{"location":{"city":"Cesis","woeid":851991,"country":"Latvia","lat":57.31802,"long":25.281811,"timezone_id":"Europe/Riga"},"current_observation":{"pubDate":1741941340,"wind":{"chill":16,"direction":"NW","speed":12},"atmosphere":{"humidity":83,"visibility":14.98,"pressure":994.6},"astronomy":{"sunrise":"6:36 AM","sunset":"6:21 PM"},"condition":{"temperature":28,"text":"Cloudy","code":26}},"forecasts":[{"day":"Fri","date":1741968000,"high":36,"low":21,"text":"Partly Cloudy","code":30},{"day":"Sat","date":1742054400,"high":41,"low":27,"text":"Sunny","code":32},{"day":"Sun","date":1742140800,"high":40,"low":22,"text":"Snow","code":16},{"day":"Mon","date":1742227200,"high":41,"low":26,"text":"Partly Cloudy","code":30},{"day":"Tue","date":1742313600,"high":44,"low":29,"text":"Mostly Cloudy","code":28},{"day":"Wed","date":1742400000,"high":48,"low":31,"text":"Mostly Sunny","code":34},{"day":"Thu","    `date":1742486400,"high":51,"low":32,"text":"Sunny","code":32},{"day":"Fri","date":1742572800,"high":55,"low":35,"text":"Partly Cloudy","code":30},{"day":"Sat","date":1742659200,"high":54,"low":36,"text":"Partly Cloudy","code":30},{"day":"Sun","date":1742745600,"high":54,"low":35,"text":"Mostly Sunny","code":34},{"day":"Mon","date":1742832000,"high":53,"low":38,"text":"Sunny","code":32}]}';
    $weatherData = json_decode($data, true);  // Dekodē JSON uz PHP masīvu

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="skystyle.css">
    <script type="text/javascript" src="path-to-javascript-file.js"></script>
    <title>Laika Prognoze</title>
</head>
<body>
    <div class="topRow">

        <!--menu and VTDT SKY-->
        <div class="menuDiv"><img id="menuButton" src="images/menu.png"></div>
        <div id="VTDTsky">VTDT Sky</div>

        <div class="locationDiv"> <!--LOCATION-->
            <img id="locationIcon" src="images/ping.gif"</div>
            <div id="locationText"><?php echo $weatherData['location']['city'] . ", " . $weatherData['location']['country']?></div>
        </div>
    <div class="srcAnddm">
        <div class="searchBar"> <!--SEARCH BAR-->
            <img id="searchIcon"src="images/lupa.png">
            <div class="searchBox"><input class="searchFunction" type="text" placeholder="Search location"></div>
            <div class="planetDiv"><img id="planetIcon" align="center" src="images/worldwide.gif"></div>
        </div>
        <!--Light and Dark Mode Button-->
        <div class="LNDbuttonDiv"><button id="LNDbutton">
            <img src="images/darkMode.png" style="height:50%" >Light</button></div>
    </div> <!--end of <div> search n lnd mode!-->

    <div class="notifAndSettings"> <!--notifications and settings!-->
    <div class="notif" style="height: 100%;"><img style="height:100%" src="images/notif.gif"></div>
    <div class="settings" style="height: 100%;"><img style="height:100%" src="images/settings.gif"></div>   
    </div>
</div> 

    <div class="statsArea centerItem"> <!--Main Area!-->
        <div class="leftSidePanels">
            <div class="currentWeather white round flex flex-wrap, just-between flex-col">
                    <div class="CWLeftArea">
                        <div id="currentWeatherTxt">Current Weather</div>
            <!-- display current time !-->
                            <div class = localTimeDiv>Local time <div id="localTimeTxt">                                  </div>
                            </div>
                            <div class="temperatureStats semibold flex">
                                <img src="https://cdn.weatherapi.com/weather/64x64/day/113.png" id="sunIcon1">
                                <?php echo $weatherData['current_observation']['condition']['temperature']?><p id="dgCelsius" >°C</p>
                            <div class="feelsLikeTemp flex">
                                <div id="currentObs" style="width: 50%;"><?php echo $weatherData['current_observation']['condition']['text'] ?></div>Feels like: 
                            <?php echo $weatherData['current_observation']['condition']['code'] ?>°C
                            </div>
                    </div></div>
                <div class = "windDirection flex align-center flex-l">
                    Current wind direction: <?php echo $weatherData['current_observation']['wind']['direction']?> 
                </div>

            <!-- mwmwmwmwmwmwmwmwmwmwmwmwmwmwmw !-->
        </div>
        <div class = "miniStats"> <!-- grid with various stats!-->
            <div class="grid-areas-1"><div class = "grid-areas-info"> <img class="grid-ar-1-icons" src="images/clouds.gif">Air Quality</div><div class="grid-area-results">2</div></div>
            <!--air quality up!-->
            <div class="grid-areas-1"><div class ="grid-areas-info"><img class="grid-ar-1-icons" src="images/wind.gif">Wind</div><div class="grid-area-results"><?php echo $weatherData['current_observation']['wind']['speed']?> km/h</div></div>
            <!--wind up-->
            <div class="grid-areas-1"><div class ="grid-areas-info"><img class="grid-ar-1-icons" src= "images/humidity.gif" >Humidity</div><div class="grid-area-results"><?php echo $weatherData['current_observation']['atmosphere']['humidity']?>%</div></div>
            <!--humidity up!-->
            <div class="grid-areas-1"><div class ="grid-areas-info"><img class="grid-ar-1-icons" src="images/visibility.gif">Visibility</div><div class="grid-area-results"><?php echo $weatherData['current_observation']['atmosphere']['visibility']?> km</div></div>
            <!--visibility up-->
            <div class="grid-areas-1"><div class ="grid-areas-info"><img class="grid-ar-1-icons" src="images/air-pump.gif">Pressure</div><div class="grid-area-results pressure1">N/A in</div></div>
            <!--pressure 1(above)-->
                <div class="grid-areas-1"><div class ="grid-areas-info"><img class="grid-ar-1-icons" src="images/air-pump.gif">Pressure</div><div class="grid-area-results pressure2"><?php echo $weatherData['current_observation']['atmosphere']['pressure']?>°</div></div>
            <!--pressure 2 (above)-->
        </div>
        <div class="SunAndMoonSummary white flex flex-col round shadow ">
            <p class="SandMText"> Sun and Moon summary </p>
            <div class="flex" flex-row style="justify-content:space-between">
                <!--sun air and quality-->
                <div class="flex flex-row">
                    <img src="https://forecast-app-vtdt.vercel.app/images/sun.gif" alt="?", class="BigImageSandM">
                    <div class="SmallPaddingSandM flex flex-col">
                        <p class="margin0 bla non-bold"> Air Quality </p>
                        <p class="margin0 AirQualityStats"> 1 </p>
                    </div>
                </div>
                <div class="RiseAndSet flex flex-row">
                    <div class="align-center flex flex-col">
                        <img src="https://forecast-app-vtdt.vercel.app/images/field.gif" alt="?", class="SmallImageSandM">
                        <p class="margin0 bla non-bold"> Sunrise </p>
                        <p class="margin0 bla semibold"> 00:00 AM </p>
                    </div>
                    <svg class="HalfCircle" viewBox="0 0 100 50">
                            <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                            <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#f59e0b" stroke-width="10" stroke-dasharray="126" stroke-dashoffset="79"></path>
                        </svg>
                    <div class="align-center flex flex-col">
                        <img src="https://forecast-app-vtdt.vercel.app/images/sunset.gif" alt="?", class="SmallImageSandM">
                        <p class="margin0 bla non-bold"> Sunset </p>
                        <p class="margin0 bla semibold"> 00:00 AM </p>
                    </div>
                </div>
            </div>
            <div class="LargePaddingSandM flex flex-row" style="justify-content:space-between">
                <!--moon and air quality-->
                <div class="flex flex-row"> 
                    <img src="https://forecast-app-vtdt.vercel.app/images/moon.gif" alt="?", class="BigImageSandM">
                    <div class="SmallPaddingSandM flex flex-col">
                        <p class="margin0 bla non-bold"> Air Quality </p>
                        <p class="margin0 AirQualityStats"> 1 </p>
                    </div>
                </div>
                <div class="RiseAndSet flex flex-row">
                    <div class="align-center flex flex-col">
                        <img src="https://forecast-app-vtdt.vercel.app/images/moon-rise.gif" alt="?", class="SmallImageSandM">
                        <p class="margin0 bla non-bold">  Moonrise </p>
                        <p class="margin0 bla semibold"> 00:00 AM </p>
                    </div>
                    <svg class="HalfCircle" viewBox="0 0 100 50">
                            <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="#e5e5e5" stroke-width="10"></path>
                            <path d="M 10,50 A 40,40 0 1 1 90,50" fill="none" stroke="rgb(13, 146, 244)" stroke-width="10" stroke-dasharray="126" stroke-dashoffset="79"></path>
                        </svg>
                    <div class="align-center flex flex-col">
                        <img src="https://forecast-app-vtdt.vercel.app/images/moon-set.gif" alt="?", class="SmallImageSandM">
                        <p class="margin0 bla non-bold"> Moonset </p>
                        <p class="margin0 bla semibold"> 00:00 AM </p>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="forecast1">

                                <div id="B2_1">
                                    <button class="button-today butt-for active">
                                        Today
                                    </button>
                                    <button class="button-tomorrow butt-for">
                                        Tomorrow
                                    </button>
                                    <button class="button-10days butt-for">
                                        10 days
                                    </button>
                                </div>
                                <div class="forecast2">
                                    <div class="vertical-menu">
                                        <div class="td-fc">
                                            <!--today forecast (ja parak ilgi skatas nevaru garantet ka nebus smadzenu vezis/lupus)-->
                                        <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                            <div class="today-stats"><div id="today-stats-1"></div>
                                                <div>N/A</div>
                                                </div>
                                        </div>
                                            <div class="fc-today-2 grid">
                                                <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                                <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                                <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                            </div>
                                        </div>

                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png" >  
                                        <div class="today-stats"><div id="today-stats-2"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">       
                                        <div class="today-stats"><div id="today-stats-3"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                        <div class="today-stats"><div id="today-stats-4"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">
                                        <div class="today-stats"><div id="today-stats-5"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png"> 
                                        <div class="today-stats"><div id="today-stats-6"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img"src="https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                        <div class="today-stats"><div id="today-stats-7"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                        <div class="today-stats"><div id="today-stats-8"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                        <div class="today-stats"><div id="today-stats-9"></div>
                                            <div>N/A</div>
                                            </div>   </div>                                         <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
                                    </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">    
                                        <div class="today-stats"><div id="today-stats-10"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                    <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">    
                                        <div class="today-stats"><div id="today-stats-11"></div>
                                            <div>N/A</div>
                                            </div> </div>                                           <div class="fc-today-2 grid">
                                            <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                            <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                            <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                        </div>
        </div>
                                        <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                            <div class="today-stats"><div id="today-stats-12"></div>
                                                <div>N/A</div>
                                                </div>    </div>                                        <div class="fc-today-2 grid">
                                                <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                                <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                                <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                            </div>
        </div>
                                        <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img" src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">  
                                            <div class="today-stats"><div id="today-stats-13"></div>
                                                    <div>N/A</div>
                                                    </div>    </div>                                        <div class="fc-today-2 grid">
                                                <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                                <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                                <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                            </div>
        </div>
                                        <div class="today-fc"><div class = "flex flex-row"><img class="today-fc-img"  src= "https://cdn.weatherapi.com/weather/64x64/day/113.png">      
                                            <div class="today-stats">
                                                <div id="today-stats-14">

        </div> <div>N/A</div></div>
                                </div>                                            <div class="fc-today-2 grid">
                                                <div class="fc-today-temp">N/A <p class="celsius-2">°C</p></div>
                                                <div class="fc-today-wind" style=" width: fit-content;">Wind: N/A</div>
                                                <div class="fc-today-humid" style=" width: fit-content">Humidity: N/A</div>
                                            </div>
                            </div> 
                                        </div>
                        </div></div>
        <div class="tomorrow-fc"><p>sigma</p></div>
            <div class="days-fc"><p>ne sigma</p></div> <!--ok kapec vins nestrada-->
    </div>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("B2_1");
        var btns = header.getElementsByClassName("butt-for");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
          });
        }

            for (let i = 1; i <= 14; i++) {
                let element = document.getElementById(`today-stats-${i}`);
                if (element) {
                    if (i<13) {
                    element.textContent = i + ":00 AM"; 
                    } else {
                        let k=i-12;
                        element.textContent = k + ":00 PM"; 

                    }
                }
            }
          window.onload = displayClock();
          function displayClock(){
            var display = new Date().toLocaleTimeString();
              document.getElementById("localTimeTxt").innerHTML = ": "+ display;
            setTimeout(displayClock, 1000); 
          }

        const buttonConfigs = [
          { buttonClass: 'button-today', sectionClass: 'td-fc' },
          { buttonClass: 'button-tomorrow', sectionClass: 'tomorrow-fc' },
          { buttonClass: 'button-10days', sectionClass: 'days-fc' }
        ];

        buttonConfigs.forEach(({ buttonClass, sectionClass }) => {
          const button = document.querySelector(`.${buttonClass}`);
          button.addEventListener('click', () => {
            // Hide all forecast sections
            buttonConfigs.forEach(({ sectionClass }) => {
              document.querySelector(`.${sectionClass}`).style.display = 'none';
            });

            // Show the selected section
            document.querySelector(`.${sectionClass}`).style.display = 'block';
          });
        });


    </script>
</body>
</html>