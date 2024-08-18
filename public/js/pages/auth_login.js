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
        // Save user data to local storage
        localStorage.setItem("user", JSON.stringify(response.data));

        switch (response.data.role) {
          case "student":
            window.location.href = `${BASE_URL}/student/dashboard`;
            break;
          case "mentor":
            window.location.href = `${BASE_URL}/mentor/dashboard`;
            break;
          case "coordinator":
            window.location.href = `${BASE_URL}/coordinator/dashboard`;
            break;
          case "examiner":
            window.location.href = `${BASE_URL}/examiner/dashboard`;
            break;
          case "stakeholder":
            window.location.href = `${BASE_URL}/stakeholder/dashboard`;
            break;
          case "supervisor_examiner":
            window.location.href = `${BASE_URL}/auth/choose`;
            break;
          default:
            window.location.href = `${BASE_URL}`;
        }
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
