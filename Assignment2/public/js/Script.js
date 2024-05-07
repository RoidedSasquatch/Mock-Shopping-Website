/*
    Dan Blais, Imed Eddine Cherabi, Prince Apau
    CST8285
    Assignment 2
    Due Apr 07, 2024
*/
/*
    Script.js
    This javascript file contains several functions that are used in this website. These functions include
    functions to search an filter products in the products table, as well as functions that assist with
    form validation on the register and edit php pages.
*/

/*This function will add event listeners to all the add product buttons within the website.
  Event listeners are set for the onClick() event where the retrieveProduct function is called.
*/
function addButtonListeners() {
  var buttons, i;
  buttons = document.getElementsByClassName("add-products-button");
  for(i = 0; i < buttons.length ; i++) {
    buttons[i].setAttribute("onclick", "retrieveProduct(event);")
  }
}

/*
  This function will allow users to filter products within the products table by category.
  The function loops through each product and check to see if its category matches the category
  selected in the combobox. All products that do not match have their display set to none, which
  will hide them from view.
*/
function filterProducts() {
  var input, filter, products, category, i;
  input = document.getElementById("filter-products-field");
  filter = parseInt(input.value);
  products = document.getElementsByClassName("product-container");

  for(i = 0 ; i < products.length ; i++) {
    category = products[i].getElementsByClassName("product-category")[0];
    if(category) {
      if(filter == 0) //Determine what the value of the filter select box is and display rows based on matching vals.
        products[i].style.display = "";
      else if(filter == 1 && category.textContent == filter) 
        products[i].style.display = "";
      else if(filter == 2 && category.textContent == filter)
        products[i].style.display = "";
      else if(filter == 3 && category.textContent == filter)
        products[i].style.display = "";
      else if(filter == 4 && category.textContent == filter)
        products[i].style.display = "";
      else if(filter == 5 && category.textContent == filter)
        products[i].style.display = "";
      else
        products[i].style.display = "none";
    }
  }
}

/*
  This function will allow users to search products within the products table by name.
  The function loops through each character typed and checks to see if the input matches the name
  of the product (its value). All products that do not match have their display set to none, which
  will hide them from view.
*/
function searchProducts() {
    var input, inputSel, filter, filterSel, products, product, category, i, text;
    input = document.getElementById("search-products-field");
    inputSel = document.getElementById("filter-products-field")
    filter = input.value.toUpperCase();
    filterSel = parseInt(inputSel.value);
    products = document.getElementsByClassName("product-container");

    for(i = 0 ; i < products.length ; i++) {
        product = products[i].getElementsByClassName("products-name")[0];
        category = products[i].getElementsByClassName("product-category")[0];
        if (product) {
          text = product.textContent || product.innerText;
          if(text.toUpperCase().indexOf(filter) > -1 && category.textContent == filterSel && filterSel != 0)
            products[i].style.display = ""; 
          else if(text.toUpperCase().indexOf(filter) > -1 && filterSel == 0)
            products[i].style.display = "";
          else
            products[i].style.display = "none";  
        }
    }  
}

//Declare RegEx Array
let regExStrings = {
  namefield: /^.{1,50}$/,
  emailfield: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  passfield: /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/,
  addressfield: /^.{1,300}$/,
  cityfield: /^.{1,300}$/,
  postalfield: /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/
};
//Declare Error Message Array
let errorStrings = {
  namefield: "X Invalid username format. Usernames cannot be blank and must be less than 50 characters.",
  emailfield: "X Invalid email format. Emails must be of the format XXX@XXX.XXX.",
  passfield: "X Invalid password format. Passwords must be at least 8 characters and have an uppercase, lowercase and special character.",
  addressfield: "X Invalid address format. Addresses cannot be blank and must be less than 300 characters.",
  cityfield: "X Invalid city format. City cannot be blank and must be less than 300 characters.",
  postalfield: "X Invalid postal code format. Postal codes must be of the format X0X0X0."
};
//Declare Boolean Array to Store Results of RegEx.test()
let validStatus = {
  namefield: false,
  emailfield: false,
  passfield: false,
  addressfield: false,
  cityfield: false,
  postalfield: false
};

