const finishedTasksctx = document
    .getElementById("finishedTasks")
    .getContext("2d");

const finishedTasks =  new Chart(finishedTasksctx, {
    type: "bar",
    data: {
        labels: [
            "Monday",
            "Tuesday", 
            "Wednesday", 
            "Thursday", 
            "Friday", 
            "Saturday", 
            "Sunday"
        ], 
        datasets: [
            {
                label: "Tasks Completed", // First dataset
                data: [10, 12, 8, 11, 6, 5, 9], // Example data for first bar
                backgroundColor: "#4318FF", // Color for first bar
                borderColor: "#4318FF",
                borderWidth: 1,
            },
            {
                label: "Tasks Pending", // Second dataset
                data: [5, 6, 7, 4, 8, 9, 3], // Example data for second bar
                backgroundColor: "#C893FD", // Color for second bar
                borderColor: "#C893FD",
                borderWidth: 1,
            },
        ],
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: "Weekly Task Breakdown", // Title of the chart
            },
        },
        scales: {
            y: {
                beginAtZero: true, // Y-axis starts from zero
            },
            x: {
                stacked: false, // Side-by-side bars instead of stacked
            },
        },
    },
});

  
const CurrentSpeedctx = document
    .getElementById("CurrentSpeed")
    .getContext("2d");

const CurrentSpeed = new Chart(CurrentSpeedctx,{
    type: 'line',
    data: {
        labels: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
        ],
        datasets: [{
            label: 'Required speed',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        },
        {
            label: 'Current speed',
            data: [25, 34, 24, 24, 26, 65, 10],
            fill: false,
            borderColor: 'rgb(239, 68, 68)',
            tension: 0.1
        }
        ],
    },
});



function displayDate() {
    const today = new Date();
    
    // Array of month names
    const months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    
    // Extract day and month
    const day = today.getDate();
    const month = months[today.getMonth()]; // getMonth() returns 0-11
    
    // Format date as "Day Month"
    const dateString = `${day} ${month}`;
    
    // Display the date in the HTML element with id "date"
    document.getElementById('date').textContent = dateString;
}

// Run the displayDate function when the page loads
window.onload = displayDate;