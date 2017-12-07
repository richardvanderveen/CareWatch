//First function call on page load
setTimeout(addAlarm, 1);
//Refreshes the alarm list every 10 seconds
setInterval(addAlarm, 10000);

//First function call with AJAX
function addAlarm() {
  get_data('https://carew.oudgenoeg.nl/php/alarms.php', handle_data);
};

//Handles and parses data to js object
function get_data(url, cb) {
  // Older browser call xhttp something else
  var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      var responseJSON = JSON.parse(this.responseText);
      cb(responseJSON);
    }
  };
  xhttp.open("GET", url, true);
  xhttp.send();
}

//Main function to add another alarom element on the alarmlandingpage.html
function handle_data(data) {
  console.log(data);

  //Sort the data on alarm state and time
  data.sort(function(stateA, stateB) {
    return stateA.state - stateB.state || stateA.datapoint.time - stateB.datapoint.time
  })
  //backup sort on state alone
  // data.sort(function(stateA, stateB) {
  //  return stateA.state > stateB.state
  // })

  //Function to add collums in alarm row with data given from backend
  function addColl(content, colClass) {
    var alarmCol = document.createElement("div");
    if (colClass == undefined) {
      alarmCol.className = "col";
    } else {
      alarmCol.className = colClass;
    }
    alarmCol.innerHTML = content;
    alarmRow.appendChild(alarmCol);
  }



  //Checks if it received any data, if yes empties the main alarm list
  if (data.length > 0) {
    document.getElementsByClassName("alarmList")[0].innerHTML = "";

    //Loop to make a alarm element for each alarm received.
    for (var i = 0; i < data.length; i++) {

      //Makes the alarms a clickable link
      var newAlarmLink = document.createElement("a");

      newAlarmLink.href = "alarm.html" + "?id=" + data[i].alarmid;
      newAlarmLink.style = "display:block; text-decoration:none;";

      //Makes new alarm div container
      var newAlarm = document.createElement("div");
      newAlarm.className = "container alarmContainer";

      //Add div which holds collums
      var alarmRow = document.createElement("div");

      // Adds the BPM or Celcius scale depending on Value
      var alarmValueOut = ""
      var alarmValue = data[i].datapoint.value;
      // console.log(alarmValue);
      if (alarmValue.length > 6) {
        // alarmValueOut = (((alarmValue.substr(0, 4))*(9/5)) + 32) + " °F";
        alarmValueOut = parseFloat((((alarmValue.substr(0, 4)) * (9 / 5)) + 32)).toPrecision(4) + " °F"
      } else {
        alarmValueOut = alarmValue + " bpm";
      }

      var alarmStatusIn = parseInt(data[i].state);
      var alarmStatusOut = "";
      // console.log(alarmStatusIn);

      //Depending on alarmstate is applies a diffrent class and status text
      switch (alarmStatusIn) {
        case 1:
          alarmRow.className = "row alarm newAlarm";
          alarmStatusOut = "New";
          break;
        case 2:
          alarmRow.className = "row alarm seenAlarm";
          alarmStatusOut = "Seen";
          break;
        case 3:
          alarmRow.className = "row alarm busyAlarm";
          alarmStatusOut = "In Progress";
          break;
        case 4:
          alarmRow.className = "row alarm solvedAlarm";
          alarmStatusOut = "Solved";
          break;
        default:
          alarmRow.className = "row alarm solvedAlarm";
      }

      // Add data from the backend to diffrent colums
      addColl(data[i].datapoint.sensor.device.owner.first_name + " " + data[i].datapoint.sensor.device.owner.last_name);
      addColl(data[i].datapoint.sensor.type);
      addColl(data[i].datapoint.time.substr(0, 8), "col alarmTime");
      addColl(alarmValueOut);
      addColl(alarmStatusOut);

      //Add the row with colums to the main alarm container
      newAlarm.appendChild(alarmRow);

      //Add clickable link to alarm element
      newAlarmLink.appendChild(newAlarm);

      //Adds the elements in the main HTML container on alarmlandingpage.html
      document.getElementsByClassName("alarmList")[0].appendChild(newAlarmLink);
    }
  }
}
