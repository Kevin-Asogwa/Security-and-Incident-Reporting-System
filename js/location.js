// Use window.addEventListener to ensure the DOM is fully loaded before running the code
function handleLocationChange() {
  var locationSelect = document.getElementById("locat");
  var accommodationOptionsDiv = document.getElementById("accommodationOptions");

  // Reset the div content
  accommodationOptionsDiv.innerHTML = "";

  if (locationSelect.value == "Hostel") {
    // Get gender and campus values
    var gender = document.getElementById("gender").value;
    var campus = document.getElementById("campus").value;

    // Create options based on gender and campus

    var hostelOptions = getHostelOptions(gender, campus);
    console.log(hostelOptions);
    // Add hostel options to the div

    accommodationOptionsDiv.innerHTML = hostelOptions;
  } else if (locationSelect.value === "Off Campus") {
    // Get campus value
    var campus = document.getElementById("campus").value;

    // Create options based on campus
    var lodgeOptions = getLodgeOptions(campus);

    // Add lodge options to the div
    accommodationOptionsDiv.innerHTML = lodgeOptions;
  }
}

function getHostelOptions(gender, campus) {
  // Define hostel options based on gender and campus
  var hostelOptions = '<label for="hostel">Hostel:</label>';
  hostelOptions += '<select name="hostel" id="hostel" required>';

  if (gender == "male" && campus == "unn") {
    hostelOptions += '<option value="select hostel">Select Hostel</option>';
    hostelOptions += '<option value="Eni-Njoku">Eni-Njoku</option>';
    hostelOptions += '<option value="Alvan Ikoku">Alvan Ikoku</option>';
    // Add more options as needed
  } else if (gender == "female" && campus == "unn") {
    hostelOptions += '<option value="select hostel">Select Hostel</option>';
    hostelOptions +=
      '<option value="Aja Nwachukwu Hostel">Aja Nwachukwu Hostel</option>';
    hostelOptions += '<option value="Eyo Ita Hostel">Eyo Ita Hostel</option>';
    hostelOptions += '<option value="">Belewa Hostel</option>';
    hostelOptions += '<option value="">Okeke Hostel</option>';
    hostelOptions += '<option value="">Akintola Hostel</option>';
    hostelOptions += '<option value="">Akpabio Hostel</option>';
    hostelOptions += '<option value="">Presidential Hostel</option>';
    hostelOptions += '<option value="">Bello Hall</option>';
    hostelOptions += '<option value="">Okpara Hall</option>';
    hostelOptions += '<option value="">Kwame Nkrumah Hostel</option>';
    hostelOptions += '<option value="">Mary Slessor</option>';
    hostelOptions += '<option value="">Awolowo Hostel</option>';
  } else if (gender == "male" && campus == "unec") {
    hostelOptions += '<option value="select hostel">Select Hostel</option>';
    hostelOptions += '<option value="">Kenneth Dike Hall (IJ) Hostel</option>';
    hostelOptions += '<option value="">Mbonu Ojike Hall (GH) Hostel</option>';
  } else if (gender == "female" && campus == "unec") {
    hostelOptions += '<option value="select hostel">Select Hostel</option>';
    hostelOptions += '<option value="">Lady Eudorah Ibiam Hostel</option>';
    hostelOptions += '<option value="">Samuel Manuwa Hall</option>';
    hostelOptions += '<option value="">Akpabio Hostel</option>';
    hostelOptions += '<option value="">Presidential Hall</option>';
    hostelOptions += '<option value="">Odumegwu Ojukwu Hall</option>';
    hostelOptions += '<option value="">Adelabu Hall</option>';
    hostelOptions += '<option value="">Jereton Marriere Hostel</option>';
  }

  // Add more conditions based on other campuses and genders

  hostelOptions += "</select>";
  hostelOptions += '<label for="roomNumber">Room Number:</label>';
  hostelOptions +=
    '<input type="text" id="roomNumber" name="room_number" required>';

  return hostelOptions;
}

