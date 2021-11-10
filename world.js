window.onload = function(){
    
    const countrybutton = document.getElementById("lookup");
    const citybutton = document.getElementById("lookupcity");
    const result = document.getElementById("result");
    

    countrybutton.addEventListener("click", function(){
        var country = document.getElementById("country").value;

        if (!country){
            query = 'world.php'
        }
        else{
            query = "world.php?country=" + country
        }
        fetch(query)
        .then(Response => Response.text())
        .then(data =>{
            result.innerHTML = data;
        })
        .catch(error =>{
            alert(error)
        });
    });

    citybutton.addEventListener("click", function(){
        var country = document.getElementById("country").value;

        if (!city){
            query = 'world.php'
        }
        else{
            query = "world.php?country=" + country + "&context=cities"
        }
        fetch(query)
        .then(Response => Response.text())
        .then(data =>{
            result.innerHTML = data;
        })
        .catch(error =>{
            alert(error)
        });
    });


}