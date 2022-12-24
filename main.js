
console.log(axios);
var form = document.getElementsByClassName('d-flex')[0]
var input = document.getElementsByClassName('form-control')[0];

form.addEventListener('submit', (e)=>{
    e.preventDefault()
    var config = {
        method: 'get',
        url: 'https://api-adresse.data.gouv.fr/search/?q='+input.value+'&type=housenumber&autocomplete=1',
        headers: { }
      };
      
      axios(config)
      .then(function (response) {
        var data = response.data.features[0].geometry.coordinates
        var city =  response.data.features[0].properties.name
        console.log(response.data);
        console.log(city);
        var lat = data[0];
        var lon = data[1];
        console.log(lat);
        console.log(lon);

        var config = {
            method: 'get',
            url: 'https://api.openweathermap.org/data/2.5/forecast?lat='+lat+'&lon='+lon+'&appid=5189eb711a40863dbfce9f21059d25c8&units=metric&lang=fr',
            headers: { }
            };
        
            axios(config)
            .then(function (response) {
            //   console.log(JSON.stringify(response.data));
            var data = response.data
            var dataList = data.list
            console.log('data :',data)
            var arr = []
        
                

                var ville = document.getElementsByClassName('titre')[0]
                var meteo = document.getElementsByClassName('baniere')[0]
                var ima = document.getElementsByClassName('im')[0]
               
                
                ville.innerHTML = city
                ville.style.display="block"

            dataList.map((v,i)  =>{
                var temp = Math.trunc(v.main.temp) 
                var icon = v.weather[0].icon
                var humidity = v.main.humidity
                var vent = v.wind.speed
                var desc = v.weather[0].description
                var date = v.dt 
                date = new Date(date * 1000).toLocaleString().slice(0, -3).replace(':','h')
                // var tableauImage = document.getElementsByClassName('card-img-top')[i].src="http://openweathermap.org/img/wn/"+icon+".png"
                // var html = document.getElementsByClassName('row').innerHTML = ''
                arr.push(`
                        
                        <div class="col-md-3 mt-3 " style="margin:auto;">
                            <div class="card col-md-12 cadre">
                               <div class="vt">
                                    <div class="top">
                                        <div class="carre">
                                        <p class="city">${city}</p><i class="fa-solid fa-location-arrow"></i>
                                        </div>
                                        <p class="temp">${temp}°C</p>
                                        
                                        </div>
                                    <div class="top2">
                                   
                                    <div class="desc"><img src="http://openweathermap.org/img/wn/${icon}@2x.png" class="card-img-top" alt="... "><p class= "bon"> ${desc}</p></div>

                                    </div>
                                    
                               </div>
                            <div class="card-body">
        
                                <p class="card-text"><b> Jour/Heure :  ${date} <br></b><b>Humidité </b>: <span>${humidity} % </span><br><b>Vent </b>: <span>${vent} km/h</span></p>
        
                                </div>
                            </div> 
                        </div>
                    `)
            })
            var i = 0
            for(const element of arr){
                if (i <= 2 ) {
                    var html = document.getElementsByClassName('etat-1')[0]
                    html.innerHTML += element
                } else if (i <= 5) {
                    var html = document.getElementsByClassName('etat-2')[0]
                    html.innerHTML += element
                }
                else if (i <= 8) {
                    var html = document.getElementsByClassName('etat-3')[0]
                    html.innerHTML += element
                }
                else if (i <= 11) {
                    var html = document.getElementsByClassName('etat-4')[0]
                    html.innerHTML += element
                }
                else if (i <= 14) {
                    var html = document.getElementsByClassName('etat-5')[0]
                    html.innerHTML += element
                }
                else if (i <= 17) {
                    var html = document.getElementsByClassName('etat-6')[0]
                    html.innerHTML += element
                }
                else if (i <= 20) {
                    var html = document.getElementsByClassName('etat-7')[0]
                    html.innerHTML += element
                }
                i++
            }
            })
            .catch(function (error) {
            console.log(error);
            });
      })
      .catch(function (error) {
        console.log(error);
    });
})
const like = document.querySelector('.like');

        let countLike = 0;
        like.addEventListener('click', () => {

            if(countLike === 0) {
                like.classList.toggle('anim-like');
                countLike = 1;
                like.style.backgroundPosition = 'right';
            } else {
                countLike = 0;
                like.style.backgroundPosition = 'left';
            }

        });

        like.addEventListener('animationend', () => {
            like.classList.toggle('anim-like');
        })