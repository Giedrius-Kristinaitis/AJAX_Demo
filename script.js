/**
 * Makes an AJAX request to the server
 * @param {string} method request method to use
 * @param {string} url url of the requested file
 * @param {function} callback callback function to be executed when the request finishes
 * @param {array} headers array of header names
 * @param {array} headerValues array of header values
 * @param {string} parameters request parameters if the method used is POST
 */
function ajax(method, url, callback, headers, headerValues, parameters){
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(callback !== undefined){
                callback.apply(this);
            }
        }
    }

    xhttp.open(method, url, true);

    if(headers !== undefined && headerValues !== undefined && headers.length === headerValues.length){
        for(let i = 0; i < headers.length; i++){
            xhttp.setRequestHeader(headers[i], headerValues[i]);
        }
    }

    xhttp.send(parameters);
}

/**
 * Connects to the server and gets generated string
 */
function generateString(){
    var length = Math.floor(Math.random() * 50) + 1;

    // ajax request using POST
    ajax('POST', 'generator.php', function(){
        updateGeneratedStringText(this.responseText);
    }, ['Content-type'], ['application/x-www-form-urlencoded'], 'length=' + length);
}

/**
 * Updates generated string element on the page
 * @param {string} string text to be set as the generated string
 */
function updateGeneratedStringText(string){
    document.querySelector('#string').innerHTML = string;
}

/**
 * Gets person from the server in JSON format
 */
function getPerson(){
    ajax('GET', 'person.json', function(){
        var person = JSON.parse(this.responseText);

        var personUI = document.getElementById('person');
        
        // remove all child elements
        while(personUI.firstChild){
            personUI.removeChild(personUI.firstChild);
        }

        personUI.appendChild(createLI('First Name: ' + person.name));
        personUI.appendChild(createLI('Last Name: ' + person.surname));
        personUI.appendChild(createLI('Phone number: ' + person.number));
        personUI.appendChild(createLI('Address: ' + person.address.country + ', ' + person.address.city + ', ' + person.address.street));
    });
}

/**
 * Creates a new 'li' element
 * @param {string} text 
 */
function createLI(text){
    var element = document.createElement('li');
    element.innerHTML = text;
    return element;
}
