const BASE_URL = "http://localhost/mentorme";

function handleLogin(e) {
  e.preventDefault();
  console.log("Login form submitted");
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  //   console.log(email, password);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", `${BASE_URL}/auth/login`, true);
  // xhr.setRequestHeader("Content-Type", "application/json");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      console.log(xhr.responseText);
      //   const response = JSON.parse(xhr.responseText);
      //   if (response.success) {
      //     window.location.href = "/dashboard";
      //   } else {
      //     alert(response.message);
      //   }
    }
  };
  const formData = new FormData();
  formData.append("email", email);
  formData.append("password", password);
  xhr.send(formData);
}
