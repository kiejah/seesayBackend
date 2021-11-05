<!DOCTYPE html>
<html>
  <head>
    <title>Tip Distribution in Counties </title>
    <meta charset="utf-8" />
    <meta
      content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
      name="viewport"
    />
    <meta name="author" content="HawiCaesar" />
    <link
      href="https://fonts.googleapis.com/css?family=Varela+Round"
      rel="stylesheet"
    />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @include('layouts.nav')
   
  </head>
  <body style="font-family: 'Varela Round', sans-serif">
    <div id="container" style="width: 100%; height: 800px"></div>
  </body>
  <script
    src="https://code.jquery.com/jquery-1.12.3.min.js"
    integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
    crossorigin="anonymous"
  ></script>
  <script src="{{ asset('highcharts/js/highmaps.js') }}"></script>
  <script src="{{ asset('highcharts/js/numeral.js') }}"></script>

  <!-- Draggable JS file -->
  <script>
    
        
      
    $(function () {
     $.getJSON("{{ route('api.county-data') }}", function(county_data) { 

      //get data to put on map
      $.getJSON("{{ asset('highcharts/json/map4-data.json') }}", function (valuedata) {
        //get the map itself
        $.getJSON("{{ asset('highcharts/json/ke-all.json') }}", function (geojson) {
          // Initiate the chart
          $("#container").highcharts("Map", {
            title: {
              text: "Tip Distribution in Counties",
              style: {
                fontFamily: "Varela Round",
                fontSize: "15px",
              },
            },
            subtitle: {
              text: 'Source: <a href="#">nctc.go.ke</a> ',
              style: {
                fontFamily: "Varela Round",
              },
            },

            mapNavigation: {
              enabled: true,
              buttonOptions: {
                verticalAlign: "top",
              },
            },
            credits: {
              enabled: false,
            },

            legend: {
              title: {
                text: "Tips (2021)",
                style: {
                  color:
                    (Highcharts.theme && Highcharts.theme.textColor) || "black",
                  fontFamily: "Varela Round",
                  fontWeight: "normal",
                },
              },
              draggable: true,
              align: "center",
              verticalAlign: "bottom",
              floating: false,
              layout: "horizontal",
              valueDecimals: 0,
              backgroundColor:
                (Highcharts.theme && Highcharts.theme.legendBackgroundColor) ||
                "rgba(255, 255, 255, 0.85)",
              symbolRadius: 0,
              symbolHeight: 14,
              itemStyle: {
                fontWeight: "normal",
              },
            },

            colorAxis: {
              dataClasses: [
                {
                  to: 20000,
                  name: "<20,000",
                  color: "#BCD2EE",
                },
                {
                  from: 20000,
                  to: 39000,
                  name: "20,000-40,000",
                  color: "#7EB6FF",
                },
                {
                  from: 40000,
                  to: 59000,
                  name: "40,000-60,000",
                  color: "#4D71A3",
                },
                {
                  from: 60000,
                  to: 79000,
                  name: "60,000-80,000",
                  color: "#2B4F81",
                },
                {
                  from: 80000,
                  to: 99000,
                  name: "80,000-100,000",
                  color: "#22316C",
                },
                {
                  from: 100000,
                  name: ">100,000",
                  color: "#162252",
                },
              ],
            },

            tooltip: {
              formatter: function () {
                var c ="";
                var total =0;

                for (let [key, value] of Object.entries(county_data[this.point.id-1])) {
                      
                      c += '<h3 style="font-size:20px;">' + key +'</h3><br><br> '; 
                      
                        Object.keys(value).forEach(k => {
                           
                          Object.entries(value[k]).forEach(entry => {
                                  const [ky, vlue] = entry;
                                  c += "<b>" + ky +"</b>:" +vlue+"<br><br>"; 
                                  total+=vlue;
                                });

                        });
                      
                }
                c += 'Total Tips: <h2 style="font-size:15px;">' + total +'</h3><br> '; 
                
                return c;
              },
              style: {
                fontFamily: "Varela Round",
                fontColor: "#cccccc",
                padding:"10px",
              },
            },
            series: [
              {
                data: valuedata,
                mapData: geojson,
                color: "#2167ab",
                cursor: "normal",
                joinBy: ["COUNTY", "code"],
                name: "Spending",
                states: {
                  hover: {
                    color: "#3b92d8",
                  },
                },
                dataLabels: {
                  enabled: true,
                  format: "{point.code}",
                  style: {
                    fontFamily: "Varela Round",
                    fontColor: "#cccccc",
                  },
                },
              },
            ],
          });
        });
      });
    });
  });
  </script>
</html>
