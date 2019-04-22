// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ["Май 1", "Май 2", "Май 3", "Май 4", "Май 5", "Май 6", "Май 7", "Май 8", "Май 9", "Май 10", "Май 11", "Май 12", "Май 13"],
    datasets: [{
      label: "Замороженные",
      lineTension: 0.3,
      backgroundColor: "rgba(0,123,255,0.2)",
      borderColor: "rgba(0,123,255,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(0,123,255,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(0,123,255,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [8, 10, 7, 2, 4, 13, 6, 12, 10, 9, 3, 1, 12],
    },
    {
      label: "Завершенные",
      lineTension: 0.3,
      backgroundColor: "rgba(220,53,69,0.2)",
      borderColor: "rgba(220,53,69,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(220,53,69,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(220,53,69,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [0, 1, 3, 0, 0, 5, 2, 1, 2, 0, 0, 0, 1],
    },
    {
      label: "В работе",
      lineTension: 0.3,
      backgroundColor: "rgba(255,193,7,0.2)",
      borderColor: "rgba(255,193,7,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(255,193,7,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(255,193,7,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [7, 5, 4, 2, 1, 5, 6, 3, 5, 3, 0, 1, 3],
    },
    {
      label: "Открытые",
      lineTension: 0.3,
      backgroundColor: "rgba(40,167,69,0.2)",
      borderColor: "rgba(40,167,69,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(40,167,69,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(40,167,69,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [3, 5, 1, 0, 1, 4, 3, 2, 1, 1, 0, 0, 0],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 15,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: true
    }
  }
});
