function updateSelected(selected){
  select = document.getElementById("image_selected");
  select.value = selected;
}
function login(){
  if((document.getElementById("username").value === "") && (document.getElementById("password").value === "")){
    alert("Please enter a username and password");
  }
  else if(document.getElementById("username").value === ""){
    alert("Please enter a username");
  }
  else if(document.getElementById("password").value === ""){
    alert("Please enter a password");
  }
  else{
    document.getElementById("myForm").submit();
  }
}
function calculate(){
  if(document.getElementById('desiredHeight').value =="" || document.getElementById('desiredWidth').value ==""){}
  else{
    var height = parseFloat(document.getElementById('desiredHeight').value).toFixed(2);;
    var width = parseFloat(document.getElementById('desiredWidth').value).toFixed(2);;
    var cost = (width * height * 0.25);
    document.getElementById('cost').value = cost.toFixed(2);;
    document.getElementById('shipping').value = 10;
    var tax = cost * 0.13;
    document.getElementById('tax').value = tax.toFixed(2);;
    var total = cost + 10 + tax;
    document.getElementById('totalCost').value = total.toFixed(2);;
  }
}
function validate(){
  if(document.getElementById('first_name').value ==""){
    alert("Please enter your first name");
  }
  else if(document.getElementById('last_name').value ==""){
    alert("Please enter your last name");
  }
  else if(document.getElementById('address').value ==""){
    alert("Please enter your address");
  }
  else if(document.getElementById('city').value ==""){
    alert("Please enter your city");
  }
  else if(document.getElementById('province').value ==""){
    alert("Please enter your province");
  }
  else if(document.getElementById('postal_code').value ==""){
    alert("Please enter your postal code");
  }
  else if(document.getElementById('email').value ==""){
    alert("Please enter your email");
  }
  else if(document.getElementById('password').value ==""){
    alert("Please enter a password");
  }
  else{
    document.getElementById("myForm").submit();
  }

}