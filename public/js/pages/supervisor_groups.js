const mentorMetCtx = document.getElementById("mentorMe").getContext("2d");
const mentorMEChart = new Chart(mentorMetCtx, {
  type: "doughnut",
  options: {
    plugins: {
      title: {
        display: true,
        text: "Overall Completion",
      },
    },
  },
  data: {
    labels: ["Will", "John", "Jane", "Raj"],
    datasets: [
      {
        label: "Tasks",
        data: [12, 19, 3, 5],
        backgroundColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
        borderColor: ["#4A3AFF", "#2D5BFF", "#93AAFD", "#C6D2FD"],
        borderWidth: 1,
      },
    ],
  },
});
