
var getState = (countryId) => {
    let html; 
    fetch('http://127.0.0.1:8000/getState/'+countryId)
        .then(function (response) {
            return response.json();
            
        })
        .then(function (myJson) {
            $('.removePreviousStates').remove();
            myJson.forEach( (element) => {
                html += '<option class="removePreviousStates" value="' + element.id + '">' + element.name + '</option>';
            });
            $('#state').append(html);

        });
};


var getCity = (stateId) => {
    let html;
    fetch('http://127.0.0.1:8000/getCity/' + stateId)
        .then(function (response) {
            return response.json();

        })
        .then(function (myJson) {
            $('.removePreviousCities').remove();
            myJson.forEach((element) => {
                html += '<option class="removePreviousCities" value="' + element.id + '">' + element.name + '</option>';
            });
            $('#city').append(html);

        });
};