function handleFacultyChange() {
  var facultySelect = document.getElementById("faculty");
  var departmentSelect = document.getElementById("department");

  // Clear existing options
  departmentSelect.innerHTML = "";

  // Get the selected faculty value
  var selectedFaculty = facultySelect.value;

  // Create options based on the selected faculty
  switch (selectedFaculty) {
    case "Agriculture":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Animal Science");
      addOption(departmentSelect, "Agricultural Economics");
      addOption(departmentSelect, "Agricultural Extension");
      addOption(departmentSelect, "Crop Science");
      addOption(departmentSelect, "Food Science and Technology");
      addOption(departmentSelect, "Home Science and Management");
      addOption(departmentSelect, "Nutrition and Dietetic");
      addOption(departmentSelect, "Soil Science");
      break;

    case "Arts":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Mass Communication");
      addOption(departmentSelect, "Archaeology & Tourism");
      addOption(departmentSelect, "History & International Studies");
      addOption(departmentSelect, "Fine & Applied Arts");
      addOption(departmentSelect, "Theatre and Film Studies");
      addOption(departmentSelect, "Music");
      addOption(departmentSelect, "English & Literary Studies");
      addOption(departmentSelect, "Foreign Languages");
      addOption(departmentSelect, "Linguistics & Nigerian Languages");
      break;

    case "Biological Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Microbiology");
      addOption(departmentSelect, "Biochemistry");
      addOption(departmentSelect, "Molecular Biology");
      addOption(departmentSelect, "Plant Sciences & Biotechnology");
      addOption(departmentSelect, "Zoology & Environmental Biology");
      break;

    case "Education":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Arts Education");
      addOption(departmentSelect, "Science Education");
      addOption(departmentSelect, "Adult Education");
      addOption(departmentSelect, "Educational Foundation");
      addOption(departmentSelect, "Human Kinetics & Health Education");
      addOption(departmentSelect, "Library & Information Science");
      addOption(departmentSelect, "Education Social Science");
      addOption(departmentSelect, "Computer Education");
      addOption(departmentSelect, "Home Economics");
      addOption(departmentSelect, "Guidance & Counselling");
      addOption(departmentSelect, "Social Science Education");
      break;

    case "Vocational Technical Education":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Agricultural Education");
      addOption(departmentSelect, "Business Education");
      addOption(departmentSelect, "Computer Education & Robotics");
      addOption(departmentSelect, "Home Economics & Hospitality Education");
      addOption(departmentSelect, "Industrial Technical Education");
      break;
    case "Engineering":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Civil Engineering");
      addOption(departmentSelect, "Electronic Engineering");
      addOption(departmentSelect, "Electrical Engineering");
      addOption(departmentSelect, "Mechanical Engineering");
      addOption(departmentSelect, "Agric. & Bioresources Engineering");
      addOption(departmentSelect, "Metallurgical & Materials Engineering");
      addOption(departmentSelect, "Mechatronics Engineering");
      addOption(departmentSelect, "Biomedical Engineering");
      break;

    case "Pharmaceutical Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Pharmacy");
      // addOption(departmentSelect, "Pharmaceutical and Medicinal Chemistry");
      // addOption(departmentSelect, "Pharmacology and Toxicology");
      // addOption(departmentSelect, "Pharmaceutics");
      // addOption(departmentSelect, "Pharmaceutical Technology");
      // addOption(departmentSelect, "Pharmacognosy");
      // addOption(departmentSelect, "Pharmacognosy and Environmental Medicines");
      break;

    case "Physical Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Statistics");
      addOption(departmentSelect, "Physics & Astronomy");
      addOption(departmentSelect, "Computer Science");
      addOption(departmentSelect, "Geology");
      addOption(departmentSelect, "Pure and Industrial Chemistry");
      addOption(departmentSelect, "Mathematics");
      addOption(departmentSelect, "Science Laboratory Technology");
      break;

    case "Social Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Philosophy");
      addOption(departmentSelect, "Public Administration & Local Government");
      addOption(departmentSelect, "Psychology");
      addOption(departmentSelect, "Economics");
      addOption(departmentSelect, "Geography");
      addOption(departmentSelect, "Sociology & Anthropology");
      addOption(departmentSelect, "Religion and Cultural Studies");
      addOption(departmentSelect, "Social Work");
      addOption(departmentSelect, "Political Science");
      break;

    case "Veterinary Medicine":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Veterinary medicine");
      // addOption(departmentSelect, "Veterinary pathology and Microbiology");
      // addOption(departmentSelect, "Veterinary Obstetrics and Reproductive Diseases");
      // addOption(departmentSelect, "Veterinary Physiology and Pharmacology");
      // addOption(departmentSelect, "Veterinary Anatomy");
      // addOption(departmentSelect, "Veterinary Medicine");
      // addOption(departmentSelect, "Veterinary Surgery");
      // addOption(departmentSelect, "Veterinary Parasitology & Entomology");
      // addOption(departmentSelect, "Animal Health & Production");
      // addOption(departmentSelect,"Veterinary Public Health & Preventive Medicine");
      // addOption(departmentSelect, "Veterinary Teaching Hospital");
      break;

    case "Business Administration":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Accountancy");
      addOption(departmentSelect, "Marketing");
      addOption(departmentSelect, "Business Administration");
      addOption(departmentSelect, "Banking & Finance");
      addOption(departmentSelect, "Management");
      break;

    case "Dentistry":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Dentistry");
      // addOption(departmentSelect, "Child Dental Health");
      // addOption(departmentSelect, "Oral Maxillofacial Surgery");
      // addOption(departmentSelect, "Preventive Dentistry");
      // addOption(departmentSelect, "Restorative Dentistry");
      break;

    case "Environmental Studies":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Estate Management");
      addOption(departmentSelect, "Urban & Regional Planning");
      addOption(departmentSelect, "Architecture");
      addOption(departmentSelect, "Surveying & Geoinformatics");
      break;

    case "Law":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Law");
      // addOption(departmentSelect, "Public & Private Law");
      // addOption(departmentSelect, "International Law & Jurisprudence");
      // addOption(departmentSelect, "Property Law");
      break;

    case "Health Science and Technology":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Medical Rehabilitation");
      addOption(
        departmentSelect,
        "Medical Radiography & Radiological Sciences"
      );
      addOption(departmentSelect, "Nursing Sciences");
      addOption(departmentSelect, "Medical Laboratory Science");
      break;

    case "Basic Medical Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Human Anatomy");
      addOption(departmentSelect, "Human Physiology");
      break;

    // Output all departments in Medical Sciences
    case "Medical Sciences":
      addOption(departmentSelect, "Select Department");
      addOption(departmentSelect, "Medicine and Surgery");
      // addOption(departmentSelect, "Anaesthesia");
      // addOption(departmentSelect, "Anatomy");
      // addOption(departmentSelect, "Chemical Pathology");
      // addOption(departmentSelect, "Community Medicine");
      // addOption(departmentSelect, "Dermatology");
      // addOption(departmentSelect, "Haematology & Immunology");
      // addOption(departmentSelect, "Medical Biochemistry");
      // addOption(departmentSelect, "Medical Microbiology");
      // addOption(departmentSelect, "Morbid Anatomy");
      // addOption(departmentSelect, "Obstetrics & Gaenecology");
      // addOption(departmentSelect, "Ophthalmology");
      // addOption(departmentSelect, "Otolaringology");
      // addOption(departmentSelect, "Paediatrics");
      // addOption(departmentSelect, "Paediatric Surgery");
      // addOption(departmentSelect, "Pharmacology & Therapeutics");
      // addOption(departmentSelect, "Physiological Medicine");
      // addOption(departmentSelect, "Radiation Medicine");
      // addOption(departmentSelect, "Surgery");
      break;
  }
}

// Function to add an option to a select element
function addOption(selectElement, optionText) {
  var option = document.createElement("option");
  option.text = optionText;
  selectElement.add(option);
}
