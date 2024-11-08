const BASE_URL = "http://localhost/mentorme";

function handleLogin(e) {
  e.preventDefault();
  console.log("Login form submitted");
  const xhr = new XMLHttpRequest();
  xhr.open("POST", `${BASE_URL}/auth/login`, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        switch (response.data.role) {
          case "STUDENT":
            if (response.data.group_id === null) {
              window.location.href = `${BASE_URL}/student/groupFormation`;
            } else {
              window.location.href = `${BASE_URL}/student/dashboard`;
            }
            break;
          case "STUDENT_LEADER":
            if (response.data.group_id === null) {
              window.location.href = `${BASE_URL}/student/groupFormation`;
            } else {
              window.location.href = `${BASE_URL}/student/dashboard`;
            }
            break;
          case "SUPERVISOR":
            window.location.href = `${BASE_URL}/supervisor/dashboard`;
            break;
          case "COORDINATOR":
            window.location.href = `${BASE_URL}/coordinator/dashboard`;
            break;
          case "EXAMINER":
            window.location.href = `${BASE_URL}/examiner/dashboard`;
            break;
          case "STAKEHOLDER":
            window.location.href = `${BASE_URL}/stakeholder/dashboard`;
            break;
          case "SUPERVISOR_EXAMINER":
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
