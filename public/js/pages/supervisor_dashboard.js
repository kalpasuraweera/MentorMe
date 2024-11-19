const taskCompletionChartCtx = document
  .getElementById("weeklyTaskCompletion")
  .getContext("2d");
const taskCompletionChart = new Chart(taskCompletionChartCtx, {
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
        backgroundColor: "#962DFF",
        borderColor: "#962DFF",
        borderWidth: 1,
      },
      {
        label: "CS002",
        data: [2, 3, 20, 5, 1, 4, 6],
        backgroundColor: "#C893FD",
        borderColor: "#C893FD",
        borderWidth: 1,
      },
      {
        label: "CS003",
        data: [2, 3, 20, 5, 1, 4, 6],
        backgroundColor: "#E0C6FD",
        borderColor: "#E0C6FD",
        borderWidth: 1,
      },
    ],
  },
});

const projectCompletionChartCtx = document
  .getElementById("projectCompletion")
  .getContext("2d");
const projectCompletionChart = new Chart(projectCompletionChartCtx, {
  type: "bar",
  options: {
    indexAxis: "y",
    plugins: {
      title: {
        display: true,
        text: "Project Completion",
      },
    },
  },
  data: {
    labels: ["CS001", "CS002", "CS003"],
    datasets: [
      {
        label: "Completed",
        data: [12, 19, 3],
        backgroundColor: "#2CFFB9",
        borderColor: "#2CFFB9",
        borderWidth: 1,
      },
      {
        label: "In Progress",
        data: [2, 3, 20],
        backgroundColor: "#FFD686",
        borderColor: "#FFD686",
        borderWidth: 1,
      },
      {
        label: "Not Started",
        data: [2, 3, 20],
        backgroundColor: "#A3D9FF",
        borderColor: "#A3D9FF",
        borderWidth: 1,
      },
    ],
  },
});

const taskDistributionChartCtx = document
  .getElementById("taskDistribution")
  .getContext("2d");
const taskDistributionChart = new Chart(taskDistributionChartCtx, {
  type: "doughnut",
  options: {
    plugins: {
      title: {
        display: true,
        text: "Task Distribution",
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