function getLodgeOptions(campus) {
  // Define lodge options based on campus
  var lodgeOptions = '<label for="lodgeLocation">Lodge Location:</label>';
  lodgeOptions += '<select name="lodge_location" id="lodgeLocation" required>';

  if (campus == "unn") {
    lodgeOptions += '<option value="">Select Lodge</option>';
    lodgeOptions += '<option value="Hilltop">Hilltop</option>';
    lodgeOptions += '<option value="Odim">Odim</option>';
    lodgeOptions += '<option value="Odenigwe">Odenigwe</option>';
    lodgeOptions += '<option value="Behind Flat">Behind Flat</option>';
    lodgeOptions += '<option value="Green House">Green House</option>';
    lodgeOptions += '<option value="Others">Others (Please specify)</option>';
    // Add more options as needed
  } else if (campus == "unec") {
    lodgeOptions += '<option value="">Select Lodge</option>';
    lodgeOptions += '<option value="">Maryland</option>';
    lodgeOptions += '<option value="">Corridor Layout</option>';
    lodgeOptions += '<option value="">Kenyatta</option>';
    lodgeOptions += '<option value="">College Road</option>';
    lodgeOptions += '<option value="New Haven">New Haven</option>';
    lodgeOptions +=
      '<option value="Independence Layout">Independence Layout</option>';
    lodgeOptions += '<option value="Golf Estate">Golf Estate</option>';
    lodgeOptions += '<option value="GRA">GRA</option>';
    lodgeOptions += '<option value="Trans-Ekulu">Trans-Ekulu</option>';
    lodgeOptions += '<option value="Others">Others (Please specify)</option>';
    // Add more options as needed
  }

  // Add more conditions based on other campuses

  lodgeOptions += "</select>";
  console.log(lodgeOptions.value);
  lodgeOptions += '<label for="lodgeName">Lodge Name:</label>';
  lodgeOptions +=
    '<input type="text" id="lodgeName" name="lodge_name" required>';

  lodgeOptions += '<label for="nearestLandmark">Nearest Landmark:</label>';
  lodgeOptions +=
    '<input type="text" id="nearestLandmark" name="nearest_landmark" required>';

  return lodgeOptions;
}
window.addEventListener("DOMContentLoaded", function () {
  function handleLocationChange() {
    var locationSelect = document.getElementById("location");

    var accommodationOptionsDiv = document.getElementById(
      "accommodationOptions"
    );

    // Reset the div content
    accommodationOptionsDiv.innerHTML = "";

    if (locationSelect.value === "Hostel") {
      // Get gender and campus values
      var gender = document.getElementById("gender").value;
      var campus = document.getElementById("campus").value;

      // Create options based on gender and campus
      var hostelOptions = getHostelOptions(gender, campus);

      // Add hostel options to the div
      accommodationOptionsDiv.innerHTML = hostelOptions;
    } else if (locationSelect.value === "Off Campus") {
      // Get campus value
      var campus = document.getElementById("campus").value;

      // Create options based on campus
      var lodgeOptions = getLodgeOptions(campus);

      // Add lodge options to the div
      accommodationOptionsDiv.innerHTML = lodgeOptions;
    }
  }

  function getHostelOptions(gender, campus) {
    // Define hostel options based on gender and campus
    var hostelOptions = '<label for="hostel">Hostel:</label>';
    hostelOptions += '<select name="hostel" id="hostel" required>';

    if (gender === "male" && campus === "University of Nigeria, Nsukka, UNN") {
      hostelOptions += '<option value="Eni-Njoku Hall">Eni-Njoku Hall</option>';
      hostelOptions += '<option value="Alvan Ikoku">Alvan Ikoku</option>';
      // Add more options as needed
    } else if (
      gender === "female" &&
      campus === "University of Nigeria, Nsukka, UNN"
    ) {
      hostelOptions +=
        '<option value="Aja Nwachukwu Hostel">Aja Nwachukwu Hostel</option>';
      hostelOptions += '<option value="Eyo Ita Hostel">Eyo Ita Hostel</option>';
      // Add more options as needed
    }

    // Add more conditions based on other campuses and genders

    hostelOptions += "</select>";
    hostelOptions += '<label for="roomNumber">Room Number:</label>';
    hostelOptions +=
      '<input type="text" id="roomNumber" name="roomNumber" required>';

    return hostelOptions;
  }

  function getLodgeOptions(campus) {
    // Define lodge options based on campus
    var lodgeOptions = '<label for="lodgeLocation">Lodge Location:</label>';
    lodgeOptions += '<select name="lodgeLocation" id="lodgeLocation" required>';

    if (campus === "University of Nigeria, Nsukka, UNN") {
      lodgeOptions += '<option value="Hilltop">Hilltop</option>';
      lodgeOptions += '<option value="Odim">Odim</option>';
      lodgeOptions += '<option value="Odenigwe">Odenigwe</option>';
      lodgeOptions += '<option value="Behind Flat">Behind Flat</option>';
      lodgeOptions += '<option value="Green House">Green House</option>';
      lodgeOptions += '<option value="Others">Others (Please specify)</option>';
      // Add more options as needed
    } else if (campus === "University of Nigeria Enugu campus, UNEC") {
      lodgeOptions += '<option value="New Haven">New Haven</option>';
      lodgeOptions +=
        '<option value="Independence Layout">Independence Layout</option>';
      lodgeOptions += '<option value="Golf Estate">Golf Estate</option>';
      lodgeOptions += '<option value="GRA">GRA</option>';
      lodgeOptions += '<option value="Trans-Ekulu">Trans-Ekulu</option>';
      lodgeOptions += '<option value="Others">Others (Please specify)</option>';
      // Add more options as needed
    }

    // Add more conditions based on other campuses

    lodgeOptions += "</select>";
    lodgeOptions += '<label for="lodgeName">Lodge Name:</label>';
    lodgeOptions +=
      '<input type="text" id="lodgeName" name="lodgeName" required>';

    lodgeOptions += '<label for="nearestLandmark">Nearest Landmark:</label>';
    lodgeOptions +=
      '<input type="text" id="nearestLandmark" name="nearestLandmark" required>';

    return lodgeOptions;
  }
});