/*
  This function will validate user inputs on the registration form.
*/
function validateRegistration() {
  //Variables
  let passInput = document.getElementById("passfield").value;
  let pass2Input = document.getElementById("pass2field").value;
  let termsAccepted = document.getElementById("termsfield");

  //Call resetErrorFields() Method to Clear Existing Error Messages
  resetErrorFields();

  //Test RegEx Array and Set Error Messages and Change Borders if Failed do this for each field
  //using a foreach loop. 
  Object.keys(regExStrings).forEach(key => {
      validStatus[key] = false;
      let userInput = document.getElementById(key).value;
      let currentRegEx = regExStrings[key];
      let isValid = currentRegEx.test(userInput);
      if(isValid)
          validStatus[key] = true;
      if(validStatus[key] == false){
          var input = document.getElementById(key);
          var text = document.createElement("SPAN");
          input.style.border = "2px Solid Red";
          text.innerText = errorStrings[key];
          text.id="invalidSpan";
          text.style.color="red";
          text.style.fontSize="12px";
          text.style.marginTop="0.5rem";
          document.getElementById(key + "div").appendChild(text);
      } 
  });

  //Check if Retype Password Field Is The Same As The Password Field and Greater Than 0
  if(!(pass2Input == passInput) || pass2Input.length == 0) {
      var input = document.getElementById("pass2field");
      var text = document.createElement("SPAN");
      input.style.border = "2px Solid Red";
      text.innerText="X Retype password. Passwords must match.";
      text.id="invalidSpan"
      text.style.color="red";
      text.style.fontSize="12px";
      text.style.marginTop="0.5rem";
      document.getElementById("pass2fielddiv").appendChild(text);
  }

  //Check That The Terms Checkbox is Accepted If The Element Exits
  if (typeof(termsAccepted) != 'undefined' && termsAccepted != null) {
      if(!termsAccepted.checked) {
          var text = document.createElement("SPAN");
          text.innerText="X Please accept the terms and conditions.";
          text.id="invalidSpan"
          text.style.color="red";
          text.style.fontSize="12px";
          text.style.marginLeft="1rem";
          document.getElementById("terms").appendChild(text);
      }
  }

  //Return True If All Checks Passed and Submit the Form, False If Any Checks Fail and Don't Submit
  if(validStatus.emailfield == true && validStatus.namefield == true && validStatus.passfield == true && validStatus.addressfield == true && validStatus.cityfield == true && validStatus.postalfield == true && pass2Input == passInput && termsAccepted.checked) {
      return true;
  }
  else
      return false;
}

/*
  This function will clear form validation messages and reset input field formatting.
*/
function resetErrorFields() {
  //Clear Format Error Messages If They Exist
  for(i = 0; i < 8; i++) {
      if(!!document.getElementById("invalidSpan")) {
          document.getElementById("invalidSpan").remove();
      }
  }
  document.getElementById("emailfield").style.border = "none";
  document.getElementById("namefield").style.border = "none";
  document.getElementById("passfield").style.border = "none";
  document.getElementById("pass2field").style.border = "none";
  document.getElementById("addressfield").style.border = "none";
  document.getElementById("cityfield").style.border = "none";
  document.getElementById("postalfield").style.border = "none";
}

//Declare RegEx Array for edit page.
let regExStringsEdit = {
  namefield: /^.{1,50}$/,
  emailfield: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
  addressfield: /^.{1,300}$/,
  cityfield: /^.{1,300}$/,
  postalfield: /^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$/
};
//Declare Error Message Array for edit page.
let errorStringsEdit = {
  namefield: "X Invalid username format. Usernames cannot be blank and must be less than 50 characters.",
  emailfield: "X Invalid email format. Emails must be of the format XXX@XXX.XXX.",
  addressfield: "X Invalid address format. Addresses cannot be blank and must be less than 300 characters.",
  cityfield: "X Invalid city format. City cannot be blank and must be less than 300 characters.",
  postalfield: "X Invalid postal code format. Postal codes must be of the format X0X0X0."
};
//Declare Boolean Array to Store Results of RegEx.test() for edit page.
let validStatusEdit = {
  namefield: false,
  emailfield: false,
  addressfield: false,
  cityfield: false,
  postalfield: false
};

/*
  This function will validate user inputs on the edit form.
*/
function validateEdit() {
  //Call resetErrorFields() Method to Clear Existing Error Messages
  resetEditErrorFields();

  //Test RegEx Array and Set Error Messages and Change Borders if Failed do this for each field
  //using a foreach loop. 
  Object.keys(regExStringsEdit).forEach(key => {
      validStatusEdit[key] = false;
      let userInput = document.getElementById(key).value;
      let currentRegEx = regExStringsEdit[key];
      let isValid = currentRegEx.test(userInput);
      if(isValid)
          validStatusEdit[key] = true;
      if(validStatusEdit[key] == false){
          var input = document.getElementById(key);
          var text = document.createElement("SPAN");
          input.style.border = "2px Solid Red";
          text.innerText = errorStrings[key];
          text.id="invalidSpan";
          text.style.color="red";
          text.style.fontSize="12px";
          text.style.marginTop="0.5rem";
          document.getElementById(key + "div").appendChild(text);
      } 
  });

  //Return True If All Checks Passed and Submit the Form, False If Any Checks Fail and Don't Submit for the edit page.
  if(validStatusEdit.emailfield == true && validStatusEdit.namefield == true && validStatusEdit.addressfield == true && validStatusEdit.cityfield == true && validStatusEdit.postalfield == true) {
      return true;
  }
  else
      return false;
}

/*
  This function will clear form validation messages and reset input field formatting for the edit page.
*/
function resetEditErrorFields() {
  //Clear Format Error Messages If They Exist
  for(i = 0; i < 5; i++) {
      if(!!document.getElementById("invalidSpan")) {
          document.getElementById("invalidSpan").remove();
      }
  }
  document.getElementById("emailfield").style.border = "none";
  document.getElementById("namefield").style.border = "none";
  document.getElementById("addressfield").style.border = "none";
  document.getElementById("cityfield").style.border = "none";
  document.getElementById("postalfield").style.border = "none";
}

/*
  This function will create an alert asking the user to confirm account deletion.
*/
function confirmDeletion() {
  if(confirm("Are you sure you would like to delete your account?")) {
      return true;
  } else {
      return false;
  }
}
