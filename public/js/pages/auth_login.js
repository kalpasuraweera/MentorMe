const BASE_URL = "http://localhost/mentorme";

function handleLogin(e) {
  e.preventDefault();
  console.log("Login form submitted");
  const xhr = new XMLHttpRequest();
  xhr.open("POST", `${BASE_URL}/auth/login`, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      //   console.log(response);
      if (response.success) {
        // TODO: Check the user type and redirect to the appropriate dashboard
        window.location.href = `${BASE_URL}/coordinator/dashboard`;
      } else {
        document.getElementById("error").innerText = response.message;
      }
    }
  };
  const formData = new FormData();
  formData.append("email", document.getElementById("email").value);
  formData.append("password", document.getElementById("password").value);
  xhr.send(formData);
}
