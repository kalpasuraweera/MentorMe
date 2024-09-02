var ctx = document.getElementById("weeklyTaskCompletion").getContext("2d");
var myChart = new Chart(ctx, {
  type: "bar",
  options: {
    plugins: {
      title: {
        display: true,
        text: "Weekly Task Completion",
      },
    },
    scales: {
      y: {
        stacked: true,
      },
      x: {
        stacked: true,
      },
    },
  },
  data: {
    labels: [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday",
    ],
    datasets: [
      {
        label: "CS001",
        data: [12, 19, 3, 5, 2, 3, 10],
        backgroundColor: "#18ff43",
        borderColor: "#18ff43",
        borderWidth: 1,
      },
      {
        label: "CS002",
        data: [2, 3, 20, 5, 1, 4, 6],
        backgroundColor: "#ff1843",
        borderColor: "#ff1843",
        borderWidth: 1,
      },
      {
        label: "CS003",
        data: [2, 3, 20, 5, 1, 4, 6],
        backgroundColor: "#4318ff",
        borderColor: "#4318ff",
        borderWidth: 1,
      },
    ],
  },
});
