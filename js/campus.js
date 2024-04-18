function handleCampusChange() {
  var campusSelect = document.getElementById("campus");
  var facultySelect = document.getElementById("faculty");

  // Clear existing options
  facultySelect.innerHTML = "";

  // Get the selected campus value
  var selectedCampus = campusSelect.value;

  // Create options based on the selected campus
  switch (selectedCampus) {
    case "unn":
      addOption(facultySelect, "Select Faculty");
      addOption(facultySelect, "Agriculture");
      addOption(facultySelect, "Arts");
      addOption(facultySelect, "Biological Sciences");
      addOption(facultySelect, "Education");
      addOption(facultySelect, "Vocational Technical Education");
      addOption(facultySelect, "Engineering");
      addOption(facultySelect, "Pharmaceutical Sciences");
      addOption(facultySelect, "Physical Sciences");
      addOption(facultySelect, "Social Sciences");
      addOption(facultySelect, "Veterinary Medicine");
      // Add other faculties for UNN
      break;
    case "unec":
      addOption(facultySelect, "Select Faculty");
      addOption(facultySelect, "Business Administration");
      addOption(facultySelect, "Dentistry");
      addOption(facultySelect, "Environmental Studies");
      addOption(facultySelect, "Law");
      addOption(facultySelect, "Health Science and Technology");
      addOption(facultySelect, "Basic Medical Sciences");
      addOption(facultySelect, "Medical Sciences");
    //Add cases for other campuses
  }
}

function addOption(selectElement, optionText) {
  var option = document.createElement("option");
  option.text = optionText;
  selectElement.add(option);
}
